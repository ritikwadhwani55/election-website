<?php
  session_start();
  include("connectdb.php");
          if(!$conn)
          {
            die("Sorry we failed to connect: ".mysqli_connect_error());
          }
?>
<!DOCTYPE html>
<!--representative vote page-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Representative vote Page</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>

body {
    background-color: #00CCCC;
    margin: 0px;
    padding: 0px;
}

.head { 
    font-size: 40px; 
    color: white; 
    font-weight: bold;
    position:absolute;
    margin:2px;	
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

nav ul li a {
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


#council a {
  /*position: absolute;
  left: -25px;*/
  display: flex;
  flex-direction: row;
  transition: 0.3s;
  padding: 15px;
  width: 100px;
  text-decoration: none;
  font-size: 15px;
  color: white;
  border-radius: 0 5px 5px 0;
  border:  2px solid white;
}
#council {
  display: flex;
  flex-direction: row;
}

/*#council a:hover {
  left: 0;
}*/

#CR {
  top: 190px;
  background-color: transparent;
}

#CI {
  top: 240px;
  background-color: transparent;
}

#SORT {
  top: 290px;
  background-color: transparent;
}

#SPORTS {
  top: 340px;
  background-color: transparent;
}
	
footer{ 
   
    bottom: 0px; 
    background-color: #000; 
    color: #fff; 
    position: relative; 
    padding-top:3px; 
    padding-bottom:30px; 
    text-align:center; 
    font-size:15px; 
    width: 100%;
    margin-top:1%; 
    
    } 
 /* .container {
    display: flex;
    flex-direction: row;
    flex-wrap:wrap;
  }*/
.candidates {
  width:10%;
  height:10%;
  border: 1px solid grey;  
  text-align:center;
}
.CR {
  width:30%;
  height:30%;
  border:1px solid grey;
  margin:10px;
}
iframe.CR {
        width:30%;
    height:30%;
}
input[type=radio] {
  float:left;
  margin:0px;
  clear:none;
  display:inline;
  text-align:center;
}
label {
  float:left;
  margin:0px;
  clear:none;
  display:inline;
  text-align:center;
}
h4 {
  text-align:center;
}
.card {
  width:300px;
  margin:10px;
  
}
.girls {
  display:flex;
  flex-direction:row;
  flex-wrap:wrap;
  justify-content:space-between;
  border: 1px solid grey;
  margin:5px;
}
.boys {
  display:flex;
  flex-direction:row;
  flex-wrap:wrap;
  justify-content:space-between;
  border: 1px solid grey;
}
input[type=submit] {
  text-align:center;
  margin:auto;
  display:block;
  background:red;
  padding:8px 15px;
  border:1 px solid black;
  color:black;
}
.sidecouncil {
  margin:10px;
 }
 /* .card-body {
   display: flex;

 } */
 /* #voting_CR {
   border:1px solid grey;
 } */
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
<hr>

<div class="menu">
<nav>
<p>VIVEKANAND EDUCATION SOCIETY'S<br> Institute of Technology</p>
<ul>
    
	
	<li><a href="representative.php">HOME</a></li>
	<li><a class="active">VOTE</a></li>
    <li><a href="editprofile.php">EDIT PROFILE</a></li>
	<li><a href="repcheckcandidates.php">CHECK CANDIDATES</a></li>
	<li><a href="represults.php">RESULTS</a></li>
	<li><a href="logout.php">LOGOUT</a></li>
	
</ul>
</nav>
</div>

<br>
<br>
<form method="post"> 
<div class="container">
  <div id="council" class="sidecouncil">
    <a href="#" id="CR" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;CR</a>
    <!-- <a href="#" id="CI" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;CI</a>
    <a href="#" id="SORT" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;SORT</a>
    <a href="#" id="SPORTS" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;SPORTS</a> -->
  </div>
  <div id="#voting_CR">
