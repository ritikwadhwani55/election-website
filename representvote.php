<?php
  session_start();
  include("connectdb.php");
?>
<!DOCTYPE html>
<!--representative vote page-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Representative vote Page</title>

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
	<li><a class="active">VOTE</a></li>
    <li><a href="editprofile.php">EDIT PROFILE</a></li>
	<li><a href="repcheckcandidates.php">CHECK CANDIDATES</a></li>
	<li><a href="represults.php">RESULTS</a></li>
	<li><a href="index.php">LOGOUT</a></li>
	
</ul>
</nav>
</div>

<br>
<br>
<div class="container">
  <div id="council" class="sidecouncil">
    <a href="#" id="CR" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;CR</a>
    <!-- <a href="#" id="CI" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;CI</a>
    <a href="#" id="SORT" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;SORT</a>
    <a href="#" id="SPORTS" onclick="vote(this.id)">&nbsp;&nbsp;&nbsp;SPORTS</a> -->
  </div>
  <div id="#voting_CR"></div>
  </div>
<!-- <?php
     
          // $conn=mysqli_connect($servername,$username,$password,$database);
          if(!$conn)
          {
            die("Sorry we failed to connect: ".mysqli_connect_error());
          }
          else
          { 
              $query="select s.division from student s inner join participant p on s.student_id=p.student_id where participant_id=".$_SESSION['participant_id'].";";
              $res=mysqli_query($conn, $query);
              $class=mysqli_fetch_assoc($res);
              $sql="select s.full_name,p.about,p.participant_id,p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='CR' and gender='M';";
              $result=mysqli_query($conn,$sql);
              $row=mysqli_fetch_all($result);
              print_r($row);
              $query_pic="select p.profile_pic,p.img_name,p.img_type from student s inner join participant p on s.student_id=p.student_id where s.division="."'".(string)$class['division']."'"." and p.post='CR' and gender='M';";
              $result_pic=mysqli_query($conn,$query_pic);
              $row_pic=mysqli_fetch_array($result_pic);
              print_r($row_pic);
              echo "<table>";

              for($i=0;$i<count($row);$i++)
              {
                $op="<tr>
                  <td><img src='data:image/jpeg;base64,".base64_encode($row_pic[0])."' height='60' width='75'
                      class='img-thumbnail' />
                  </td>
                  <td></td>
                  </tr>";
                // echo "<iframe class='CR'><p>Description: ".$row[$i][1]."<br>".$row[$i][0]."</p></iframe>";
                // header('Content-type:'.$row[$i][4]);
                // echo "<input type='radio' name='CR' value='".$row[$i][2]."' required>".$row[$i][0];
                // header("Content-type:".$row_pic[2]);
                // echo "<iframe>".$row_pic[0]."</iframe>";
                //echo "<img src="."'".$row_pic[0]."'".">";
                // echo ";
                // echo "";
              }
              $op.= "</table>";
              echo $op;
          }
?> -->
<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
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
</body>
</html>




