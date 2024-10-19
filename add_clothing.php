<?php
// Include the database initialization file
include('dbinit.php');

// Handle form submission for adding a new clothing item
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clothing_name = $_POST['ClothingName'];
    $clothing_desc = $_POST['ClothingDescription'];
    $size = $_POST['Size'];
    $price = $_POST['Price'];
    $color = $_POST['Color'];
    $brand = $_POST['Brand'];       // New Brand input field
    $material = $_POST['Material']; // New Material input field

    if (!empty($clothing_name) && !empty($clothing_desc) && !empty($size) && !empty($price) && !empty($color) && !empty($brand) && !empty($material)) {
        $stmt = $conn->prepare("INSERT INTO clothing (ClothingName, ClothingDescription, Size, Price, Color, Brand, Material) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdsis", $clothing_name, $clothing_desc, $size, $price, $color, $brand, $material);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Clothing item added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding item: " . $stmt->error . "</div>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Clothing Item</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Styles */
        * {
    box-sizing: border-box;
}
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
/* General header styles */
header {
    background: linear-gradient(to right, #ff512f, #dd2476);
    padding: 15px 0;
}

.header-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
}

.logo img {
    width: 50px;
    border-radius: 50%;
    height: 50px
}

.navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 20px;
}

.navbar ul li {
    display: inline;
}

.navbar ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

.login-button .btn-login {
    background-color: #fff;
    color: #ff512f;
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: bold;
}

.login-button .btn-login:hover {
    background-color: #f1f1f1;
    color: #dd2476;
}


        h1 {
            text-align: center;
            margin: 20px 0;
            color: #de2574;
        }

        .form-container {
           
    width: 60%;
    margin: 0 auto;
    padding: 30px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    box-sizing: border-box; /* Ensures padding is included in the width */
}


        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f1f1f1; /* Light grey for inputs */
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="number"]:focus {
            outline: none;
            border-color: #ff512f; /* Bright orange border on focus */
        }

        .btn-add {
            background-color: #27ae60; /* Vibrant green button */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-bottom: 35px;
        }

        .btn-add:hover {
            background-color: #2ecc71; /* Lighter green on hover */
            
        }

        footer {
            background: linear-gradient(to right, #dd2476, #ff512f); /* Gradient from pink to bright orange */
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }

            .btn-add {
                padding: 15px;
            }

            nav ul li {
                display: block;
                margin: 10px 0;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="header-container">
        <div class="logo">
            <img src="logo.png" alt="Clothing Store Logo">
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="add_clothing.php">Add Item</a></li>
                <li><a href="view_clothing.php">View Inventory</a></li>
            </ul>
        </nav>
       
    </div>
</header>

<h1>Add New Clothing Item</h1>

<div class="form-container">
    <form action="add_clothing.php" method="post">
        <div class="form-group">
            <label for="ClothingName">Clothing Name</label>
            <input type="text" id="ClothingName" name="ClothingName" required>
        </div>
        <div class="form-group">
            <label for="ClothingDescription">Clothing Description</label>
            <input type="text" id="ClothingDescription" name="ClothingDescription" required>
        </div>
        <div class="form-group">
            <label for="Size">Size</label>
            <input type="text" id="Size" name="Size" required>
        </div>
        <div class="form-group">
            <label for="Price">Price</label>
            <input type="number" id="Price" name="Price" required>
        </div>
        <div class="form-group">
            <label for="Color">Color</label>
            <input type="text" id="Color" name="Color" required>
        </div>
        <div class="form-group"> <!-- New Brand Field -->
            <label for="Brand">Brand</label>
            <input type="text" id="Brand" name="Brand" required>
        </div>
        <div class="form-group"> <!-- New Material Field -->
            <label for="Material">Material</label>
            <input type="text" id="Material" name="Material" required>
        </div>
        <button type="submit" class="btn-add">Add Clothing</button>
    </form>
</div>

<footer>
    &copy; 2024 Fashion Store. All Rights Reserved.
</footer>

</body>
</html>