<?php  
  { 
              $query="select s.division from student s inner join participant p on s.student_id=p.student_id where participant_id=".$_SESSION['participant_id'].";";
              $res=mysqli_query($conn, $query);
              $class=mysqli_fetch_assoc($res);
              $sql="select s.full_name,p.about,p.participant_id,p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='CR' and gender='M';";
              $result=mysqli_query($conn,$sql);
              $row=mysqli_fetch_all($result);
              // $p_id=$row[0][0];
              // echo var_dump($p_id);
              $query_pic="select p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='CR' and gender='M';";
              $result_pic=mysqli_query($conn,$query_pic);
              $row_pic=mysqli_fetch_array($result_pic);
              // print_r($row_pic);
              echo "<h4>BOYS CR</h4>";
              $op="<div class='boys'>";
              for($i=0;$i<count($row);$i++)
              {
                error_reporting(0);
                $p_id=$row[$i][0];
                $op.="<div class='card card-bg-light md-4' style='width:300px'>
                <img src='images\young-man-face-cartoon-design-vector-9772843.jpg' class='card-img-top mx-auto d:block' style='width:120px;height:140px;'><br> 
                <div class='card-body'><input type='radio' name='cr_boy' value=".$row[$i][2]." required style='margin-top:6px;margin-right:4px;'> <p class='card-text'>".$row[$i][0]."</p></div></div>";
                // echo "<iframe class='CR'><p>Description: ".$row[$i][1]."<br>".$row[$i][0]."</p></iframe>";
                // header('Content-type:'.$row[$i][4]);
                // echo "<input type='radio' name='CR' value='".$row[$i][2]."' required>".$row[$i][0];
                // header("Content-type:".$row_pic[2]);
                // echo "<iframe>".$row_pic[0]."</iframe>";
                //echo "<img src="."'".$row_pic[0]."'".">";
                // echo ";
                // echo "";
                // echo $row[$i][2]." ";
              }
              $op.= "</div><br>";
              echo $op;
              echo "<h4>GIRLS CR</h4>";
              $sql_CR="select s.full_name,p.about,p.participant_id,p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='CR' and gender='F';";
              $result_CR=mysqli_query($conn,$sql_CR);
              $row_CR_GIRL=mysqli_fetch_all($result_CR);
              // echo var_dump($row);
              $op1="<div class='girls'>";
              for($i=0;$i<count($row_CR_GIRL);$i++)
              {
                  $op1.="<div class='card md-4'>
                  <img class='card-img-top mx-auto d:block' src='images\young-and-beautiful-woman-cartoon-face-vector-9772788.jpg' style='width:120px;height:140px;'><br>
                  <div class='card-body'><input type='radio' name='cr_girl' value=".$row_CR_GIRL[$i][2]." required style='margin-top:6px;margin-right:4px;'> <p class='card-text'>".$row_CR_GIRL[$i][0]."</p></div></div>";
                  
                  // echo $row[$i][2]." ";
              }
              $op1.="</div><br>";
              echo $op1;
          }
?>
</div>
<div id="council" class="sidecouncil">
    <!-- <a href="#" id="CR" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;CR</a> -->
    <a href="#" id="CI" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;CI</a> 
   <!-- <a href="#" id="SORT" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;SORT</a> -->
    <!-- <a href="#" id="SPORTS" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;SPORTS</a> -->
  </div>
  <div id="#voting_CI">
