<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
    <p class="mb-0">Copyright © 2024. All right reserved.</p>
</footer>
</div>


<div class="modal fade" id="modalAllCustom" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm">
            <div class="modal-header">
                {{--  <h5 class="modal-title" id="titleModalAll">Modal title</h5>--}}
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContainercustom">

            </div>
            {{--        <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>--}}
        </div>
    </div>
</div>
<div style="padding: 8px;border-radius: 3px;background: #f2f2f2 !important;"
     class="offcanvas  offcanvas-end  customOffCanvas"
     tabindex="-1"
     id="offcanvasBackdrop"
     aria-labelledby="offcanvasBackdropLabel">
    <div class="offcanvas-header" style="background: #f2f2f2 !important;">
        {{-- <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Enable backdrop</h5>--}}
        <button style="color: #244f56"
                type="button"
                class="btn-close text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body  mx-0 flex-grow-0 " style="background: #f2f2f2">

        <div class="row">
            <div class="col" id="offcanvasContent"></div>
        </div>
        {{--  <button type="button" class="btn btn-primary mb-2 d-grid w-100">Continue</button>
          <button
              type="button"
              class="btn btn-outline-secondary d-grid w-100"
              data-bs-dismiss="offcanvas">
              Fermer
          </button>--}}
    </div>
</div>
<!--end wrapper-->
<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">PERSONALISATION</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr/>
        <h6 class="mb-0">Themes Styles</h6>
        <hr/>
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                <label class="form-check-label" for="lightmode">Light</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                <label class="form-check-label" for="darkmode">Dark</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                <label class="form-check-label" for="semidark">Semi Dark</label>
            </div>
        </div>
        <hr/>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
            <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
        </div>
        <hr/>
        <h6 class="mb-0">Couleurs d'en-tête</h6>
        <hr/>
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
            </div>
        </div>
        <hr/>
        <h6 class="mb-0">Arrière-plans du menu</h6>
        <hr/>
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="r_custom_theme" value="{{route('consoles.customs.theme')}}">
<!--end switcher-->
<!-- Bootstrap JS -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<div class="modal fade" id="modalAll" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModalAll"></h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContainer">

            </div>

        </div>
    </div>
</div>
<div id="toast-placement-ex"
     class="bs-toast toast toast-placement-ex m-2 bg-primary top-0 end-0 "
     role="alert"
     aria-live="assertive"
     aria-atomic="true"
     data-bs-delay="3000">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-medium" id="sucTitle">Notification</div>
        {{--   <small>11 mins ago</small>--}}
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" id="sucBody">Info</div>
</div>
<script src="{{asset('manages/assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->

<script src="{{asset('manages/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('manages/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('manages/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('manages/assets/plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('manages/assets/plugins/notifications/js/lobibox.min.js')}}"></script>
<script src="{{asset('manages/assets/plugins/notifications/js/notifications.min.js')}}"></script>
<script src="{{asset('manages/assets/js/index2.js')}}"></script>
<!--app JS-->
<script src="{{asset('manages/assets/js/app.js')}}"></script>

