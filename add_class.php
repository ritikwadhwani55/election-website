<?php
  session_start();
  include("connectdb.php");
?>
<!DOCTYPE html>
<!--Add class-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Add class</title>

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

input[type=text], select, textarea,file,radio {
  width: 30%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=email]{
  width: 20%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
  height: 40px;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=reset] {
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

input[type=reset]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  position:sticky;
  
}

footer{ 
    width: 100%; 
    bottom: 0px; 
    background-color: #000; 
    color: #fff; 
    position:sticky; 
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
label[for=add_stud] {
  background-color: #00CCCC;
  color:white;
  padding:12px;
  margin:7px 3px;
}
</style>

	<script type="text/javascript" src="add_class.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>


<body>

<header><div class="head">Class Council Election</div>
</header>

<br>
<br>
<?php
   $sql="select full_name from admin where admin_id=".$_SESSION['admin_id'].";";
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
    <li><a href="admin.php">HOME</a></li>
	<li><a class="active" >ADD CLASS</a></li>
    <li><a href="view_class.php">VIEW CLASS</a></li>
	<li><a href="conductelection.php">CONDUCT ELECTION</a></li>
  <li><a href="admincheckresults.php">CHECK RESULTS</a></li>
	<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
<div>

<br>

<div class="container create_a_class">
<form method="post">
    <label for="br">Branch:</label><br>
	<input type="text" name="branch" id="br" required><br>
	<span id="br1"></span><br>
  <label>Year:</label><br>
	<input type="radio" name="year" value="FE" checked required>FE
	<input type="radio" name="year" value="SE" required>SE
	<input type="radio" name="year" value="TE" required>TE
	<input type="radio" name="year" value="BE" required>BE<br><br>
  <span id="year1"></span>

    <label>Div:</label><br>
	  <input type="text" name='div' id="divi" required><br>
    <span id="divi1"></span>
    <label>Class Teacher Name:</label><br>
	<input type="text" name="teacher_name" id="teacher_name" required><br>
  <span id="teacher_name1"></span>
	<input type="submit" name="submit_class_details" value="Add Class"><br><br>
  <span id="submit_class_details1"></span>
	<!-- <input type="file" value="Bulk upload">&nbsp;&nbsp;&nbsp;&nbsp; -->
	<label for="add_stud">Add Student</label>
	</form>
  
  <?php
      if($_SERVER['REQUEST_METHOD']=='POST')
      {
        if(isset($_POST['submit_class_details']))
        {

              if(!$conn)
              {
                die("Sorry we failed to connect: ".mysqli_connect_error());
              }
              else
              {
                 $branch=$_POST['branch'];
                 $year=$_POST['year'];
                 $div=$_POST['div'];
                 $teacher_name=$_POST['teacher_name'];
                 $sql="insert into class values('$div','$branch','$year','$teacher_name')";
                 $res=mysqli_query($conn,$sql);
                 if(mysqli_affected_rows($conn)<=0)
                 {
                    echo "records not inserted";
                 }
                 else
                {
                    echo "<script>document.querySelector('#submit_class_details1').innerHTML='A new class is created successfully!'</script>";
                }
              }
        }
      }
  ?>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
  </script>
	<br>
	<br>
  <form  method="post">
	<label>Name:</label><br>
	<input type="text" name="stud_name" required><br>
  <span id="stud_name1"></span><br>
	<label>Roll Number:</label><br>
	<input type="number" name="stud_roll" required min="1"><br>
  <span id="stud_roll1"></span><br>
  <label>Division:</label><br>
  <?php
              //  include("connectdb.php");
              if(!$conn)
              {
                die("Sorry we failed to connect: ".mysqli_connect_error());
              }
              else
              {
                // echo "Connection created successfully!<br>";
                  $sql="select division from class";
                  $res=mysqli_query($conn,$sql);
                  if($res)
                  {
                    // echo "Hi <br>";
                    echo "<select name='class_fetch' id='class_fetch'><br>";
                    // echo "<option value=Select> Select </option>";
                    while($row=mysqli_fetch_row($res))
                    {
                      // echo $row[0]."<br>";
                      echo "<option value=".$row[0]." name='division' required>".$row[0]."</option>";
                    }
                  }
                  else
                  {
                    echo "sorry! cannot fetch";
                  }
                  echo "</select> <br>";
              }
  ?>
  <br>
	<label>Email:</label><br>
	<input type="email" name="stud_email" required><br>
  <span id="stud_email1"></span><br>
	Gender:&nbsp;&nbsp;<input type="radio" value='M' name="gender" required>Male
    <input type="radio" name="gender" value='F' required>Female<br>
    <span id="gender_of_stud1"></span><br>
      <label>Password:</label><br>
      <input type="text" name="pswd" id="pswd" required><br>
      <span id="pswd1"></span><br>
      <label>Confirm Password:</label><br>
      <input type="text" name="confirmpswd" id="confirmpswd" required><br>
      <span id="confirmpswd1"></span><br>
    
	&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit_student_details" value="Submit"><br>  
	
</form>
<?php
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    if(isset($_POST['submit_student_details']))
    {
      $pswd=$_POST['pswd'];
      $confirmpswd=$_POST['confirmpswd'];
      if($pswd!==$confirmpswd)
      {
          echo "<script>document.getElementById('confirmpswd1').innerHTML='** both the password field does not match!'</script>";
      }
      else
      {
        $email=$_POST['stud_email'];
        $div=$_POST['class_fetch'];
        $name=$_POST['stud_name'];
        $roll_no=$_POST['stud_roll'];
        $gender=$_POST['gender'];
        $pswd=$_POST['pswd'];
        $confirmpswd=$_POST['confirmpswd'];
        $servername="localhost";
              $username="root";
              $password="";
              $database="election_website";
              // echo $servername;
              $conn=mysqli_connect($servername,$username,$password,$database);
              if(!$conn)
              {
                die("Sorry we failed to connect: ".mysqli_connect_error());
              }
              else
              {
                // echo "Connection created successfully!<br>";
                  $sql="insert into student(email_id,password,gender,full_name,roll_no,division,admin_id) values('$email','$pswd','$gender','$name',$roll_no,'$div',".$_SESSION['admin_id'].")";
                  $res=mysqli_query($conn,$sql);
                  if(mysqli_affected_rows($conn)<=0)
                 {
                    echo "records not inserted";
                 }
                 else
                {
                    echo "<script>document.querySelector('#confirmpswd1').innerHTML='A new student is added successfully!'</script>";
                }
              }

      }
    }
  }
?>
</div>

<br>
<br>
<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>

</body>
</html>