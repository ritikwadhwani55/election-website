<?php
  session_start();
  include("connectdb.php");
    if(!$conn)
    {
      die("Sorry we failed to connect: ".mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<!--view class-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>View class</title>

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
    div.view {
      text-align:center;
      margin-bottom:17px;
    }
    select {
      font-size:20px;
      width:150px;
    }
    option {
      padding:5px 10px;
      font-size:18px;
      width:150px;
    }
    input[type=submit] {
      margin:5px;
      color: #00CCCC;
      background-color:white;
      padding:5px 8px;
      border-radius: 7px;
    }
    label {
      font-size:20px;
    }
    table {
      width:90%;
      margin:auto;
    }
    th,td,tr,table {
      border: 1px solid grey;
      border-collapse:collapse;
      text-align:center;
    }
    th {
      background-color:black;
      color:white;
    }
    tr {
      background-color:white;
      color:black;
      font-weight:bold;
    }
    /* tr:nth-child(even) {
      background-color:white;
      color:black;
    } */
    @media (max-width:1200px)
    {
        nav p {
          font-size:16px;
        } 
        nav ul li {
          padding:5px 5px;
        }
    }
    /* @media min-width(992px) and (max-width:1999px)
    {
      nav ul li {
        padding:3px 3px;
        font-size:12px;
      }
    }
    @media screen and (max-width:1200px)
    {
      nav {
        display:flex;
        margin:auto;
        flex-direction:column;
      }
      nav p{
        margin-bottom:7px;
      }
      nav ul{
        display:flex;
        flex-direction:column;
        /* display:block; 
        background-color:white;
        margin:0;
        width:100%;

      }
    } */
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
	<li><a href="add_class.php">ADD CLASS</a></li>
    <li><a class="active">VIEW CLASS</a></li>
	<li><a href="conductelection.php">CONDUCT ELECTION</a></li>
  <li><a href="admincheckresults.php">CHECK RESULTS</a></li>
	<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
</div>

<br>
<br>

	<div class="view">
    <form method='POST'>
		<label>View Class:</label><br>
    <?php
           
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
		<input type="submit" value="Show">
    </form>
    </div>
    <?php
      if($_SERVER['REQUEST_METHOD']=='POST')
      {
          $div=$_POST['class_fetch'];
          $sql="select student_id,email_id,gender,full_name,roll_no from student where division='$div'";
          $res=mysqli_query($conn,$sql);
          echo "<table class='tb' width:'90%'><tr><th>STUDENT ID</th><th>FULL NAME</th><th>EMAIL</th><th>GENDER</th><th>ROLL NUMBER</th>";
          while($row=mysqli_fetch_array($res))
          {
            echo "<tr><td>".$row['student_id']."</td><td>".$row['full_name']."</td><td>".$row['email_id']."</td><td>".$row['gender']."</td><td>".$row['roll_no']."</td>";

          }
      }
    ?>
            
<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>

</body>
</html>