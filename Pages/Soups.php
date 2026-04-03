<?php 
include "../php/Connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soups</title>
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
        <div class="specification">
            <h1>Soups</h1>
        </div>
        <div class="food-list">
            <?php 
            $query = "SELECT * FROM soups_main_tbl";

            $result = mysqli_query($conn, $query);
            ?>
            <?php while($data = mysqli_fetch_assoc($result)) {?>
            <div class="food">
                <h2><?php echo $data['Title']?></h2>
                <img src="../<?php echo $data['Image_Path']?>" alt="">
            </div>
            <?php }?>
        </div>
    </div>
</body>
</html>