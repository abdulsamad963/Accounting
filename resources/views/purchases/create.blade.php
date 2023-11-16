
@extends('customer.layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style1.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="script.js"></script>
    <title> صفحة إضافة مشتريات </title>
<body>
    <div class="container">
        

        <h1>صفحة أضافة مشتريات</h1>
        <form action="{{ route('purchasess.store')}}"method="POST" >
            @csrf 
            <div class="mb-3">

      

                <label for="name" class="form-label">اسم القطعة</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="major" class="form-label">النوع</label>
                <input type="text" class="form-control" id="num" name="type" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">السعر</label>
                <input type="text" class="form-control" id="address" name="price" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">ملاحظات </label>
                <input type="text" class="form-control" id="comments" name="Notes" required>
            </div>

            </div>
        
            <button type="submit" class="btn btn-primary">أضافة</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
@endsection