
    <div class="row">
<div class="col-4">
    <br/>
<?php 



$sql = "SELECT  * FROM ca_transactions WHERE  apartment = '$room' ORDER BY id  desc LIMIT 1;" ;
$res = mysqli_query($conn, $sql);
$rescheck = mysqli_num_rows($res);

if ( $rescheck > 0) {
while ($row = mysqli_fetch_assoc($res)) {

    $amount =$row["amount"];
  
    $dates =$row["dates"];

 
    // Display the added date
    

    if($amount>=0 && $amount<=599999)
    {
        echo "The next payment will be on ".date('Y-m-d', strtotime($dates. ' + 7 days'))." which is 1 week";
    
    }
    else if($amount>=600000 && $amount<=1199999)
    {
        echo "The next payment will be on ".date('Y-m-d', strtotime($dates. ' + 14 days'))." which is 2 weeks";
  
    }
    else if($amount>=1200000 && $amount<=1799999)
    {
        echo "The next payment will be on ".date('Y-m-d', strtotime($dates. ' + 30 days'))." which is 1 month";

    }
    else if($amount>=1800000 && $amount<=2399999)
    {
        echo "The next payment will be on ".date('Y-m-d', strtotime($dates. ' + 44 days'))." which is 1 half month";

    }
    else if($amount>=2400000 && $amount<=2999999)
    {
        echo "The next payment will be on ".date('Y-m-d', strtotime($dates. ' + 60 days'))." which is 2 months";
 
    }
    
    else if($amount>=3000000 && $amount<=3600000){
        echo "The next payment will be on ".date('Y-m-d', strtotime($dates. ' + 74 days'))." which is 2 half months";
 

    }
    else
 
    {
        echo "The next payment will be on ".date('Y-m-d', strtotime($dates. ' + 90 days'))." which is 3 months";
    }

};
}else{ 
    $msg= "Error: " . $sql . "<br>" . mysqli_error($conn);
     echo 
       //   " erro in connection " .$msg;   
      "No data yet"; 
    }
?>
</div>
<div class="col-4">




</div>

</div>
