<?php
// Include the database initialization file
include('dbinit.php');

// Handle delete operation
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_stmt = $conn->prepare("DELETE FROM clothing WHERE ClothingID = ?");
    $delete_stmt->bind_param("i", $delete_id);

    if ($delete_stmt->execute()) {
        echo "<div class='alert alert-success'>Clothing item deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting item: " . $delete_stmt->error . "</div>";
    }
    $delete_stmt->close();
}

// Handle update operation (via modal and POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];
    $clothing_name = $_POST['ClothingName'];
    $clothing_desc = $_POST['ClothingDescription'];
    $size = $_POST['Size'];
    $price = $_POST['Price'];
    $color = $_POST['Color'];
    $brand = $_POST['Brand'];
    $material = $_POST['Material'];

    if (!empty($clothing_name) && !empty($clothing_desc) && !empty($size) && !empty($price) && !empty($color) && !empty($brand) && !empty($material)) {
        $update_stmt = $conn->prepare("UPDATE clothing SET ClothingName=?, ClothingDescription=?, Size=?, Price=?, Color=?, Brand=?, Material=? WHERE ClothingID=?");
        
        // Updated bind_param with correct type for Brand (string instead of integer)
        $update_stmt->bind_param("ssssssss", $clothing_name, $clothing_desc, $size, $price, $color, $brand, $material, $edit_id);

        if ($update_stmt->execute()) {
            echo "<div class='alert alert-success'>Clothing item updated successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error updating item: " . $update_stmt->error . "</div>";
        }
        $update_stmt->close();
    }
}

// Fetch all clothing items from the database
$sql = "SELECT * FROM clothing";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store Inventory</title>
    <!-- Include Bootstrap and Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* General Styles */
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background: linear-gradient(to right, #ff512f, #dd2476); /* Gradient for header */
            padding: 15px 0;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .navbar ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        h1 {
            color: #de2574;
            margin-top: 30px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 700;
        }

        .table {
            margin-top: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #ff512f;
            color: white;
            border: none;
        }

        /* Apply color to even numbered cells */
        .table tr:nth-child(even) {
            background-color: #fdae9eb0; /* Alternating background color for even-numbered cells */
        }

        .table td {
            vertical-align: middle;
            border: none;
        }

        .btn-add {
            background-color: #de2574;
            border: none;
            color: #fff;
        }

        .btn-add:hover {
            background-color: #13856d;
            color: white;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px; /* Space between the edit and delete buttons */
        }

        .btn-edit, .btn-delete {
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .btn-edit {
            color: #43A047;
        }

        .btn-delete {
            color: #ec0e29;
        }

        footer {
            background: linear-gradient(to right, #dd2476, #ff512f); /* Gradient for footer */
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Add padding to prevent content overlap with footer */
        .container {
            padding-bottom: 100px; /* Added padding to prevent content from being hidden by footer */
        }

        .fa-pencil-alt {
            color: #43A047;
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

<div class="container">
    <h1>View All Clothing</h1>

    <!-- Link to Add Clothing Page -->
    <div class="text-right mb-3">
        <a href="add_clothing.php" class="btn btn-add">Add New Clothing</a>
    </div>

    <!-- Table for displaying clothing -->
    <table class="table table-hover table-bordered text-center">
        <thead>
            <tr>
                <th>Clothing Name</th>
                <th>Description</th>
                <th>Size</th>
                <th>Price</th>
                <th>Color</th>
                <th>Brand</th>
                <th>Material</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['ClothingName']}</td>";
                    echo "<td>{$row['ClothingDescription']}</td>";
                    echo "<td>{$row['Size']}</td>";
                    echo "<td>\${$row['Price']}</td>";
                    echo "<td>{$row['Color']}</td>";
                    echo "<td>{$row['Brand']}</td>";
                    echo "<td>{$row['Material']}</td>";
                    echo "<td class='action-buttons'>
                            <a href='#editModal' class='btn-edit' data-toggle='modal' data-id='{$row['ClothingID']}' data-name='{$row['ClothingName']}' data-desc='{$row['ClothingDescription']}' data-size='{$row['Size']}' data-price='{$row['Price']}' data-color='{$row['Color']}' data-brand='{$row['Brand']}' data-material='{$row['Material']}'><i class='fas fa-pencil-alt'></i></a>
                            <a href='?delete_id={$row['ClothingID']}' class='btn-delete' onclick='return confirm(\"Are you sure you want to delete this item?\")'><i class='fas fa-trash-alt'></i></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No clothing items found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<footer>
    &copy; 2024 Fashion Store. All Rights Reserved.
</footer>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="view_clothing.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Clothing Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="form-group">
                        <label for="ClothingName">Clothing Name</label>
                        <input type="text" class="form-control" id="edit_name" name="ClothingName" required>
                    </div>
                    <div class="form-group">
                        <label for="ClothingDescription">Description</label>
                        <textarea class="form-control" id="edit_desc" name="ClothingDescription" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Size">Size</label>
                        <input type="text" class="form-control" id="edit_size" name="Size" required>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="number" step="0.01" class="form-control" id="edit_price" name="Price" required>
                    </div>
                    <div class="form-group">
                        <label for="Color">Color</label>
                        <input type="text" class="form-control" id="edit_color" name="Color" required>
                    </div>
                    <div class="form-group">
                        <label for="Brand">Brand</label>
                        <input type="text" class="form-control" id="edit_brand" name="Brand" required>
                    </div>
                    <div class="form-group">
                        <label for="Material">Material</label>
                        <input type="text" class="form-control" id="edit_material" name="Material" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Bootstrap Modals -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script to populate the Edit Modal with existing data -->
<script>
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id');
        var name = button.data('name');
        var desc = button.data('desc');
        var size = button.data('size');
        var price = button.data('price');
        var color = button.data('color');
        var brand = button.data('brand');
        var material = button.data('material');

        var modal = $(this);
        modal.find('#edit_id').val(id);
        modal.find('#edit_name').val(name);
        modal.find('#edit_desc').val(desc);
        modal.find('#edit_size').val(size);
        modal.find('#edit_price').val(price);
        modal.find('#edit_color').val(color);
        modal.find('#edit_brand').val(brand);
        modal.find('#edit_material').val(material);
    });
</script>

</body>
</html>
