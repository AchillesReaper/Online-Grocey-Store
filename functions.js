//this function is triggered to show the layer 2 category
function showCat(proCat){
    for (let i =0; i < 5; i++){
        showLayer3(0);
        if (i == proCat) {
            document.getElementsByClassName("productCat")[proCat].style.visibility = "visible";
               
        }else{
            document.getElementsByClassName("productCat")[i].style.visibility = "hidden";
        }
    }
}

function showLayer3(proL3){
    for (let i =0; i < 9; i++){
        if (i == proL3) {
            document.getElementsByClassName("layer3pdt")[proL3].style.visibility = "visible";
        }else{
            document.getElementsByClassName("layer3pdt")[i].style.visibility = "hidden";
        }
    }
}

//this function send the product id to the php conneting to database
function databaseAccess(pdtid){
    document.forms['getPdtDtl']['product_id'].value = pdtid;
    document.forms['getPdtDtl'].submit();

}

//this function show the product detail retrived from database
function showPdtDtl(){
    let product_array = document.getElementById('dummySpace').innerHTML.split(",");
    document.getElementById("productIcon").src = "Images/iconW250/"+product_array[0]+".jpeg";
    document.getElementById("product_id").value = product_array[0];
    document.getElementById("product_name").value = product_array[1];
    document.getElementById("unit_price").value = product_array[2];
    document.getElementById("unit_quatity").value = product_array[3];
    document.getElementById("in_stock").value = product_array[4];

}

// this function sent the listed item to the cart.
function addToCart(){
    let qty = parseInt(document.forms["pdtDetail"]["qty"].value);
    let stock = parseInt(document.forms["pdtDetail"]["in_stock_sent"].value);
    if (qty > stock){
        alert("Sorry, we do not have sufficient stock");
        return false;
    }
}

// this function present the cart item to customers
function cartContentFormating(){
    let heading = ['Item #', 'Product ID','Product','unit',
                    'unit price','stock','Qty','Price'];
    let yl0 ="";
    for (let k=0; k<heading.length; k++){
        yl0 += "<th>" + heading[k] + "</th>"
    }
    
    let x = document.getElementById('formattingItem').innerHTML;
    const itemArray= x.split('::');
    let yl1 ="";
    let total_price = 0.00;
    
    for (let i=0; i<itemArray.length-1; i++){
        let itemI = itemArray[i].split(',');
        total_price += parseInt(itemI[7]*100)/100;
        
        let yl1_r ="";
        for(let j=0; j<itemI.length; j++){
            yl1_r += "<td>" + itemI[j] + "</td>"
        }
        yl1 += "<tr>" + yl1_r + "</tr><br>";
    }
    total_price = parseFloat(total_price).toFixed(2)
    let yl2 = '<tr style="font-weight: bold;"><td colspan="7" style="text-align: right;"> Total: </td><td>'+ total_price +'</td>';
    

    document.getElementById('displayingItem').innerHTML = yl0 + yl1 + yl2;

}

function checkOut(){
    let x = document.getElementById('formattingItem').innerHTML;
    
    if (!x.match(/\S/)){
        alert("Your cart is empty. Please add item.");
    }else{
        document.forms['checkOutForm']['checkOutItem'].value = x;
        document.getElementById('emptyCart').click();
        document.getElementById('checkOutForm').submit();
    }
    

}

function showCheckOutItem(){
    let heading = ['Item #','Product','unit','unit price','Qty','Price'];
    let yl0 ="";
    for (let k=0; k<heading.length; k++){
        yl0 += "<th>" + heading[k] + "</th>"
    }
    
    let x = document.getElementById('checkOutItem').innerHTML;
    const itemArray= x.split('::');
    let yl1 ="";
    let total_price = 0.00;
    
    for (let i=0; i<itemArray.length-1; i++){
        let itemI = itemArray[i].split(',');
        total_price += parseInt(itemI[7]*100)/100;
        
        let yl1_r ="";
        for(let j=0; j<itemI.length; j++){
            if (j==1 || j==5){
                continue;
            }else{
                yl1_r += "<td>" + itemI[j] + "</td>"
            }
        }
        yl1 += "<tr>" + yl1_r + "</tr><br>";
    }
    total_price = parseFloat(total_price).toFixed(2)
    let yl2 = '<tr style="font-weight: bold;"><td colspan="5" style="text-align: right;"> Total: </td><td>'+ total_price +'</td>';
    

    document.getElementById('displayingItem').innerHTML = yl0 + yl1 + yl2;

}


function emailVal(){
    let mAdd = document.forms["purchaseForm"]["cstmEmail"].value;
    let pattern= /\S+@\S+\.\S+/;
    if(!mAdd.match(pattern)){
        alert("Not a valid email format. Please check your input")
        return false;
    }
}