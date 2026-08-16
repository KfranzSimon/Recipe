<?php 
include "PHP/Connection.php";

$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="CSS/style.css">
    
</head>
<body>
    <div class="parent">
        <div class="title-section">
            <div class="header-inner-cont">
                <div class="search">
                    <label for="search">Search</label>
                    <input id="search" type="text">
                </div>
                <div class="title">
                    <div class="title-main-cont">
                        <h1>Filipino Secrets</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="Slider">
            <div class="Slides">
                <img class="Slide" src="./Images/Fiesta.jpg" alt="">
                <img class="Slide" src="./Images/Dessert.jpg" alt="">
                <img class="Slide" src="./Images/filipino_food.jpg" alt="">
            </div>
        </div>
        <div class="types">
            <div class="types-main-container">
                <?php while($category = mysqli_fetch_assoc($result)){?>
                <a class="link" href="Pages/Soups.php?id=<?php echo $category['ID'] ?>">
                    <div class="food-types">
                        <div class="D-Immage">
                             <p><?php echo $category['category_name']; ?></p> 
                        </div>
                    </div>
                </a>
                <?php }?>
            </div>
        </div>
        <button class="to-top">to top</button>
    </div>
</body>
<script src="./JavaScript/Slider.js"></script>
<script src="./JavaScript/toTop.js"></script>
</html>
