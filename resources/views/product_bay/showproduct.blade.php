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
.a1{
         -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border: 0;
      font-size: 20px;
      padding: 15px 50px;
      display: inline-block;
      color: #fff;
      text-transform: uppercase;
      border-radius: 500px;
      font-weight: bold;
      font-family: Arial;
      background: linear-gradient(90deg, #32CD32, #006400, #FFDEAD, #DAA520, #20AAB2	, #ADFF2F	, #7ca5de, #3e73bd);
      background-size: 1800% 100%;
      -webkit-animation: rainbow 5s linear infinite;
      animation: rainbow 8s linear infinite;
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
</div>

<div class="de">
    <center>
        <h3>
            صفحة البيع أختر المنتج الذي تريد البيع منه
        </h3>

        <a  href="{{ route('categories.index2') }}">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV4rAw9tfT1bX4Jrqd222py4UY4Sm05QiL1hMM0Z4jiwCmgjXS7HI57EKkrbfUyT3K7ys&usqp=CAU" style="width: 50px; height: 55px;" alt="رجوع للخلف">
</a>




        <br>
        <br>
        
        <input type="text" id="categorySearch" oninput="filterCategories()" placeholder="ابحث عن المنتج">
    </center>

</div>


<table name="idd" id="idd" border="0" cellpadding='0' cellspacing='0' style='text-align: left;' class='table table-hover table-striped'>
        <thead class="thead-dark">
            <tr >
                <th scope="col">الرقم</th>
                <th scope="col">أسم المنتج</th>
                <th scope="col">الوصف</th>
                <th scope="col">سعر المنتج</th>
                <th scope="col">الكمية المتبقية</th>
 


                <th scope="col">إضغط للبيع</th>

            </tr>
        </thead>
        <tbody>
            @php
            $i=1;
            @endphp

            @foreach ($products as $item)
            <tr >
                <td>{{$i++}}</td>
                <td>
                    <form action="{{ route('product.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input style="width: 200px;" type="text" class="form-control" name="name" id="name-{{ $item->id }}" value="{{ $item->name }}" disabled>
                        </div>
                </td>
                <td>
                    <div class="form-group">
                        <input style="width: 200px;" type="text" class="form-control" name="description" id="description-{{ $item->id }}" value="{{ $item->description }}" disabled>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input style="width: 100px;" type="text" class="form-control" name="price" id="price-{{ $item->id }}" value="{{ $item->price }}" disabled>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input style="width: 100px;" type="number" class="form-control" name="quantity" id="quantity-{{ $item->id }}" value="{{ $item->quantity }}" disabled>
                    </div>
                </td>
         
                <!-- <td>
                    <button type="button" class="btn btn-secondary" onclick="enableEdit({{ $item->id }})">تمكين التعديل السربع</button>
                                            <button type="submit"   class="btn btn btn-success">حفظ    

                </td> -->

                <td>
                <!-- <a  href="{{ route('product.show', $item->id ) }}"><img src="data:image/png;base64,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" style="width: 50px; height: 55px;" alt="سلة المشتريات"></a> -->
                <p><a class="a1" href="{{ route('product.show', $item->id ) }}" >بيع</a></p>

                </td>

                </form>


                
                    </div>
                </td>

            </tr>
            @endforeach
    </table>
    </form>
    <h5 class="w"> <div id="result"></div></h5>
    <br>
    <h5 class="e"> <div id="result2"></div></h5>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var allQuantityFields = document.querySelectorAll('table tbody input[id^="quantity"]');
    allQuantityFields.forEach(function(field) {
        if (field.value < 10) {
            field.style.backgroundColor = 'rgba(255, 0, 0, 0.3)'; // أحمر كاشف
        }
    });
});

function enableEdit(rowId) {
    var nameInput = document.getElementById('name-' + rowId);
    var descInput = document.getElementById('description-' + rowId);
    var d2escInput = document.getElementById('price-' + rowId);
    var d3escInput = document.getElementById('quantity-' + rowId);

    nameInput.disabled = false;
    descInput.disabled = false;
    d2escInput.disabled = false;
    d3escInput.disabled = false;

    d3escInput.addEventListener('input', function() {
        if (d3escInput.value < 10) {
            d3escInput.style.backgroundColor = 'rgba(255, 0, 0, 0.3)';
        } else {
            d3escInput.style.backgroundColor = '';
        }
    });
}
function checkPriceLength(input) {
    if (input.value.length > 6) {
        input.value = input.value.slice(0, 6);
    }
}


function filterCategories() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("categorySearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("idd"); // استخدم getElementById بدلاً من querySelector
        tr = table.getElementsByTagName("tr"); // استخدم table بدلاً من idd

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // تم تحديث الفهرس ليستهدف العمود الصحيح
            if (td) {
                txtValue = td.getElementsByTagName("input")[2].value; // تم تحديث هذا الفهرس للحصول على القيمة المناسبة
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    
</script>


