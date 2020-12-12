<?php
		  session_start();
		  include("connectdb.php");
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
?>