<?php 
 session_start();
 include("connectdb.php");
   if(!$conn)
   {
     die("Sorry we failed to connect: ".mysqli_connect_error());
   } 
?>
<!DOCTYPE html>
<!--edit profile-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Edit profile</title>

<style>

body{
    background-color: #00CCCC;
    margin: 0px;
    padding: 0px;
}

.head{ 
    font-size: 40px; 
    color: white; 
    font-weight: bold;
    position:fixed;	
}

.menu{
    width: 100%;
    height: 50px;
    background-repeat: no-repeat;
    background-size: cover;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    background-color: #ffffff;
    box-shadow: 2px 2px 12px rgba(0,0,0,0.2);
    padding: 0px 5%;
	position: sticky;
	
}

ul {
    list-style: none;
	 
}


nav ul li {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 10px 10px;
  text-decoration: none;
  font-size: 17px;
}

li a{
text-decoration: none;

}

nav ul {
    display: flex;
	
}

nav ul li a{
    margin: 30px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: #505050;
    font-size: 15px;
    font-weight: 700;

}

.menu nav ul li a:hover {
  background-color:#00CCCC;
  color: black;
 
}

.menu a.active {
  background-color: white;
  color: black;
  text-decoration:underline;
  pointer-events: none;
}

li {
  border-right: 1px solid #bbb;
}

li:last-child {
  border-right: none;
}


input[type=text], select, textarea,file {
  width: 60%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

footer{ 
    width: 100%; 
    bottom: 0px; 
    background-color: #000; 
    color: #fff; 
    position: absolute; 
    padding-top:7px; 
    padding-bottom:50px; 
    text-align:center; 
    font-size:15px; 
     
        }
  span.dot {
  width:15px;
  height:15px;
  border-radius:19px;
  background: green;
  display:inline-block;
  margin-top: 3px;
  margin-right:3px;
}
div.name {
  float:right;
  clear:right;
  /* margin:10px; */
} 
</style>
</head>


<body>

<header><div class="head">Class Council Election</div>
</header>

<br>
<br>
<br>
<?php
   $sql="select full_name from student where student_id=".$_SESSION['student_id'].";";
   $res=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($res);
   echo "<div class='name' style='text-align:center;background-color:white;padding:3px;width:160px;'><span class='dot'></span>".$row['full_name']."</div>"; 
?>
<br>
<br>
<hr>

<div class="menu">
<nav>
<p>VIVEKANAND EDUCATION SOCIETY'S<br> Institute of Technology</p>
<ul>
    <li><a href="representative.php">HOME</a></li>
	<li><a href="repvote.php">VOTE</a></li>
    <li><a class="active">EDIT PROFILE</a></li>
	<li><a href="repcheckcandidates.php">CHECK CANDIDATES</a></li>
	<li><a href="represults.php">RESULTS</a></li>
	<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
<div>

<br>
<br>

<div class="container">
<form method="post" action="" enctype="multipart/form-data">
    
	<label for="description">Give a small description on why you want to be on this post:</label>
	<br>
    <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>
    <span id="123"></span>
<br>

    <!-- <label for="photo">Add your photo:</label>
    <input type="file" id="photo" name="photo" required> -->
	
	<br>
  <br>
    <input type="submit" name="done" value="Done">
    <?php 
        $msg="";
        //if($_SERVER['REQUEST_METHOD']=='POST')
        if(isset($_POST['done']))
        {
         
          $email=$_SESSION['email'];
          $pswd=$_SESSION['password'];
          $p_id=(int)$_SESSION['participant_id'];
          $about=$_POST['description'];
          echo "<script>document.getElementById('123').innerHTML='$p_id'</script>";
          // $conn=mysqli_connect($servername,$username,$password,$database);
          if(!$conn)
          {
            die("Sorry we failed to connect: ".mysqli_connect_error());
          }
          else
          {
            // $target_dir='images/';
            // // echo $target_dir;
            // $target_file=$target_dir. basename($_FILES["file"]);
            // echo $target_file;
            // move_uploaded_file($_POST['photo'], $target_file);
            // $blob=fopen($target_file,"rb");
            // echo $blob;
            $filename=$_FILES["photo"]["name"];
            $tempname=mysqli_real_escape_string($conn,file_get_contents($_FILES["photo"]["tmp_name"]));
            $filetype=$_FILES["photo"]["type"];
            $folder="images/".$filename;
            // echo $_SESSION['participant_id'];
            $sql="update participant set about='$about', profile_pic='$tempname',img_name='$filename',img_type='$filetype' where participant_id=".$p_id;
            $res2=mysqli_query($conn,$sql);
            if($row=mysqli_affected_rows($conn))
            {
              echo "<script>window.alert('Profile updated successfully!')</script>";
               echo "<script>
                      window.location = 'http://localhost:8080/ritik/election%20website/representative.php';
                            </script>";
            }
            else
            {
              echo "<script>window.alert('Can't update profile, please try again later!')</script>";  
            }
          }
        }
    ?>
	
</form>
</div>

<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>

</body>
</html>
