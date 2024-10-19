<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Store - Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

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
            height: 50px;
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

        .carousel-item img {
            width: 100%;
            height: 75vh;
            object-fit: cover;
        }

        footer {
            background: linear-gradient(to right, #dd2476, #ff512f);
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<!-- Header and Navbar -->
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

<!-- Image Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="image1.jpeg" class="d-block w-100" alt="First Slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Exclusive Collection</h5>
                <p>Discover our latest trends in fashion.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="image2.jpg" class="d-block w-100" alt="Second Slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Stylish Outfits</h5>
                <p>Look your best with our premium selections.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="image3.jpg" class="d-block w-100" alt="Third Slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Comfort and Elegance</h5>
                <p>Experience the perfect blend of style and comfort.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Footer -->
<footer>
    &copy; 2024 Fashion Store. All Rights Reserved.
</footer>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
