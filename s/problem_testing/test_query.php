<?php

$con=oci_connect('sheba', '1234', 'localhost/XE');

if (!$con) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$result= oci_parse($con, "SELECT * FROM customer ORDER BY 'buy_count' DESC ");
 oci_execute($result);




echo "<table border='1'>
			<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Blood Group</th>
			<th>Product Bought</th>
			</tr>";

			while($row = oci_fetch_array($result))
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
