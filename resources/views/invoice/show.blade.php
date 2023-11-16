
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<style>


.invoice-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

.invoice-details {
    margin-top: 20px;
}

.invoice-info {
    margin-bottom: 20px;
}

.invoice-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.invoice-table th, .invoice-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.total-amount {
    text-align: right;
}

    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

       input[type="text"] {
        border-radius: 15px;
        height: 50px;
        width: 200px;
        text-align: center; /* لوضع قيمة الحقول في وسطها */
        font-size: 30px; /* تحديد حجم الخط هنا */

    }
    h1,h2,label {
        color: black;
        font-family: Arial, sans-serif;
        text-align: center; /* لوضع نصوص العناصر في وسطها */
    }
    input[type="text"] {
  border-radius: 15px;
  height: 50px; /* يجب تعديل الارتفاع حسب الحاجة */
  width: 200px; /* يجب تعديل العرض حسب الحاجة */

}
p,input[type="number"] {
  border-radius: 15px;
  height: 50px; /* يجب تعديل الارتفاع حسب الحاجة */
  width: 200px; /* يجب تعديل العرض حسب الحاجة */
  font-size: 30px; /* تحديد حجم الخط هنا */

}

           h1,h2,label{
            color :black;
            font-family: Arial, sans-serif; /* يستخدم الخط Arial إذا كان مثبتًا، وإلا سيستخدم أي خط خطوط الخطوط الغير معرفة */

           }     
            
    </style>



<div class="invoice-container">
<a  href="{{ route('invoice.index') }}">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV4rAw9tfT1bX4Jrqd222py4UY4Sm05QiL1hMM0Z4jiwCmgjXS7HI57EKkrbfUyT3K7ys&usqp=CAU" style="width: 50px; height: 55px;" alt="رجوع للخلف">
</a>
    <h2 >مؤسسة الأمير التجارية</h2>


    <div class="invoice-details">
        <div class="invoice-info">
        <!-- <p><strong>التاريخ:</strong> <input name="date" type="date" id="myDate" value="2023-11-04"><span id="dateDisplay"></span></p> -->
        </div>
        <table class="invoice-table">


            <tr>
                <th class="editable">أسم المنتج </th>
                <th class="editable">الكمية </th>
                <th class="editable">السعر</th>
                <th class="editable">التاريخ</th>
            </tr>
            <tr>  
      

                <td>
                    <p>{{$invoice->name}} </p>

            
            </td>
            <td>
                    <p>{{$invoice->quantity2}} </p>

            
                    <td>
                    <p>{{$invoice->price_total}} </p>

            
                    <td>
                    <p>{{$invoice->created_at}} </p>

            
            </td>            </tr>
     
 
        </table>  

 </form>
        
    </form>




















<script>
var date = new Date(document.getElementById("myDate").value);
var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
var formattedDate = date.toLocaleDateString('ar-EG', options);

var dateDisplay = document.createElement("span");
dateDisplay.innerHTML = formattedDate;
document.getElementById("demo").appendChild(dateDisplay);

       function submitForm() {
        var remainingQuantity = parseInt(document.getElementById('remainingQuantity').value);
        console.log(remainingQuantity); // تأكد من طباعة القيمة بشكل صحيح
        if (remainingQuantity >= 0) {
            document.getElementById('updateForm').submit();
        } else {
            alert('خطأ: لا يمكن تحديث الكمية المتبقية إلى قيمة سالبة.');
        }
    }
   function updateAndCalculate(input) {
        updateQuantity();
        calculateTotal(input);
    }


    function addNewRow() {
        var table = document.querySelector('.invoice-table');
        var newRow = table.insertRow(table.rows.length);
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);
        cell1.innerHTML = '<input type="text" value="منتج جديد">';
        cell2.innerHTML = '<input type="number" value="1" oninput="calculateTotal(this)">';
        cell3.innerHTML = '<input type="text" value="$0" oninput="calculateTotal(this)">';
        cell4.innerHTML = '<input type="text" value="$0" class="total" disabled>';
    }

    function calculateTotal(input) {
        var row = input.parentNode.parentNode;
        var quantity = row.cells[1].querySelector('input').value;
        var price = row.cells[2].querySelector('input').value;
        var total = parseFloat(quantity) * parseFloat(price.replace('$', ''));
        row.cells[3].querySelector('input').value = '' + total;

        var totalElements = document.getElementsByClassName('total');
        var totalAmount = 0;
        for (var i = 0; i < totalElements.length; i++) {
            var value = totalElements[i].value;
            totalAmount += parseFloat(value.replace('$', ''));
        }

        var totalAmountInput = document.querySelector('.total-amount-input');
        totalAmountInput.value = '$' + totalAmount;
    }

  


</script>

