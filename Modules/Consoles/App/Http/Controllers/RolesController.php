<?php

namespace Modules\Consoles\App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index(Request $request)
    {

        $currentIndex = $request->post("current");
        $search=$request->post("search");
        $component = $request->post("component");
        $selected_id = $request->post("selected_id");

        $rows = 30;
        $limit_l = ($currentIndex * $rows) - $rows;

        if ($currentIndex !== null) {
            $limit_l = ($currentIndex * $rows) - ($rows);
        }




        switch ($component) {
            case 'role':
                $axe_arrWhere = [["roles.deleted_at", '=', null]];

                $query = DB::table("roles")
                    ->leftJoin(DB::raw("( select COUNT(permission_id) as total,role_id
                    from  role_permission
                 GROUP BY role_id) permissions"),
                        function ($join) {
                            $join->on('roles.id','=', 'permissions.role_id');
                        })
                    ->where($axe_arrWhere);

                if($search){
                    $query->where('name', 'LIKE', "%{$search}%");
                }
                $query->orderBy("roles.name", "ASC")
                    ->selectRaw("roles.id,roles.name
                    ,permissions.total")
                ;
                break;
            case 'permission':
                $actarrWhere = [["permissions.deleted_at", '=', null]];

                $nextcomponent = "attribution";
                $query = DB::table("permissions")
                    ->leftJoin(DB::raw("( select COUNT(role_id) as total,permission_id
                    from  role_permission
                 GROUP BY permission_id) roles"),
                        function ($join) {
                            $join->on('roles.permission_id','=', 'permissions.id');
                        })
                    ->where($actarrWhere);
                if($search){
                    $query->where('name', 'LIKE', "%{$search}%");
                }
                $query->orderBy("permissions.name", "ASC")
                    ->selectRaw("permissions.id, permissions.name,permissions.comment,roles.total")
                    ->groupBy("permissions.id");

                break;
            case 'attribution':
                $expenseitemarrWhere = [["permissions.deleted_at", '=', null]];


                $query = DB::table("permissions")
                    ->whereNotIn('permissions.id', function ($query) use ($selected_id) {
                        $query->select('permission_id')->from('role_permission')->where("role_id","=",$selected_id);
                    })

                    ->groupBy("permissions.id")
                    ->orderBy("permissions.name","ASC")
                    ->where($expenseitemarrWhere);
                if($search){
                    $query->where('name', 'LIKE', "%{$search}%");
                }
                $query->selectRaw("permissions.id, permissions.name,permissions.comment");
                break;
            case 'attributed':
                $expensarrWhere = [["permissions.deleted_at", '=',null]];

                $query = DB::table("permissions")

                    ->whereIn('permissions.id', function ($query) use ($selected_id) {
                        $query->select('permission_id')->from('role_permission')->where("role_id","=",$selected_id);
                    })

                    ->groupBy("permissions.id")
                    ->orderBy("permissions.name","ASC")
                    ->where($expensarrWhere);
                if($search){
                    $query->where('name', 'LIKE', "%{$search}%");
                }
                $query->selectRaw("permissions.id, permissions.name,permissions.comment");
                break;

        }


        $total = count($query->get());
        $result = $query->limit($rows)->offset($limit_l)->get();

        $pagestotales = ceil($total / $rows);
        $compHtml = "<div class=\"ui divided  relaxed selection list"."\">";
        $j = 1;
        if($component=="role") {
            foreach ($result as $res) {
                $destroy = "";
                $labelTotal = $res->total?"  &nbsp; &nbsp;<div class=\"ui green circular label\">$res->total</div>":"";
                if ($res->total==0) {
                    $destroy = "<i  class=\"ui delete icon circular red msg\" data-content=\"Supprimer\" id=\"{$component}_{$res->id}_destroy\" ></i >";
                }
                   $edit = "<i  class=\"ui pencil icon circular green msg\" data-content=\"Modifier\"  id=\"{$component}_{$res->id}_edit\" ></i >";
                $detail = "<i  class=\"ui chevron right icon circular green msg\" data-content=\"Permission\"  data-label=\"{$res->name}\"  id=\"{$component}_{$res->id}_detail\" ></i >";
                $add =  ("<i  class=\" ui plus icon circular blue  msg\" data-content=\"Ajouter permission\"  id=\"{$component}_{$res->id}_addpermission\" ></i >");

                //target selected component
//                $componentlabel = $res->name;
                $compHtml .= "<div class=\"item  \" ><span class=\"ui text small content \" id=\"roleList$res->id\" data-label=\"{$res->name}\" > "
                    . " - " . $res->name . "  ".$labelTotal." </span><div class=\"right floated content\"  data-label=\"{$res->name}\" >"
                     .$add.$edit.$destroy.$detail . "</div></div>";

                $j++;
            }
        }
        if($component=="permission") {
            foreach ($result as $res) {
                $destroy = "";
                $edit = "";
                if ($res->total==0) {
                    $destroy = "<i  class=\"ui delete icon circular red msg\" data-content=\"Supprimer\" id=\"{$component}_{$res->id}_destroy\" ></i >";
                    $edit = "<i  class=\"ui pencil icon circular green msg\" data-content=\"Modifier\"  id=\"{$component}_{$res->id}_edit\" ></i >";
                }

                $detail = "<i  class=\"ui chevron right icon circular green msg\" data-content=\"Permission\"  id=\"{$component}_{$res->id}_detail\" ></i >";

                //target selected component
                $componentlabel = $res->name;
                $compHtml .= "<div class=\"item  \" ><span class=\"ui text small content\" id=\"permissionList$res->id\"  data-label=\"{$componentlabel}\" data-content=\"$res->comment\"> "
                    . " - " . $res->name . " (<span class='ui text orange'> ".$res->comment."</span>)</span><div class=\"right floated content\"  data-label=\"{$componentlabel}\" >"
                    .$edit.$destroy. "</div></div>";

                $j++;
            }
        }
        if($component=="attributed") {
            foreach ($result as $res) {

                    $destroy = "<i  class=\"ui delete icon circular red msg\" data-content=\"Retirer\" id=\"{$component}_{$res->id}_destroy_{$selected_id}\" ></i >";


                //target selected component
                $componentlabel = $res->name;
                $compHtml .= "<div class=\"item  \" ><span class=\"ui text small content\"  data-content=\"$res->comment\"> "
                    . " - " . $res->name . " </span><div class=\"right floated content\"  data-label=\"{$componentlabel}\" >"
                    .$destroy. "</div></div>";

                $j++;
            }
        }
        if($component=="attribution") {
            foreach ($result as $res) {

                $replay =  ("<i  class=\" ui plus icon circular blue  msg\" data-content=\"Ajouter la permission\"  id=\"{$res->id}_{$selected_id}_add\" ></i >");

                //target selected component
                $componentlabel = $res->name;
                $compHtml .= "<div class=\"item  \" ><span class=\"ui text  content msg\"  data-content=\"$res->comment\" > "
                    . " - " . $res->name . " </span><div class=\"right floated content msg\"  data-label=\"{$componentlabel}\" >"
                    .$replay. "</div></div>";

                $j++;
            }
        }


        $compHtml .= (count($result) > 0 ? "<script>$('.msg').popup();</script>" : "<div class=\"item\" ><span class=\"ui text small content \">Aucune donnée</span></div>") . "</div>";
        return \GuzzleHttp\json_encode(['currentpage' => $currentIndex, 'totalpages' => $pagestotales
            , 'total' => $total, 'rows' => $compHtml]);
//        return response()->json($jsonData);
    }
    public function form(Request $request)
    {

        $id = $request->post("id");

        $data = null;
        if($id && is_numeric($id)){
            $data =Role::find($id);
            if(!$data) return "Aucune donnée";
        }
        return view("consoles::settings.roles.form",compact('data'));
    }
    public function assignations(Request $request)
    {

        $id = $request->id;

        $data = null;
        if($id && is_numeric($id)){
            $data =Role::find($id);
            if(!$data) return back();
        }
      //  $permissions = Permission::all();

      //  $permissionsByRoles = $this->getPermissionByRoles($id);
       /* dd($permissionsByRoles);*/
        return view("consoles::settings.roles.assignations",compact('data'));
    }
    public function assignationDetail(Request $request)
    {

        $id = $request->id;


        $data = null;
       if($id && is_numeric($id)){
            $data =Role::find($id);
            if(!$data) return "Aucune donnée";
        }
        $permissions = Permission::all();

        $permissionsByRoles = $this->getPermissionByRoles($id);
       /* dd($permissionsByRoles);*/
        return view("consoles::settings.permissions.items",compact('data','permissions','permissionsByRoles','id'));
    }
    public function getPermissionByRoles($role){
        return  DB::table('role_permissions')
            ->where("role_id",'=',$role)
            ->selectRaw('permission_id')
            ->pluck('permission_id')
            ->whereNull('deleted_at')->toArray();
    }
    public function formPermission(Request $request)
    {

        $id = $request->post("id");

        $data = null;
        if($id && is_numeric($id)){
            $data =Permission::find($id);
            if(!$data) return "Aucune donnée";
        }
        return view("consoles::settings.roles.form-permission",compact('data'));
    }

    public function store(Request $request)
    {
        // SAVE
        if ($request->get('id') == ""){

            $rules = [
             //   'role' => 'required|unique:roles,name,NULL,name,deleted_at,NULL',
                'nom' => 'required|unique:roles,name,NULL,name,deleted_at,NULL',
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

            $save = Role::create([
                'name' => $request->get('nom'),
            ]);
         //   dd($save);

        }
        else{

            $rules = [
                'id' => 'required|exists:roles,id',
                'nom' => 'required',
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


            $save = Role::findOrFail($request->get('id'))->update([
                'name' => $request->get('nom'),

            ]);

        }

        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  "Echec d'enregistrement"), 200);
        }else{


            return response()->json(array('success' => true, 'message' =>"Enregistrement reussi", 'component' =>"role"), 200);

        }

    }


    public function assign_permission(Request $request)
    {

        $check = DB::table("role_permission")
            ->where("role_id","=",$request->get('role_id'))
            ->where("permission_id","=",$request->get('permission_id'))->first();
        if(!$check){
            $assign = DB::table("role_permission")->insert([
                "role_id"=>$request->get('role_id'),
                "permission_id"=>$request->get('permission_id'),
                "created_at"=>now(),
                "created_by"=>auth()->user()->id,
            ]);

            if (!$assign) {
                return response()->json(array('success' => false, 'message' =>  "Echec d'enregistrement"), 200);
            }else{
                return response()->json(array('success' => true, 'message' =>"Enregistrement reussi", 'component' =>"attribution"), 200);

            }
        }else{
            return response()->json(array('success' => false, 'message' =>  "Donnée existante"), 200);
        }


    }
    public function assign_permission_all(Request $request)
    {
            $role_id = $request->role_id;
            $permission = $request->permission;

     /*       dd($permission);*/
        $delete = DB::table("role_permissions")
            ->where("role_id","=",$role_id)->delete();
           $saveCount = 0;
            if($permission && count($permission)>0){

                    foreach($permission as $key=> $perm){

                        $assign = DB::table("role_permissions")->insert([
                            "role_id"=>$role_id,
                            "permission_id"=>$perm,
                            "created_at"=>now(),
                            "created_by"=>auth()->user()->id,
                        ]);

                        if($assign) $saveCount++;
                    }


            }

        if ($saveCount==0) {
            return response()->json(array('success' => false, 'message' =>  "Echec d'enregistrement"), 200);
        }else{
            return response()->json(array('success' => true, 'message' =>"Enregistrement reussi"), 200);

        }


    }
    public function detach_permission(Request $request)
    {

        $check = DB::table("role_permission")
            ->where("role_id","=",$request->get('role_id'))
            ->where("permission_id","=",$request->get('permission_id'))->delete();
        if (!$check) {
            return response()->json(array('success' => false, 'message' =>  "Echec d'enregistrement"), 200);
        }else{
            return response()->json(array('success' => true, 'message' =>"Enregistrement reussi", 'component' =>"attribution"), 200);

        }


    }

    public function getAllComponent(Request $request){

        $search = $request->post("search");

        $query = DB::table("roles")
            ->orderBy('roles.name')
            ->leftJoin(DB::raw("( select COUNT(permission_id) as total,role_id
                    from  role_permissions
                 GROUP BY role_id) tblPermissions"),
                function ($join) {
                    $join->on('roles.id','=', 'tblPermissions.role_id');
                })
            ->whereNull('roles.deleted_at')
        ;

        if ($search = $request->input('search.value')) {
            $query->where(function($q) use ($search) {
                $q->where('roles.name', 'like', '%' . $search . '%');
            });
        }
      /*  $query->selectRaw("roles.*,IFNULL(tblPermissions.total,0) as total");*/

     /*   $result = $query->get();*/

        // Total des enregistrements avant pagination
        $totalRecords = $query->count();

        // Appliquer les filtres
        $filteredQuery = clone $query;
        $filteredRecords = $filteredQuery->count();

        // Appliquer la pagination
        $result = $query
            ->skip($request->input('start'))
            ->take($request->input('length'))
            ->selectRaw("roles.*,IFNULL(tblPermissions.total,0) as total")->get();

        $pos = $request->input('start') + 1;

        $datas = [];
        foreach ($result as $rs){

          $actions = view('consoles::settings.roles.action',compact('rs'))->render();

       //     $actions = '';
            $datas[] = array(
            /*    "pos"=> $pos ,*/
                "name"=> "$rs->name" ,
                "permission"=> $rs->total>0?"<span class='badge rounded-pill bg-info item-name'>$rs->total</span>":"" ,
                "action"=> $actions,
            );

        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $datas
        ]);
    }

    public function destroy(Request $request)
    {


        $id = $request->id;

        $message = "";
        $destroy = false;


                $axe_arrWhere = [["role_permission.role_id", '=', $id]];
                $query = DB::table("role_permission")
                    ->where($axe_arrWhere)
                    ->count();
                if($query>0){
                    $message = "Veuillez retirer les permissions de ce rôle ";
                }
                else{
                    $role = Role::findOrFail($id);
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

    public function destroyOld(Request $request)
    {


        $component = $request->post("component");
        $selected_id = $request->post("id");
        $selected_id_second = $request->post("id_2");

        $message = "";
        $destroy = false;


        switch ($component) {
            case 'role':
                $axe_arrWhere = [["role_permission.role_id", '=', $selected_id]];
                $query = DB::table("role_permission")
                    ->where($axe_arrWhere)
                    ->count();
                if($query>0){
                    $message = "Veuillez retirer les permissions de ce rôle ";
                }
                else{

                    $role = Role::findOrFail($selected_id);
                    $destroy = $role->delete();
                }


                break;
            case 'permission':
                $actarrWhere = [["role_permission.permission_id", '=', $selected_id]];
                $query = DB::table("role_permission")
                    ->where($actarrWhere)
                    ->count();
                if($query>0){
                    $message = "Veuillez retirer les rôles qui sont liés a cette permission ";
                }
                else{

                    $role = Permission::findOrFail($selected_id);
                    $destroy = $role->delete();
                }

                break;
            case 'attributed':

                $destroy = DB::table("role_permission")
                    ->where("permission_id","=",$selected_id)
                    ->where("role_id","=",$selected_id_second)
                    ->delete();


                break;
        }


//        dd($request);
        $data = [];
        $data["component"]=$component;
        $data["message"]=$message;
        $data["success"]=$destroy?true:false;
        return \GuzzleHttp\json_encode($data);

        if (!$destroy) {
            return response()->json(array('success' => true, 'message' => 'Suppression a echouée'), 400);
        }
        return response()->json(array('success' => true, 'message' => 'Suppression reussie'), 200);
    }

}
