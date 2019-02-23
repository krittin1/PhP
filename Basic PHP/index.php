<?php
    if(isset($_POST['submit'])){
        
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $level = $_POST['level'];
        $course = $_POST['course'];
        $section = $_POST['section'];
        $file = 'table.csv';
        $current = file_get_contents($file);
        $current .= $id.",".$name.",".$age.",".$level.",".$course.",".$section."\n";
        
        file_put_contents($file, $current);
        
    }

    
?>




<?php

$idErr = $nameErr = $ageErr = $levelErr =  $courseErr = $sectionErr = "";
$id = $name = $age = $level = $course = $section = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["id"])) {
    $idErr = "ID is required";
  } else {
    $id = test_input($_POST["id"]);
  }
  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
    
  if (empty($_POST["age"])) {
    $age = "";
  } else {
    $age = test_input($_POST["age"]);
  }
   
  if (empty($_POST["level"])) {
    $level = "";
  } else {
    $level = test_input($_POST["level"]);
  }

  if (empty($_POST["course"])) {
    $course = "";
  } else {
    $course = test_input($_POST["course"]);
  }

  if (empty($_POST["section"])) {
    $sectionErr = "Section is required";
  } else {
    $section = test_input($_POST["section"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>my PHP homeworks </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
          .error {color: #FF0000;}
    </style>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

</head>
<body >

<nav class="navbar navbar-inverse navbar-fixed-top" >

  <div class="container-fluid">

    <div class="navbar-header">
  
      <a class="navbar-brand" href="#">PHP Unicorn</a>
      <i class='fas fa-horse-head' style='font-size:48px;color:salmon'></i>
      &nbsp
    </div>
    
    <ul class="nav navbar-nav">
    
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
     
    </ul>
  </div>
</nav>


    <br><br><br>
    
   <center><h1>Hello PHP</h1></center>

   <center><?php
           echo "My first php home page!";
           
    ?> </center>
    <hr>

    <?php
             $objCSV = fopen("table.csv", "r");
             
     ?>
<section id="show-table">
<center><table class="baa" width="600" border="1"></center>



<tr>
<th width="198"> <div align="center">ID </div></th>
<th width="298"> <div align="center">Name </div></th>
<th width="198"> <div align="center">Age </div></th>
<th width="198"> <div align="center">Level</div></th>
<th width="198"> <div align="center">Course </div></th>
<th width="198"> <div align="center">Section </div></th>
</tr>

<?php
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
   ?>

  <tr>
  <td><div align="center"><?php echo $objArr[0];?></div></td>
  <td><div align="center"><?php echo $objArr[1];?></td>
  <td><div align="center"><?php echo $objArr[2];?></td>
  <td><div align="center"><?php echo $objArr[3];?></div></td>
  <td align="center"><?php echo $objArr[4];?></td>
  <td align="center"><?php echo $objArr[5];?></td>
  </tr></section>
  

        <?php
          }
            fclose($objCSV);
         ?>
</table>
</section>


         <center>
            <button id="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-th"></span> Show Table  
            </button>
        </center>


        <script>
           $(document).ready(function() {
           $('#show-table').hide();
           $('#button').click(function(){
           $('#show-table').toggle();
                    })

             });
        </script>
    

   
<center>
<br><br><br><br>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  ID: <input type="text" name="id">
  <span class="error">* <?php echo $idErr;?></span>
  <br><br>
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Age: <input type="text" name="age">
  <span class="error"><?php echo $ageErr;?></span>
  <br><br>
  Level: <input type="text" name="level">
  <span class="error"><?php echo $levelErr;?></span>
  <br><br>
  Course: <input type="text" name="course">
  <span class="error"><?php echo $courseErr;?></span>
  <br><br>
  Section: <input type="text" name="section">
  <span class="error"><?php echo $sectionErr;?></span>
  <br><br>
  <br><br>
  <input type="submit" name="submit" value="Submit"  class="btn btn-info" >  
</form>

<?php


?>
<br>
<form action="table.csv" >
  
     <input type="submit" value="Download CSV"  class="btn btn-success"  class="glyphicon glyphicon-download-alt"  >
    
  </form>

  




              <br><br>
            <form action="upload.php" method="post" enctype="multipart/form-data" name="form1">
<input type="file" name="file" id="file"  ><br>
<input type="submit" name="imageBtn" id="imageBtn" value="Upload image" class="btn btn-success" >
<input type="submit" name="csvBtn" id="csvBtn" value="Upload csv"  class="btn btn-secondary">
</form>



<br>
<br>
<br><br><br>









  

</center>
</body>
</html>