<?php
  session_start();
  include("connectdb.php");
    if(!$conn)
    {
      die("Sorry we failed to connect: ".mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<!--admin home page-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Admin home Page</title>

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
p.ok {
  margin:250px;
}
div.timer {
  text-align:center;
}
input[type=submit] {
  background-color:red;
  color:white;
  padding:7px 10px;
  margin:5px;
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
    <li><a href="view_class.php">VIEW CLASS</a></li>
	<li><a class="active">CONDUCT ELECTION</a></li>
  <li><a href="admincheckresults.php">CHECK RESULTS</a></li>
	<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
</div>

<?php 
  // $sql="select date_id,start_time+0,end_time+0 from timer";
  // $res=mysqli_query($conn,$sql);
  // $row=mysqli_fetch_array($res);
  // echo var_dump($row);
  // $start=$row['start_time+0'];
  // $end=$row['end_time+0'];
  // $q="select curtime()+0";
  // $result=mysqli_query($conn,$q);
  // $row1=mysqli_fetch_assoc($result);
  // echo var_dump($row1);
  // $cur_time=$row1['curtime()+0'];
  // echo $cur_time;
  // date_default_timezone_set('Asia/Kolkata');
  //           // echo date('d-m-Y');
  // if($row['date_id']==date("Y-m-d"))
  // {
  //   if((int)$cur_time>=(int)$start && (int)$cur_time<(int)$end)
  //   {

  //     echo "you can vote now!";
  //   }
  //   else
  //   {
  //     echo "you can't vote";
  //   }
  // }
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    $date=$_POST['date_of_election'];
    $start_time=$_POST['start_time'];
    $end=$_POST['end_time'];
    echo "<h1 style='margin:50px;'></h1>";
    // echo var_dump($date);
    // echo var_dump($start_time);
    // echo var_dump($end);
    // $stime = $_POST['stime'];
    // $strt_time = date('h:i', strtotime($start_time));
    // echo $strt_time;
    // $end_time= date('h:i',strtotime($end));
    // echo $end_time;
    $sql="delete from timer";
    $r=mysqli_query($conn,$sql);
    if($r)
    {
      $query="insert into timer values('$date','$start_time','$end')";
      $res=mysqli_query($conn,$query);
      // echo var_dump($res);
      if($res)
      {
          echo "<script>alert('Election timing is set');</script>";
      }
      else 
      {
        echo "<script>alert('Failed to set the election timings');</script>";
      }
    }
    else
    {
      echo "<script>alert('Failed to set the election timings');</script>";
    }
  }
?>
<div class="timer"> 
<h2>Set Election</h1>
<form method="post">
    <label for="date">DATE: </label><br>
    <input type="date" name="date_of_election" required><br>
    <label for="start_time">START TIME: </label><br>
    <input type="time" name="start_time" required><br>
    <label for="end_time">END TIME: </label><br>
    <input type="time" name="end_time" required><br>
    <input type="submit" value="Done">
</form>
</div>
<br>
<br>


<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>

</body>
</html> 