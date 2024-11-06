<!DOCTYPE html>
<html>
<head>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            text-align: center;
            padding: 20px 0;
        }

        /* Grid Layout for Rows and Columns */
        .row {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .column {
            flex: 1;
            max-width: 300px;
            padding: 15px;
        }

        /* Card Styling */
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card a {
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .card a:hover {
            color: #007BFF;
        }

        /* Container for all sections */
        .colum {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .column {
                max-width: 100%;
                flex-basis: 100%;
            }
        }
    </style>
</head>

<body>

    <?php include 'dbconnect.php'; ?>

    <?php
    $NO = $_GET['no'];
    $sql ="SELECT * FROM syllabus WHERE scode='$NO'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    while (($row = mysqli_fetch_assoc($result))) {
    ?>
        <div class="h1">
            <div style="text-align:center">
                <h1>What are you looking for?</h1>
            </div>
        </div>

        <div class="colum">
            <div class="row">
                <div class="card">
                    <a href="pdf\<?php echo $row['filename'] ?>">SYLLABUS</a>
                </div>
            </div>

    <?php
    }
    $selectQuery = "SELECT * from notes WHERE scode='$NO'";
    $squery = mysqli_query($conn, $selectQuery);

    while (($result = mysqli_fetch_assoc($squery))) {
    ?>
            <div class="row">
                <div class="card">
                    <a href="pdf\<?php echo $result['filename'] ?>">NOTES</a>
                </div>
            </div>
    <?php
    }
    $selectQuery = "SELECT * from qp WHERE scode='$NO'";
    $squery = mysqli_query($conn, $selectQuery);

    while (($result = mysqli_fetch_assoc($squery))) {
    ?>
            <div class="row">
                <div class="card">
                    <a href="pdf\<?php echo $result['filename'] ?>">QUESTION PAPER</a>
                </div>
            </div>
    <?php
    }
    ?>

</body>
</html>
