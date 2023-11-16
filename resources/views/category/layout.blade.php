<!DOCTYPE html>
<html>
<head>
<title>product</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style>



    



    .header {
        
        /* background-image: url('https://wallpaperbat.com/img/766910-free-download-minimalistic-programming-wallpaper-1366x768-minimalistic-programming-1366x768-for-your-desktop-mobile-tablet-explore-programmer-wallpaper-python-programming-wallpaper-coding-wallpaper-programmer-desktop-wallpaper.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            opacity: 5;   

        background-color: #939597;
        color: #ffffff;
        padding: 20px;
        text-align: center; */
    }
</style>
</head>
<body>

    <div class="header">
        <h1>مرحباً بك في مستودع طيبة</h1>
        <p>مطور الموقع ( م.عبدالصمد ) </p>
        <a href="{{ url('/') }}">العودة للصفحة الرئيسية</a>

    </div>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
