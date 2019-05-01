<html>
<?php require_once "../service/medicine_service.php"; ?>
<?php
    $searchKey = $searchBy = "";  
    $searchBySelected = array("Any"=>null, "medName"=>null, "id"=>null);
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $searchKey = trim($_POST['search']);
        $searchBy = $_POST['search_by'];
        $searchBySelected[$searchBy] = "selected";
        
        if($searchBy == "medName")
            $medicines = getMedicinesByName($searchKey);
        else if($searchBy == "id")
            $medicines = getMedicineById($searchKey);
        else{
            $medicines = getMedicinesByIdOrName($searchKey);
        }
    }
    else {
        $medicines = getAllMedicines();
    }
?>
<hr/>

<body>
	<fieldset>
		 <legend>Retrieve</legend>
		  <form method="POST">
		  		<input type="submit" value="SEARCH"/>
                <input name="search" value="<?= $searchKey ?>"/> By
                <select name="search_by">
                    <option <?= $searchBySelected["Any"] ?>>Any</option>
                    <option <?= $searchBySelected["medName"] ?>>Name</option>
                    <option <?= $searchBySelected["id"] ?>>Id</option>
                </select>
		  </form>

		<table width="80%" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Indication</th>
            <th>Generic</th>
            <th>Price</th>
            <th>Quantity</th>
            <th colspan="4"></th>
        </tr>
      <?php if (count($medicines) == 0) { ?>
            <tr><td colspan="5">NO RECORD FOUND</td></tr>
        <?php } ?>

        <?php foreach ($medicines as $medicine) { ?>
            <tr>
                <td><?= $medicine['id'] ?></td>
                <td><?= $medicine['med_name'] ?></td>
                <td><?= $medicine['indication'] ?></td>
                <td><?= $medicine['generic'] ?></td>
                <td><?= $medicine['price'] ?></td>
                <td><?= $medicine['quantity'] ?></td>
                <td><a href="update_medicine.php?id=<?= $medicine['id'] ?>">edit</a></td>
                <td><a href="delete_medicine.php?id=<?= $medicine['id'] ?>">delete</a></td>
            </tr>
        <?php }
         ?>
        </table>
         <a href="add_delete_meds.php">Back</a>
	</fieldset>
</body>
</html>