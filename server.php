<?php 
session_start();
$username = "";
$password = "";
$confirmpassword = "";
$db = mysqli_connect('localhost', 'root', '', 'productmanagement');
if (!$db) {
    die("DB connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) { 
    $product_name = mysqli_real_escape_string($db, $_POST['product_name']);
    $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $category = mysqli_real_escape_string($db, $_POST['category']);

    $image = $_FILES['image']['name'];
    $target = "assets/uploads/" . basename($image);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
        $sql = "INSERT INTO products (product_name, quantity, price, category, image, created_at, updated_at)
                VALUES ('$product_name', '$quantity', '$price', '$category', '$image', NOW(), NOW())";

        if (mysqli_query($db, $sql)) {
            header('Location: dashboard.php');
        } else {
            echo "<script type='text/javascript'>alert('Error: " . mysqli_error($db) . "');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Error uploading image.');</script>";
    }
}


//get all products
$sql = "SELECT * FROM products";
$productresult = $db->query($sql);
if ($productresult->num_rows > 0) {
    while ($row = $productresult->fetch_assoc()) {
        $products[] = $row;
    }
}

// Update product
if (isset($_POST['update'])) {
    $product_id = mysqli_real_escape_string($db, $_POST['product_id']);
    $product_name = mysqli_real_escape_string($db, $_POST['product_name']);
    $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $category = mysqli_real_escape_string($db, $_POST['category']);

    $target_dir = "assets/uploads/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);

    if (!empty($image) && move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $sql = "UPDATE products SET 
            product_name = '$product_name',
            quantity = $quantity,
            price = $price,
            category = '$category',
            image = '$image',
            updated_at = NOW()
        WHERE
            product_id = $product_id";
         echo "<script>console.log('Image Name: " . $sql . "');</script>";
        $stmt = mysqli_prepare($db, $sql);
        if (!$stmt) {
            echo "Error: " . mysqli_error($db);
            header('Location: dashboard.php');
            exit(); 
        }
    } else {
        $sql = "UPDATE products SET 
            product_name = ?,
            quantity = ?,
            price = ?,
            category = ?,
            updated_at = NOW()
        WHERE
            product_id = ?";

        $stmt = mysqli_prepare($db, $sql);
        if (!$stmt) {
            echo "Error: " . mysqli_error($db);
            header('Location: dashboard.php');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sidsi", $product_name, $quantity, $price, $category, $product_id);
    }

    if (mysqli_stmt_execute($stmt)) {
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($db);
    }

    mysqli_stmt_close($stmt);
}




// Delete product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $product_id = mysqli_real_escape_string($db, $_POST['product_id']);
    $sql = "DELETE FROM products WHERE product_id = $product_id";
    if (mysqli_query($db, $sql)) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . mysqli_error($db);
    }
}



    mysqli_close($db);

    $username = "";
    $password = "";
    $confirmpassword = "";
?>
