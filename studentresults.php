<?php
  session_start();
  include("connectdb.php");
   if(!$conn)
   {
     die("Sorry we failed to connect: ".mysqli_connect_error());
   }
?>
<!DOCTYPE html>
<!--student results-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Student results</title>

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
    position:scroll;	
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
        .results table {
      margin:10px auto;
      border: 1px solid red;
      align-items:center;
}
.results td,th,table {
      /* margin:5px; */
      border: 1px solid red;
      border-collapse: collapse;
      padding: 5px;
}
.container {
  display:flex;
  margin: 10px;
  justify-content: space-between;
  flex-wrap:wrap;
}
.container .results {
  border: 1px solid grey;
  margin:2%;
  align-items:center;
  width:380px;
  /* height:400px; */
}
h2 {
  text-align:center;
}
</style>
</head>


<body>

<header><div class="head">Class Council Election</div>
</header>

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
	<li><a href="studentcheckcandidates.php">CHECK CANDIDATES</a></li>
	<li><a class="active">RESULTS</a></li>
	<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
</div>

<br>
<br>
<br>
<div class="container">
<div class="results">
<h2>BOYS CR</h2>
  <?php
      $sql_query="select division from student where email_id='".$_SESSION['email']."' and password='".$_SESSION['password']."';";
      
      $res=mysqli_query($conn,$sql_query);
      $class=mysqli_fetch_assoc($res);
      // echo $class['division'];
    //   $sql="select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SPORTS'";
    //   // echo $row['division'];
    //   $res=mysqli_query($conn,$sql);
    //   while($row=mysqli_fetch_array($res))
    // {
    //   echo var_dump($row);
    // }
    
if($stmt = $conn->query("select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='CR'")){

  // echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>NAME</th><th>No of votes</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>".$row[3]."</td><td>".$row[2]."</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
// echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_boy_cr = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_boy_cr">
<br><br>
<!-- <a href=https://www.plus2net.com/php_tutorial/chart-database.php>Pie Chart from MySQL database</a> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'No of votes');
		for(i = 0; i < my_2d_boy_cr.length; i++)
    data.addRow([my_2d_boy_cr[i][3], parseInt(my_2d_boy_cr[i][2])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Results are represented in Pie Chart',
                       width:380,
                       height:280};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_boy_cr'));
        chart.draw(data, options);
      }
</script>

</div>
</div>
<br>
<div class="results">
<h2>GIRLS CR</h2>
  <?php
      $sql_query="select division from student where email_id='".$_SESSION['email']."' and password='".$_SESSION['password']."';";
      $res=mysqli_query($conn,$sql_query);
      $class=mysqli_fetch_assoc($res);
    //   $sql="select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SPORTS'";
    //   // echo $row['division'];
    //   $res=mysqli_query($conn,$sql);
    //   while($row=mysqli_fetch_array($res))
    // {
    //   echo var_dump($row);
    // }
    // echo $class['division'];
    
if($stmt = $conn->query("select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='F' and s.division='".$class['division']."' and p.post='CR'")){

  // echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>NAME</th><th>No of votes</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>".$row[3]."</td><td>".$row[2]."</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
// echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_girl_cr">
<br><br>
<!-- <a href=https://www.plus2net.com/php_tutorial/chart-database.php>Pie Chart from MySQL database</a> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'No of votes');
		for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][3], parseInt(my_2d[i][2])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Results are represented in Pie Chart',
                       width:380,
                       height:280};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_girl_cr'));
        chart.draw(data, options);
      }
</script>
 
</div>
</div>
<div class="results">
<h2>BOYS CI</h2>
  <?php
      $sql_query="select division from student where email_id='".$_SESSION['email']."' and password='".$_SESSION['password']."';";
      $res=mysqli_query($conn,$sql_query);
      $class=mysqli_fetch_assoc($res);
    //   $sql="select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SPORTS'";
    //   // echo $row['division'];
    //   $res=mysqli_query($conn,$sql);
    //   while($row=mysqli_fetch_array($res))
    // {
    //   echo var_dump($row);
    // }
    
if($stmt = $conn->query("select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='CI'")){

  // echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>NAME</th><th>No of votes</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>".$row[3]."</td><td>".$row[2]."</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
// echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_boys_ci = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_boys_ci">
<br><br>
<!-- <a href=https://www.plus2net.com/php_tutorial/chart-database.php>Pie Chart from MySQL database</a> -->
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'No of votes');
		for(i = 0; i < my_2d_boys_ci.length; i++)
    data.addRow([my_2d_boys_ci[i][3], parseInt(my_2d_boys_ci[i][2])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Results are represented in Pie Chart',
                       width:380,
                       height:280};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_boys_ci'));
        chart.draw(data, options);
      }
</script>

</div>
</div>
<div class="results">
<h2>GIRLS CI</h2>
  <?php
      $sql_query="select division from student where email_id='".$_SESSION['email']."' and password='".$_SESSION['password']."';";
      $res=mysqli_query($conn,$sql_query);
      $class=mysqli_fetch_assoc($res);
    //   $sql="select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SPORTS'";
    //   // echo $row['division'];
    //   $res=mysqli_query($conn,$sql);
    //   while($row=mysqli_fetch_array($res))
    // {
    //   echo var_dump($row);
    // }
    
if($stmt = $conn->query("select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='F' and s.division='".$class['division']."' and p.post='CI'")){

  // echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>NAME</th><th>No of votes</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>".$row[3]."</td><td>".$row[2]."</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
// echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_girls_ci = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_girls_ci">
<br><br>
<!-- <a href=https://www.plus2net.com/php_tutorial/chart-database.php>Pie Chart from MySQL database</a> -->
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'No of votes');
		for(i = 0; i < my_2d_girls_ci.length; i++)
    data.addRow([my_2d_girls_ci[i][3], parseInt(my_2d_girls_ci[i][2])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Results are represented in Pie Chart',
                       width:380,
                       height:280};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_girls_ci'));
        chart.draw(data, options);
      }
