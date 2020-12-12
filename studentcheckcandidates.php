<?php
  session_start();
  include("connectdb.php");
  if(!$conn)
  {
    die("Sorry we failed to connect: ".mysqli_connect_error());
  }
?>
<!DOCTYPE html>
<!--student check candidates-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Student check candidates</title>

<style>
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

.view_winners {
	text-align: center;
	margin:10px;
}
.view_winners button {
	background-color: white;
	color:  #00CCCC;
	padding: 8px;
	margin:10px;	
	border:none;
	border-radius: 5px;
}

table ,tr,th
{

	border:1px solid grey;
	margin-left:10%;
	border-collapse: collapse;
}
th {
	width:52px;
}

footer{ 
    width: 100%; 
   
    background-color: #000; 
    color: #fff; 
    position: fixed; 
    bottom: 0px; 
    padding-top:7px; 
    padding-bottom:50px; 
    text-align:center; 
    font-size:15px; 
     
        } 
        .candidates {
  background:red;
  color:white;
  text-align:center;
}
.display_candidates {
  display:none;
}
input[type=submit] {
  color:red;
  background:white;
  padding: 8px;
  border-radius:8px;
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
    <li><a href="student.php">HOME</a></li>
	<li><a href="studentvote.php">VOTE</a></li>
    <li><a href="standforelection.php">STAND FOR ELECTION</a></li>
	<li><a class="active">CHECK CANDIDATES</a></li>
	<li><a href="studentresults.php">RESULTS</a></li>
	<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
<div>

<br>
<br>

<div class="view_winners">
	<input type="submit" name="show_candidates" onclick="show()" value="Show candidates">
</div>

<div class='display_candidates'>
    <div class='candidates'>
            <h3>BOYS CR CANDIDATES</h3>
            <hr>
            <?php
                $qu="select division from student where student_id=".$_SESSION['student_id'].";";
                $res=mysqli_query($conn,$qu);
                $class=mysqli_fetch_assoc($res);
                $sql="select s.full_name,p.about from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='CR'";
                $res1=mysqli_query($conn,$sql);
                echo "<dl class='candidates1' style='font-weight:bold;'>";
                while($row=mysqli_fetch_array($res1))
                {
                  if(!is_null($row['about']))
                  {
                    echo "<dt> ".$row['full_name']."</dt><dd> -".$row['about']."</dd><br>";
                  }
                  else
                  {
                    echo "<dt> ".$row['full_name']."</dt><dd> --</dd><br>";
                  }
                }
                echo "</dl>";
            ?>
    </div>
    <div class="candidates">
          <h3>GIRLS CR CANDIDATES</h3>
          <hr>
          <?php
              $q="select s.full_name,p.about from participant p inner join student s on p.student_id=s.student_id where s.gender='F' and s.division='".$class['division']."' and p.post='CR'";
              $res=mysqli_query($conn,$q);
              echo "<dl class='candidates1' style='font-weight:bold;'>";
              while($r=mysqli_fetch_assoc($res))
              {
                if(!is_null($r['about']))
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> -".$r['about']."</dd><br>";
                }
                else
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> --</dd><br>";
                }
              }
              echo "</dl>";
          ?>
    </div>
    <div class="candidates">
          <h3>BOYS CI CANDIDATES</h3>
          <hr>
          <?php
              $q="select s.full_name,p.about from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='CI'";
              $res=mysqli_query($conn,$q);
              echo "<dl class='candidates1' style='font-weight:bold;'>";
              while($r=mysqli_fetch_assoc($res))
              {
                if(!is_null($r['about']))
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> -".$r['about']."</dd><br>";
                }
                else
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> --</dd><br>";
                }
              }
              echo "</dl>";
          ?>
    </div>
    <div class="candidates">
          <h3>GIRLS CI CANDIDATES</h3>
          <hr>
          <?php
              $q="select s.full_name,p.about from participant p inner join student s on p.student_id=s.student_id where s.gender='F' and s.division='".$class['division']."' and p.post='CI'";
              $res=mysqli_query($conn,$q);
              echo "<dl class='candidates1' style='font-weight:bold;'>";
              while($r=mysqli_fetch_assoc($res))
              {
                if(!is_null($r['about']))
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> -".$r['about']."</dd><br>";
                }
                else
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> --</dd><br>";
                }
              }
              echo "</dl>";
          ?>
    </div>
    <div class="candidates">
          <h3>BOYS SORT CANDIDATES</h3>
          <hr>
          <?php
              $q="select s.full_name,p.about from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SORT'";
              $res=mysqli_query($conn,$q);
              echo "<dl class='candidates1' style='font-weight:bold;'>";
              while($r=mysqli_fetch_assoc($res))
              {
                if(!is_null($r['about']))
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> -".$r['about']."</dd><br>";
                }
                else
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> --</dd><br>";
                }
              }
              echo "</dl>";
          ?>
    </div>
    <div class="candidates">
          <h3>GIRLS SORT CANDIDATES</h3>
          <hr>
          <?php
              $q="select s.full_name,p.about from participant p inner join student s on p.student_id=s.student_id where s.gender='F' and s.division='".$class['division']."' and p.post='SORT'";
              $res=mysqli_query($conn,$q);
              echo "<dl class='candidates1' style='font-weight:bold;'>";
              while($r=mysqli_fetch_assoc($res))
              {
                if(!is_null($r['about']))
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> -".$r['about']."</dd><br>";
                }
                else
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> --</dd><br>";
                }
              }
              echo "</dl>";
          ?>
    </div>
    <div class="candidates">
          <h3>BOYS SPORTS CANDIDATES</h3>
          <hr>
          <?php
              $q="select s.full_name,p.about from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SPORTS'";
              $res=mysqli_query($conn,$q);
              echo "<dl class='candidates1' style='font-weight:bold;'>";
              while($r=mysqli_fetch_assoc($res))
              {
                if(!is_null($r['about']))
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> -".$r['about']."</dd><br>";
                }
                else
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> --</dd><br>";
                }
              }
              echo "</dl>";
          ?>
    </div>
    <div class="candidates">
          <h3>GIRLS SPORTS CANDIDATES</h3>
          <hr>
          <?php
              $q="select s.full_name,p.about from participant p inner join student s on p.student_id=s.student_id where s.gender='F' and s.division='".$class['division']."' and p.post='SPORTS'";
              $res=mysqli_query($conn,$q);
              echo "<dl class='candidates1' style='font-weight:bold;'>";
              while($r=mysqli_fetch_assoc($res))
              {
                if(!is_null($r['about']))
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> -".$r['about']."</dd><br>";
                }
                else
                {
                  echo "<dt> ".$r['full_name']."</dt><dd> --</dd><br>";
                }
              }
              echo "</dl>";
          ?>
    </div>
</div>


<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>

<script>
  function show()
  {
    document.querySelector('.display_candidates').style.display="block";
  }
</script>
</body>
</html>