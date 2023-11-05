<?php
$target_dir = "uploads-ad/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is a real file - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an real file.";
	echo '<a href="index.html">   [Back to home plese dont hack?]</a>';
    $uploadOk = 0;
  }
} 

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  echo '<a href="index.html">   [Back to home?]</a>';

  } else {
    echo "Sorry, there was an error uploading your file.";
	echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  }
}
?>