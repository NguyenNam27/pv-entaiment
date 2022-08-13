<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <base href="{{asset('')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=K2D:wght@500&family=Lato:wght@700&family=Roboto:wght@400;500;700&family=Rubik:wght@500&family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
          integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="FE/css/base.css">
    <link rel="stylesheet" href="FE/css/GioHang.css">

</head>

<body>
@include('FE.master.header')
@yield('content')
@include('FE.master.footer')
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.icon-menu').click(function () {
            $('.mb-menu').show();
            $('.icon-close').show();
            $(this).hide();
        });
        $('.icon-close').click(function () {
            $('.mb-menu').hide();
            $('.icon-menu').show();
            $(this).hide();
        });
        $('.close-product').click(function () {
            $(this).parent().parent().hide();
        })
        $('.buy').click(function () {
            $('.buy_info').show();
        })
        $('.province').change(function (){
            var province = $('.province option:selected').text();
            $('#address').val(province)
        })
        $('#districtid').change(function (){
            var districtid = $('#districtid option:selected').text();
            $('#address').val(districtid)
        })
        $('#wardid').change(function (){
            var wardid = $('#wardid option:selected').text();
            Array.prototype.push.apply(province, districtid,wardid);
        })
    })
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@yield('js_cart')
</html>
