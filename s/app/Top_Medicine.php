<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/medicine_service.php"; ?>
<hr/>
<a href="../interface.html">HOME</a>
<hr/>
<?php
    $uName = $pswrd = $user_role = "";
    $nameErr = $emailErr = "";
?>
<?php
$con=mysqli_connect("127.0.0.1","root","","sheba");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM medicine ORDER BY medicine.sell_count DESC ");

echo "<table border='1'>
			<tr>
			<th>Medicine Name</th>
			<th>Unit Sold</th>
			</tr>";

			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $row['med_name'] . "</td>";
				echo "<td>" . $row['sell_count'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";

mysqli_close($con);
			
			
        



?>

Back to <a href="../admin/dashboard.html">Dashboard</a>
