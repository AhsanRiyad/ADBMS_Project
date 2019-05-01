<html>
<?php require_once "../service/medicine_service.php"; ?>
<?php
    $searchKey = $searchBy = "";  
    $searchBySelected = array("Any"=>null, "name"=>null, "id"=>null);
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $searchKey = trim($_POST['search']);
        $searchBy = $_POST['search_by'];
        $searchBySelected[$searchBy] = "selected";
        
        if($searchBy == "name")
            $medicines = getDonorsByName($searchKey);
        else if($searchBy == "id")
            $medicines = getDonorsById($searchKey);
        else{
            $medicines = getDonorsByIdOrName($searchKey);
        }
    }
    else {
        $medicines = getAllDonors();
    }
?>
<hr/>

<body>
	<fieldset>
		 <legend>List of Donors</legend>
		  <form method="POST">
		  		<input type="submit" value="SEARCH"/>
                <input name="search" value="<?= $searchKey ?>"/> By
                <select name="search_by">
                    <option <?= $searchBySelected["Any"] ?>>Any</option>
                    <option <?= $searchBySelected["name"] ?>>Name</option>
                    <option <?= $searchBySelected["id"] ?>>Id</option>
                </select>
		  </form>

		<table width="80%" height="80%" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Donor Id</th>
            <th>Donor Name</th>
            <th>Blood Group</th>
            <th>Contact No.</th>
            <th>Area</th>
        </tr>
      <?php if (count($medicines) == 0) { ?>
            <tr><td colspan="5">NO RECORD FOUND</td></tr>
        <?php } ?>

        <?php foreach ($medicines as $medicine) { ?>
            <tr>
                <td><?= $medicine['donor_id'] ?></td>
                <td><?= $medicine['donar_name'] ?></td>
                <td><?= $medicine['donar_BG'] ?></td>
                <td><?= $medicine['donar_contact'] ?></td>
                <td><?= $medicine['donar_area'] ?></td>
            </tr>
        <?php }
         ?>
        </table>
	</fieldset>
</body>
</html>