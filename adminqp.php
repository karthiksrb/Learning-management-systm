
<!DOCTYPE html>
<html>
<style>
      body {
         background-image: url('white2.jpg');
      }
      table, th, td {
         border:1px solid black;
      }
      form {
         width: 20%;

      }
      .form-control {
         width: 100%;
         padding: 2%;
         margin: 3%;
         border: 1.2px solid #000;
      }
      .deletebtn {
         background-color: red;
         color:white;
         font-weight:bold;
      }
   </style>
<body>
<?php
require_once 'dbconnect.php';
$selectQuery = "SELECT * FROM `qp` ORDER BY sem";
$squery = mysqli_query($conn, $selectQuery);
if($_SERVER['REQUEST_METHOD']=='POST'){
   $scode = $_POST['scode'];
   $delq = "DELETE from qp where scode='$scode'";
   $delquery = mysqli_query($conn, $delq);
   if($delq){
      header('location:adminqp.php');
   }
}
 ?>
   <h2></h2>
   <table style="width: 60%; position :absolute; left:25%;" >
      <tr>
         <th>SUBJECT CODE</th>
         <!-- <th>SUBJECT NAME</th> -->
         <th>SEMESTER</th>
         <th>File name</th>
         <th>Action</th>

      </tr>
      
      <?php
			 while (($result = mysqli_fetch_assoc($squery))) {
			 ?>
      <tr>
      <td align="center"><?php echo $result['scode'];?></td>
      <td align="center"><?php echo $result['sem'];?></td>
         <td align="center"><?php echo $result['filename'];?></td>
         <td align="center"><form action="adminqp.php" method="post">
            <input type="text" name="scode" hidden="hidden" value="<?php echo $result['scode'];?>" >
            <input type="submit" class="deletebtn" onclick="
                     alert('Deleted Successfully');" value="DELETE">
         </form>
      </td>

      </tr>
      <?php
          }   
			 ?>
   </table>

   <strong>Upload PDF</strong>
				<form method="post" action="uploadqp.php" enctype="multipart/form-data">
					
					<div class="form-input py-2">
               <div class="form-group">
							<input type="text" class="form-control"
								placeholder="Enter Subject Code" name="scode">
						</div>		
						<div class="form-group">
							<input type="text" class="form-control"
								placeholder="Enter Semester" name="sem">
						</div>			
            					
						<div class="form-group">
							<input type="file" name="pdf_file"
								class="form-control" accept=".pdf" required/>
						</div>
						<div class="form-group">
							<input type="submit"
								class="btnRegister" name="submit" value="Submit">
						</div>
					</div>
				</form>
</body>
</html>