<?php  
  { 
              $query_CI_BOY="select s.division from student s inner join participant p on s.student_id=p.student_id where participant_id=".$_SESSION['participant_id'].";";
              $res_CI_BOY=mysqli_query($conn, $query_CI_BOY);
              $class=mysqli_fetch_assoc($res_CI_BOY);
              // echo var_dump($class['division']);
              $sql_CI_BOY="select s.full_name,p.about,p.participant_id,p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='CI' and gender='M';";
              $result_CI_BOY=mysqli_query($conn,$sql_CI_BOY);
              $row_CI_BOY=mysqli_fetch_all($result_CI_BOY);
              // echo var_dump($row_CI_BOY);
              // $p_id=$row[0][0];
              // echo var_dump($p_id);
              $query_pic_CI_BOY="select p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='CI' and gender='M';";
              $result_pic_CI_BOY=mysqli_query($conn,$query_pic_CI_BOY);
              $row_pic_CI_BOY=mysqli_fetch_array($result_pic_CI_BOY);
              // print_r($row_pic);
              echo "<h4>BOYS CI</h4>";
              $op_CI_BOY="<div class='boys'>";
              for($i=0;$i<count($row_CI_BOY);$i++)
              {
                error_reporting(0);
                $p_id=$row_CI_BOY[$i][0];
                $op_CI_BOY.="<div class='card card-bg-light md-4' style='width:300px'>
                <img src='images\young-man-face-cartoon-design-vector-9772843.jpg' class='card-img-top mx-auto d:block' style='width:120px;height:140px;'><br> 
                <div class='card-body'><input type='radio' name='ci_boy' value=".$row_CI_BOY[$i][2]." required style='margin-top:6px;margin-right:4px;'><p class='card-text'>".$row_CI_BOY[$i][0]."</p></div></div>";
                // echo "<iframe class='CR'><p>Description: ".$row[$i][1]."<br>".$row[$i][0]."</p></iframe>";
                // header('Content-type:'.$row[$i][4]);
                // echo "<input type='radio' name='CR' value='".$row[$i][2]."' required>".$row[$i][0];
                // header("Content-type:".$row_pic[2]);
                // echo "<iframe>".$row_pic[0]."</iframe>";
                //echo "<img src="."'".$row_pic[0]."'".">";
                // echo ";
                // echo "";
                // echo $row_CI_BOY[$i][2]." ";
              }
              $op_CI_BOY.= "</div><br>";
              echo $op_CI_BOY;
              echo "<h4>GIRLS CI</h4>";
              $sql_CI_GIRL="select s.full_name,p.about,p.participant_id,p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='CI' and gender='F';";
              $result_CI_GIRL=mysqli_query($conn,$sql_CI_GIRL);
              $row_CI_GIRL=mysqli_fetch_all($result_CI_GIRL);
              // echo var_dump($row);
              $op_CI_GIRL="<div class='girls'>";
              for($i=0;$i<count($row_CI_GIRL);$i++)
              {
                  $op_CI_GIRL.="<div class='card md-4'>
                  <img class='card-img-top mx-auto d:block' src='images\young-and-beautiful-woman-cartoon-face-vector-9772788.jpg' style='width:120px;height:140px;'><br>
                  <div class='card-body'><input type='radio' name='ci_girl' value=".$row_CI_GIRL[$i][2]." required style='margin-top:6px;margin-right:4px;'> <p class='card-text'>".$row_CI_GIRL[$i][0]."</p></div></div>";                  
                  // echo $row_CI_GIRL[$i][2]." ";
              }
              $op_CI_GIRL.="</div>";
              echo $op_CI_GIRL;
          }
?>
<!-- <td><img src='data:image/jpeg;base64,".base64_encode($row_pic[0])."' height='60' width='75' class='img-thumbnail' />  -->
  
  </div>
  <div id="council" class="sidecouncil">
    <!-- <a href="#" id="CR" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;CR</a> -->
    <!-- <a href="#" id="CI" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;CI</a>  -->
   <a href="#" id="SORT" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;SORT</a> 
    <!-- <a href="#" id="SPORTS" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;SPORTS</a> -->
  </div>
  <div id="#voting_SORT">
