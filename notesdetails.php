<?php include 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- <style>
      table, td{
         border: 1px solid;
         height:50%;
      }
      td,th{
         font-size: 20px;
         font-weight: 1000;
      }
   </style> -->

<head>
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="style.css">
</head>

<body>
<style>
      table, td{
         /* border: 1px solid; */
         height:50%;
      }
      td,th{
         font-size: 20px;
         font-weight: 1000;
      }
   </style>

    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header text-center">
                <h4>Notes </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table border="1px solid black">
                        <thead>
                            <th>ID</th>
                            <th>S_CODE</th>
                            <th>LINK</th>
                        </thead>
                        <tbody>
                            <?php
                            $no =$_GET['no'];
                            $selectQuery = "select * from notes WHERE scode='$no'";
                            $squery = mysqli_query($conn, $selectQuery);

                            while (($result = mysqli_fetch_assoc($squery))) {
                            ?>
                                <tr>
                                    <td><?php echo $result['id']; ?></td>
                                    <td><?php echo $result['scode']; ?></td>
                                    <td><a href='pdf\<?php echo $result['filename'] ?>'>press</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>