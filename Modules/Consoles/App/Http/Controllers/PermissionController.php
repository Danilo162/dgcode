<?php

namespace Modules\Consoles\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{

    public function store(Request $request)
    {
        // SAVE
        if ($request->get('id') == ""){

            $rules = [
                'nom' => 'required|unique:permissions,name,NULL,name,deleted_at,NULL',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return response()->json([
                    'message' => "Erreur de données",
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ], 200); // 400 being the HTTP code for an invalid request.
            }

            $save = Permission::create([
                'name' => $request->get('nom'),
                'comment' => $request->get('comment'),
            ]);

        }
        else{

            $rules = [
                'id' => 'required|exists:permissions,id',
                'nom' => 'required',
              //  'comment' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return response()->json([
                    'message' => "Erreur de données",
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
                ], 200); // 400 being the HTTP code for an invalid request.
            }


            $save = Permission::findOrFail($request->get('id'))->update([
                'name' => $request->get('nom'),
                'comment' => $request->get('comment'),

            ]);

        }

        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  "Echec d'enregistrement"), 200);
        }else{
            return response()->json(array('success' => true, 'message' =>"Enregistrement reussi", 'component' =>"permission"), 200);

        }
    }

    public function getAllComponent(Request $request)
    {
        $search = $request->post("search");
        $user = $request->user ?? null;
        $cocher = $request->cocher ?? null;
        $role = $request->role?? null;

      /*  dd($role);*/
        // Cas par défaut si pas de user
        $caseRole = " ,'' as status_role ";
        $caseUser = " ,'' as status_user ";
        $where = " ";

        // Si l'utilisateur est fourni, on vérifie s'il a une permission
        if ($user) {
            $caseUser = " , CASE WHEN user_id = $user THEN 'ok' ELSE 'no' END AS status_user";
        }

        // Si un rôle est fourni, on ne montre pas les permissions déjà attribuées à ce rôle
        if ($role) {
            $caseRole = " , CASE WHEN role_id = '$role' THEN 'ok' ELSE 'no' END AS status_role";
        }

        $query = DB::table("permissions")
            ->distinct('permissions.id')
            ->orderBy('permissions.name');
        if($cocher && $role){
            $query ->whereNotIn('permissions.id', function($query) use ($role){
                $query->select('permission_id')
                    ->from('role_permissions')
                    ->where('role_id','=', $role);
            });
        }
        $query->leftJoin(DB::raw("(SELECT
             permission_id  FROM role_permissions
             ) permissionRole"), function ($join) {
                $join->on('permissions.id', '=', 'permissionRole.permission_id');
            })
           ->leftJoin(DB::raw("(SELECT permission_id $caseUser FROM user_permissions) permissionsUser"), function ($join) {
                $join->on('permissions.id', '=', 'permissionsUser.permission_id');
            })
           ->leftJoin(DB::raw("( select COUNT(permission_id) as total,permission_id
                    from  role_permissions
                 GROUP BY permission_id) tblPermissions"),
                function ($join) {
                    $join->on('permissions.id','=', 'tblPermissions.permission_id');
                })

            ->whereNull('permissions.deleted_at');


        // Appliquer la recherche
        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('permissions.name', 'like', '%' . $search . '%')
                    ->orWhere('permissions.comment', 'like', '%' . $search . '%');
            });
        }

        // Total des enregistrements avant pagination
        $totalRecords = $query->count();

        // Appliquer les filtres
        $filteredQuery = clone $query;
        $filteredRecords = $filteredQuery->count();

        // Appliquer la pagination
        $result = $query
            ->skip($request->input('start'))
            ->take($request->input('length'))
            ->selectRaw("permissions.id,name,comment,status
            , permissionsUser.status_user
            ,IFNULL(tblPermissions.total,0) as total
           ")
            ->get();

        $datas = [];
        foreach ($result as $rs) {
            // Gestion des cases à cocher en fonction du statut de l'utilisateur
            $cocherHtml = '';
            if ($cocher) {
               $checker = $rs->status_user == 'no' ? '' : 'checked';
                $cocherHtml = " <div onclick=\"saveUserPermission('$rs->id')\" class='form-check form-switch'> <input style=\"cursor: pointer\" $checker class=\"form-check-input permission-checkbox\" value=\"".$rs->id."\" name=\"permission\" type=\"checkbox\" ></div>";
            }

         $actions = view('consoles::settings.permissions.action', compact('rs'))->render();
         /*  $actions = "";*/

            $datas[] = array(
                "cocher" => $cocher ? $cocherHtml : '',
                "name" => "$rs->name",
                "comment" => "$rs->comment",
                "action" => !$cocher ? $actions : '',
            );
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $datas,
        ]);
    }

    public function destroy(Request $request)
    {


        $id = $request->id;

        $message = "";
        $destroy = false;


        $axe_arrWhere = [["role_permission.permission_id", '=', $id]];
        $query = DB::table("role_permission")
            ->where($axe_arrWhere)
            ->count();
        if($query>0){
            $message = "Veuillez retirer la permission sur des rôles ";
        }
        else{
            $role = Permission::findOrFail($id);
            $destroy = $role->delete();
        }



//        dd($request);
        $data = [];
        $data["component"]="role";
        $data["message"]=$message;
        $data["success"]=$destroy?true:false;
        return \GuzzleHttp\json_encode($data);

        if (!$destroy) {
            return response()->json(array('success' => true, 'message' => 'Suppression a echouée'), 400);
        }
        return response()->json(array('success' => true, 'message' => 'Suppression reussie'), 200);
    }
    public function form(Request $request)
    {

        $id = $request->post("id");

        $data = null;
        if($id && is_numeric($id)){
            $data =Permission::find($id);
            if(!$data) return "Aucune donnée";
        }
        return view("consoles::settings.permissions.form",compact('data'));
    }
}
