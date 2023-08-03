<?php
include_once 'dbconn.php';


$sql = "SELECT * FROM ca_transactions ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
      'id'			->	$row["id"],
      'room'		->	$row["apartment"],
      'date'			->	$row["dates"]
   
    );

    echo json_encode($data);
     
    
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
