<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
            }
            th, td{
                text-align: center;
                width:fit-content;
            }
            input{
                width: 80px;
            }
            #shoppingCart {
                position: relative;
                top: 20px;
                width: 600px;
            }
            
        </style>
        <script src="functions.js"></script>

        <h4 style="height: 20px;">
            <?php if($_REQUEST["cartContent"] == ""){echo "Your cart is now empty";}?>
            <?php if(isset($_REQUEST["alertMSG"])){echo $_REQUEST["alertMSG"];}?>
        </h4>

    </head>
    <body onload='cartContentFormating()'>
        <div id="formattingItem" style="height: 10px; visibility: hidden;"> 
            <?=$_REQUEST["cartContent"]?>
        </div>
        
        <table width="500">
        <tr>
            <td><input id="emptyCart" type="button" value="clear" onclick="window.open('3_CartSession.php?session_dstr=0','_self')"></td>
            <td><input type="button" value="check out" onclick="checkOut()"></td>
        </tr>
        </table>
        

        <!-- //below table shows the items in cart -->
        <table id="displayingItem"></table>

        <form id="checkOutForm" method="POST" action="4_purchaseForm.php" target="_blank" style="visibility: hidden;">
            <input type="text" id="checkOutItem" name="checkOutItem">
        </form>

        
    </body>
</html>