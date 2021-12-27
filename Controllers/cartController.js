function updateTotal(product_id,unitPrice,prevPrice,availableQTY){
    let updateQtyVal=0;
    let updatedTotalPrice = 0;
    updateQtyVal=document.getElementById("qtyInput"+product_id).value;

    console.log(updateQtyVal);

    updatedTotalPrice = (parseInt(unitPrice) * parseInt(updateQtyVal))+parseInt(prevPrice);

    updatedAvailableQty = parseInt(availableQTY)-parseInt(updateQtyVal);

    document.getElementById("qtyWiseTotal"+product_id).innerHTML = "$"+updatedTotalPrice;

    document.getElementById("availableQTY"+product_id).innerHTML = updatedAvailableQty + "pcs";

    console.log(updatedTotalPrice);
    console.log(updatedAvailableQty);


    var ajaxreq=new XMLHttpRequest();
        ajaxreq.open("GET","../Controllers/updateCartVal_Ajax.php?productID="+product_id+"&updatedTotalPrice="+updatedTotalPrice+"&updatedAvailableQty="+updatedAvailableQty+"&purchasedQtyVal="+updateQtyVal+"&user_id="+user_id );
        //console.log(member.id);
        ajaxreq.onreadystatechange=function ()
        {
         if(ajaxreq.readyState==4 && ajaxreq.status==200)
                {

                    console.log('cart and product DB is now updated');

                    //document.getElementById("qtyInput"+product_id).innerHTML=0;

                     var response=ajaxreq.responseText;
                    
                     var divelm=document.getElementById('shoppingBag');
                    
                     divelm.innerHTML=response;
                }
        }
        
        ajaxreq.send(); 

    //console.log(updatedTotalPrice);
}


function updateCartPage(){
 
    var ajaxreq=new XMLHttpRequest();
        ajaxreq.open("GET","../Controllers/finalCartCalc_ajax.php?user_id="+user_id );
        //console.log(member.id);
        ajaxreq.onreadystatechange=function ()
        {
         if(ajaxreq.readyState==4 && ajaxreq.status==200)
                {

                    //console.log('INSIDE ajax');
                     var response=ajaxreq.responseText;
                    
                     var divelm=document.getElementById('CartTotal');

                    //console.log(divelm);
                    
                     divelm.innerHTML=response;
                }
        }
        
        ajaxreq.send();
}


function confirmOrder(){
var res= confirm("Are you sure you want to submit the order?");

if(res == true){
    var ajaxreq=new XMLHttpRequest();
        ajaxreq.open("GET","../Controllers/confirmOrder_ajax.php?user_id="+user_id );
        //console.log(member.id);
        ajaxreq.onreadystatechange=function ()
        {
         if(ajaxreq.readyState==4 && ajaxreq.status==200)
                {


                    window.location.replace("index.php");
                    //console.log('INSIDE ajax');
                     //var response=ajaxreq.responseText;

                     //console.log(response);
                    
                     //var divelm=document.getElementById('CartTotal');

                    //console.log(divelm);
                    
                     /* divelm.innerHTML=response; */
                }
        }
        
        ajaxreq.send();
}

}



function deleteCartItem(product_id, availableQty){
var res= confirm("Are you sure you want to delete the item?");

if(res == true){
    var ajaxreq=new XMLHttpRequest();
        ajaxreq.open("GET","../Controllers/deleteCartItem_ajax.php?product_id="+product_id+"&user_id="+user_id );
        //console.log(member.id);
        ajaxreq.onreadystatechange=function ()
        {
         if(ajaxreq.readyState==4 && ajaxreq.status==200)
                {


                    //window.location.replace("index.php");
                    $('#cartRow'+product_id).hide("slow");
                    //console.log('INSIDE ajax');
                     //var response=ajaxreq.responseText;

                     //console.log(response);
                    
                     //var divelm=document.getElementById('CartTotal');

                    //console.log(divelm);
                    
                     /* divelm.innerHTML=response; */
                }
        }
        
        ajaxreq.send();
}

}