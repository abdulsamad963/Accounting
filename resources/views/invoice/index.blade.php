<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
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
    background-color: #2F4F4F;
    margin-top: 20px;
    margin-bottom: 20px;
    white-space: nowrap;
    overflow: auto;
    max-width: 1380px; /* تعديل هنا على حسب الحاجة */
    width: 100%;
        }
        input[type="text"],
        input[type="number"] {            font-family: Arial, sans-serif;

            border-radius: 15px;
            height: 50px;
            width: 200px;
            text-align: center;
            font-size: 30px;
        color: #000;        }
      
      
        th {
            font-family: Arial, sans-serif;
            font-size: 20px;
        
        }
        
        h3 {
            font-family: "Lucida Console", "Courier New", monospace;
            font-size: 40px;
            color:#BDB76B;	
        }

     
        p {
            color :#FAF0E6	;
            font-family: Arial, sans-serif;
            font-size: 30px;
        }

    </style>
</head>
<body>
<a href="{{ url('/') }}">
                <img src="https://www.clipartmax.com/png/middle/217-2174484_blue-home-button-png-www-pixshark-com-images-galleries-linked-in-logo.png" style="width: 80px; height: 85px;" alt="رجوع للصفحة الرئيسية">
            </a>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
                {{$message}}
            </div>
        @endif
        <label id="totalPriceLabel" style="color: #FAF0E6; font-family: Arial, sans-serif; font-size: 30px;"></label>


    <div class="de">

        <center>
            <h3>صفحة الفواتير المباعة</h3>
   
            <input type="text" id="categorySearch1" oninput="filterCategories1()" placeholder="ابحث عن المنتج">

          
            <input type="text" id="categorySearch" oninput="filterCategories()" placeholder="ابحث عن التاريخ">
        </center>
    </div>

    <div class="body">
    <table id="std" cellpadding='0' cellspacing='0' style='text-align: left;' class='table table-hover table-striped'>
            <thead style="background-color:#696969;">
                <tr>
                    <th scope="col">الرقم</th>
                    <th scope="col">أسم المنتج</th>
                    <th scope="col">الكمية المباعة</th>
                    <th scope="col">سعر رأس المال للقطعة الواحدة</th>
                    <th scope="col">سعر رأس المال للقطع </th>
                    <th scope="col">السعر البيع </th>
                    <th scope="col">الربح </th>
                    <th scope="col">تاريخ </th>
                    <th scope="col">عرض  </th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $i=1; 
                @endphp
                @foreach ($invoice as $item)
                    <tr>
                        <td><p>{{$i++}}</p></td> 
                        <td>
                            <form action="{{ route('category.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <p><input style="border: none;" style="width: 200px;" type="text" name="name" id="name-{{ $item->id }}" value="{{ $item->name }}" disabled></p>
                                </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <p>{{$item->quantity2}}</p>
                            </div>
                        </td>
            
                        <td>
                            <div class="form-group">
                                <p>{{$item->price2}}</p>
                            </div>
    </td>
    <td>
                            <div class="form-group">
                            <p id="totalCapital-{{ $item->id }}"></p>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <p>{{$item->price_total}}</p>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                            <p id="profit-{{ $item->id }}"></p>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                            <p>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                
              <p>      <a  class="btn btn-primary" href="{{ route('invoice.show', $item->id ) }}"> بيانات الفاتورة </a></p>

                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                    <td>


                </form>
                     
                        </td>   
                       </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <script>


          function filterCategories1() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("categorySearch1");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.getElementsByTagName("input")[2].value;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

function filterCategories() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("categorySearch");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[7]; // تغيير هنا لاستهداف قيم التاريخ
        if (td) {
            txtValue = td.textContent || td.innerText; // تغيير هنا للحصول على القيمة التاريخية
            if (txtValue.toUpperCase().indexOf(filter) > -1) { // تغيير الفلتر للمقارنة بالتاريخ
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
        @foreach ($invoice as $item)
            // حساب وعرض قيمة رأس المال والربح لكل صف
            var quantity = {{$item->quantity2}};
            var capitalPrice = {{$item->price2}};
            var totalCapital = quantity * capitalPrice;
            var totalSalePrice = {{$item->price_total}};
            var profit = totalSalePrice - totalCapital;

            // وضع القيم في العناصر p المناسبة لكل صف
            document.getElementById('totalCapital-{{ $item->id }}').innerText = totalCapital;
            document.getElementById('profit-{{ $item->id }}').innerText = profit;
        @endforeach

        // حساب إجمالي عمود الربح وعرضه
        let totalProfit = 0;
        @foreach ($invoice as $item)
            totalProfit += ({{$item->price_total}} - ({{$item->quantity2}} * {{$item->price2}}));
        @endforeach
        document.getElementById("totalPriceLabel").innerText = "إجمالي الأرباح: " + totalProfit;
    });
    </script>
</body>
</html>
