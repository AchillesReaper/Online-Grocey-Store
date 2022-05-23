<!DOCTYPE html>
<html>
    <head>
        <script src="functions.js"></script>
        <style>
            #displayingItem td, #displayingItem th {    
                text-align: center;
                width:fit-content;
            }
        </style>

    </head>

    <body onload='showCheckOutItem()'>
        <div id="checkOutItem" style="height: 10px; visibility: hidden;"> 
            <?=$_REQUEST["checkOutItem"]?>
        </div>
        <table id="displayingItem"></table>
        
        <b>Please enter your information for deliery.</b>
        <form id="purchaseForm" name="purchaseForm" method="POST" action="5_orderPlaced.php" target="_self" onsubmit="return emailVal()">
            <table>
                <tr><td>Name:<span style="color:red">*</span> </td><td><input type="text" name="cstmName" required></td></tr>
                <tr><td>Address:<span style="color:red">*</span> </td><td><input type="text" name="cstmAdd" required></td></tr>
                <tr><td>Surburb:<span style="color:red">*</span> </td><td><input type="text" name="cstmSub" required></td></tr>
                <tr><td>State:<span style="color:red">*</span> </td><td><input type="text" name="cstmSta" required></td></tr>
                <tr><td>Contry:<span style="color:red">*</span> </td><td><input type="text" name="cstmCnt" required></td></tr>
                <tr><td>email:<span style="color:red">*</span> </td><td><input type="text" name="cstmEmail" required></td></tr>
                <tr><td>Phone:<span style="color:red">*</span> </td><td><input type="text" name="cstmPhone" required></td></tr>
                <tr><td colspan="2" style="text-align: right;"><input type="submit" value="Purchase"></td></tr>
            </table>
        </form>


    </body>

</html>