<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<style>
               input[type="text"] {
        border-radius: 15px;
        height: 50px;
        width: 200px;
        text-align: center; /* لوضع قيمة الحقول في وسطها */
        font-size: 30px; /* تحديد حجم الخط هنا */


    }
    input[type="number"] {
        border-radius: 15px;
        height: 50px;
        width: 200px;
        text-align: center; /* لوضع قيمة الحقول في وسطها */
        font-size: 30px; /* تحديد حجم الخط هنا */

    }
        input[type="text"] {
  border-radius: 15px;
  height: 50px; /* يجب تعديل الارتفاع حسب الحاجة */
  width: 500px; /* يجب تعديل العرض حسب الحاجة */

}
h3{
    font-family: Arial, sans-serif; /* يستخدم الخط Arial إذا كان مثبتًا، وإلا سيستخدم أي خط خطوط الخطوط الغير معرفة */
font-size: 50px
}
p,input{
    font-family: Arial, sans-serif; /* يستخدم الخط Arial إذا كان مثبتًا، وإلا سيستخدم أي خط خطوط الخطوط الغير معرفة */
    font-size: 25px

}
th{
    font-family: Arial, sans-serif; /* يستخدم الخط Arial إذا كان مثبتًا، وإلا سيستخدم أي خط خطوط الخطوط الغير معرفة */
    font-size: 30px
}
table {
            border-radius: 15px;
            overflow: hidden;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
         
        }
        
.container {
                border-radius: 15px;
    padding: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
    white-space: nowrap;
    overflow: auto;
    max-width: 1100px; /* تعديل هنا على حسب الحاجة */
    width: 100%;
        }
        .a1 {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border: 0;
    font-size: 20px;
    padding: 15px 20px;
    display: inline-block;
    color: #fff;
    text-transform: uppercase;
    border-radius: 500px;
    font-weight: bold;
    font-family: Arial;
    background: linear-gradient(90deg, #0074cc, #0064b7, #0055a2, #00448d, #003379, #002364, #00124f, #00013a);
    background-size: 1800% 100%;
    -webkit-animation: rainbow 6s linear infinite;
    animation: rainbow 6s linear infinite;
}

@-webkit-keyframes rainbow {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}

@keyframes rainbow {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}


</style>
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
            {{$message}}
        </div>
    @endif


<div class="de">
    <center>
        <h3>
            صفحة البيع أختر الفئة التي تريد البيع منها
        </h3>
        
        <a href="{{ url('/') }}">
    <img src="https://www.clipartmax.com/png/middle/217-2174484_blue-home-button-png-www-pixshark-com-images-galleries-linked-in-logo.png" style="width: 80px; height: 85px;" alt="رجوع للصفحة الرئيسية">
</a>

        <br>
        <br>
        
        <input type="text" id="categorySearch" oninput="filterCategories()" placeholder="ابحث عن الفئة">
    </center>

</div>


<div class="body">


<table  cellpadding='0' cellspacing='0' style='text-align: left;' class='table table-hover table-striped'>
        <!-- الأكواد الأخرى -->


<thead style="background-color:#9BB7D4; ">
                <tr>
                    <th scope="col">الرقم</th>
                    <th scope="col">أسم الفئة</th>
                    <th scope="col">الوصف</th>
                    <th scope="col">المنتجات</th>

                </tr>
            </thead>
            <tbody>
                @php 
                    $i=1; 
                @endphp
                @foreach ($category as $item)
                    <tr>
               

                        <td>    <p>{{$i++}}</p>   </td> 
                        <td>
                            <form action="{{ route('category.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group"><p>
                                <input    style="width: 120px;border: none;"  type="text" name="name" id="name-{{ $item->id }}" value="{{ $item->name }}" disabled>

                                </p>
                                                               </div>
                        </td>
                        <td>
                                <div class="form-group">
                                <input    style="width: 120px;border: none;"  type="text" name="description" id="name-{{ $item->description }}" value="{{ $item->description }}" disabled>

                              
                                </div>
                        </td>
                        <td>
                  <div class="col-sm">

                  <p><a class="a1"  href="{{ route('categories.products', ['categoryId' => $item->id]) }}" >أظهر المنتجات</a></p>

</div>
            </td>
            </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<script>

    function filterCategories() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("categorySearch");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // تم تعديل هذا الجزء ليناسب البحث حسب الاسم
                if (td) {
                    txtValue = td.getElementsByTagName("input")[2].value; // تم تعديل هذا الجزء للحصول على القيمة المدخلة
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }




</script>
