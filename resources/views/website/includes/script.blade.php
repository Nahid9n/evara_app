

<!-- Vendor JS-->
<script src="{{asset('/')}}website/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{asset('/')}}website/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{asset('/')}}website/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{asset('/')}}website/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/slick.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/wow.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/jquery-ui.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/perfect-scrollbar.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/magnific-popup.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/select2.min.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/waypoints.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/counterup.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/images-loaded.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/isotope.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/scrollup.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/jquery.vticker-min.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="{{asset('/')}}website/assets/js/plugins/jquery.elevatezoom.js"></script>
<script src="{{asset('/')}}website/assets/summernote/summernote-bs4.min.js"></script>

<!-- Template  JS -->
<script src="{{asset('/')}}website/assets/js/maind134.js?v=3.4"></script>
<script src="{{asset('/')}}website/assets/js/shopd134.js?v=3.4"></script>



{{--      Product datails                  --}}
{{--      vendor Product   category subcategory    --}}
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

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
        $('.select2-selection').css({'width': '580px'});
    });
</script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

<script>
    $('#searchText').keyup(function () {
        var searchText = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{ route('get-product-by-search-text') }}",
            data: {search_text: searchText},
            dataType: "JSON",
            success: function (response) {
                var div = " ";
                div += '<section class="section-padding">';
                    div += '<div class="container wow fadeIn animated">';
                        div += '<h3 class="section-title mb-20"><span>Search</span> Result</h3>';
                        div += '<div class="carausel-6-columns-cover position-relative">';
                            div += '<div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>';
                            div += '<div class="carausel-6-columns carausel-arrow-center row">';
                                $.each(response, function (key, value) {
                                div += '<div class="product-cart-wrap small hover-up col-md-4">';
                                    div += '<div class="product-img-action-wrap">';
                                        div += '<div class="product-img product-img-zoom">';
                                            div += '<a href="http://localhost/evara/public/product-detail/'+value.id+'">';
                                                div += '<img class="default-img" src="'+value.image+'"  height="200" alt=""/>';
                                                div += '<img class="hover-img" src="'+value.image+'" height="200" alt=""/>';
                                            div += '</a>';
                                        div += '</div>';
                                    div += '</div>';
                                    div += '<div class="product-content-wrap">';
                                        div += '<h2><a href=""> '+value.name+' </a></h2>';
                                        div += '<div class="rating-result" title="90%">';
                                            div += '<span></span>';
                                        div += '</div>';
                                        div += '<div class="product-price">';
                                            div += '<span> TK. '+value.selling_price+'</span>';
                                            div += '<span class="old-price"> TK. '+value.regular_price+'</span>';
                                        div += '</div>';
                                    div += '</div>';
                                div += '</div>';
                                });
                            div += '</div>';
                        div += '</div>';
                    div += '</div>';
                div += "</section>";

                $('#mainContainer').empty();
                $('#mainContainer').append(div);
            }
        });
    });
</script>
