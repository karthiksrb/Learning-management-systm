<?php
require_once 'dbconnect.php';

// Query to select distinct semesters
$selectQuery = "select distinct sem from subjects order by sem ASC";
$squery = mysqli_query($conn, $selectQuery);

$max_semesters = 4; // Limit to 4 semesters
$counter = 0; // Initialize a counter
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="h1">
        <div style="text-align:center">
            <h1>WELCOME!!</h1>
            <h1>Which sem are you in ??</h1>
        </div>
    </div>
    <div class="row">
        <?php
        // Loop to fetch and display semesters
        while (($result = mysqli_fetch_assoc($squery)) && $counter < $max_semesters) {
            // Increment the counter on each loop iteration
            $counter++;
        ?>
            <div class="column">
                <div class="card">
                    <a href="SEM 1.php?no=<?php echo $result['sem']; ?>">MCA SEM <?php echo $result['sem']; ?></a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
