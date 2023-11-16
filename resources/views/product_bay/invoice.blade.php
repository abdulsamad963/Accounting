<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

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

</style>

<div class="invoice-container">
<a href="{{ url('/') }}">
    <img src="https://www.clipartmax.com/png/middle/217-2174484_blue-home-button-png-www-pixshark-com-images-galleries-linked-in-logo.png" style="width: 80px; height: 85px;" alt="رجوع للصفحة الرئيسية">
</a>

    <h2 contenteditable="true">مؤسسة الأمير التجارية</h2>
    <h2 contenteditable="true">فاتورة مشتريات</h2>

    <div class="invoice-details">
        <div class="invoice-info">
            <p><strong>رقم الفاتورة:</strong> <input type="text" value="INV-001"></p>
            <p><strong>التاريخ:</strong> <input type="date" value="2023-11-04"></p>
            <p><strong>اسم العميل:</strong> <input type="text" value="جون دو"></p>
        </div>
        <table class="invoice-table">
            <tr>
                <th class="editable">المنتج</th>
                <th class="editable">الكمية</th>
                <th class="editable">السعر</th>
                <th class="editable">المجموع</th>
            </tr>
            <tr>
                <td><input type="text" value="منتج 1"></td>
                <td><input type="number" value="2" oninput="calculateTotal(this)"></td>
                <td><input type="text" value="$50" oninput="calculateTotal(this)"></td>
                <td><input type="text" value="$100" class="total" disabled></td>
            </tr>
        </table>

        <div class="total-amount">
            <p><strong>المبلغ الإجمالي:</strong> <input type="text" value="$130" class="total-amount-input"></p>
        </div>
    </div>
    <button onclick="addNewRow()">إضافة منتج جديد</button>
</div>

<script>
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
        row.cells[3].querySelector('input').value = '$' + total;

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
