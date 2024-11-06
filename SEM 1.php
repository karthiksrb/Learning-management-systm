<?php
require_once 'dbconnect.php';
$no = $_GET['no'];
$selectQuery = "select  *  from subjects where sem=$no";
$squery = mysqli_query($conn, $selectQuery);
 ?>

<!DOCTYPE html>
<html>
   <style>
      table, td{
         border: 1px solid;
         height:30%;
      }
      td,th{
         font-size: 20px;
         font-weight: 1000;
      }
   </style>
   <head><link rel="stylesheet" href="style.css"></head>
<body>
   <h2> SEMESTER <?php echo $no;?></h2>
   <table style="width: 50%" align="center">
      <tr>
         <th>SUBJECT CODE</th>
         <th>SUBJECT NAME</th>
      </tr>
      <?php
			 while (($result = mysqli_fetch_assoc($squery))) {
			 ?>
      <tr>
         <td align="center"><?php echo $result['scode'];?></td>
         <td align="center"><a href="dash.php?no=<?php echo $result['scode'];?>"><?php echo $result['sname'];?></a></td>
      </tr>
      <?php
          }
			 ?>
      <!-- <tr>
         <td align="center">18CS12</td>
        <td align="center"><a href="dash.php?no=<?php echo $id;?>">PHYSICS</a></td>
      </tr>
      <tr>
         <td align="center">18CS13</td>
         <td align="center"><a href="dash.php?no=<?php echo $id;?>">ENGEENERING GRAPHICS</a></td>
      </tr>
      <tr>
         <td align="center">18CS14</td>
         <td align="center"><a href="dash.php?no=<?php echo $id;?>">ELECTRICAL</a></td>
      </tr>
      <tr>
         <td align="center">18CS15</td>
         <td align="center"><a href="dash.php?no=<?php echo $id;?>">TECHNICAL ENGLISH</a></td>
      </tr>
      <tr>
         <td align="center">18CS16</td>
         <td align="center"><a href="dash.php?no=<?php echo $id;?>">CIVIL</a></td>
      </tr> -->
   </table>
</body>
</html>