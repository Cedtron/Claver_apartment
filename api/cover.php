
<?php
include_once 'dbconn.php';


$target_dir = "cover/";
$target_file = $target_dir . basename($_FILES["cover1"]["name"]);
$target_file2 = $target_dir . basename($_FILES["cover2"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
If(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    If($check !== false) {
        Echo "File is an image – " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        Echo "File is not an image.";
        $uploadOk = 0;
    } 
}

// Check if file already exists
If ((file_exists($target_file)) && (file_exists($target_file2))) {
    Echo "Sorry, file already exists.";
    $uploadOk = 0;
}
 //Check file size
else If (($_FILES["cover1"]["size"] > 50000000) && ($_FILES["cover2"]["size"] > 50000000) ){
    Echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
else If(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) && ($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif" )) {
    Echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
else If ($uploadOk == 0) {
    Echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    If ((move_uploaded_file($_FILES["cover1"]["tmp_name"], $target_file)) && (move_uploaded_file($_FILES["cover2"]["tmp_name"], $target_file2)) ){


$nt=$_POST['comment'];
 $bl= htmlentities($nt);
$image=$_FILES["cover1"]["name"]; 
              $img="cover/".$_FILES["cover1"]["name"];
$pic=$_FILES["cover2"]["name"]; 
              $pix="cover/".$_FILES["cover2"]["name"];

 $sql = "UPDATE `cover` SET
           `img1`='$img' ,`img2` = '$pix' ,`details` = '$bl' WHERE `Id` = 1";

    // $sql = "INSERT INTO cover (img1,img2,details)
    //         VALUES ('$img','$pix','$bl')";

    if (mysqli_query($conn, $sql)) {
       
        
        ?>
        <script type="text/javascript">
        alert("The upload was successful");
        window.location.href = "http://claverapartment.com/dashboard.php";
        </script>
        <?php
        
        
        ;
      } else {
             $msg= "Error: " . $sql . "<br>" . mysqli_error($conn);
echo   $msg ."Gwe";
        ?>
        <script type="text/javascript">
        alert("The upload failed");
        window.location.href = "http://claverapartment.com/dashboard.php";
        </script>
        <?php
    

};
  
  mysqli_close($conn);
};
};


?>