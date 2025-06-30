<?php

namespace Modules\Consoles\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TimesController extends Controller
{

    public function store(Request $request)
    {
        // SAVE
        if ($request->get('id') == ""){

            $rules = [
                'nom' => 'required|unique:ses_times,name,NULL,name,deleted_at,NULL',
              'time' => 'required',
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
            $slug = createSlug($request->get('nom'),'ses_times',$request->get('id'));
            $save = DB::table('ses_times')->insertGetId([
                'slug' => $slug,
                'name' => $request->get('nom'),
                'time' => $request->get('time'),

                'description' => $request->get('description'),
                'created_at' => now(),
                'created_by' => auth()->id(),

            ]);

        }
        else{

            $rules = [
                'id' => 'required|exists:ses_times,id',
                'nom' => 'required',
                'time' => 'required',
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

            $slug = createSlug($request->get('nom'),'ses_times',$request->get('id'));

            $save = DB::table('ses_times')->where("id","=",$request->id)->update([
                'name' => $request->get('nom'),
                'slug' => $slug,
                'time' => $request->get('time'),
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



        $destroy = DB::table("ses_times")
            ->where("id","=",$id)
            ->update([
            "deleted_at" => date("Y-m-d H:i:s"),
            "deleted_by" => auth()->id(),
         ]);


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
            $data =DB::table("ses_times")
                ->where("id","=",$id)->first();
            if(!$data) return "Aucune donnée";
        }
        return view("consoles::settings.times.form",compact('data'));
    }
    public function detail(Request $request)
    {

        $id = $request->post("id");

        $data = null;
        if($id && is_numeric($id)){
            $data =DB::table("ses_times")
                ->where("id","=",$id)->first();

        }
        if(!$data) return "Aucune donnée";
        return view("consoles::settings.times.detail",compact('data'));
    }
    public function getAllComponent(Request $request){

        $query = DB::table("ses_times")
            ->orderBy('ses_times.name')

            ->whereNull('ses_times.deleted_at')

        ;

        if ($search = $request->input('search.value')) {
            $query->where(function($q) use ($search) {
                $q->where('ses_times.name', 'like', '%' . $search . '%')
              //  ->orWhere('ment_categories.name', 'like',  '%' . $search . '%')
                ;
            });
        }

        $totalRecords = $query->count();

        // Appliquer les filtres
        $filteredQuery = clone $query;
        $filteredRecords = $filteredQuery->count();

        // Appliquer la pagination
        $result = $query
            ->skip($request->input('start'))
            ->take($request->input('length'))

            ->selectRaw("ses_times.*")->get();

        $datas = [];
        foreach ($result as $rs){
            $actions = view('consoles::settings.times.action',compact('rs'))->render();
            $route = route('consoles.settings.times.detail');
            $datas[] = array(

                "name"=> linkeDetailOfCanvas($route,$rs->id,$rs->name,50),
                "time"=> linkeDetailOfCanvas($route,$rs->id,$rs->time,50),
                "description"=> linkeDetailOfCanvas($route,$rs->id,$rs->description,50),
            /*    "total"=>linkeDetailOfCanvas($route,$rs->id,$total),*/
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
