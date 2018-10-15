var xmlhttp;

if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
}
else if(window.ActiveXObject){
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}



// passess the information from customer registration field to php file

function initRegistration(){
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var password = document.getElementById('password').value;
    var conf_password = document.getElementById('confirm_password').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;

    xmlhttp.open("GET", "register.php?name="+fname+"&email="+ encodeURIComponent(email)+"&lname="+lname+"&password="+password+"&id="+Number(new Date), true);

    xmlhttp.onreadystatechange = function(){
        if((xmlhttp.readyState==4) && (xmlhttp.readyState==200)){
            document.getElementById("message").innerHTML = responseText;
        }




    };
    


}