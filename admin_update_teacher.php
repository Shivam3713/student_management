<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype'] == 'student'){
    header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="shivam";

$data=mysqli_connect($host,$user,$password, $db);
if($_GET['teacher_id']){
  $t_id= $_GET['teacher_id'];
  $sql="SELECT * FROM  teacher WHERE id= '$t_id'";
  $result=mysqli_query($data, $sql);
  $info=$result->fetch_assoc();
}

if(isset($_POST['update_teacher'])){
    $id=$_POST['id'];
    $t_name=$_POST['name'];
    $t_des=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);
    if($file){
        $sql2="UPDATE teacher SET Name='$t_name', Description = '$t_des', Image ='$dst_db' WHERE id= '$id'";
    }
    else{
        $sql2="UPDATE teacher SET Name='$t_name', Description = '$t_des' WHERE id= '$id'";
    }
    $result2=mysqli_query($data, $sql2);
    if($result2){
        header('location:admin_view_teacher.php');
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
    <title>Update Teacher Data</title>
</head>
  <style type="text/css">
    label { 
    display : inline-block;
    width: 150px;
    text-align : right;
    padding-top: 10px;
    padding-bottom: 10px;
    }
    .form_deg{
        background-color: darkorange;
        width:600px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
  </style>
<body>
<?php
    include 'admin_sidebar.php';
    
    ?>
    <div class ="content">
        <center>
        <h1>Update Teacher Data</h1>
        <form  class= "form_deg" action="admin_update_teacher.php" method="POST" enctype="multipart/form-data">
            <input type ="text" name="id" value="<?php echo "{$info['id']}"; ?>" hidden >
            <div>
                <label>Teacher name</label>
                <input type="text" name="name" value="
                <?php 
                echo "{$info['Name']}";
                ?>">
            </div>
            <div>
                <label>About teacher</label>
                <textarea name="description" rows="4">
                <?php 
                echo "{$info['Description']}";
                ?>
                </textarea>
            </div>
            <div>
                <label>Teacher Current Image</label>
                <img height="90px" width="100px"src =" <?php echo" {$info['Image']}" ?>">
            </div>
            <div>
                <label>Choose Teacher New Image</label>
                <input type ="file" name="image">
            </div>
            <div>
                <input type="submit" name="update_teacher" class="btn btn-success">
            </div>
        </form>
        </center> 
    </div>
    
</body>
</html>