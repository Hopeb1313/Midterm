
<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php
$host = "en1ehf30yom7txe7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com"; 
$user = "vp8744gaikmgekne"; 
$pass = "hwntszmccbzzh0vx"; 
$db = "gsx4xjtkbbf7dvh7"; 

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $class = trim($_POST["class"]);
    if (empty($class)) {
        echo "Class is required.";
        exit();
    }

    // Insert new type into database
    $query = "INSERT INTO classes (Class) VALUES (?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $class);
    if (mysqli_stmt_execute($stmt)) {
        echo "Class added successfully.";
    } else {
        echo "Error adding class: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

echo "<button onclick=\"location.href='admin.php';\">Back to table</button>";
mysqli_close($conn);
?> 