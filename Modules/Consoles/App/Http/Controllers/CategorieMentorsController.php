<?php

namespace Modules\Consoles\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategorieMentorsController extends Controller
{

    public function store(Request $request)
    {
        $rules = [
            'nom' => 'required',
         //   'competences' => 'nullable|array', // Vérifie si c'est bien un tableau
           // 'competences.*' => 'exists:competences,id', // Vérifie si chaque compétence existe
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => "Erreur de données",
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ], 200);
        }

        $slug = createSlug($request->get('nom'), 'ment_categories', $request->id);

        if ($request->get('id') == "") {
            // Création d'une nouvelle catégorie
            $categoryId = DB::table('ment_categories')->insertGetId([
                'name' => $request->get('nom'),
                'slug' => $slug,
                'description' => $request->get('description'),
                'created_at' => now(),
                'created_by' => auth()->id(),
            ]);
        } else {
            // Mise à jour d'une catégorie existante
            DB::table('ment_categories')->where("id", "=", $request->id)->update([
                'name' => $request->get('nom'),
                'slug' => $slug,
                'description' => $request->get('description'),
                'updated_at' => now(),
                'updated_by' => auth()->id(),
            ]);

            $categoryId = $request->id;
        }

        // Mise à jour des compétences associées
        if ($request->has('competences')) {
            DB::table('ment_categorie_competences')->where('categorie_id', $categoryId)->delete(); // Supprime les anciennes entrées

            foreach ($request->competences as $competenceId) {
                DB::table('ment_categorie_competences')->insert([
                    'categorie_id' => $categoryId,
                    'competence_id' => $competenceId,
                    'created_at' => now(),
                    'created_by' => auth()->id(),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Enregistrement réussi",
            'component' => "permission"
        ], 200);
    }


    public function destroy(Request $request)
    {


        $id = $request->id;

        $message = "";
        $destroy = false;



        $destroy = DB::table("ment_categories")
            ->where("id","=",$id)
            ->update([
            "deleted_at" => date("Y-m-d H:i:s"),
            "deleted_by" => auth()->id(),
         ]);


        $data = [];
        $data["component"]="role";
        $data["message"]=$message;
        $data["success"]=$destroy?true:false;
      //  return \GuzzleHttp\json_encode($data);

        if (!$destroy) {
            return response()->json(array('success' => true, 'message' => 'Suppression a echouée'), 400);
        }
        return response()->json(array('success' => true, 'message' => 'Suppression reussie'), 200);
    }

    public function form(Request $request)
    {

        $id = $request->post("id");

        $data = null;
        $allCompences = [];
        if($id && is_numeric($id)){
            $data =DB::table("ment_categories")
                ->where("id","=",$id)->first();
            if(!$data) return "Aucune donnée";
            $allCompences = DB::table("ment_categorie_competences")
                ->selectRaw("competence_id")
                ->where("categorie_id","=",$id)
                ->whereNull("deleted_at")->get()->toArray();
        }
        return view("consoles::settings.categoriementors.form",compact('data','allCompences'));
    }
    public function detail(Request $request)
    {

        $id = $request->post("id");

        $data = null;
        if($id && is_numeric($id)){
            $data =DB::table("ment_categories")
                ->where("id","=",$id)->first();

        }
        if(!$data) return "Aucune donnée";

        $allCompences = DB::table("ment_categorie_competences")
            ->leftJoin("competences",'competences.id',"=","ment_categorie_competences.competence_id")
            ->selectRaw("competences.id,competences.name")
            ->where("ment_categorie_competences.categorie_id","=",$id)
            ->whereNull("ment_categorie_competences.deleted_at")
            ->whereNull("competences.deleted_at")
            ->get();

        return view("consoles::settings.categoriementors.detail",compact('data','allCompences'));
    }
    public function getAllComponent(Request $request){

        $search = $request->post("search");

        $query = DB::table("ment_categories")
            ->orderBy('ment_categories.name')
            ->leftJoin(DB::raw("( select COUNT(mentor_categories.id) as total
              ,categorie_id
                    from  mentor_categories
                    WHERE deleted_at IS NULL
                 GROUP BY categorie_id) tblMentorToCategories"),
                function ($join) {
                    $join->on('ment_categories.id','=', 'tblMentorToCategories.categorie_id');
                })
            ->whereNull('ment_categories.deleted_at')
        ;

        if ($search = $request->input('search.value')) {
            $query->where(function($q) use ($search) {
                $q->where('ment_categories.name', 'like', '%' . $search . '%');
            });
        }
       /*  $query->selectRaw("categories.*,IFNULL(tblMentorToCategories.total,0) as total");*/

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
            //->selectRaw("roles.*,IFNULL(tblPermissions.total,0) as total")->get();
            ->selectRaw("ment_categories.*,IFNULL(tblMentorToCategories.total,0) as total")->get();



        $datas = [];
        foreach ($result as $rs){

            $actions = view('consoles::settings.categoriementors.action',compact('rs'))->render();
            $total = $rs->total>0?"<span class='badge rounded-pill bg-info item-name'>$rs->total</span>":"";
            //     $actions = '';
            $route = route('consoles.settings.categoriementors.detail');
            $datas[] = array(

                "name"=> linkeDetailOfCanvas($route,$rs->id,$rs->name,50),
                "total"=>linkeDetailOfCanvas($route,$rs->id,$total),
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
}
