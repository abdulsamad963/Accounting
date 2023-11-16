<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<style>

.de{
    float: right;
}

thead,th,td {
    font-family: Arial, sans-serif; /* يستخدم الخط Arial إذا كان مثبتًا، وإلا سيستخدم أي خط خطوط الخطوط الغير معرفة */


}
        body {  

            background-image: url('https://static1.makeuseofimages.com/wordpress/wp-content/uploads/2018/11/dark-wallpapers.jpg');
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            opacity: 5; /* قم بتعديل قيمة الشفافية حسب الحاجة */
}
           input[type="text"] {
        border-radius: 10px;
        height: 50px;
        width: 200px;
        text-align: center; /* لوضع قيمة الحقول في وسطها */
        font-size: 30px; /* تحديد حجم الخط هنا */


    }
    input[type="number"] {
        border-radius: 10px;
        height: 50px;
        width: 200px;
        text-align: center; /* لوضع قيمة الحقول في وسطها */
        font-size: 30px; /* تحديد حجم الخط هنا */

    }

</style>
<!-- <a href="{{ url('/') }}">العودة للصفحة الرئيسية</a> -->

<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
            {{$message}}
        </div>
    @endif
</div>

<div class="de">
<a  href="{{ url('/') }}">العودة للصفحة الرئيسية</a>
</div>


<a class="btn btn-secondary" href="{{ route('category.create') }}" role="button">لإضافة فئة جديدة </a>
<div class="body">
<div class="container">
<div class="container">
<input type="text" id="categorySearch" oninput="filterCategories()" placeholder="البحث">
    <table border="0" cellpadding='0' cellspacing='0' style='text-align: left;' class='table table-hover table-striped'>
        <!-- الأكواد الأخرى -->


<thead style="background-color:#9BB7D4; ">
                <tr>
                    <th scope="col">الرقم</th>
                    <th scope="col">أسم الفئة</th>
                    <th scope="col">الوصف</th>
                    <th scope="col">تعديل</th>
                    <th scope="col">حذف الفئة</th>
                    <th scope="col">إظهار المنتجات </th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $i=1; 
                @endphp
                @foreach ($category as $item)
                    <tr>
               

                        <td>      <p style="color: white;">{{$i++}}</p> </p> </td> 
                        <td>
                            <form action="{{ route('category.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name-{{ $item->id }}" value="{{ $item->name }}" disabled>
                                </div>
                        </td>
                        <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="description" id="description-{{ $item->id }}" value="{{ $item->description }}" disabled>
                                </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-secondary" onclick="enableEdit({{ $item->id }})">تمكين التعديل</button>
                            <button type="submit" class="btn btn btn-success" style="display: inline-block;">حفظ التعديلات</button>
                          </form>
                        
                        
                        </td>
                        <form action="{{ route('category.destroy',$item->id ) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذه الفئة مع البيانات التي فيها')">
                    <td>
                  @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">حذف</button>
                  </form>
             <td>
                  <div class="col-sm">
                <a  class="btn btn-primary" href="{{ route('category.show' ,$item->id )}}">إظهار</a>
</div>
            </td>
            
                         
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
    // const imageUrls = [
    //     "https://rowadbusiness.com/post/wp-content/uploads/%D8%B5%D9%88%D8%B1-%D8%AE%D9%84%D9%81%D9%8A%D8%A7%D8%AA-%D8%B3%D8%B7%D8%AD-%D8%A7%D9%84%D9%85%D9%83%D8%AA%D8%A8-%D9%84%D9%84%D9%83%D9%85%D8%A8%D9%8A%D9%88%D8%AA%D8%B1-%D8%A8%D8%AC%D9%88%D8%AF%D8%A9-1.jpeg",
    //     "https://3.bp.blogspot.com/-60Bx4iBaEG4/WbVfFFbpxyI/AAAAAAABAPs/oMuBhx3ARR027R78XTCscoDux_gzPtT3QCLcBGAs/s1600/45f800863c0deccb134cad811c6a096d.jpg",
    //     "https://albwabh.com/wp-content/uploads/2022/05/10%D8%B5%D9%88%D8%B1-%D8%AE%D9%84%D9%81%D9%8A%D8%A7%D8%AA-%D8%AD%D9%84%D9%88%D8%A9-%D9%88%D8%AC%D9%85%D9%8A%D9%84%D8%A9-%D9%84%D9%84%D8%A7%D8%A8-%D8%AA%D9%88%D8%A8-%D9%88%D8%A7%D9%84%D9%83%D9%85%D8%A8%D9%8A%D9%88%D8%AA%D8%B1-%D8%A8%D8%AC%D9%88%D8%AF%D8%A9-%D8%AC%D8%AF%D9%8A%D8%AF%D8%A9-2020-780x470.jpg",
    //     // قم بإضافة المزيد من الروابط إذا لزم الأمر
    // ];

    // let currentIndex = 0;

    // function changeBackgroundImage() {
    //     // حدد الجسم وقم بتغيير خلفيته
    //     const body = document.querySelector("body");
    //     body.style.backgroundImage = `url('${imageUrls[currentIndex]}')`;
    //     // زيادة الفهرس الحالي للصورة بحيث يتم التبديل إلى الصورة التالية في المصفوفة
    //     currentIndex = (currentIndex + 1) % imageUrls.length;
    // }

    // // اتصل بالدالة عند تحديث الصفحة وضبط فترة التحديث
    // window.onload = function() {
    //     changeBackgroundImage(); // ابدأ بالصورة الأولى
    //     setInterval(changeBackgroundImage, 5000); // قم بتغيير الصورة كل 5 ثوانٍ (5000 مللي ثانية)
    // };
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



    function enableEdit(rowId) {
        var nameInput = document.getElementById('name-' + rowId);
        var descInput = document.getElementById('description-' + rowId);
        nameInput.disabled = false;
        descInput.disabled = false;
    }

    function printPage() {
        window.print();
    }
</script>
