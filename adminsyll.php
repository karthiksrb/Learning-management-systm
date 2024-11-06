2
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
         text-align: center;
      }
   </style>
<body>
<?php
require_once 'dbconnect.php';
$selectQuery = "SELECT * FROM `syllabus` ORDER BY semester";
$squery = mysqli_query($conn, $selectQuery);
if($_SERVER['REQUEST_METHOD']=='POST'){
   $scode = $_POST['scode'];
   $delq = "DELETE from syllabus where scode='$scode'";
   $delquery = mysqli_query($conn, $delq);
   if($delq){
      header('location:adminsyll.php');
   }
}
 ?>
   <h2></h2>
   <table style="width: 60%; position :absolute; left:25%;" >
      <tr>
         <th>SUBJECT CODE</th>
         <th>SEMESTER</th>
         <th>SUBJECT NAME</th>
         <th>File name</th>
         <th>Action</th>

      </tr>
      
      <?php
			 while (($result = mysqli_fetch_assoc($squery))) {
			 ?>
      <tr>
      <td align="center"><?php echo $result['scode'];?></td>
      <td align="center"><?php echo $result['semester'];?></td>
         <td align="center"><?php echo $result['subjectname'];?></td>
         <td align="center"><?php echo $result['filename'];?></td>
         <td align="center" style = "width: 15%;"><form action="adminsyll.php" method="post">
            <input type="text" name="scode" hidden="hidden" value="<?php echo $result['scode'];?>" >
            <input type="submit" class="deletebtn" onClick="
                     alert('Deleted Successfully');" value="DELETE">
         </form>
      </td>

      </tr>
      <?php
          }   
			 ?>
   </table>

   <strong>Upload PDF</strong>
				<form method="post" action="uploadsyll.php" enctype="multipart/form-data">
					
					<div class="form-input py-2">
               <div class="form-group">
							<input type="text" class="form-control"
								placeholder="Enter Syllabus Code" name="scode">
						</div>		
						<div class="form-group">
							<input type="text" class="form-control"
								placeholder="Enter Semester" name="sem">
						</div>			
                  <div class="form-group">
							<input type="text" class="form-control"
								placeholder="Enter Subject name" name="sname">
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