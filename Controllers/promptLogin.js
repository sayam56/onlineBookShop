function promtLogin(productID, productPrice, product_by) {
    if (is_loggedIn == 0) {
        //which means the user is not logged in, then prompt the user to log in

        window.alert('Please Log In First!');


    } else {
        //check for duplicate entries
        console.log(product_by);
        var ajaxreq = new XMLHttpRequest();
        ajaxreq.open("GET", "../Controllers/checkDuplicateProductCart_ajax.php?productID=" + productID + "&user_id=" + user_id);
        //console.log(member.id);
        ajaxreq.onreadystatechange = function() {
            if (ajaxreq.readyState == 4 && ajaxreq.status == 200) {

                var response = ajaxreq.responseText;

                console.log(response);

                if(response.includes('Exist')){
                    alert("Product Already Exists");
                }
                
                if(response.includes('Continue')){
                    insertItemToCart(user_id,productID,productPrice, product_by);
                }
            }
        }

        ajaxreq.send();
    }
}


function insertItemToCart(user_id, productID, productPrice, product_by){
    var ajaxreq = new XMLHttpRequest();
        ajaxreq.open("GET", "../Controllers/insertToCart_Ajax.php?productID=" + productID + "&user_id=" + user_id + "&product_price=" + productPrice + "&product_by=" + product_by);
        //console.log(member.id);
        ajaxreq.onreadystatechange = function() {
            if (ajaxreq.readyState == 4 && ajaxreq.status == 200) {

                var response = ajaxreq.responseText;

                var divelm = document.getElementById('shoppingBag');


                divelm.innerHTML = response;
            }
        }

        ajaxreq.send();
}

// "insertToCart_Ajax.php?productID=" + productID + "&user_id=" + user_id + "&product_price=" + productPrice