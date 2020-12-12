<?php
  session_start();
  include("connectdb.php");
          if(!$conn)
          {
            die("Sorry we failed to connect: ".mysqli_connect_error());
          }
          else
          {
            //echo $_SESSION['participant_id'];
            $query="select s.division from student s inner join participant p on s.student_id=p.student_id where participant_id=".$_SESSION['participant_id'].";";
            $res=mysqli_query($conn, $query);
            $class=mysqli_fetch_assoc($res);
            // echo print_r($class['division']);
            $sql_CI="select s.full_name,p.post from student s inner join participant p on s.student_id=p.student_id where s.division="."'".$class['division']."'"." and gender='M' and p.post='CI'";
            $res_CI=mysqli_query($conn,$sql_CI);
            echo "<table>";
            echo "<th>Class Representative</th>";
            echo "<th>Cultural Incharge</th>";
            echo "<th>SORT</th>";
            echo "<th>SPORTS</th>";
            echo "</table>";
            $row_CI=mysqli_fetch_all($res_CI);
            echo print_r($row_CI);
            $sql_CR="select s.full_name,p.post from student s inner join participant p on s.student_id=p.student_id where s.division="."'".$class['division']."'"." and gender='M' and p.post='CR'";
            $res_CR=mysqli_query($conn,$sql_CR);
            $row_CR=mysqli_fetch_all($res_CR);
            echo print_r($row_CR);
        
            $sql_SORT="select s.full_name,p.post from student s inner join participant p on s.student_id=p.student_id where s.division="."'".$class['division']."'"." and gender='M' and p.post='SORT'";
            $res_SORT=mysqli_query($conn,$sql_SORT);
            $row_SORT=mysqli_fetch_all($res_SORT);
            echo print_r($row_SORT);

            $sql_SPORTS="select s.full_name,p.post from student s inner join participant p on s.student_id=p.student_id where s.division="."'".$class['division']."'"." and gender='M' and p.post='SPORTS'";
            $res_SPORTS=mysqli_query($conn,$sql_SPORTS);
            $row_SPORTS=mysqli_fetch_all($res_SPORTS);
            echo print_r($row_SPORTS);
            $max=max(count($row_CR),count($row_CI),count($row_SORT),count($row_SPORTS));

            // for($i=0;$i<$max;$i++)
            // {
            //     if($i<count($res_CR))
            //     {
            //         echo ""
            //     }
            // }

        }
?>
