<?php 
include "../PHP/Connection.php"


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
                <a href="../Index.php">Recipes</a>
                <a href="#">Video</a>
            </div>
        </div>
        <div class="specification">
            <h1>Soups</h1>
        </div>
        <div class="food-list">
            <?php 
            $category_id = $_GET['id'];
            $query = "SELECT dishes.ID, dishes.Title, dishes.Image_Path, categories.category_name 
                    FROM dishes 
                    INNER JOIN categories 
                    ON dishes.category_ID = categories.ID 
                    WHERE categories.ID = '$category_id'";

            $result = mysqli_query($conn, $query);
            ?>
            <?php while($data = mysqli_fetch_assoc($result)) {?>
            <div class="food">
                <h2><?php echo $data['Title']?></h2>
                <a href="Dish_Recipe.php?name=<?php echo $data['category_name']; ?>&id=<?php echo $data['ID'] ?>">
                <img src="../<?php echo $data['Image_Path']?>" alt="">
                </a>
            </div>
            <?php }?>
        </div>
    </div>
</body>
</html>