<?php

namespace Modules\Consoles\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompetencesController extends Controller
{

    public function store(Request $request)
    {
        // SAVE
        if ($request->get('id') == ""){

            $rules = [
                'nom' => 'required|unique:competences,name,NULL,name,deleted_at,NULL',
               // 'categorie' => 'required',
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
            $slug = createSlug($request->get('nom'),'competences',$request->get('id'));

            $save = DB::table('competences')->insertGetId([
                'slug' => $slug,
                'name' => $request->get('nom'),
              //  'categorie_id' => $request->get('categorie'),
                'description' => $request->get('description'),
                'created_at' => now(),
                'created_by' => auth()->id(),

            ]);

        }
        else{

            $rules = [
                'id' => 'required|exists:competences,id',
                'nom' => 'required',
              //  'categorie' => 'required',
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

            $slug = createSlug($request->get('nom'),'competences',$request->get('id'));

            $save = DB::table('competences')->where("id","=",$request->id)->update([
                'name' => $request->get('nom'),
                'slug' => $slug,
               // 'categorie_id' => $request->get('categorie'),
                'description' => $request->get('description'),
                'updated_at' => now(),
                'updated_by' => auth()->id(),
            ]);

        }

        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  "Echec d'enregistrement"), 200);
        }else{
            return response()->json(array('success' => true, 'message' =>"Enregistrement reussi", 'component' =>"permission"), 200);

        }
    }

    public function destroy(Request $request)
    {


        $id = $request->id;

        $message = "";
        $destroy = false;



        $destroy = DB::table("competences")
            ->where("id","=",$id)
            ->update([
            "deleted_at" => date("Y-m-d H:i:s"),
            "deleted_by" => auth()->id(),
         ]);


        $data = [];


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
            $data =DB::table("competences")
                ->where("id","=",$id)->first();
            if(!$data) return "Aucune donnée";
        }
        return view("consoles::settings.competences.form",compact('data'));
    }
    public function detail(Request $request)
    {

        $id = $request->post("id");

        $data = null;
        if($id && is_numeric($id)){
            $data =DB::table("competences")
                ->where("id","=",$id)->first();

        }
        if(!$data) return "Aucune donnée";
        return view("consoles::settings.competences.detail",compact('data'));
    }
    public function getAllComponent(Request $request){

        $search = $request->post("search");

        $query = DB::table("competences")
          //  ->leftJoin("ment_categories","ment_categories.id","=","competences.categorie_id")
            ->orderBy('competences.name')
            ->leftJoin(DB::raw("( select COUNT(ment_client_competences.id) as total
              ,competence_id
                    from  ment_client_competences
                    WHERE deleted_at IS NULL
                 GROUP BY competence_id) tblMentorTocompetences"),
                function ($join) {
                    $join->on('competences.id','=', 'tblMentorTocompetences.competence_id');
                })
            ->whereNull('competences.deleted_at')
          //  ->whereNull('ment_categories.deleted_at')
        ;

        if ($search = $request->input('search.value')) {
            $query->where(function($q) use ($search) {
                $q->where('competences.name', 'like', '%' . $search . '%')
              //  ->orWhere('ment_categories.name', 'like',  '%' . $search . '%')
                ;
            });
        }
       /*  $query->selectRaw("competences.*,IFNULL(tblMentorTocompetences.total,0) as total");*/

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
            ->selectRaw("competences.*,IFNULL(tblMentorTocompetences.total,0) as total")->get();



        $datas = [];
        foreach ($result as $rs){

            $actions = view('consoles::settings.competences.action',compact('rs'))->render();
            $total = $rs->total>0?"<span class='badge rounded-pill bg-info item-name'>$rs->total</span>":"";
            //     $actions = '';
            $route = route('consoles.settings.competences.detail');
            $datas[] = array(

                "name"=> linkeDetailOfCanvas($route,$rs->id,$rs->name,50),
              //  "categorie"=> linkeDetailOfCanvas($route,$rs->id,$rs->categorie,50),
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

    public static function search(Request $request)
    {
        $search = ($request->get('q')) ? $request->get('q') : "";
        $categorie = ($request->get('categorie')) ? $request->get('categorie') : "";

        $query= DB::table("competences")
        ->whereNull("competences.deleted_at");

        if($search){
            $query->where('competences.name', 'like', '%' . $search . '%');
        }
        if($categorie && is_numeric($categorie)){
            $query->leftJoin("ment_categorie_competences","ment_categorie_competences.competence_id"
                ,"=","competences.id")
                ->whereNull("ment_categorie_competences.deleted_at")
            ->where('ment_categorie_competences.categorie_id', '=', $categorie);
        }

        $query->selectRaw("competences.id,competences.name  AS text, competences.name")
            ->limit(30);

        $result = $query->get();
        return response()->json(["total_count" => count($result), "items" => $result]);
    }
}