</script>

</div>
</div>

<div class="results">
<h2>BOYS SORT</h2>
  <?php
      $sql_query="select division from student where email_id='".$_SESSION['email']."' and password='".$_SESSION['password']."';";
      $res=mysqli_query($conn,$sql_query);
      $class=mysqli_fetch_assoc($res);
    //   $sql="select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SPORTS'";
    //   // echo $row['division'];
    //   $res=mysqli_query($conn,$sql);
    //   while($row=mysqli_fetch_array($res))
    // {
    //   echo var_dump($row);
    // }
    
if($stmt = $conn->query("select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SORT'")){

  // echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>NAME</th><th>No of votes</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>".$row[3]."</td><td>".$row[2]."</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
// echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_boy_sort = ".json_encode($php_data_array)."
</script>";
?>

<div id="chart_boy_sort">
<br><br>
<!-- <a href=https://www.plus2net.com/php_tutorial/chart-database.php>Pie Chart from MySQL database</a> -->
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'No of votes');
		for(i = 0; i < my_2d_boy_sort.length; i++)
    data.addRow([my_2d_boy_sort[i][3], parseInt(my_2d_boy_sort[i][2])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Results are represented in Pie Chart',
                       width:380,
                       height:280};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_boy_sort'));
        chart.draw(data, options);
      }
</script>

</div>
</div>
<div class="results">
<h2>GIRLS SORT</h2>
  <?php
      $sql_query="select division from student where email_id='".$_SESSION['email']."' and password='".$_SESSION['password']."';";
      $res=mysqli_query($conn,$sql_query);
      $class=mysqli_fetch_assoc($res);
    //   $sql="select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SPORTS'";
    //   // echo $row['division'];
    //   $res=mysqli_query($conn,$sql);
    //   while($row=mysqli_fetch_array($res))
    // {
    //   echo var_dump($row);
    // }
    
if($stmt = $conn->query("select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='F' and s.division='".$class['division']."' and p.post='SORT'")){

  // echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>NAME</th><th>No of votes</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>".$row[3]."</td><td>".$row[2]."</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
// echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_girls_sort = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_girls_sort">
<br><br>
<!-- <a href=https://www.plus2net.com/php_tutorial/chart-database.php>Pie Chart from MySQL database</a> -->
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'No of votes');
		for(i = 0; i < my_2d_girls_sort.length; i++)
    data.addRow([my_2d_girls_sort[i][3], parseInt(my_2d_girls_sort[i][2])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Results are represented in Pie Chart',
                       width:380,
                       height:280};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_girls_sort'));
        chart.draw(data, options);
      }
</script>

</div>
</div>
<div class="results">
<h2>BOYS SPORTS</h2>
  <?php
      $sql_query="select division from student where email_id='".$_SESSION['email']."' and password='".$_SESSION['password']."';";
      $res=mysqli_query($conn,$sql_query);
      $class=mysqli_fetch_assoc($res);
    //   $sql="select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SPORTS'";
    //   // echo $row['division'];
    //   $res=mysqli_query($conn,$sql);
    //   while($row=mysqli_fetch_array($res))
    // {
    //   echo var_dump($row);
    // }
    
if($stmt = $conn->query("select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SPORTS'")){

  // echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>NAME</th><th>No of votes</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>".$row[3]."</td><td>".$row[2]."</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
// echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_boys_sports = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_boys_sports">
<br><br>
<!-- <a href=https://www.plus2net.com/php_tutorial/chart-database.php>Pie Chart from MySQL database</a> -->
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'No of votes');
		for(i = 0; i < my_2d_boys_sports.length; i++)
    data.addRow([my_2d_boys_sports[i][3], parseInt(my_2d_boys_sports[i][2])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Results are represented in Pie Chart',
                       width:380,
                       height:280};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_boys_sports'));
        chart.draw(data, options);
      }
</script>

</div>
</div>
<div class="results">
<h2>GIRLS SPORTS</h2>
  <?php
      $sql_query="select division from student where email_id='".$_SESSION['email']."' and password='".$_SESSION['password']."';";
      $res=mysqli_query($conn,$sql_query);
      $class=mysqli_fetch_assoc($res);
    //   $sql="select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='M' and s.division='".$class['division']."' and p.post='SPORTS'";
    //   // echo $row['division'];
    //   $res=mysqli_query($conn,$sql);
    //   while($row=mysqli_fetch_array($res))
    // {
    //   echo var_dump($row);
    // }
    
if($stmt = $conn->query("select s.student_id,p.post,p.no_of_votes,s.full_name from participant p inner join student s on p.student_id=s.student_id where s.gender='F' and s.division='".$class['division']."' and p.post='SPORTS'")){

  // echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>NAME</th><th>No of votes</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>".$row[3]."</td><td>".$row[2]."</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
// echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d_girls_sports = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_girls_sports">
<br><br>
<!-- <a href=https://www.plus2net.com/php_tutorial/chart-database.php>Pie Chart from MySQL database</a> -->
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'No of votes');
		for(i = 0; i < my_2d_girls_sports.length; i++)
    data.addRow([my_2d_girls_sports[i][3], parseInt(my_2d_girls_sports[i][2])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Results are represented in Pie Chart',
                       width:380,
                       height:280};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_girls_sports'));
        chart.draw(data, options);
      }
</script>

</div>
</div>

</div>

<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>


</body>
</html>