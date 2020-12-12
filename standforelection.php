<?php
  session_start();
  include("connectdb.php");
          if(!$conn)
          {
            die("Sorry we failed to connect: ".mysqli_connect_error());
          }
?>
<!DOCTYPE html>
<!--stand for election-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Stand for election</title>

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
body{
    background-color: #00CCCC;
    margin: 0px;
    padding: 0px;
}

.head{ 
    font-size: 40px; 
    color: white; 
    font-weight: bold;
    position:sticky;	
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


marquee{
	color:#003399;
	font-size:16px;
	position: fixed;
}

footer{ 
    width: 100%; 
    bottom: 0px; 
    background-color: #000; 
    color: #fff; 
    padding-top:7px; 
    padding-bottom:50px; 
    text-align:center; 
    font-size:15px;
	clear: both;
    position: sticky;
     
        } 
        div.name {
  float:right;
  clear:right;
  /* margin:10px; */
}
/*div.hide {
  display: none;
}*/

</style>
</head>


<body>

<header><div class="head">Class Council Election</div>
</header>
<marquee><b>Please make sure to complete your profile after submitting the form!</b></marquee>
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
    <li><a href="student.php" >HOME</a></li>
	<li><a href="studentvote.php">VOTE</a></li>
    <li><a class="active" >STAND FOR ELECTION</a></li>
	<li><a href="studentcheckcandidates.php">CHECK CANDIDATES</a></li>
	<li><a href="studentresults.php">RESULTS</a></li>
	<li><a href="logout.php">LOGOUT</a></li>
</ul>
</nav>
<br>

<br>

 <?php
 /* 
        if(isset($_POST['Done']))
        {
           $pointer=$_POST['pointer'];
            $kt=$_POST['kt'];
            echo $pointer,$kt;
            if($pointer<=6.9 || $kt=='Yes')
            {
              echo "<script>window.alert('** Sorry you are not eligible');</script>";
              echo "<script>window.location = 'http://localhost:8080/ritik/election%20website/student.html';</script>";
            }
            else
            {
              echo "hello";
              echo "<script>see();</script>";        
            }
        }
        */
    ?> 
<div class="container">
<form method="post" action="javascript:check()">

    Previous Sem CGPA:&nbsp;&nbsp;<input type="text" placeholder="Enter your last sem pointer.." id="pointer" name="pointer" required>
    <span id="pointer1"></span>

    Any KT so far:&nbsp;&nbsp;<input type="radio" name="kt" value="Yes" required>Yes
    <input type="radio" name="kt" value="No" required>No<br><br>
    <span id="kt1"></span>
    
    <button type="submit" name="Done">Done</button><br>
   <!-- 
    <script type="text/javascript">
       function see()
      {
        document.getElementById('show').style.display="block";
      }
    </script> -->
  </form>
</div>
    <div class="hide" id="show" style="display: none;">
      <form method="post">
      Email:&nbsp;&nbsp;<input type="email" name="email" id="email_id" placeholder="Enter your VESIT email id"><br><br>
  	   <span id="email1"></span><br>
      Full Name:&nbsp;&nbsp;<input type="text" name="full_name" placeholder="Enter your full name.."><br><br>
      <span id="full_name1"></span>
      Gender:&nbsp;&nbsp;<input type="radio" name="gender" required>Male
      <input type="radio"name="gender" required>Female<br><br>
  	   <span id="gender1"></span>
       <label>Division:</label><br>
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
       <br>
      Post:&nbsp;&nbsp;<input type="radio" name="post" required value="CR">CR
      <input type="radio" name="post" required value="CI">CI
      <input type="radio" name="post" required value="SORT">SORT
      <input type="radio" name="post" required value="SPORTS">SPORTS<br><br>
  	 <span id="post1"></span>
  	<input type="submit" name="sub" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;
  	<input type="reset" value="Reset">
  </form>
	</div>
 
<!--   <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script> -->

 <?php
      if($_SERVER['REQUEST_METHOD']=='POST')
      {
        if(isset($_POST['sub']) && $_POST['email']!=="")
        {
        $email=$_POST['email'];
        $post=$_POST['post'];
        {
          
          if(!$conn)
          {
            die("Sorry we failed to connect: ".mysqli_connect_error());
          }
          else
          {
            // echo "Connection created successfully!<br>";
            $sql="select student_id,email_id from student where email_id='$email';";
            $res=mysqli_query($conn,$sql);
              if($row=mysqli_fetch_assoc($res))
              {
                  $stud_id=(int)$row['student_id'];
                  $q="select student_id from participant where student_id='$stud_id' and post='$post'";
                  $results=mysqli_query($conn,$q);
                  if($row=mysqli_fetch_assoc($results))
                  {
                    echo "<script>document.querySelector('#post1').innerHTML='** You have already stood for this category!'</script>";
                  }
                  else
                  {
                      $sql1="insert into participant (post,student_id) values('$post',$stud_id)";
                      $res1=mysqli_query($conn,$sql1);
                      unset($_POST['email']);
                      $email="";
                      $post="";
                      if($res1)
                      {
                        $sql="select max(participant_id) from participant";
                        $res1=mysqli_query($conn,$sql);
                        if($row=mysqli_fetch_assoc($res1))
                        {
                          $_SESSION['participant_id']=$row['max(participant_id)'];
                          echo "<script>window.alert('Submitted successfully!');</script>";
                          echo "<script>
                          window.location = 'http://localhost:8080/ritik/election%20website/representative.php';
                          </script>";
                        }
                        else
                        {
                          alert("failed to system error! Try again later");
                        }
                      }
                      else
                        {
                          alert("failed to system error! Try again later");
                        }
                  }
              }
              else
              {
                  echo "<script>document.getElementById('email1').innerHTML='** Email id does not exist!';</script>";
              }
          }
        }
      }
    }
  ?>

<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>

  <script>
          function check()
          {
              var kt=document.querySelector('input[name="kt"]:checked').value;
              var ptr=document.getElementById("pointer").value;
              if(ptr<=6.9 || kt=='Yes')
              {
                alert("** Sorry you are not eligible");
                // $_SESSION['participant_id']=
                window.location="http://localhost:8080/ritik/election%20website/student.php";
              }
              else
              {

                var x=document.getElementById('show');
                console.log(x);
                // x.classList.remove("hide");
                x.style.display="block";
                console.log(x);

                document.getElementsByClassName('container')[0].style.display="none";

              }
          }
  </script>
</body>
</html>