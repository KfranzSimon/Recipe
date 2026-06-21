<?php
include '../php/Connection.php';

$ID = $_GET['id'];

//for the title query
$query = "SELECT * FROM soups_main_tbl WHERE id = $ID";
$result = mysqli_query($conn, $query);

$name = mysqli_fetch_assoc($result);

//left join need to learn
$contentsQuery = "
    SELECT i.Instructions
    FROM soups_main_tbl m
    LEFT JOIN soups_instructions i
    ON m.ID = i.Soups_ID
    WHERE m.ID = $ID
";

$contentsResult = mysqli_query($conn, $contentsQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinks</title>
    <link rel="stylesheet" href="../CSS/Types.css">
</head>
<body>
    <div class="parent">
        <div class="header">
            <div class="logo">
                <h1>Filipino Secrets</h1>
            </div>
            <div class="menu">
                <a href="../Index.html">Recipes</a>
                <a href="#">Video</a>
            </div>
        </div>
        <div class="first-section">
            <div class="first-section-image-cont">
                <div class="first-section-image">
                    <img src="../<?php echo $name['Image_Path'] ?>" alt="">
                </div>
            </div>
            <div class="first-section-details">
                <div class="specification">
                    <h1><?php echo $name['Title'] ?></h1>
                </div>
                <div class="food-list">
                    <div class="food-disciption">
                        <h2><?php 
                            while($row = mysqli_fetch_assoc($contentsResult)){
                                echo $row['Instructions'] . "<br>";
                            }
                        ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>