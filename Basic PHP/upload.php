<?php
if(isset($_POST["imageBtn"])){
  $fileName=$_FILES["file"]["name"];
  $fileTmpName=$_FILES["file"]["tmp_name"];
    $uploadPath= "forest.png";
      
    unlink("forest.png");
    if(move_uploaded_file($fileTmpName,$uploadPath)){
        echo 'Successful image upload<a href="index.php">To home</a>';
      }
    else{
        echo "Can only upload a png file.";
     }
}
?>

<?php
if(isset($_POST["csvBtn"])){
  $fileName=$_FILES["file"]["name"];
  $fileTmpName=$_FILES["file"]["tmp_name"];
    $uploadPath= "std.csv";
      
    unlink("std.csv");
    if(move_uploaded_file($fileTmpName,$uploadPath)){
        echo 'Successful csv upload<a href="index.php">To home</a>';
      }
    else{
        echo "Can only upload a csv file.";
     }
}
?>