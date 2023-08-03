$(document).ready(function () {

$("#log").submit(function(event){


 var user=$("#name").val();
 var pass=$("#pass").val();
 if(user!="" && pass!="")
 {
  $("#loading_spinner").css({"display":"block"});
  $.ajax
  ({
  type:'post',
  url:'server.php',
  data:{
   do_login:"do_login",
   room:user,
   password:pass
  },
  success:function(res) {
    let s=`${res}`
    console.log(s)
    

  if(s==1)
  {
    // alert("yoo bro")
    
    window.location.href="uprofile.php";

  }
  else
  {
    $("#loading_spinner").css({"display":"none"});
   document.getElementById('error').innerHTML="Wrong Apartment Details<style>#name,#pass{color: red;border-color: red;}#name:valid ~ label,#pass:valid ~ label{color:red}</style>"
  }
  } 
  });
 }
 else
 {
   document.getElementById('error').innerHTML="Please Fill All The Details"
 }

 return false;
})

// dashboard
$("#dash").submit(function(event){


 var user=$("#name").val();
 var pass=$("#pass").val();
 if(user!="" && pass!="")
 {
  $("#loading_spinner").css({"display":"block"});
  $.ajax
  ({
  type:'post',
  url:'aserver.php',
  data:{
   dash:"dash",
   admin:user,
   password:pass
  },
  success:function(res) {
    let s=`${res}`
    console.log(s)
    

  if(s==1)
  {
    // alert("yoo bro")
    
    window.location.href="dashboard.php";

  }
  else
  {
    $("#loading_spinner").css({"display":"none"});
   document.getElementById('error').innerHTML="Wrong Details please check them"
  }
  } 
  });
 }
 else
 {
   document.getElementById('error').innerHTML="Please Fill All The Details"
 }

 return false;
})


})