<!-- Vendor JS-->
<script src="{{asset('/')}}website/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{asset('/')}}website/assets/js/vendor/jquery-3.6.0.min.js"></script>
{{--<script src="{{asset('/')}}website/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>--}}
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
<!-- Template  JS -->

<!-- INTERNAL DATA-TABLES JS-->
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>

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
        $('.summernote').summernote();
    });
</script>

<script>
    $('#globalSearch').on('keyup', function () {
        var keyword =  $('#globalSearch').val();
        if(keyword.length >= 3){
            $.ajax({
                type: "GET",
                url: "{{ route('get-product-by-search-text') }}",
                data: {search_text: keyword},
                dataType: "html",
                success: function (response) {
                    $('#mainContainer').empty();
                    $('#mainContainer').append(response);
                }
            });
        }
    });
    $('#globalSearchMobile').on('keyup', function () {
        var keyword =  $('#globalSearchMobile').val();
        if(keyword.length >= 3){
            $.ajax({
                type: "GET",
                url: "{{ route('get-product-by-search-text') }}",
                data: {search_text: keyword},
                dataType: "html",
                success: function (response) {
                    $('#mainContainer').empty();
                    $('#mainContainer').append(response);
                }
            });
        }
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
    /* product page all filter */
    $(document).ready(function () {
        function fetchFilteredProducts(keyword) {
            let filters = {
                category_id: $('#categoryFilter').val(),
                subcategory_id: $('#subCategoryId').val(),
                brand_id: $('#brandFilter').val(),
                size: $('#sizeFilter').val(),
                color: $('#colorFilter').val(),
                sort: $('#sortByFilter').val(),
                min_price: $('#min_price').val(),
                max_price: $('#max_price').val(),
                keyword: keyword,
            };
            console.log(keyword)
            // Send AJAX request to fetch filtered products
            $.ajax({
                url: '{{ route('product.filter') }}',
                type: 'GET',
                data: filters,
                dataType: 'html',
                success: function(res) {
                    if (res == '0') {
                        $('#filterProducts').text("Product not found");
                    } else {
                        $('#filterProducts').html(res);
                        /*updatePaginationLinks();*/
                    }
                }
            });
        }

        // Trigger fetchFilteredProducts on change/input
        $('#categoryFilter').on('change', function () {
            var category = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('get-sub-category-by-category-filter') }}",
                data: { category_id: category },
                success: function (response) {
                    let options = '<option value="">Select Subcategory</option>';
                    response.forEach(subcategory => {
                        options += `<option value="${subcategory.id}">${subcategory.name}</option>`;
                    });
                    $('#subCategoryId').html(options);
                }
            })
            fetchFilteredProducts();
        });
        $('#subCategoryId').on('change', function () {
            fetchFilteredProducts();
        });
        $('#brandFilter').on('change', function () {
            fetchFilteredProducts();
        });
        $('#sizeFilter').on('change', function () {
            fetchFilteredProducts();
        });
        $('#colorFilter').on('change', function () {
            fetchFilteredProducts();
        });
        $('#sortByFilter').on('change', function () {
            fetchFilteredProducts();
        });
        $('#min_price').on('input', function () {
            fetchFilteredProducts();
        });
        $('#max_price').on('input', function () {
            fetchFilteredProducts();
        });
        $('#globalSearch').on('keyup', function () {
            var keyword =  $('#globalSearch').val();
            // if(keyword.length >= 3){
                fetchFilteredProducts(keyword);
            // }
        });
        $('#globalSearchMobile').on('keyup', function () {
            var keyword =  $('#globalSearchMobile').val();
            // if(keyword.length >= 3){
                fetchFilteredProducts(keyword);
            // }
        });
        // $('#globalSearch').on('input', function () {
        //     fetchFilteredProducts();
        // });
    });
    function updatePaginationLinks() {
        $('.pagination-links a').on('click', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var jsonString = "{{ $data }}";
            filter(page,jsonString);
        });
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
<script src="{{asset('/')}}website/assets/owl-carousel/jquery.mousewheel.min.js"></script>
@stack('js')
<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            autoplay:true,
            autoplayTimeout:3000,
            nav: true,
            margin: 10,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
    })
</script>
<script src="{{asset('/')}}website/assets/owl-carousel/owl.carousel.js"></script>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>
<script>
    $(document).ready(function() {

        $('.product-card').each(function() {
            const badgeElement = $(this).find('.badge');
            const badges = JSON.parse($(this).attr('data-badges'));
            let currentIndex = 0;
            setInterval(function() {
                badgeElement.text(badges[currentIndex]);
                currentIndex = (currentIndex + 1) % badges.length;
            }, 1500);
        });
    });
</script>
{{--<script>
        $(document).ready(function() {
            let offset = {{ $products->count() }}; // Start from the number of products already loaded.

            $('#load-more').click(function() {
                $.ajax({
                    url: '{{route('product.loadMore')}}',
                    method: 'GET',
                    data: { offset: offset },
                    success: function(response) {
                        if(response.length > 0) {
                            $('#loadMoreProducts').append(response);

                            // Update the offset for next load
                            offset += response.length;
                        } else {
                            $('#load-more').hide(); // Hide button if no more products are available
                        }
                    },
                    error: function() {
                        alert('Error loading products.');
                    }
                });
            });
        });
</script>--}}
