
<?php
include_once 'dbconn.php';

$target_dir = "gallery/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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
If (file_exists($target_file)) {
    Echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
If ($_FILES["img"]["size"] > 50000000) {
    Echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
If($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    Echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
If ($uploadOk == 0) {
    Echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    If (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {


$tit=$_POST['title'];
 $title= htmlentities($tit);
 $com=$_POST['comment'];
 $comm= htmlentities($com);

  
$image=$_FILES["img"]["name"]; 
              $img="gallery/".$_FILES["img"]["name"];

   $sql = "INSERT INTO gallery (imagex,title,comment,dates)
            VALUES ('$img','$title','$comm',CURDATE())";


if (mysqli_query($conn, $sql)) {
    echo " ";
    
    ?>
    <script type="text/javascript">
    alert("The upload was successful");
    window.location.href = "http://claverapartment.com/dimage.php";
    </script>
    <?php
    
    
    ;
  } else {
         $msg= "Error: " . $sql . "<br>" . mysqli_error($conn);
echo   $msg ;
    ?>
    <script type="text/javascript">
    alert("The upload failed");
    window.location.href = "http://claverapartment.com/dimage.php";
    </script>
    <?php


};

mysqli_close($conn);
};
};


?>