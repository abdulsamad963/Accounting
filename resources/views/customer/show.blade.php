@extends('customer.layout')
@section('content')

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
       
        <style>
.w{

  font: 1em sans-serif;
     background-color: #bfdab4; /* لون الخلفية، يمكنك تعديله */
            font-size: 22px; /* حجم الكتابة، يمكنك تعديله */
  
  width: 20%;
}
.e{

font: 1em sans-serif;
   background-color: #ca938f; /* لون الخلفية، يمكنك تعديله */
          font-size: 22px; /* حجم الكتابة، يمكنك تعديله */

width: 20%;
}
th,tr,a,p{ 
  font-family: unset  

}
td
{
 
  font: bold;
  color: #0d212e;
}
          h4{
              font-family:'Courier New', Courier, monospace
              font-size: 30px;
              color: rgb(19, 50, 80);
          }
      p{
          color: brown;
          font-size: x-large;
          font-family: Georgia, 'Times New Roman', Times, serif;
      }
      input,select{
    
          border-style: outset;
          border: 2px solid DimGray ;
           border-radius: 10px;
      }
      input[type="text"] {
  width: 200px;
  height: 30px;
  font-size: 14px;
  
}
input[type="number"] {
  width: 200px;
  height: 30px;
  font-size: 14px;
  
}
.targetTd {
  background-color: rgb(219, 202, 202);
}


 </style> 


<li>  <a href="{{ route('customers.index') }}" role="button">رجوع للخلف </a></li>  
<button class="btn-success" onclick="refreshPage()">تحديث الصفحة</button>
<button class="btn-danger" style="font-family: Georgia, 'Times New Roman', Times, serif" onclick='printPage()'>print</button>


 <table cellpadding='0' cellspacing='0' style='text-align: right;' class='table table-hover table-striped'>

<tr>
  <form action="{{ route('purchasess.store')}}"method="POST" >
    @csrf 
  <input type="text" class="form-control" id="num" name="customer_id" required value={{$id}} style="display: none;" > 


<td><label for="name" class="form-label">اسم القطعة</label> </td>
  
 <td><input type="text" class="form-control" id="name" name="name" required > </td> 
</tr>
<tr> 
    <td><label for="major" class="form-label">النوع</label>  </td>
  <td><input type="text" class="form-control" id="num" name="type" required> </td>
</tr>
<tr>
    <td><label for="major" class="form-label">السعر</label>  </td>
  <td><input type="number" class="form-control" id="num" name="price" required> </td>
</tr>

<tr>
  <td><label for="major" class="form-label">المبلغ المدفوع</label>  </td>
<td><input type="number" class="form-control" id="num" name="amount" required> </td>
</tr>
<tr>
  <td><label for="major" class="form-label">الملاحظات</label>  </td>
<td><input type="text" class="form-control" id="num" name="Notes" required> </td>
</tr>
<td><button type="submit" class="btn btn-primary">أضافة</button>
  </td>



</table>
</form>
</div>

         
<div class="container">
  
  <h4>صفحة المشتريات </h4>




  <table border="0" cellpadding='0' cellspacing='0' style='text-align: right;' class='table table-hover table-striped'>

  <thead class="thead-dark">
    <tr>
 
    
      <th scope="col">رقم القطعة</th>
      <th scope="col">أسم القطعة </th>
      <th scope="col">  نوع القطعة </th>
      <th scope="col">سعر القطعة </th>
  
        <th scope="col"> المبلغ المدفوع </th>
        <th scope="col"> المبلغ المتبقي </th>
  <th scope="col"> الملاحظات </th>
  <th scope="col"> تاريخ شراء القطعة  </th>
 <th scope="col">   التعديل  </th>
   <th scope="col"> الحذف </th>

    </tr>
  </thead>
  <tbody>
@php
    $i=1;
  
@endphp
 
         @foreach ($purchasess  as $item  )   
     
    <tr>
   
      <td>{{$i++}}</td>
      <td>{{$item->name}}</td>
      <td>{{$item->type}}</td>
          <td>{{$item->price}}</td>

      <td class="some-class">{{$item->amount}}</td>   
      
     <td class="targetTd">{{$item->price - $item->amount }}</td> 

      <td>{{$item->Notes}}</td>
      <td>{{$item->created_at}} </td>
      <td>                 <a  class="btn btn-success" href="{{ route('purchasess.edit',$item->id )}}">Edit</a>
      </td>
    
        <form action="{{ route('purchasess.destroy',$item->id ) }}" method="POST">
          <td>
        @csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
      @endforeach


  </tbody>
</table>

<h5 class="w"> <div id="result"></div></h5> 
<br>
<h5 class="e"> <div id="result2"></div></h5> 









<div class="form-group">



</div>
 

    
</div>








<script>


var cells = document.getElementsByTagName('td');


for (var i = 0; i < cells.length; i++) {
  var cellValue = cells[i].innerText;


  if (cellValue === '0') {
    cells[i].style.backgroundColor = 'rgba(0, 128, 0, 0.5)';
  }
}

var cells = document.querySelectorAll('td.some-class');


var total = 0;


for (var i = 0; i < cells.length; i++) {
  var cellValue = parseInt(cells[i].innerText);

  if (!isNaN(cellValue)) {
    total += cellValue;
  }
}


var resultElement = document.getElementById('result');
resultElement.textContent = "المبلغ الكلي المدفوع " +":$"+ total;


// ************


var cells = document.querySelectorAll('td.targetTd');


var total = 0;


for (var i = 0; i < cells.length; i++) {
  var cellValue = parseInt(cells[i].innerText);


  if (!isNaN(cellValue)) {
    total += cellValue;
  }
}


var resultElement = document.getElementById('result2');
resultElement.textContent = "المبلغ الكلي المتبقي " +":$"+ total;
</script>

<script>
  function refreshPage() {
      location.reload();
  }
</script>

<script>
  function printPage()
  {
      // body=document.getElementById('body').innerHTML;
     
      // document.getElementById('body').innerHTML=body;
       window.print();
  }
</script>
@endsection
