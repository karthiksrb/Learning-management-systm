<?php
require_once 'dbconnect.php';


        // If submit button is clicked
        if (isset($_POST['submit']))
        {
        // get name from the form when submitted
  $scode = $_POST['scode'];
  $sem = $_POST['sem'];	
       // $sname = $_POST['sname'];					

        if (isset($_FILES['pdf_file']['name']))
        {
        // If the ‘pdf_file’ field has an attachment
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            
            // Move the uploaded pdf file into the pdf folder
            move_uploaded_file($file_tmp,"./pdf/".$file_name);
            // Insert the submitted data from the form into the table
            $insertquery =
            "INSERT INTO `notes` (`sem`, `scode`, `filename`) VALUES ('$sem', '$scode','$file_name');";
            
            // Execute insert query
            $iquery = mysqli_query($conn, $insertquery);	

                if ($iquery)
            {	
                echo "<script>alert('added Successfully');</script>";						
    ?>											
                <div class=
                "alert alert-success alert-dismissible fade show text-center">
                    <a class="close" data-dismiss="alert" aria-label="close">
                    ×
                    </a>
                    <strong>Success!</strong> Data submitted successfully.
                </div>
                <?php
                }
                else
                {
                ?>
                <div class=
                "alert alert-danger alert-dismissible fade show text-center">
                    <a class="close" data-dismiss="alert" aria-label="close">
                    ×
                    </a>
                    <strong>Failed!</strong> Try Again!
                </div>
                <?php
                }
            }
            else
            {
            ?>
                <div class=
                "alert alert-danger alert-dismissible fade show text-center">
                <a class="close" data-dismiss="alert" aria-label="close">
                    ×
                </a>
                <strong>Failed!</strong> File must be uploaded in PDF format!
                </div>
            <?php
            }// end if
        }// end if
        header('location:adminnotes.php');
    ?>