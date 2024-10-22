

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

<script src="{{asset('/')}}website/assets/js/toastr.min.js"></script>
{!! Toastr::message() !!}


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
    $('.searchText').keyup(function () {
        var searchText = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{ route('get-product-by-search-text') }}",
            data: {search_text: searchText},
            dataType: "html",
            success: function (response) {
                $('#mainContainer').empty();
                $('#mainContainer').append(response);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.wishlist').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('value');
            $.ajax({
                url: "{{ route('wishlist.ad') }}",
                type: "GET",
                dataType: 'json',
                data: {
                    product_id: id,
                },
                success: function(res) {
                    if (res.status !== false) {
                        toastr.success(res.message);
                        $('#wishlistCartCount').empty('');
                        $('#wishlistCartCount').append('<span class="old-price"> '+res.count+'</span>');
                    } else {
                        toastr.error(res.error);
                    }
                },

                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        });

        $(document).on('submit', '.addTocart', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: "post",
                dataType: 'json',
                data: formData,
                success: function(res) {
                    if (res.status !== false) {
                        toastr.success(res.message);
                        $('#CartItemCount').empty('');
                        $('#CartItemCount').append('<span class="old-price"> '+res.count+'</span>');
                        getCartDetails();

                    } else {
                        toastr.error(res.error);
                    }
                },

                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        });
        function getCartDetails() {
            $.ajax({
                url: "{{ route('get-cart-details') }}",
                type: "GET",
                dataType: 'html',
                success: function(res) {
                    $('#cartItems').empty('');
                    $('#cartItems').append(res);
                }
            });
        }




    });
</script>
<script>
    function filter(page = 1) {
        var category = [];
        var subCategory = [];
        var brand = [];
        var size = [];
        var color = [];
        var maxPriceRange = [];
        var keyword = "<?= (isset($_GET['keyword']) ? $_GET['keyword'] : '') ?>";

        $('.categoryCheckBox').each(function() {
            if (this.checked) {
                category.push($(this).attr('id'));
            }
        });
        $('.subCategoryCheckBox').each(function() {
            if (this.checked) {
                subCategory.push($(this).attr('id'));
            }
        });


        $('.brandCheckBox').each(function() {
            if (this.checked) {
                brand.push($(this).attr('id'));
            }
        });

        $('.sizeCheckBox').each(function() {
            if (this.checked) {
                size.push($(this).val());
            }
        });

        $('.colorCheckBox').each(function() {
            if (this.checked) {
                color.push($(this).val());
            }
        });

        maxPriceRange.push($('#maxRange').val());
        var jsonData = {
            "category": category,
            "subCategory": subCategory,
            "brand": brand,
            "size": size,
            "color": color,
            "maxPriceRange": maxPriceRange,
            "keyword": keyword,
        };

        var jsonString = JSON.stringify(jsonData);

        $.ajax({
            url: "{{ route('product.filter') }}",
            type: 'get',
            data: {
                'jsonString': jsonString,
                'page': page,
            },
            dataType: 'html',
            success: function(res) {
                if (res == '0') {
                    $('#filterProducts').text("Product not found");
                } else {
                    $('#filterProducts').html(res);
                    updatePaginationLinks();
                }
            }
        });

    }
    function updatePaginationLinks() {
        $('.pagination-links a').on('click', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var jsonString = "{{ $data }}";
            filter(page,jsonString);
        });
    }
    function setSubCategory(id) {
        var category = [];

        $('.categoryCheckBox').each(function() {
            if (this.checked) {
                category.push($(this).attr('id'));
            }
        });
        $.ajax({
            type: "GET",
            url: "{{ route('get-sub-category-by-category-filter') }}",
            data: {id:category},
            dataType: 'html',
            success: function (response) {
                $('#subCategoryId').html(response);
            }
        })
    }
    function increaseCount(a, b, c) {
        var input = b.previousElementSibling;
        var color = b.nextElementSibling;
        var size = color.nextElementSibling;
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        input.value = value;
        color = color.value;
        size = size.value;

        if(c != 2){
            QtyChange(a, value,color,size);
        }

    }
    function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var color = input.nextElementSibling.nextElementSibling;
        var size = color.nextElementSibling;
        var value = parseInt(input.value, 10);
        if (value > 1) {
            value = isNaN(value) ? 0 : value;
            value--;
            input.value = value;
            color = color.value;
            size = size.value;
            QtyChange(a, value,color,size);
        }
    }
    function QtyChange(id, qty,color,size){
        $.ajax({
            url: "{{ route('ajax-update-Product') }}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "product_id": id,
                "qty": qty,
                "color": color,
                "size": size,
            },
            dataType: 'json',
            success: function(res) {
                if (res.success) {
                    toastr.success(res.success);
                    $(".counterQty.id").val(res.qty);
                    location.reload();
                }
                if (res.error) {
                    toastr.error(res.error);
                    $(".counterQty").val(qty-1);
                }
            }
        });
    }
</script>