<?php  
  { 
              $query_SORT_BOY="select s.division from student s inner join participant p on s.student_id=p.student_id where participant_id=".$_SESSION['participant_id'].";";
              $res_SORT_BOY=mysqli_query($conn, $query_SORT_BOY);
              $class=mysqli_fetch_assoc($res_SORT_BOY);
              $sql_SORT_BOY="select s.full_name,p.about,p.participant_id,p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='SORT' and gender='M';";
              $result_SORT_BOY=mysqli_query($conn,$sql_SORT_BOY);
              $row_SORT_BOY=mysqli_fetch_all($result_SORT_BOY);
              // $p_id=$row[0][0];
              // echo var_dump($p_id);
              $query_pic_SORT_BOY="select p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='SORT' and gender='M';";
              $result_pic_SORT_BOY=mysqli_query($conn,$query_pic_SORT_BOY);
              $row_pic_SORT_BOY=mysqli_fetch_array($result_pic_SORT_BOY);
              // print_r($row_pic);
              echo "<h4>BOYS SORT</h4>";
              $op_SORT_BOY="<div class='boys'>";
              for($i=0;$i<count($row_SORT_BOY);$i++)
              {
                error_reporting(0);
                $p_id=$row_SORT_BOY[$i][0];
                $op_SORT_BOY.="<div class='card card-bg-light md-4' style='width:300px'>
                <img src='images\young-man-face-cartoon-design-vector-9772843.jpg' class='card-img-top mx-auto d:block' style='width:120px;height:140px;'><br> 
                <div class='card-body'><input type='radio' name='sort_boy' value=".$row_SORT_BOY[$i][2]." required style='margin-top:6px;margin-right:4px;'> <p class='card-text'>".$row_SORT_BOY[$i][0]."</p></div></div>";
                // echo $row_SORT_BOY[$i][2]." ";
                // echo "<iframe class='CR'><p>Description: ".$row[$i][1]."<br>".$row[$i][0]."</p></iframe>";
                // header('Content-type:'.$row[$i][4]);
                // echo "<input type='radio' name='CR' value='".$row[$i][2]."' required>".$row[$i][0];
                // header("Content-type:".$row_pic[2]);
                // echo "<iframe>".$row_pic[0]."</iframe>";
                //echo "<img src="."'".$row_pic[0]."'".">";
                // echo ";
                // echo "";
              }
              $op_SORT_BOY.= "</div><br>";
              echo $op_SORT_BOY;
              echo "<h4>GIRLS SORT</h4>";
              $sql_SORT_GIRL="select s.full_name,p.about,p.participant_id,p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='SORT' and gender='F';";
              $result_SORT_GIRL=mysqli_query($conn,$sql_SORT_GIRL);
              $row_SORT_GIRL=mysqli_fetch_all($result_SORT_GIRL);
              // echo var_dump($row);
              $op_SORT_GIRL="<div class='girls'>";
              for($i=0;$i<count($row_SORT_GIRL);$i++)
              {
                  $op_SORT_GIRL.="<div class='card md-4'>
                  <img class='card-img-top mx-auto d:block' src='images\young-and-beautiful-woman-cartoon-face-vector-9772788.jpg' style='width:120px;height:140px;'><br>
                  <div class='card-body'><input type='radio' name='sort_girl' value=".$row_SORT_GIRL[$i][2]." required style='margin-top:6px;margin-right:4px;'> <p class='card-text'>".$row_SORT_GIRL[$i][0]."</p></div></div>";
                  // echo $row_SORT_GIRL[$i][2]." ";
              }
              $op_SORT_GIRL.="</div>";
              echo $op_SORT_GIRL;
          }
?>
<!-- <td><img src='data:image/jpeg;base64,".base64_encode($row_pic[0])."' height='60' width='75' class='img-thumbnail' />  -->
  
  </div>
  <div id="council" class="sidecouncil">
    <!-- <a href="#" id="CR" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;CR</a> -->
    <!-- <a href="#" id="CI" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;CI</a>  -->
   <!-- <a href="#" id="SORT" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;SORT</a> -->
    <a href="#" id="SPORTS" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;SPORTS</a>
  </div>
  <div id="#voting_SPORTS">
