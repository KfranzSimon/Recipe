<?php 
include '../php/Connection.php'; 

// Basic SQL Injection prevention using intval since IDs are numbers
$ID = intval($_GET['id']); 

$dish_query = "SELECT Image_Path, Title, Description FROM dishes WHERE ID = $ID";
$dish_result = mysqli_query($conn, $dish_query);
$dish = mysqli_fetch_assoc($dish_result); // No while loop needed for a single row

$ing_query = "SELECT ingredient_name, quantity FROM ingredients WHERE Dish_ID = $ID";
$ing_result = mysqli_query($conn, $ing_query);

$ins_query = "SELECT Steps_Num, Instructions FROM instructions WHERE Dish_ID = $ID ORDER BY Steps_Num ASC";
$ins_result = mysqli_query($conn, $ins_query);
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title><?php echo htmlspecialchars($dish['Title']); ?></title> 
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
        
        <div class="first-section"> 
            <div class="first-section-image-cont"> 
                <div class="first-section-image"> 
                    <img src="../<?php echo htmlspecialchars($dish['Image_Path']); ?>" alt=""> 
                </div> 
            </div> 
            <div class="first-section-details"> 
                <div class="specification"> 
                    <h1><?php echo htmlspecialchars($dish['Title']); ?></h1> 
                </div> 
                <div class="food-list"> 
                    <!-- FIX 3: Fixed class spelling here to match "food-discription" in Types.css -->
                    <div class="food-discription"> 
                        <h3>
                            <?php 
                            /* FIX 4: Ensure Description matches exact casing in DB (e.g. 'Description' or 'description') */
                            echo htmlspecialchars($dish['Description'] ?? $dish['description'] ?? 'No description found.'); 
                            ?> 
                        </h3> 
                    </div> 
                </div> 
            </div> 
        </div> 

        <div class="second-section"> 
            <div class="second-section-ingredients"> 
                <div class="ingredients"> 
                    <div class="heading">
                        <h2>Ingredients:</h2>
                    </div>
                    <div class="ingredients-contents">
                        <ul>
                            <?php while($ingredient = mysqli_fetch_assoc($ing_result)){?>
                            <li>
                                <p>
                                    <?php echo htmlspecialchars($ingredient['quantity']);  ?>
                                    <?php echo htmlspecialchars($ingredient['ingredient_name']);  ?>
                                </p>
                            </li>  
                            <?php } ?>
                        </ul>
                    </div>
                </div> 
            </div> 
            <div class="second-section-steps"> 
                <div class="steps"> 
                    <div class="heading">
                        <h2>Steps</h2>
                    </div>
                    <div class="steps-contents">
                        <ol>
                            <?php while($Steps = mysqli_fetch_assoc($ins_result)){?>
                            <li>
                                <p>
                                    <?php echo htmlspecialchars($Steps['Instructions']);  ?>
                                </p>
                            </li>  
                            <?php } ?>
                        </ol>
                    </div>
                </div> 
            </div> 
        </div> 
    </div> 
</body> 
</html>
