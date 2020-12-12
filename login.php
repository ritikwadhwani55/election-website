<?php
	session_start();
	include("connectdb.php");
?>
<!DOCTYPE html>
<!--login page-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Login Page</title>
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
    margin-bottom:9px;
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
  /* margin:2px; */
	
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

footer{ 
    width: 100%; 
    bottom: 0px; 
    background-color: #000; 
    color: #fff; 
    position: fixed; 
    padding-top:7px; 
    padding-bottom:50px; 
    text-align:center; 
    font-size:15px; 
     
    } 
}
.modalBtn {
	background-color:red;
	color:white;
	padding:5px 10px;
	border:none;
	font-family: sans-serif;
	font-size:18px;
	margin:15px;
}
div.modal
{
	/* position:absolute;
	top:0;
	left:0; */
	background-color:white;
	width:30%;
	height:38%;
	/* padding:10px; */
	/* opacity:0.7; */
	display:flex;
	flex-direction:column;
    justify-content: space-around;
	align-items: center;
	position: relative;
}
div.modal form {
	display:flex;
	flex-direction:column;
	justify-content:space-around;
	align-items: center;
	/* padding:10px; */
	transition: visibility 0s opacity 0.5s;
	/* position:relative;  */
}
.bgactive {
	visibility:visible;
	opacity:0.5;

}
div.myModal {
	width:100%;
	height:100vh;
	opacity:1;
	position:fixed;
	top:0;
	left:0;
	background-color: rgba(0,0,0,0.5);
	opacity:1;
	display:flex;
	justify-content:center;
	align-items:center;
	visibility: hidden;
	/* opacity:0;  */
}
input[type=submit] {
	background-color:red;
	color:white;
	padding:5px 10px;
	border:none;
	font-family: sans-serif;
	font-size:18px;
	margin:15px;
}
.modalBtn {
	background-color:red;
	color:white;
	padding:7px 12px;
	border:none;
	font-family: sans-serif;
	font-size:20px;
	/* margin:15px; */
	display: block;
	margin:100px auto;
}
.close {
	position:absolute;
	top:10px;
	right:10px;
	cursor:pointer;
}
</style>
</head>

<body>
<header><div class="head">Class Council Election</div>
</header>

<br>
<br>
<br>
<hr>

<div class="menu">
<nav>
<p>VIVEKANAND EDUCATION SOCIETY'S<br> Institute of Technology</p>
<ul>
    <li><a href="index.php">MAIN</a></li>
	<li><a class="active">LOGIN</a></li>
    <!-- <li><a href="departments.php">DEPARTMENTS</a></li> -->
	<li><a href="aboutus.php">ABOUT US</a></li>
	
</ul>
</nav>
</div>
<button type="button" class="modalBtn">Login</button>
<div class="myModal">
	<div class="modal">
		<h2>Login Here</h2>
		<form method="post">
		<label>Email:&nbsp;&nbsp;</label><br><input type="text" placeholder="Enter your VESIT email id" name="email" required><br>
		<label>Password:</label><br>
		<input type="password" placeholder="Enter password" name="pswd" required>
		<input type="submit" value="Submit">
		<span class="close">X</span>	
	</form>
		
	</div>
</div>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		
		$email=$_POST['email'];
		$pswd=$_POST['pswd'];
		// $conn=mysqli_connect($servername,$username,$password,$database);
		if(!$conn)
		{
			die("Sorry we failed to connect: ".mysqli_connect_error());
		}
		else
		{
			// echo "Connection created successfully!<br>";
			$sql="select admin_id,email_id,password from admin where email_id='$email' and password='$pswd'";
			$res=mysqli_query($conn,$sql);
			if($row=mysqli_fetch_all($res))
			{
				$_SESSION['email']=$email;
				$_SESSION['password']=$pswd;
				$_SESSION['admin_id']=$row[0][0];
				echo "<script>window.alert('Admin successfully logged in!')</script>";
				echo "<script>
                        window.location = 'http://localhost:8080/ritik/election%20website/admin.php';
                        </script>";
			}
			else
			{
				$sql="select email_id,password,student_id,participant_id from participant_details where email_id='$email' and password='$pswd'";
				$res1=mysqli_query($conn,$sql);
				if($row=mysqli_fetch_all($res1))
				{
					$_SESSION['email']=$email;
					$_SESSION['password']=$pswd;
					echo var_dump($row);
					$_SESSION['participant_id']=$row[0][3];
					$_SESSION['student_id']=$row[0][2];
					echo var_dump($_SESSION);
				/*echo "<script>console.log(".$row[0].")</script>";*/
					// console.log($_SESSION['participant_id']);
				echo "<script>window.alert('Participant successfully logged in!')</script>";
				echo "<script>
                        window.location.href = 'representative.php';
                        </script>";
				}
				else
				{
					$sql="select student_id,email_id,password from student where email_id='$email' and password='$pswd'";
					$res=mysqli_query($conn,$sql);
					if($row=mysqli_fetch_all($res))
					{
						$_SESSION['email']=$email;
						$_SESSION['password']=$pswd;
						$_SESSION['student_id']=$row[0][0];
						echo "<script>window.alert('Student successfully logged in!')</script>";
						echo "<script>
		                        window.location = 'http://localhost:8080/ritik/election%20website/student.php';
		                        </script>";
					}
					else
					{
						echo "<script>window.alert('Invalid email id or password!')</script>";
					}
				}
			}

		}
	}
?>
<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>
<script>
	var myModal= document.querySelector(".myModal");
	var modalBtn =document.querySelector(".modalBtn");
	modalBtn.addEventListener('click', function() {
		myModal.classList.add("bgactive");
		// alert("hello");
		console.log(myModal);
		document.querySelector(".myModal").style.visibility="visible";
	});
	document.querySelector(".close").addEventListener("click", function() {
		document.querySelector(".myModal").style.visibility="hidden";
	});
</script>
</body>
</html>