
<link rel="stylesheet" type="text/css" href="view/styles.css">
<?php include('view/header.php'); ?>
<?php
$host = "en1ehf30yom7txe7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com"; 
$user = "vp8744gaikmgekne"; 
$pass = "hwntszmccbzzh0vx"; 
$db = "gsx4xjtkbbf7dvh7"; 

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];

}
$query = "SELECT vehicles.year, vehicles.model, vehicles.price, vehicles.type_id, vehicles.class_id, vehicles.make_id
          FROM vehicles
          INNER JOIN types ON vehicles.type_id = types.ID; 
          INNER JOIN makes ON vehicles.make_id = makes.ID
          INNER JOIN classes ON vehicles.class_id = classes.ID";

?>

<table>
		<tr>
			<th>ID</th>
			<th>Type</th>
			<th>Action</th>
		</tr>
		<?php
			$query = "SELECT * FROM types";
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['ID'] . "</td>";
				echo "<td>" . $row['type'] . "</td>";
				echo "<td><form method='POST' action='delete_type.php'><input type='hidden' name='type_id' value='" . $row['ID'] . "'><input type='submit' value='Delete'></form></td>";
				echo "</tr>";
			}
		?>
	</table>


	<form method="POST" action="insert_type.php">
		<label for="type">New Type:</label>
		<input type="text" name="type" id="type">
		<input type="submit" value="Add Type">
	</form>


    <br>
    <br>
</form>
<?php include('view/footer.php'); ?>