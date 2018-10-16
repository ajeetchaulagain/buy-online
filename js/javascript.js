var xmlhttp=false;
alert("Hey you just get into AJAX!!!");

if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
}
else if(window.ActiveXObject){
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}



// passess the information from customer registration field to php file

function initRegistration(){
    // alert("Hey you are in initRegistration method");

    var fname = document.getElementById('fname').value;

    var lname = document.getElementById('lname').value;
    var password = document.getElementById('password').value;
    var conf_password = document.getElementById('confirm_password').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;

   

    xmlhttp.open("GET", "register.php?fname="+fname+"&email="+ encodeURIComponent(email)+"&lname="+lname+"&password="+password+ "&confirm_password="+conf_password+"&phone="+phone+"&id="+Number(new Date), true);

    
    xmlhttp.onreadystatechange = function(){
        if((xmlhttp.readyState==4) && (xmlhttp.status==200)){
           document.getElementById("message").innerHTML = xmlhttp.responseText;
        //    var xmlDoc = xmlhttp.responseText;
        //    alert(xmlDoc);
        }
    };

    xmlhttp.send(null);
    
}


