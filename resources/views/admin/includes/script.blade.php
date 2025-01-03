<!-- JQUERY JS -->
<script src="{{asset('/')}}admin/assets/plugins/jquery/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="{{asset('/')}}admin/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

{{-- date piker --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<!-- SIDE-MENU JS -->
<script src="{{asset('/')}}admin/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('/')}}admin/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/p-scroll/pscroll.js"></script>

<!-- STICKY JS -->
<script src="{{asset('/')}}admin/assets/js/sticky.js"></script>



<!-- APEXCHART JS -->
<script src="{{asset('/')}}admin/assets/js/apexcharts.js"></script>


<!-- INTERNAL SELECT2 JS -->
<script src="{{asset('/')}}admin/assets/plugins/select2/select2.full.min.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{asset('/')}}admin/assets/plugins/circle-progress/circle-progress.min.js"></script>

<!-- INTERNAL DATA-TABLES JS-->
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>

<!-- INDEX JS -->
<script src="{{asset('/')}}admin/assets/js/index1.js"></script>
<script src="{{asset('/')}}admin/assets/js/index.js"></script>

<!-- Reply JS-->
<script src="{{asset('/')}}admin/assets/js/reply.js"></script>


<!-- COLOR THEME JS -->
<script src="{{asset('/')}}admin/assets/js/themeColors.js"></script>



{{--=================================================--}}

<!-- DATA TABLE JS-->
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/table-data.js"></script>



<!-- FORM ELEMENTS JS -->
<script src="{{asset('/')}}admin/assets/js/formelementadvnced.js"></script>

<!-- Bootstrap-Date Range Picker js-->
<script src="{{ asset('/') }}admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<!-- CUSTOM JS -->
<script src="{{asset('/')}}admin/assets/js/custom.js"></script>

<!-- INTERNAL Summernote Editor js -->
<script src="{{asset('/')}}admin/assets/plugins/summernote-editor/summernote1.js"></script>
<script src="{{asset('/')}}admin/assets/js/summernote.js"></script>

<!--Internal Fileuploads js-->
<script src="{{asset('/')}}admin/assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fileuploads/js/file-upload.js"></script>

<!--Internal Fancy uploader js-->
<script src="{{asset('/')}}admin/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fancyuploder/fancy-uploader.js"></script>




<!-- SWITCHER JS -->
<script src="{{asset('/')}}admin/assets/switcher/js/switcher.js"></script>

<!-- SELECT2 JS -->
{{--<script src="{{asset('/')}}admin/assets/plugins/select2/select2.full.min.js"></script>--}}




{{--=======================================--}}
{{--------------- js for img tag -----------------}}
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#categoryImage').attr('src', e.target.result);
                $('#categoryImage').attr('height', '100');
                $('#categoryImage').attr('width', '120');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
</script>


{{--               For Product           --}}
<script>
    function setSubCategory(id) {
            // alert(categoryId)
        $.ajax({   // "$" means  jQuery object
            type: "GET",
            url: "{{ route('get-sub-category-by-category') }}",
            // data: {cateId: id},
            data: {id: id},
            dataType: "JSON",
            success: function (response) {
                    // alert(response);
                //2nd
                   // console.log(response);
                //3rd
                var option = '';
                option += ' <option value="" disabled selected> -- Select Sub Category --</option>';
                $.each(response, function (key,value) {
                    option += '<option value="'+value.id+'">' + value.name + '</option>';
                });

                // console.log(option);
                $('#subCategoryId').empty();
                $('#subCategoryId').append(option);

            }
        })
    }

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    toastr.options = {
        "progressBar" : true,
        "closeButton" : true,
    }
    @if(Session::has('message'))
    toastr.success("{{ Session::get('message') }}");

    @elseif(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}");

    @elseif(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");

    @elseif(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif

</script>

<!-- Internal Input tags js-->
<script src="{{ asset('/') }}admin/assets/plugins/inputtags/inputtags.js"></script>
@stack('js')
<script src="{{ asset('/') }}admin/assets/plugins/bootstrap-datepicker/js/datepicker.js"></script>







