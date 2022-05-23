<!DOCTYPE html>
<html>
    <head>
        <script src ="functions.js"></script>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                width: auto;
            }
            #LHS{
                float: left;
            }
            #RHS{
                margin-left: 250px;
            }
            #pdtDetail, #productForm{
                position: absolute;
                top: 0px;
            }
            #dummySpace{
                visibility: hidden;
                height: 0px;
                width: 0px;
            }
        </style>
    </head>

    <body onload='showPdtDtl()'>
    
        <div id="LHS"><img id="productIcon" src="Images/Cart.jpeg"/></div>
        
        <div id="RHS"><form name="pdtDetail" method="get" action="3_CartSession.php" target="frame_RHS_bottom" onsubmit="return addToCart()">
            <table id="productForm">
            <tr>
                <td colspan="2" align="center"><b>Product Detail</b></td>
            </tr>
            <tr><td>Product ID: </td> <td><input type="text" id="product_id" name="product_id_sent" value="<?=$_GET["product_id"]?>" readonly/></td></tr><br>
            <tr><td>Product Name: </td> <td><input type="text" id="product_name" name="product_name_sent" value="" readonly></td></tr><br>
            <tr><td>Price/unit: </td> <td><input type="text" id="unit_price" name="unit_price_sent" value="" readonly></td></tr><br>
            <tr><td>Unit: </td> <td><input type="text" id="unit_quatity" name="unit_quatity_sent" value="" readonly></td></tr><br>
            <tr><td>in stock / units: </td> <td><input type="text" id="in_stock" name="in_stock_sent" value="" readonly></td></tr><br>

            <tr align="right"><td colspan="2"> Quatity: <input type="number" id="purchasing_quantity" name="qty" value="1" min="1"></td></tr><br>
            
            <tr align="right">
                <td colspan="2"> <input type="submit" value="Add to Chart"></td>
            </tr>
            </table>
        </form></div>
        <h2 id="dummySpace"><?php if (isset($_REQUEST["productDetail"])){echo $_REQUEST["productDetail"];}else{echo "Cart";}?></h2>
    </body>
</html>