<script>
    $(document).ready(function() {
        $(document).ready(function () {
            setTimeout(function(){ location.reload(); }, 2400000); // 40 min
        })
    })
    if($(".customers-list").length>0){
    new PerfectScrollbar('.customers-list');
    }
    if($(".store-metrics").length>0)
    {
        new PerfectScrollbar('.store-metrics');
    }
        if($(".product-list").length>0)
    {
        new PerfectScrollbar('.product-list');
    }

    function loadDataTableSimple(route,title,columnsField,table='dataTable',posArray=null){


        if(Array.isArray(columnsField)===true ) {
            var posArr = Array.isArray(posArray)===true && columnsField.length>0?posArray:null

            for (i = 0; i < columnsField.length; i++) {
                var postision = posArr!=null && posArr[i] != null?posArr[i]:null;

                var text_al = 'text-start';
                if(postision==='c'){
                    text_al = 'text-center'
                }
                else if(postision==='r'){
                    text_al = 'text-end'
                }
                console.log(postision) ;
               // columns[i] = JSON.parse('{"data":"' + columnsField[i] + '","className":"'+text_al+'}');
                columns[i] = {
                    data: columnsField[i],
                    className: text_al
                };
            }
            tableData = $('#'+table).DataTable({
                bPaginate: true,
                searching: true,
                destroy: true,
                dom: 'lfBtrip',
                processing: true,
                serverSide: true, // Serveur activé
                scrollY: "510px",
                scrollCollapse: true,
                ajax: {
                    type: 'GET',
                    url: route,
                    data: function (d) {
                        /*d.year = $("#year").val();*/
                    },
                },
                title: title,
                language: {
                    url: "{{ asset('manages/assets/plugins/datatable/DatatableFrench.json') }}"
                },
                ordering: true,
                orderCellsTop: true,
                lengthChange: true,
                colReorder: true,
                pageLength: 25,
                lengthMenu: [[25, 50, 100, 250, 500, 10000, -1], [25, 50, 100, 250, 500, 10000, "All"]],
                buttons: [

                    {
                        extend: 'excelHtml5'
                        , text: '<i class="bx bx-file" style="color: teal"></i> Excel'
                        , titleAttr: 'Exporter en excel mini',
                        messageTop: 'Exporter en excel',

                        exportOptions: {
                            columns: ':visible'
                        }, className: ''
                    },
                    {
                        extend: 'pdf', text: '<i class=" bx bx-printer" style="color: orange"></i> PDF'
                        , titleAttr: 'PDF',
                        autoWidth: false
                        , messageTop: 'Exporter en pdf'
                        , className: '',
                        exportOptions: {
                            columns: ':visible',
                            modifier: {
                                page: 'all' // Exporter toutes les lignes et non seulement celles visibles
                            }
                        },
                        customize: function (doc) {
                            //Remove the title created by datatTables
                            doc.content.splice(0,1);
                            //Create a date string that we use in the footer. Format is dd-mm-yyyy
                            var now = new Date();
                            var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
                            // Logo converted to base64
                            // var logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
                            // The above call should work, but not when called from codepen.io
                            // So we use a online converter and paste the string in.
                            // Done on http://codebeautify.org/image-to-base64-converter
                            // It's a LONG string scroll down to see the rest of the code !!!
                            var logo = 'data:image/jpeg;base64,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ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA=';
                            // A documentation reference can be found at
                            // https://github.com/bpampuch/pdfmake#getting-started
                            // Set page margins [left,top,right,bottom] or [horizontal,vertical]
                            // or one number for equal spread
                            // It's important to create enough space at the top for a header !!!
                            doc.pageMargins = [20,60,20,30];
                            // Set the font size fot the entire document
                            doc.defaultStyle.fontSize = 7;
                            // Set the fontsize for the table header
                            doc.styles.tableHeader.fontSize = 7;
                            doc.content[1].table.widths = ['*','*','*'];
                            // Create a header object with 3 columns
                            // Left side: Logo
                            // Middle: brandname
                            // Right side: A document title
                            doc['header']=(function() {
                                return {
                                    columns: [
                                        {
                                            image: logo,
                                            width: 24
                                        },
                                        {
                                            alignment: 'left',
                                            italics: true,
                                            text: 'dataTables',
                                            fontSize: 18,
                                            margin: [10,0]
                                        },
                                        {
                                            alignment: 'right',
                                            fontSize: 14,
                                            text: 'Custom PDF export with dataTables'
                                        }
                                    ],
                                    margin: 20
                                }
                            });
                            // Create a footer object with 2 columns
                            // Left side: report creation date
                            // Right side: current page and total pages
                            doc['footer']=(function(page, pages) {
                                return {
                                    columns: [
                                        {
                                            alignment: 'left',
                                            text: ['Created on: ', { text: jsDate.toString() }]
                                        },
                                        {
                                            alignment: 'right',
                                            text: ['page ', { text: page.toString() },	' of ',	{ text: pages.toString() }]
                                        }
                                    ],
                                    margin: 20
                                }
                            });
                            // Change dataTable layout (Table styling)
                            // To use predefined layouts uncomment the line below and comment the custom lines below
                            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
                            var objLayout = {};
                            objLayout['width'] = function(i) { return 800; };
                            objLayout['hLineWidth'] = function(i) { return .5; };
                            objLayout['vLineWidth'] = function(i) { return .5; };
                            objLayout['hLineColor'] = function(i) { return '#aaa'; };
                            objLayout['vLineColor'] = function(i) { return '#aaa'; };
                            objLayout['paddingLeft'] = function(i) { return 4; };
                            objLayout['paddingRight'] = function(i) { return 4; };
                            doc.content[1].layout = objLayout;

                        }
                    },
                    'colvis'

                ],
                columns: columns,
                order: [[0, 'asc']],
                drawCallback: function (settings) {
                    $(".total_count").html(this.fnSettings().fnRecordsTotal());
                },
            });
            $('a.toggle-vis').on('click', function (e) {
                e.preventDefault();
                // Get the column API object
                var column = tableData.column($(this).attr('data-column'));
                // Toggle the visibility
                column.visible(!column.visible());
            })
        }
    }
    function loadModal(root, array=[],title="Formulaire",size=1,type = "POST"){

        array = JSON.parse(array)

        $("#modalAll").modal("show");
        $("#modalAll #titleModalAll").html("");
        $("#modalAll #titleModalAll").html(title);
        //console.log(color)
        $("#modalAll #modal-header").removeClass();
        $("#modalAll #modal-header").addClass("modal-header");

        if(size==3){
            $("#modalAll .modal-dialog").removeClass("modal-xl")
            $("#modalAll .modal-dialog").removeClass("modal-lg")
            $("#modalAll .modal-dialog").addClass("modal-fullscreen")
        }
        else if(size==2){
            $("#modalAll .modal-dialog").removeClass("modal-lg")
            $("#modalAll .modal-dialog").addClass("modal-xl")
            $("#modalAll .modal-dialog").removeClass("modal-fullscreen")
        }
        else if(size==1){
            $("#modalAll .modal-dialog").removeClass("modal-xl")
            $("#modalAll .modal-dialog").addClass("modal-lg")
            $("#modalAll .modal-dialog").removeClass("modal-fullscreen")
        }
        else {
            $("#modalAll .modal-dialog").removeClass("modal-xl")
            $("#modalAll .modal-dialog").addClass("modal-lg")
            $("#modalAll .modal-dialog").removeClass("modal-fullscreen")
        }
        var formData = new FormData();

        formData.append("_token", $('meta[name="csrf-token"]').attr('content'))
        for (var key in array) {
            formData.append(key, array[key]);
        }
        let content = $("#modalContainer");
        content.html("<div class=\"d-flex justify-content-center\"><div class=\"spinner-border\" role=\"status\"><span class=\"visually-hidden\"></span></div></div>");

        /*
               if(hideOfCanvas){
                   var myOffcan = document.getElementById('offcanvasBackdrop')
                   var bsOffcnvas = new bootstrap.Offcanvas(myOffcan)
                   bsOffcnvas.toggle();
               }
        */


        $.ajax({
            type: type,
            url: root,
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                // activetab.classList.add('active');
                if (data != 0) {
                    content.html(data);
                }
                //   content.dimmer('hide');
                return false;
            }

        });
        // content.dimmer('hide');
        return false;
    }
    function loadOfCanvas(root,array=[],size=1,type = "POST") {

        var myOffcanvas = document.getElementById('offcanvasBackdrop')
        var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)


        if(size===1){
            $(".customOffCanvas").removeClass("offcanvas-size-xl")
            $(".customOffCanvas").removeClass("offcanvas-size-xxl")
            //  console.log("1")
        }
        else if(size===50){
            // console.log("50")
            $(".customOffCanvas").addClass("offcanvas-size-xl")
            //   $(".customOffCanvas").addClass("offcanvas-50")
            $(".customOffCanvas").removeClass("offcanvas-size-xxl")
            //   $(".customOffCanvas").removeClass("offcanvas-100")
        }
        else if(size===100){
            //  console.log(size)
            $(".customOffCanvas").addClass("offcanvas-size-xxl")
            /*           $(".customOffCanvas").addClass("offcanvas-100")*/
            $(".customOffCanvas").removeClass("offcanvas-size-xl")

            /*      $(".customOffCanvas").addClass("offcanvas-100")
                  $(".customOffCanvas").removeClass("offcanvas-50")*/
        }


        array = JSON.parse(array)
        var formData = new FormData();
        formData.append("_token", $('meta[name="csrf-token"]').attr('content'))

        for (var key in array) {
            formData.append(key, array[key]);
        }

        bsOffcanvas.show();
        container="offcanvasContent";
        let content = $("#" + container);
        content.html("<div class=\"d-flex justify-content-center\"><div class=\"spinner-border\" role=\"status\"><span class=\"visually-hidden\"></span></div></div>");

        $.ajax({
            type:type,
            url: root,
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data != 0) {
                    content.html(data);
                }
                return false;
            }

        });




    }
    function setErrors(errors) {
        $.each(errors, function (field_name, err) {
            devField = $('[name=' +field_name + ']').parents(".form-group");
            console.log(field_name)
            console.log(devField)
            $(document).find('[name=' +field_name +']').addClass('error_border')
            devField.append('<span class="invalid-feedback">' + err + '</span>');
        });
    }
    function setErrorsV1(errors) {
        // Parcours des erreurs
        $.each(errors, function (field_name, err) {
            // Échapper les caractères spéciaux
            var escaped_field_name = field_name.replace(/\./g, '\\.').replace(/\[/g, '\\[').replace(/\]/g, '\\]');

            // Vérifie si le nom de champ contient 'enfant_'
            if (escaped_field_name.startsWith("enfant_")) {
                // Trouver tous les champs qui correspondent à la classe d'entrée
                var devField = $('.' + escaped_field_name.split('.')[0]); // Récupère la classe sans l'indice

                // Vérifie si des champs ont été trouvés
                if (devField.length > 0) {
                    // Ajouter la classe d'erreur
                    devField.addClass('error_border');

                    // Ajouter le message d'erreur pour chaque champ correspondant
                    devField.each(function() {
                        var parentGroup = $(this).parents(".form-group");
                        parentGroup.append('<span class="invalid-feedback">' + err[0] + '</span>');
                    });
                } else {
                    console.warn('Aucun élément trouvé pour le champ:', escaped_field_name);
                }
            }
        });
    }
    function setErrorsOld(errors, divErrorPost = false,speficiParent=false) {

        if (!divErrorPost) {
            $.each(errors, function (field_name, err) {
                devField = $('[name=' +field_name + ']').parents(".form-group");
                //  console.log(field_name)

                if(speficiParent){
                    devField = $('[name=' + field_name + ']').parents("."+speficiParent);

                }
                console.log(devField)
                $(document).find('[name=' + field_name + ']').addClass('error_border')
                // $('[name=' + field_name + ']').after('<div id="cmprivacy">gdgdgdgdgdg</div>');
                //    devField.append('<span style="width: 100% !important;" class=" ui text red">' + err + '</span>');
                devField.append('<span class="invalid-feedback">' + err + '</span>');
                //$(document).find('[name='+field_name+']').after('<span style="width: 100% !important;" class=" ui text red">' +err+ '</span>')
                //  reponse +="<li>"+err+"</li>"

            });
            /*  reponse+="</ul>"
              if($("#eror_reponse").length>0){
                  $("#eror_reponse").html(reponse)
              }*/
        } else {
            $.each(errors, function (field_name, err) {
                var divField = $('[name=' + field_name + ']').parent();
                if(speficiParent){
                    devField = $('[name=' + field_name + ']').parents("."+speficiParent);
                }

                $(document).find('[name=' + field_name + ']').css('border-color', 'red')
                if (divErrorPost === 0) {
                    devField.append('<span class="invalid-feedback">' + err + '</span>');
                    // divField.append('<br><span style="width: 100% !important;" class=" ui text red">' + err + '</span>');
                }
                if (divErrorPost === 1) {
                    devField.parent().append('<span class="invalid-feedback">' + err + '</span>');
                    // divField.parent().append('<br><span style="width: 100% !important;" class=" ui text red">' + err + '</span>');
                } else {
                    devField.parent().append('<span class="invalid-feedback">' + err + '</span>');
                    //divField.append('<br><span style="width: 100% !important;" class=" ui text red">' + err + '</span>');
                }

                // var devField = "";
                // if(divErrorPost===1){
                //     devField= $('[name=' + field_name + ']').parent();
                //     devField.append('<br><span style="width: 100% !important;" class=" ui text red">' + err + '</span>');
                // }
                // if(divErrorPost===2){
                //     // divField = $('[name=' + field_name + ']').parents()[1];
                //     $('[name=' + field_name + ']').parents()[1].append('<br><span style="width: 100% !important;" class=" ui text red">' + err + '</span>');
                // }


            });
        }

    }
    function setErrorOnClass(errors, divErrorPost = false, speficiParent = false) {
        $("#eror_reponse").html(""); // Réinitialise les erreurs globales
        let reponse = "<ul>";

        if (!divErrorPost) {
            $.each(errors, function (field_name, err) {
                // Divise par le point pour gérer les tableaux
                let base_field_name = field_name.split(".")[0];
                let index = field_name.split(".")[1] || ''; // Récupère l'index s'il existe

                // Si l'erreur est un tableau, prends le premier élément
                if (Array.isArray(err)) {
                    err = err[0];
                }

                // Sélectionne les éléments correspondants avec le nom de l'input pour gérer les tableaux
                let inputField = $('[name="' + base_field_name + '[]"]').eq(index); // Cible l'élément avec l'index

                if (inputField.length > 0) {
                    let devField = inputField.parents(".form-group");

                    if (speficiParent) {
                        devField = inputField.parents("." + speficiParent);
                    }

                    // Ajoute la classe 'error_border' directement à l'élément sélectionné
                    inputField.addClass('error_border');

                    // Vérifie s'il y a déjà un message d'erreur avant d'ajouter
                    if (devField.find('span.error-message').length === 0) {
                        // Supprime la partie .0, .1, etc. dans le message d'erreur
                        let cleanError = err.replace(/\.\d+/, '');

                        devField.append('<span class="error-message" style="width: 100% !important; color: red">' + cleanError + '</span>');
                    }
                }

                // Supprime la partie .0, .1, etc. pour les erreurs globales aussi
                let cleanErrorGlobal = err.replace(/\.\d+/, '');
                reponse += "<li>" + cleanErrorGlobal + "</li>";
            });

            reponse += "</ul>";
            if ($("#eror_reponse").length > 0) {
                $("#eror_reponse").html(reponse); // Affiche les erreurs globales
            }
        }
    }
    function setErrorOnClassMultiple(errors, divErrorPost = false,) {
        $("#eror_reponse").html("")
        let reponse = "<ul>";
        if (!divErrorPost) {
            $.each(errors, function (field_name, err) {
                let firs_dd = field_name.split(".");
                if(firs_dd.length>1){
                    class_field =  firs_dd[0]
                }else {
                    class_field   = firs_dd
                }
                /*  console.log("//////")
                  console.log(class_field)*/
                if( $('.' + class_field).length>0){

                    devField = $('[class=' + class_field + ']').parents(".form-group");
                    $(document).find('[class=' + class_field + ']').addClass('error_border')
                    devField.append('<span style="width: 100% !important;color: red" class="">' + err + '</span>');

                }
                reponse +="<li>"+err+"</li>"
            });
            reponse+="</ul>"
            if($("#eror_reponse").length>0){
                $("#eror_reponse").html(reponse)
            }
        }

    }
    function refreshErrors(form, is_class = null) {
        //
        let someForm;
        if (!is_class) {
            someForm = $("#" + form)
        } else {
            someForm = $("." + form)
        }
        // console.log(someForm);
        // console.log(someForm.find('span.red').length)

        someForm.find('span.invalid-feedback').remove()
        if (someForm.find('span.invalid-feedback').length > 0) {
            someForm.find('span.invalid-feedback').remove()
        }
        someForm.parent().find('.error_border').removeClass("error_border");

    }
    function l_show() {
        $('form.form_load').prepend('<div class="text-center" id="loading">' +
            '<div class="spinner-border" role="status"><span class="sr-only"></span></div></div>');

        if($("form.form_load button").length>0){
            /*     $("form.form_load button").attr('disabled')*/
            $("form.form_load button").prop('disabled', true)
        }
    }
    function l_hide() {
        $('#loading').remove();
        if($("form.form_load button").length>0){
            $("form.form_load button").removeAttr('disabled')
        }
        // let the_loader = document.querySelector(".ui.dimmer");
        // the_loader.classList.remove("active");
    }
    function toastG(title="",body="") {
        const toastLiveExample = document.getElementById('toast-placement-ex')
        $("#toast-placement-ex").removeClass('bg-danger')
        $("#toast-placement-ex").removeClass('bg-primary')
        $("#toast-placement-ex").addClass('bg-success')

        if(title) $('#sucTitle').html(title)
        if(body) $('#sucBody').html(body)

        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    }
    function toastS(body) {
        Lobibox.notify('info', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            icon: 'bx bx-check-circle',
            delayIndicator: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: body
        });
    }
    function toastE(body) {
        Lobibox.notify('error', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            icon: 'bx bx-error',
            delayIndicator: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: body
        });
    }
    function deleteAllShowConfirme(root, id, functionCallBack = null) {
        Swal.fire({
            title: "Confirmation",
            text: "Êtes-vous sûr de bien vouloir effectuer cette suppression ?",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Continuer",
            cancelButtonText: "Annuler",
            icon: 'warning',
            backdrop: `rgba(60,60,60,0.8)`,
        }).then(result => {
            if (result.isConfirmed) {
                // Affichage du loader pendant la suppression
                Swal.fire({
                    title: "Suppression en cours...",
                    text: "Veuillez patienter...",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                var data = "id=" + id + "&_token=" + $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: root,
                    cache: false,
                    dataType: "json",
                    timeout: 10000,
                    data: data,
                    success: function (reponse) {
                        Swal.close(); // Ferme le loader

                        if (reponse.success) {
                            toastS("success", "Suppression réussie");

                            if (functionCallBack) functionCallBack();
                        } else {
                            console.log(reponse);
                            toastE("Erreur", reponse.message);
                            Swal.fire({
                                title: "Erreur survenue",
                                text: reponse.message,
                                icon: "error",
                                timer: 5000
                            });
                        }
                    },
                    error: function (error) {
                        Swal.close(); // Ferme le loader en cas d'erreur
                        Swal.fire("Échec de suppression", "La suppression a échoué, veuillez réessayer.", "error");
                        console.log("Erreur : " + error);
                    }
                });
            }
        });
    }


    function callPageCustom(root, formData, container = 'page_content', type = "GET") {

        let content = $("#" + container);
        content.html("<div class=\"d-flex justify-content-center\"><div class=\"spinner-border\" role=\"status\"><span class=\"visually-hidden\"></span></div></div>");
        $.ajax({
            type: type,
            url: root,
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                // activetab.classList.add('active');
                if (data != 0) {
                    content.html(data);
                }
                //   content.dimmer('hide');
                return false;
            }

        });
        // content.dimmer('hide');
        return false;
    }


    // Fonction pour montrer le spinner
    function l_show_spinner() {
        $('#loadingSpinner').removeClass('d-none');  // Montrer le spinner
        $('#buttonText').addClass('d-none');  // Cacher le texte du bouton
    }

    // Fonction pour cacher le spinner
    function l_hide_spinner() {
        $('#loadingSpinner').addClass('d-none');  // Cacher le spinner
        $('#buttonText').removeClass('d-none');  // Montrer le texte du bouton
    }
    function loadModalCustom(root, array=[]){

        array = JSON.parse(array)

        $("#modalAllCustom").modal("show");

        /*   return ;*/
        var formData = new FormData();
        formData.append("_token", $('meta[name="csrf-token"]').attr('content'))
        for (var key in array) {
            formData.append(key, array[key]);
        }
        let content = $("#modalContainercustom");
        content.html("<div class=\"d-flex justify-content-center\"><div class=\"spinner-border\" role=\"status\"><span class=\"visually-hidden\"></span></div></div>");


        $.ajax({
            type: "POST",
            url: root,
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                // activetab.classList.add('active');
                if (data != 0) {
                    content.html(data);
                }
                //   content.dimmer('hide');
                return false;
            }

        });
        // content.dimmer('hide');
        return false;
    }

    function attachExifShort() {
        // Délégation d'événements pour gérer les images au survol

    }

    function formatRepoUserAll(repo) {
        if (repo.loading) {
            return repo.text;
        }
        let path = '{{asset('storage/')}}/'
        let avatar = '{{getAvatar()}}'

        name = repo.name ?? "";
        text = repo.text ?? "";

        picture = (repo.picture !=null && repo.picture!=='') ? path+repo.picture: avatar;

        var $container = $(
            "<div class='select2-result-repository clearfix row'>" +
            "<div class='select2-result-repository__avatar col-2' style='font-style:13px;'>" +
            "<img alt='" + name + "' class='rounded-circle' style='height: 35px' src='" + picture + "' /></div>" +
            "<div class='select2-result-repository__meta col-10'>" +
            "<div class='select2-result-repository__title' style='font-size: 13px'></div>" +
            "<div class='select2-result-repository__description' style='font-size: 12px'></div>" +
            "</div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text(name);
        /*$container.find(".select2-result-repository__description").text("tel:"+phone);*/


        return $container;
    }

    function formatRepoUserDevise(repo) {
        if (repo.loading) {
            return repo.text;
        }
        let path = '{{asset('storage/')}}/'
        let avatar = '{{getAvatar()}}'

        code = repo.code ?? "";
        name = repo.name ?? "";
        text = repo.text ?? "";

        picture = (repo.picture !=null && repo.picture!=='') ? path+repo.picture: avatar;

        var $container = $(
            "<div class='select2-result-repository clearfix row'>" +
            "<div class='select2-result-repository__avatar col-2' style='font-style:13px;'>" +
            "<img alt='" + name + "' class='rounded-circle' style='height: 20px' src='" + picture + "' /></div>" +
            "<div class='select2-result-repository__meta col-10'>" +
            "<div class='select2-result-repository__title' style='font-size: 12px'></div>" +
            "<div class='select2-result-repository__description' style='font-size: 12px;font-weight: bolder'></div>" +
            "</div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text(name);
        $container.find(".select2-result-repository__description").text(code);


        return $container;
    }
    function formatRepoSelection(repo) {
        if (repo.type) {
        }

        return repo.name || repo.text;
    }



</script>
@stack('scripts')

<!-- Custom page scripts -->
@hasSection('page-scripts')
    @yield('page-scripts')
@endif
</body>

</html>