<?php  
  { 
              $query_SPORTS_BOY="select s.division from student s inner join participant p on s.student_id=p.student_id where participant_id=".$_SESSION['participant_id'].";";
              $res_SPORTS_BOY=mysqli_query($conn, $query_SPORTS_BOY);
              $class=mysqli_fetch_assoc($res_SPORTS_BOY);
              // echo $class['division'];
              $sql_SPORTS_BOY="select s.full_name,p.about,p.participant_id,p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='SPORTS' and gender='M';";
              $result_SPORTS_BOY=mysqli_query($conn,$sql_SPORTS_BOY);
              $row_SPORTS_BOY=mysqli_fetch_all($result_SPORTS_BOY);
              // $p_id=$row[0][0];
              // echo var_dump($p_id);
              $query_pic_SPORTS_BOY="select p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='SPORTS' and gender='M';";
              $result_pic_SPORTS_BOY=mysqli_query($conn,$query_pic_SPORTS_BOY);
              $row_pic_SPORTS_BOY=mysqli_fetch_array($result_pic_SPORTS_BOY);
              // print_r($row_pic);
              echo "<h4>BOYS SPORTS</h4>";
              $op_SPORTS_BOY="<div class='boys'>";
              for($i=0;$i<count($row_SPORTS_BOY);$i++)
              {
                error_reporting(0);
                $p_id=$row_SPORTS_BOY[$i][0];
                $op_SPORTS_BOY.="<div class='card card-bg-light md-4' style='width:300px'>
                <img src='images\young-man-face-cartoon-design-vector-9772843.jpg' class='card-img-top mx-auto d:block' style='width:120px;height:140px;'><br> 
                <div class='card-body'><input type='radio' name='sports_boy' value=".$row_SPORTS_BOY[$i][2]." required style='margin-top:6px;margin-right:4px;'> <p class='card-text'>".$row_SPORTS_BOY[$i][0]."</p></div></div>";
                // echo "<iframe class='CR'><p>Description: ".$row[$i][1]."<br>".$row[$i][0]."</p></iframe>";
                // header('Content-type:'.$row[$i][4]);
                // echo "<input type='radio' name='CR' value='".$row[$i][2]."' required>".$row[$i][0];
                // header("Content-type:".$row_pic[2]);
                // echo "<iframe>".$row_pic[0]."</iframe>";
                //echo "<img src="."'".$row_pic[0]."'".">";
                // echo ";
                // echo "";
                // echo $row_SPORTS_BOY[$i][2]." ";
              }
              $op_SPORTS_BOY.= "</div><br>";
              
              echo $op_SPORTS_BOY;
              echo "<h4>GIRLS SPORTS</h4>";
              $sql_SPORTS_GIRL="select s.full_name,p.about,p.participant_id,p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='SPORTS' and gender='F';";
              $result_SPORTS_GIRL=mysqli_query($conn,$sql_SPORTS_GIRL);
              $row_SPORTS_GIRL=mysqli_fetch_all($result_SPORTS_GIRL);
              // echo var_dump($row);
              $op_SPORTS_GIRL="<div class='girls'>";
              for($i=0;$i<count($row_SPORTS_GIRL);$i++)
              {
                  $op_SPORTS_GIRL.="<div class='card md-4'>
                  <img class='card-img-top mx-auto d:block' src='images\young-and-beautiful-woman-cartoon-face-vector-9772788.jpg' style='width:120px;height:140px;'><br>
                  <div class='card-body'><input type='radio' name='sports_girl' value=".$row_SPORTS_GIRL[$i][2]." required style='margin-top:6px;margin-right:4px;'> <p class='card-text'>".$row_SPORTS_GIRL[$i][0]."</p></div></div>";
                  // echo $row_SPORTS_GIRL[$i][2];
              }
              $op_SPORTS_GIRL.="</div><br>";
              echo $op_SPORTS_GIRL;
          }
?>
<!-- <td><img src='data:image/jpeg;base64,".base64_encode($row_pic[0])."' height='60' width='75' class='img-thumbnail' />  -->
  
  </div>
</div>
<div>
<input type='submit' value='VOTE' id="myBtn" class="btnDisable"></div>

