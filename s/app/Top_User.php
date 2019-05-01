<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>
<hr/>
<a href="../interface.html">HOME</a>
<hr/>
<?php
    $uName = $pswrd = $user_role = "";
    $nameErr = $emailErr = "";
?>
<?php
/*$con=mysqli_connect("127.0.0.1","root","","sheba");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();

$result = mysqli_query($con,"SELECT * FROM customer ORDER BY 'buy_count' DESC ");
}*/



$con=oci_connect('sheba', '1234', 'localhost/XE');

if (!$con) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$result = oci_parse($con, "SELECT * FROM customer ORDER BY 'buy_count' DESC ");
 oci_execute($result);

echo "<table border='1'>
			<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Blood Group</th>
			<th>Product Bought</th>
			</tr>";

			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $row['NAME'] . "</td>";
				echo "<td>" . $row['EMAIL'] . "</td>";
				echo "<td>" . $row['GENDER'] . "</td>";
				echo "<td>" . $row['BLOOD_GROUP'] . "</td>";
				echo "<td>" . $row['BUY_COUNT'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";

/*mysqli_close($con);*/

oci_close($con);
        



?>

Back to <a href="../admin/dashboard.html">Dashboard</a>
