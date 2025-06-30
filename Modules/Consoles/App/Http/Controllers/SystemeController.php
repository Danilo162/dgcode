<?php

namespace Modules\Consoles\App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class SystemeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @returnvoid
     */
    public function __construct()
    {
        $this->middleware('auth');


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    /*    $this->authorize('MENU MODULE PARAMETRAGE');*/
        $data = null;
        if(!auth()->user()->can('PARAMETRAGE DU SYSTEME')){
            return back();
        }
        $data = getOrSaveConfigs();
        return view('settings.systemes.index',compact('data'));
    }
    public function infogenerale()
    {
      /*  $this->authorize('MENU MODULE PARAMETRAGE');*/
        $data = getOrSaveConfigs();
        $title = '';

        return view("systemes.infogenerale.index",compact('title','data'));
    }

    public function storeLogoMini(Request $request)
    {
        $id=getOrSaveConfigs()->id;
        $picture  = $request->picture??"";

        $rules=[
            'picture' => 'required',

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

      //  $fileName = encodeValue($id);
        $fileName="logo_mini.png";

        //  $save = saveBase64Image($picture,$fileName,"users/");
        $save = saveBase64Image($picture,$fileName,"configs/");

        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  Lang::get("response.error_save")), 400);
        }
        else{
            DB::table("configs")->where("id","=",$id)
                ->update([
                    "logo_mini"=>1,
                    "updated_at"=>now()
                    ,"updated_by"=>auth()->user()->id]);
            return response()->json(array('success' => true, 'message' =>  Lang::get("response.success_save")), 200);

        }

    }
    public function storeLogoMaxi(Request $request)
    {
        $id=getOrSaveConfigs()->id;
        $picture  = $request->picture??"";

        $rules=[
            'picture' => 'required',

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

      //  $fileName = encodeValue($id);
        $fileName="logo_maxi.png";

        //  $save = saveBase64Image($picture,$fileName,"users/");
        $save = saveBase64Image($picture,$fileName,"configs/");

        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  Lang::get("response.error_save")), 400);
        }
        else{

            DB::table("configs")->where("id","=",$id)
                ->update([
                    "logo_maxi"=>1,
                    "updated_at"=>now()
                    ,"updated_by"=>auth()->user()->id]);
            return response()->json(array('success' => true, 'message' =>  Lang::get("response.success_save")), 200);

        }

    }
    public function storeLogoEntete(Request $request)
    {
        $id=getOrSaveConfigs()->id;
        $picture  = $request->picture??"";

        $rules=[
            'picture' => 'required',

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

      //  $fileName = encodeValue($id);
        $fileName="logo_entete.png";

        //  $save = saveBase64Image($picture,$fileName,"users/");
        $save = saveBase64Image($picture,$fileName,"configs/");

        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  Lang::get("response.error_save")), 400);
        }
        else{

            DB::table("configs")->where("id","=",$id)
                ->update([
                    "logo_maxi"=>1,
                    "updated_at"=>now()
                    ,"updated_by"=>auth()->user()->id]);
            return response()->json(array('success' => true, 'message' =>  Lang::get("response.success_save")), 200);

        }

    }
    public function storeTitle(Request $request)
    {
        $id=getOrSaveConfigs()->id;
        $libelle  = $request->libelle??"";

        $rules=[
            'libelle' => 'required',

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


        $save =   DB::table("configs")->where("id","=",$id)
            ->update([
                "name"=>$libelle,
                "sigle"=>$request->sigle,
                "siege"=>$request->siege,
                "description"=>$request->description,
                "rc"=>$request->rc,
                "rib"=>$request->rib,
                "site"=>$request->site,
                "updated_at"=>now()
                ,"updated_by"=>auth()->user()->id]);
        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  Lang::get("response.error_save")), 400);
        }
        else{

            return response()->json(array('success' => true, 'message' =>  Lang::get("response.success_save")), 200);

        }

    }
    public function storeDrh(Request $request)
    {
        $id=getOrSaveConfigs()->id;
        $direction  = $request->direction??"";

        $rules=[
            'direction' => 'required|exists:sub_departements,id',

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


        $save =   DB::table("configs")->where("id","=",$id)
            ->update([
                "drh_id"=>$direction,
                 "updated_at"=>now()
                ,"updated_by"=>auth()->user()->id]);
        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  Lang::get("response.error_save")), 400);
        }
        else{

            return response()->json(array('success' => true, 'message' =>  Lang::get("response.success_save")), 200);

        }

    }
    public function storeDefaultPwd(Request $request)
    {
        $id=getOrSaveConfigs()->id;
        $pwd  = $request->pwd??"";

        $rules=[
            'pwd' => 'required',

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


        $save =   DB::table("configs")->where("id","=",$id)
            ->update([
                "default_pwd"=>$pwd,
                "updated_at"=>now()
                ,"updated_by"=>auth()->user()->id]);
        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  Lang::get("response.error_save")), 400);
        }
        else{

            return response()->json(array('success' => true, 'message' =>  Lang::get("response.success_save")), 200);

        }

    }
    public function storeContacts(Request $request)
    {
        $id=getOrSaveConfigs()->id;
        $contact  = $request->contact??"";

        $rules=[
            'contact' => 'required',

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

        $save =   DB::table("configs")->where("id","=",$id)
            ->update([
                "phone_1"=>str_replace(" ","",$contact),
                "phone_2"=>str_replace(" ","",$request->contact_2),
                "email"=>$request->email,
                "updated_at"=>now()
                ,"updated_by"=>auth()->user()->id]);
        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  Lang::get("response.error_save")), 400);
        }
        else{

            return response()->json(array('success' => true, 'message' =>  Lang::get("response.success_save")), 200);

        }

    }
    public function storeColors(Request $request)
    {
        $id=getOrSaveConfigs()->id;


        $rules=[
            'menu_back_color' => 'required',
            'menu_color' => 'required',
            'menu_actif_back_color' => 'required',
            'menu_actif_color' => 'required',

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

        $save =   DB::table("configs")->where("id","=",$id)
            ->update([
                "menu_back_color"=>$request->menu_back_color,
                "menu_color"=>$request->menu_color,
                "menu_actif_back_color"=>$request->menu_actif_back_color,
                "menu_actif_color"=>$request->menu_actif_color,
                "updated_at"=>now()
                ,"updated_by"=>auth()->user()->id]);
        if (!$save) {
            return response()->json(array('success' => false, 'message' =>  Lang::get("response.error_save")), 400);
        }
        else{

            return response()->json(array('success' => true, 'message' =>  Lang::get("response.success_save")), 200);

        }

    }

}
