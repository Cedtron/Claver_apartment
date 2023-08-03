<?php

$admins = "CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,

  `user` varchar(20) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `scode`varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
)";
  
  if (mysqli_query($conn, $admins)) {
    $er= "Table Admin created successfully";

        $sql = "INSERT INTO `admins` (`id`, `user`, `pass`, `scode`) VALUES
        (1, 'cedo', 'Allan', 'web')";
        
        if (mysqli_query($conn, $sql)) {
          $er= "New user created successfully ";
        } else {
          $er= "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


  } else {
    $er= "Error creating table: " . mysqli_error($conn);
  }

  $sql_cover = "CREATE TABLE IF NOT EXISTS cover (
    id INT AUTO_INCREMENT PRIMARY KEY,
    img1 VARCHAR(255),
    img2 VARCHAR(255),
    details TEXT
)";
  // SQL queries for table creation
  $sql_booking = "CREATE TABLE booking (
      id INT AUTO_INCREMENT PRIMARY KEY,
      nam VARCHAR(255),
      email VARCHAR(255),
      tel VARCHAR(20),
      apartment VARCHAR(100),
      information TEXT,
      dates DATE
  )";
  
  $sql_gallery = "CREATE TABLE gallery (
      id INT AUTO_INCREMENT PRIMARY KEY,
      imagex VARCHAR(255),
      title VARCHAR(255),
      comment TEXT,
      dates VARCHAR(100)
  )";
  
  $sql_ca_transactions = "CREATE TABLE ca_transactions (
      id INT AUTO_INCREMENT PRIMARY KEY,
      apartment VARCHAR(100),
      names VARCHAR(255),
      email VARCHAR(255),
      tel VARCHAR(20),
      amount DECIMAL(10, 2),
      reason TEXT,
      reference VARCHAR(100),
      dates VARCHAR(10)
  )";
  
  // Execute the queries


  if ($conn->query($sql_booking) === TRUE) {
      echo "Table 'booking' created successfully<br>";
  } else {
      $echo= "Error creating table: " . $conn->error . "<br>";
  }
  
  if ($conn->query($sql_gallery) === TRUE) {
      echo "Table 'gallery' created successfully<br>";
  } else {
      $echo= "Error creating table: " . $conn->error . "<br>";
  }
  
  if ($conn->query($sql_ca_transactions) === TRUE) {
      echo "Table 'ca_transactions' created successfully<br>";
  } else {
      $echo= "Error creating table: " . $conn->error . "<br>";
  }
  

  
// Execute the query to create the table
if ($conn->query($sql_cover) === TRUE) {
    $echo= "Table 'cover' created successfully<br>";
} else {
    $echo= "Error creating table: " . $conn->error . "<br>";
}

// Sample data to be inserted
$img1_value = "cover/silda1.jpg";
$img2_value = "cover/silde2.jpg";
$details_value = "The best apartments.";

// Check if data already exists in the table
$sql_check_data = "SELECT COUNT(*) AS count FROM cover";
$result = $conn->query($sql_check_data);
$row = $result->fetch_assoc();
$count = $row['count'];

if ($count === 0) {
    // SQL query for data insertion
    $sql_insert_data = "INSERT INTO cover (img1, img2, details) VALUES ('$img1_value', '$img2_value', '$details_value')";

    // Execute the query to insert data
    if ($conn->query($sql_insert_data) === TRUE) {
        echo "Data inserted into 'cover' table successfully";
    } else {
        $echo= "Error inserting data: " . $conn->error;
    }
} else {
    $echo= "Data already exists in 'cover' table";
}
  // Close the connection

  ?>
  