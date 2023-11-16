
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    input[type="text"] {
  border-radius: 15px;
  height: 50px; /* يجب تعديل الارتفاع حسب الحاجة */
  width: 500px; /* يجب تعديل العرض حسب الحاجة */

}

           h1,label{
            color :white;
            font-family: Arial, sans-serif; /* يستخدم الخط Arial إذا كان مثبتًا، وإلا سيستخدم أي خط خطوط الخطوط الغير معرفة */

           }     
                body {  

background-image: url("https://images.unsplash.com/photo-1509718443690-d8e2fb3474b7?auto=format&fit=crop&q=80&w=1000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fHByb2dyYW1taW5nfGVufDB8fDB8fHww");
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center;
background-size: cover;
opacity: 5; /* قم بتعديل قيمة الشفافية حسب الحاجة */
}

    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style1.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="script.js"></script>
    <title> صفحة إضافة فئة جديدة </title>
<body>
<div class="container">
    <a  href="{{ route('category.index') }}" role="button"  >رجوع للخلف </a>
    <h1>صفحة أضافة فئة جديدة</h1>
    <table  border="0" cellpadding='0' cellspacing='0' style='text-align: left;' class='table table-hover table-striped'>

 
        <form action="{{ route('category.store')}}"method="POST" >
            @csrf 
            <div class="mb-3">   

                <label for="name" class="form-label">أسم الفئة الجديدة</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="major" class="form-label">الوصف</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>

      
        </table>
            <button type="submit" class="btn btn-primary">أضافة</button>
        </form>
    </div>    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>


