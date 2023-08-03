function view(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
  
  if(window.innerWidth<768){
    document.location=document.location.toString().split('#')[0]+'#map';
    return false;
} 

    // Spinner
    var spinner = function () {
      setTimeout(function () {
          if ($('#spinner').length > 0) {
              $('#spinner').removeClass('show');
          }
      }, 1);
  };
  spinner();



// end
var mng="<d class='bi-brightness-alt-high'> Good morning</d>";
var aft="<d class='bi-brightness-high'> Good afternoon</d>";
var nigt="<d class='bi-moon-stars'> Good evening</d>";

var mng1="<img src='images/mrng.jpg' alt='Good morning'/>";
var aft1="<img src='images/noon.jpg' alt='Good noon'/>";
var nigt1="<img src='images/nigth.jpg' alt='Good night'/>";

var hr= (new Date()).getHours();

var tmy
var tmys
if(hr<12){
tmy=mng;
tmys=mng1;
}
else if(hr>=12 && hr <=17){
tmy=aft;
tmys=aft1;
}
else{
tmy=nigt
tmys=nigt1
;}
document.getElementById("tym").innerHTML=tmy;
document.getElementById("tyms").innerHTML=tmys;



$(document).ready(function () {

  $(window).scroll(function() { 
    if ($(document).scrollTop() > 50) { 
      $(".navbar").addClass("navs");
    } else {
      $(".navbar").removeClass("navs");
     }
  });


  $('table').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
} );

$('#pros').on('click', function () {
  $("#payment").css("display","none");
  $("#profile").css("display","block");
  $('#pros').addClass("bg-green")
  $('#pays').removeClass("bg-green")
})


$('#pays').on('click', function () {
  $("#payment").css("display","block");
  $("#profile").css("display","none");
  $('#pros').removeClass("bg-green")
  $('#pays').addClass("bg-green")
})


  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
});
//modal


// payment

const form = document.getElementById('payForm');
form.addEventListener("submit", payNow);
// $("#payForm").submit(payNow());

function payNow(e) {
 e.preventDefault();
 let room =$("#room").val()
 let comm =$("#comment").val()

    FlutterwaveCheckout({
      public_key: "FLWPUBK-45f4bee9b4082137d445b657d365c4ad-X",
      tx_ref: "AK_"+Math.floor((Math.random() * 1000000000) + 1),
      amount:$("#amount").val(),
      currency: "UGX",
	  
      //payment_options: "card,mobilemoney,ussd",
	  
      customer: {
        email:$("#email").val(),
        phonenumber:$("#tel").val(),
        name:$("#names").val(),
      },
	  
      callback: (data)=> { // specified callback function
        console.log(data);
		  const reference = data.tx_ref;
      alert('Payment complete! Reference: ' + reference);
     
      let names=data.customer.name
      let emails=data.customer.email
      let tel=data.customer.phone_number
      let amounts=data.amount
    
      var pay = {
        'name': names,
        'amount':amounts,
        'email':emails,
        'tel':tel,
      'ref': reference,
      'room':room,
      'reason':comm
    };

      var userStr = JSON.stringify(pay);
      $.ajax({
          url: 'api/pay.php',
          type: 'post',
          data: {user: userStr},
          success: function(res){
              //do whatever.
              console.log(res+" mwana ts gud bro")
              console.log(pay +" yah")
              var suc=$('.success')
              let ress="Your payment has been finished"
              

          }
      });
    
    
    
    
    },
	  
      customizations: {
        title: "Claver House Rent",
        description: "Nagera House rent"
		
       // logo: "flutterwave/usecover.gif",
      },
    });

    // alert(`hea ${$("#amount").val()}`)
  }
//pdf
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#pdf').click(function () {
    doc.fromHTML($('#pdfs').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('simple-rec.pdf');
});

// booking
var request;
$("#booking").submit(function(event){
    event.preventDefault();
    if (request) {
        request.abort();
    }
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();

    if(serializedData.length==""){
      // $(".form__input smp").toggleClass('form-control is-invalid')
      console.log("please fill in")
    }else{
      // $("#myBtn").show(200)
      console.log("pass")
    

    $inputs.prop("disabled", true);
    request = $.ajax({
        url: "api/book.php",
        type: "post",
        data: serializedData,
        success:function(data){
                // console.log('Upload successfully'+data);
              document.getElementById("dis").innerHTML=data
              document.getElementById('booking').reset()
              $('#booking').unbind();
              $('#booking').bind('click');
              }
    });

    request.done(function (response, textStatus, jqXHR){
        console.log("Hooray, it worked!");
    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
    request.always(function () {
        $inputs.prop("disabled", false);
    });
  }

}); 

// admin dashboard update


$("#admin").submit(function(event){
  event.preventDefault();
  if (request) {
      request.abort();
  }
  var $form = $(this);
  var $inputs = $form.find("input, select, button, textarea");
  var serializedData = $form.serialize();

  if(serializedData.length==""){
    // $(".form__input smp").toggleClass('form-control is-invalid')
    console.log("please fill in")
  }else{
    // $("#myBtn").show(200)
    console.log("pass")
  

  $inputs.prop("disabled", true);
  request = $.ajax({
      url: "api/admin.php",
      type: "post",
      data: serializedData,
      success:function(data){
              // console.log('Upload successfully'+data);
            document.getElementById("dis").innerHTML=data
            document.getElementById('user').reset()
            }
  });

  request.done(function (response, textStatus, jqXHR){
      console.log("Hooray, it worked!");
  });
  request.fail(function (jqXHR, textStatus, errorThrown){
      console.error(
          "The following error occurred: "+
          textStatus, errorThrown
      );
  });
  request.always(function () {
      $inputs.prop("disabled", false);
  });
}

});

// charts
$('#cha').on('click', function () {       
        $.ajax({
    url:"api/trans.php",
    type: 'get',
    dataType: 'JSON',
    success: function(data){

    console.log(data +" hey") 
  }
})
// alert("ayo")
} ) 
                                

})
