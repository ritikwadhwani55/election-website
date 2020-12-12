<?php
  session_start();
  include("connectdb.php");
          if(!$conn)
          {
            die("Sorry we failed to connect: ".mysqli_connect_error());
          }
?>
<!DOCTYPE html>
<!--student home page-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Student home Page</title>

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
label {
  position:sticky;
  text-align:right;
  float:right;
  clear:left;
  right:0;
}

footer{ 
    width: 100%; 
    bottom: 0px; 
    background-color: #000; 
    color: #fff; 
    position:fixed; 
    padding-top:7px; 
    padding-bottom:50px; 
    text-align:center; 
    font-size:15px; 
     
        } 
div.name {
  float:right;
  clear:right;
  /* margin:10px; */
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
.welcome {
  text-align:center;
} 
</style>
</head>


<body>

<header><div class="head">Class Council Election</div>
</header>

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
    <li><a class="active">HOME</a></li>
	<li><a href="studentvote.php">VOTE</a></li>
    <li><a href="standforelection.php">STAND FOR ELECTION</a></li>
	<li><a href="studentcheckcandidates.php">CHECK CANDIDATES</a></li>
	<li><a href="studentresults.php">RESULTS</a></li>
	<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
</div>

<br>
<br>
<h1 class='welcome'>
<?php
  echo "Welcome ".$row['full_name']."!";
?>
</h1>

<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>


</body>
</html>