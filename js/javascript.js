var xmlhttp=false;


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
    var phone = document.getElementById('phone').value  ;

   

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

function initLogin(){
    // alert("in initLogin method");
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;


    xmlhttp.open("GET","login.php?email="+encodeURIComponent(email)+"&password="+password, true);
    
    xmlhttp.onreadystatechange = function(){
        if((xmlhttp.readyState==4) && (xmlhttp.status==200)){
             
            var redirect = xmlhttp.responseText;
            if(redirect=='yes'){
                window.location.href = 'buying.html';
            }
            else{
                document.getElementById("msg").innerHTML = xmlhttp.responseText;
            }
            
        }
    };
    xmlhttp.send(null);

}

function initManagerLogin(){
    var id = document.getElementById('id').value;
    var password = document.getElementById('password').value;
   

    xmlhttp.open("GET", "mlogin.php?id="+id+"&password="+password,true);
    xmlhttp.onreadystatechange= function(){
        if((xmlhttp.readyState==4) && (xmlhttp.status==200)){
            
           if(xmlhttp.responseText=="yes"){
               var elem = document.getElementById("wrap");
               elem.parentNode.removeChild(elem);
               
               var html="<div id='wrap' style='text-align:center; padding:20px; margin-top:100px;'>"+
               "<a href='listing.htm' style='padding:10px;'> Listing </a>"+
               "<a href='processing.htm' style='padding:10px';> Processing </a>"+
               "<a href='logout.htm' style='padding:10px;'> Logout </a></div>";



               document.write(html);
               document.write("<hr/>")

               return false;
           }
           else{
            document.getElementById('msg').innerHTML=xmlhttp.responseText;
           }
        }
    };
    xmlhttp.send(null);
    
};


