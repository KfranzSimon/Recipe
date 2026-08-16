<?php 
include '../php/Connection.php'; 

// Basic SQL Injection prevention using intval since IDs are numbers
$ID = intval($_GET['id']); 

$query = "SELECT * FROM dishes WHERE id = $ID"; 
$result = mysqli_query($conn, $query); 
$name = mysqli_fetch_assoc($result); 

$contentsQuery = " SELECT i.Instructions FROM dishes m LEFT JOIN instructions i ON m.ID = i.Soups_ID WHERE m.ID = $ID "; 
$contentsResult = mysqli_query($conn, $contentsQuery); 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title><?php echo htmlspecialchars($name['Title']); ?></title> 
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
                    <img src="../<?php echo htmlspecialchars($name['Image_Path']); ?>" alt=""> 
                </div> 
            </div> 
            <div class="first-section-details"> 
                <div class="specification"> 
                    <h1><?php echo htmlspecialchars($name['Title']); ?></h1> 
                </div> 
                <div class="food-list"> 
                    <!-- FIX 3: Fixed class spelling here to match "food-discription" in Types.css -->
                    <div class="food-discription"> 
                        <h3>
                            <?php 
                            /* FIX 4: Ensure Description matches exact casing in DB (e.g. 'Description' or 'description') */
                            echo htmlspecialchars($name['Description'] ?? $name['description'] ?? 'No description found.'); 
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
                        <h2>Ingredients</h2>
                    </div>
                    <!-- Ingredients loop goes here -->
                </div> 
            </div> 
            <div class="second-section-steps"> 
                <div class="steps"> 
                    <div class="heading">
                        <h2>Steps</h2>
                    </div>
                    <!-- Steps loop goes here -->
                </div> 
            </div> 
        </div> 
    </div> 
</body> 
</html>
