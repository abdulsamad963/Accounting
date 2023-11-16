@extends('customer.layout')
@section('content')

<div class="jumbotron">

 
<style>


</style>
<a href="{{ url('/back') }}">العودة للصفحة الرئيسية</a>
 

  <p>لأضافة زبون جديد</p> 
  <a class="btn btn-primary btn-lg" href="{{ route('customers.create') }}" role="button"  >إضغط هنا </a>
</div>

<div class="container">

@if ($message =Session::get('success'))
    
@endif
<div class="alert alert-primary" role="alert">
{{$message}}
</div>
</div>



<button class="btn-success" style="font-family: Georgia, 'Times New Roman', Times, serif" onclick='printPage()'>print</button>

{{-- 
<input type="text" id="name" onkeyup="filterSrch(1,'name')" placeholder="بحث عن طريق الاسم">
 --}}




<div class="body">
<div class="container">
  <table class="table">
    <thead class="thead-dark">
      <tr>












        <th scope="col">on</th>
       <th scope="col"> الأسم</th>
         <th scope="col">الرقم</th>
        <th scope="col">العنوان</th>
        <th scope="col">الملاحظات</th>
        <th scope="col">تعديل</th>
        <th scope="col">حفظ</th>         
         <th scope="col">  المشتريات </th>
        <th scope="col">حذف</th>


      </tr>
    </thead>
    <tbody>  @php 
       $i=1; 
   
    @endphp
      @foreach ($customers as $item)
          
  
      <tr>
            
        <td>{{$i++}}</td> 
        <form action="{{ route('customers.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')

      <td>        <input type="text" class="form-control" name="name" id="name-{{ $item->id }}" value="{{ $item->name }}" disabled></td> 
         <td>        <input type="text" class="form-control" name="num" id="num-{{ $item->id }}" value="{{ $item->num }}" disabled>
</td>       
        <td> <input type="text" class="form-control" name="address" id="address-{{ $item->id }}" value="{{ $item->address }}" disabled></td>
        <td><input type="text" class="form-control" name="comments" id="comments-{{ $item->id }}" value="{{ $item->comments }}" disabled></td>
 
 <td>
  <button type="button" class="btn btn-secondary" onclick="enableEdit({{ $item->id }})">تمكين </button> 
         </td>
                            <td>
  <button type="submit" class="btn btn btn-success" style="display: inline-block;">حفظ </button> 
                            </td>
                          

        <td>
        </form>

          <div class="container">
            <div class="row">
              <div class="col-sm">
                <a  class="btn btn-primary" href="{{ route('customers.show' ,$item->id )}}">show</a>
              </div>
            </td>
              <div class="col-sm">
 

                <form action="{{ route('customers.destroy',$item->id ) }}" method="POST">
                    <td>
                  @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
                  </form>

              </div>
            </div>
          </div>
      

        </td>
      </tr>
   @endforeach
    </tbody>
  </table>
</div>
  {{$customers->links() }}
  </div>


    <script>
    function printPage()
    {
        // body=document.getElementById('body').innerHTML;
       
        // document.getElementById('body').innerHTML=body;
         window.print();
    }



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
        var numInput = document.getElementById('num-' + rowId);
        var addressInput = document.getElementById('address-' + rowId);

        var commentsInput = document.getElementById('comments-' + rowId);

   

        nameInput.disabled = false;
        numInput.disabled = false;
        addressInput.disabled = false;
        commentsInput.disabled = false;
    }

    function printPage() {
        window.print();
    }
</script>

@endsection