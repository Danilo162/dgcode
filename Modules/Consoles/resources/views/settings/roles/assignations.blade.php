@extends('consoles::layouts.main')
@section('content')
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/Buttons-2.4.2/css/buttons.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/Buttons-2.4.2/css/buttons.jqueryui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatable/Responsive-2.5.0/css/responsive.bootstrap5.css')}}">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Parametrages</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-cog"></i></a>
                    </li>
                    <li class="breadcrumb-item " >Rôles </li>
                    <li class="breadcrumb-item active" >Assignations  </li>
                  {{--  <li class="breadcrumb-item active" aria-current="page"> <div class=""> {{$data->name}}</div>  </li>--}}
                </ol>
            </nav>
        </div>


    </div>

 <div class="row">


     <div class="col-12" >
         <form action="{{route('consoles.settings.roles.assignations.store')}}" method="POST" class="form_load" >
             @csrf
             <div id="page_content" class="col-12">

             </div>

         </form>
     </div>
 </div>

    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}" defer></script>
    <script src="{{asset('assets/plugins/datatable/Buttons-2.4.2/js/buttons.bootstrap5.js')}}" defer></script>
    <script src="{{asset('assets/plugins/datatable/Buttons-2.4.2/js/buttons.dataTables.js')}}" defer></script>
    {{--<script src="{{asset('plugins/datatable/buttons.semanticui.min.js')}}" ></script>--}}
    <script src="{{asset('assets/plugins/datatable/JSZip-3.10.1/jszip.min.js')}}" defer></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake-0.2.7/pdfmake.min.js')}}" defer></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake-0.2.7/vfs_fonts.js')}}" defer></script>
    <script src="{{asset('assets/plugins/datatable/Responsive-2.5.0/js/responsive.bootstrap5.js')}}" defer></script>
    <script src="{{asset('assets/plugins/datatable/Buttons-2.4.2/js/buttons.html5.min.js')}}" defer></script>
    <script src="{{asset('assets/plugins/datatable/Buttons-2.4.2/js/buttons.print.min.js')}}" defer></script>
    <script src="{{asset('assets/plugins/datatable/Buttons-2.4.2/js/buttons.colVis.min.js')}}" defer></script>
  {{--  <script src="{{asset('plugins/datatable/Select-1.7.0/js/select.bootstrap5.js')}}" defer></script>--}}
  {{--  <script src="{{asset('select2-v4_1/select2.full.min.js')}}" defer></script>--}}
    <script>
        $(document).ready(function() {
          /*  launchReloadDataTable();*/
            loadPermissions()
            $(document).on('submit','form.form_load', function (e) {
                e.preventDefault();

                const form = e.target;
                var formData=new FormData(form);
                refreshErrors("form_load",1)
                l_show();

                // Post data using the Fetch API
                fetch(form.action, {
                    method:'POST',
                    body: formData
                })
                    // We turn the response into text as we expect HTML
                    .then((result) => result.text())
                    // Let's turn it into an HTML document
                    .then((response) => {
                        l_hide();
                        let responseParse = JSON.parse(response);
                        let re_message = responseParse.message;
                        let success = responseParse.success;

                        if(success){

                            if(success){
                                toastS(re_message)
                                loadPermissions()
                            /*    form.reset();
                                $('.modal').modal('hide');*/
                            }
                       /*     launchReloadDataTable();*/
                        }else {
                            let errors = responseParse.errors
                       /*     console.log(errors)*/
                            setErrors(errors)
                            toastE(re_message)
                        }

                        // displayDisbursements(1,$('#expense_id').val());
                    })
                    .catch(err => {
                        l_hide();
                        console.log(err);
                    });
            });
        });

        function loadPermissions(){
            // Create a new FormData object
            let formData = new FormData();

            callPageCustom('{{route('consoles.settings.roles.assignations.detail',['id'=>$data->id])}}', formData,'page_content', "GET")
        }

    </script>
@endsection