</form>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $sql="select date_id,start_time+0,end_time+0 from timer";
      $res=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($res);
      // echo var_dump($row);
      $start=$row['start_time+0'];
      $end=$row['end_time+0'];
      $q="select curtime()+0";
      $result=mysqli_query($conn,$q);
      $row1=mysqli_fetch_assoc($result);
      // echo var_dump($row1);
      $cur_time=$row1['curtime()+0'];
      // echo $cur_time;
      date_default_timezone_set('Asia/Kolkata');
                // echo date('d-m-Y');
      $q="select datediff(NOW(),date_id) from timer";
      $r=mysqli_query($conn,$q);
      if($row=mysqli_fetch_assoc($r))
      {
          echo var_dump($row);
      }
      if($row['datediff(NOW(),date_id)']=="0")
      {
        // $row['date_id']==date("Y-m-d")
        if((int)$cur_time>=(int)$start && (int)$cur_time<(int)$end)
      {
        // $query="select * from timer;";
        // $result1=$mysqli_query($conn,$query);
        // $time=mysqli_fetch_assoc($result1);
        // if($time['date_id'])
        $qu="select has_voted from student where student_id=".$_SESSION['student_id'].";";
        $res1=mysqli_query($conn,$qu);
        $voted=mysqli_fetch_assoc($res1);
        if(!$voted['has_voted'])
        {
            $cr_boy=$_POST['cr_boy'];
            // echo $cr_boy;
            $cr_girl=$_POST['cr_girl'];
            // echo " $cr_girl";
            $ci_boy=$_POST['ci_boy'];
            // echo " ".var_dump($ci_boy);
            $ci_girl=$_POST['ci_girl'];
            // echo " $ci_girl";
            $sort_boy=$_POST['sort_boy'];
            // echo " ".print_r($sort_boy);
            $sort_girl=$_POST['sort_girl'];
            // echo " $sort_girl";
            $sports_boy=$_POST['sports_boy'];
            // echo " ".$sports_boy;
            $sports_girl=$_POST['sports_girl'];
            // echo " ".$sports_girl;
            $p=array($cr_boy,$cr_girl,$ci_boy,$ci_girl,$sort_boy,$sort_girl,$sports_boy,$sports_girl);
            $participants=array();
            $count=0;
            for($i=0;$i<count($p);$i++)
            {
                if(!is_null($p[$i]))
                {
                    array_push($participants,$p[$i]);
                    $sql="UPDATE participant SET no_of_votes = no_of_votes+1 WHERE participant_id=$p[$i]";
                    $res=mysqli_query($conn,$sql);
                    if($row=mysqli_affected_rows($conn))
                    {
                      // echo " $row votes done ";
                      // $q="SELECT s.student_id from student s inner join participant p on p.student_id=s.student_id where p.participant_id=".$_SESSION['participant_id'];
                      // $res=mysqli_query($conn,$q);
                      // $row=mysqli_fetch_assoc($res);
                      // $query1="update student set has_voted=1 where student_id=".$row['student_id'];
                      // $ans=mysqli_query($conn,$query1);
                      $c++;
                    }
                }
              
            }
            if($c==count($participants))
            {
              // echo "<script>alert('Your vote is added!');</script>";
              // echo $c." ".count($participants);
              $q="SELECT s.student_id from student s inner join participant p on p.student_id=s.student_id where p.participant_id=".$_SESSION['participant_id'];
                      $res=mysqli_query($conn,$q);
                      $row=mysqli_fetch_assoc($res); 
                      $query1="update student set has_voted=1 where student_id=".$row['student_id'];
                      $ans=mysqli_query($conn,$query1);
                      if($check=mysqli_affected_rows($conn))
                      {
                        echo "<script>alert('Your vote is added!');</script>";
                        echo "<script>window.location.href = 'http://localhost:8080/ritik/election%20website/representative.php'</script>";
                      }
                      else
                      {
                        echo "<script>alert('Vote unsuccessfull');</script>";
                      }
            }
            // echo $c." ".count($participants);
            // else
            // {
            //   echo "<script>alert('Vote unsuccessfully');</script>";
            // }
            // for($i=0;$i<count($participants);$i++)
            // {
            //   echo " $participants[$i]";
            // }
          }  
        else
        {
          echo "<script>alert('You have already voted!');</script>";
          echo "<script>window.location.href='http://localhost:8080/ritik/election%20website/representative.php';</script>";
        }
      }
    else 
    {
        // echo "<script>document.getElementById('myBtn').disabled=true;</script>";
        echo "<script>window.alert('You cannot vote, the voting time is over!');</script>";
        echo "can't vote time";
    }
    }
    else
    {
        // echo "<script>document.querySelector('.btnDisable').disabled=true;</script>";
        echo "<script>alert('You cannot vote, the voting time is over!');</script>";
        echo "can't vote date";
    }
    
  }
?>
<footer class="footer"> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>
<script type="text/javascript">
  function vote(clicked_id)
  {
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=function() {
        if(this.readystate==4 && this.status==200)
        {
           document.querySelector('#voting_CR').innerHTML = this.responseText;
        }
      };
    xhttp.open("GET", "vote_CR.php", true);
    xhttp.send();
  }
</script> 
<!-- <script type="text/javascript">
    function vote(clicked_id)
    {
      if(clicked_id=='CR')
      {
        var rowArray= <?php echo json_encode($row);?>;
        var pic= <?php echo json_encode($row_pic); ?>;
        console.log(rowArray);
        console.log(pic);
      }
    }
</script> -->

</body>
</html>




