<?php
error_reporting(0);
session_start();
session_destroy();
if($_SESSION['message']){
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}
$host ="localhost";
$user ="root";
$password ="";
$db="shivam";

$data = mysqli_connect($host,$user,$password, $db);
$sql="SELECT * FROM teacher";
$result= mysqli_query($data, $sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lovely Professional University</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <nav >
        <label class ="logo"> WEB school </label>
        <ul>
            <li><a href ="">Home</a></li>
            <li><a href ="">Contact</a></li>
            <li><a href ="">Admission</a></li>
            <li><a href ="login.php" class="btn btn-success">Login</a></li>
        </ul>
</naV> 
<div class="section1">
<label class ="img_text">IMPARTING KNOWLEDGE WITH FUN</label>
    <img class ="main_img" src= "school_management.jpg">
</div>    
<div class = "container">
    <div class= "row">
        <div class = "col-md-4">
            <img class= "welcome_img" src= "https://qph.fs.quoracdn.net/main-qimg-17e121089e41968c7aab2520471ed218">
            <div class ="col-md-8">
                <h1>WELCOME TO WEB SCHOOL</h1>
                <p>"WEB is easily accessible as it is located on the Jalandhar-Delhi G.T. Road, (Punjab) and is well 
                connected by rail and road; having a reasonable distance from the airports, bus stands, railway stations etc."
                </p>
            </div>
        </div>
    </div>
</div>
<center>
    <h1>Our Teacher</h1>
</center>
<div class="container">
    <div class="row">
    <?php
        while($info=$result->fetch_assoc()){
    ?>
        <div class="col-md-4">
            <img class ="teacher" src="<?php echo "{$info['Image']}" ?>">
            <h3><?php echo "{$info['Name']}" ?></h3>
            <h5><?php echo "{$info['Description']}" ?></h5>
        </div>
    <?php
    }
    ?>
            
    </div>
</div> 

<center>
    <h1>Our Courses</h1>
</center>
<div class="container">
    <div class="roq">
        <div class="col-md-4">
            <img class ="teacher" src="web.jpg">
            <h3>Web development</h3>
        </div>
            <div class="col-md-4">
                <img class ="teacher" src="graphic.jpg">
                <h3>Competitive Programming</h3>
            </div>
                <div class="col-md-4">
                    <img class ="teacher" src="marketing.png">
                    <h3>Marketing</h3>
                </div>
    </div>
</div> 
<center> 
   <h1 class ="adm"> Admission Form </h1>
<div align="center class="admission_form">
<form action="data_check.php" method= "POST">
    <div class ="adm_int">
        <label class =" label_text"> Name</label>
        <input class ="input_deg" type= "text" name="name">
    </div>
    <div class ="adm_int">
        <label class =" label_text"> E-mail</label>
        <input class ="input_deg" type= "text" name="email">
    </div>
    <div class ="adm_int">
        <label class =" label_text">Phone</label>
        <input class ="input_deg" type= "text" name="phone">
    </div>
    <div class ="adm_int">
        <label class =" label_text"> Message</label>
        <textarea class ="input_txt" name="message"></textarea>
    </div>
    <div >
        <input class ="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
    </div>
</form>
</div>
</center>
<footer>
    <h3 class= "footer_txt">All copyright  reserved under my project</h3>
</footer>
             
</body>
</html>