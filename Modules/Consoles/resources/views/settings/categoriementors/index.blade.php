@extends('consoles::layouts.main')
@section('content')
    <link rel="stylesheet" href="{{asset('manages/assets/plugins/datatable/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('manages/assets/plugins/datatable/Buttons-2.4.2/css/buttons.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('manages/assets/plugins/datatable/Buttons-2.4.2/css/buttons.jqueryui.css')}}">
    <link rel="stylesheet" href="{{asset('manages/assets/plugins/datatable/Responsive-2.5.0/css/responsive.bootstrap5.css')}}">



    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Parametrages</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-cog"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Catégories mentors <span class="text-primary  total_count">0</span> </li>
                </ol>
            </nav>
        </div>
     {{--   &nbsp; <h6 class="mb-0 text-uppercase">DataTable Example</h6>--}}
        <div class="ms-auto">
            <button type="button" onclick="loadModal('{{route('consoles.settings.categoriementors.form')}}','{{json_encode([])}}','FORMULAIRE DE CATEGORIE MENTOR')" class="btn btn-primary"> <i class="bx bx-plus"></i> Nouveau</button>
        </div>
    </div>

 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="datatables" class="table table-striped table-bordered"  data-toggle="grid">
                         <thead>
                         <tr>
                             <th>Nom</th>
                             <th >Total</th>
                             <th style="width: 100px">Actions</th>
                         </tr>
                         </thead>
                         <tbody>

                         </tbody>
                         <tfoot>
                         <tr>
                             <th>Nom</th>
                             <th>Total</th>
                             <th>Actions</th>
                         </tr>
                         </tfoot>
                     </table>
                 </div>
             </div>
         </div>
     </div>
     <div class="col"></div>
 </div>

    <script src="{{asset('manages/assets/plugins/datatable/datatables.min.js')}}" defer></script>
    <script src="{{asset('manages/assets/plugins/datatable/Buttons-2.4.2/js/buttons.bootstrap5.js')}}" defer></script>
    <script src="{{asset('manages/assets/plugins/datatable/Buttons-2.4.2/js/buttons.dataTables.js')}}" defer></script>
    {{--<script src="{{asset('plugins/datatable/buttons.semanticui.min.js')}}" ></script>--}}
    <script src="{{asset('manages/assets/plugins/datatable/JSZip-3.10.1/jszip.min.js')}}" defer></script>
    <script src="{{asset('manages/assets/plugins/datatable/pdfmake-0.2.7/pdfmake.min.js')}}" defer></script>
    <script src="{{asset('manages/assets/plugins/datatable/pdfmake-0.2.7/vfs_fonts.js')}}" defer></script>
    <script src="{{asset('manages/assets/plugins/datatable/Responsive-2.5.0/js/responsive.bootstrap5.js')}}" defer></script>
    <script src="{{asset('manages/assets/plugins/datatable/Buttons-2.4.2/js/buttons.html5.min.js')}}" defer></script>
    <script src="{{asset('manages/assets/plugins/datatable/Buttons-2.4.2/js/buttons.print.min.js')}}" defer></script>
    <script src="{{asset('manages/assets/plugins/datatable/Buttons-2.4.2/js/buttons.colVis.min.js')}}" defer></script>
  {{--  <script src="{{asset('plugins/datatable/Select-1.7.0/js/select.bootstrap5.js')}}" defer></script>--}}

    <script>
        $(document).ready(function() {

            launchReloadDataTable();
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
                                toastS(re_message)
                                form.reset();
                                $('.modal').modal('hide');

                            launchReloadDataTable();
                        }else {
                            let errors = responseParse.errors
                            console.log(errors)
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
        function launchReloadDataTable() {
            table = $('#datatables').DataTable();
            table.destroy();
            route = '{{route('consoles.settings.categoriementors.getall')}}';
            title = "Liste des categorie mentors"
            columns =  ['name','total','action'];
            postColumns =  ['l','c','c'];
            loadDataTableSimple(route,title,columns,"datatables",postColumns)
        }
    </script>
@endsection
