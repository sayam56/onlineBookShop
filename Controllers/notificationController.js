function openModal() {

if (is_loggedIn == 0) {
    //which means the user is not logged in, then promt the user to log in

    window.alert('Please Log In To See Notifications!');
} else {
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 

    modal.style.display = "block";


    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
} /* open modal ends */

function updateNoti() {

    if(is_loggedIn != 0){
        //since the window has been updated and the notifications has been seen, it needs to go out

        var ajaxreq = new XMLHttpRequest();
        ajaxreq.open("GET", "../Controllers/updateNotiStatus_ajax.php?user_id=" + user_id);
        //console.log(member.id);
        ajaxreq.onreadystatechange = function() {
            if (ajaxreq.readyState == 4 && ajaxreq.status == 200) {
                //also the notification count has to be updated
                var response = ajaxreq.responseText;

                var divelm = document.getElementById('bellIcon');


                divelm.innerHTML = response;
            }
        }

        ajaxreq.send();
    }



}