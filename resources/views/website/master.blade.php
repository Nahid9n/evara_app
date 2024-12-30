
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$setting->company_name}} | @yield('title')</title>

    @include('website.includes.meta')
    @include('website.includes.style')
    <style>
        .main {
            position: relative;
        }
        .main::before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

</head>

<body class="" style="">


@include('website.includes.header')

<main class="" id="mainContainer">
   @yield('body')
</main>


@include('website.includes.footer')
@include('website.includes.script')
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
<script>
    $(document).ready(function() {
        // Get today's date in YYYY-MM-DD format
        var today = new Date();
        var formattedDate = today.getFullYear() + '-' + (today.getMonth() + 1).toString().padStart(2, '0') + '-' + today.getDate().toString().padStart(2, '0');

        // Get the date when the popup was last shown from localStorage
        var popupShownDate = localStorage.getItem('popup_shown_date');

        // If the popup hasn't been shown today, display the modal
        if (popupShownDate !== formattedDate) {
            // Show the modal using Bootstrap's modal method
            $('#onloadModal').modal('show');

            // Store today's date in localStorage
            localStorage.setItem('popup_shown_date', formattedDate);
        }
    });
</script>
</body>

</html>
