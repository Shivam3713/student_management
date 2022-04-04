<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype'] == 'student'){
    header("location:login.php");
}
$host ="localhost";
$user ="root";
$password ="";
$db="shivam";

$data = mysqli_connect($host,$user,$password, $db);
if(isset($_POST['add_teacher'])){
    $t_name=$_POST['name'];
    $t_description=$_POST['description'];
    $file= $_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);
    $sql="INSERT INTO teacher(Name, DEscription, Image) 
    VALUES('$t_name', '$t_description', '$dst_db')";
    $result=mysqli_query($data, $sql);
    if($result){
        header('location:admin_add_teacher.php');
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
   include 'admin_css.php';
   ?>
    <title>Add teacher</title>
</head>
<body>
    <style type="text/css">
        .div_deg{
            background-color: skyblue;
            padding-top:50px;
            padding-bottom:50px;
            width: 500px;
        }
    </style>
<?php
    include 'admin_sidebar.php';
    ?>
    <div class ="content">
        <h1>Add teacher</h1>
        <center>
        <div class ="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Teacher Name :</label>
                    <input type="text" name="name">
                </div>
                <br><br>
                <div>
                    <label>Teacher DEscription :</label>
                    <textarea name="description"></textarea>
                </div>
                <br><br>
                <div>
                    <label>Teacher Image :</label>
                    <input type="file" name="image">
                </div>
                <br><br>
                <div>
                    <input type="submit" name="add_teacher" value="Add Teacher" class="btn btn-success">
                </div>
            </form>

        </div>
        </center>
        
    </div>
    
</body>
</html>