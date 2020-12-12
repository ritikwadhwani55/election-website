<!DOCTYPE html>
<!--main page-->

<html>

<head>
<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
<title>Main Page</title>

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
    img{
    max-width: 100%;
    margin-top: 100px;
    width: 100%;
    height:82%;
    position:absolute;
    margin: auto;
    align-items: center;
    display: block;
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
    <li><a class="active">MAIN</a></li>
	<li><a href="login.php">LOGIN</a></li>
    <!-- <li><a href="departments.php">DEPARTMENTS</a></li> -->
	<li><a href="aboutus.php">ABOUT US</a></li>
	
</ul>
</nav>
</div>
<div class="overlay">
    <img src="home.jpg" alt="Welcome Page" class="welcome">
</div>
<br>
<br>


<footer> Contact: +91-22-61532518, +91-22-61532532 &nbsp; &nbsp;  Email: vesit@ves.ac.in
</footer>


</body>
</html>