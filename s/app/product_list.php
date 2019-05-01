<html>
<?php require_once "../service/otherProd_service.php"; ?>
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
            $medicines = getProductByName($searchKey);
        else if($searchBy == "id")
            $medicines = getProductById($searchKey);
        else{
            $medicines = getProductByIdOrName($searchKey);
        }
    }
    else {
        $medicines = getAllProduct();
    }
?>
<hr/>

<body>
	<fieldset>
		 <legend>List of Products</legend>
		  <form method="POST">
		  		<input type="submit" value="SEARCH"/>
                <input name="search" value="<?= $searchKey ?>"/> By
                <select name="search_by">
                    <option <?= $searchBySelected["Any"] ?>>Any</option>
                    <option <?= $searchBySelected["medName"] ?>>Name</option>
                    <option <?= $searchBySelected["id"] ?>>Id</option>
                </select>
		  </form>

		<table width="80%" height="80%" border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
        </tr>
      <?php if (count($medicines) == 0) { ?>
            <tr><td colspan="5">NO RECORD FOUND</td></tr>
        <?php } ?>

        <?php foreach ($medicines as $medicine) { ?>
            <tr>
                <td><?= $medicine['pro_id'] ?></td>
                <td><?= $medicine['pro_name'] ?></td>
                <td><?= $medicine['pro_quan'] ?></td>
                <td><?= $medicine['pro_price'] ?></td>
                <td><a href="buy_product.php?pro_id=<?= $medicine['pro_id'] ?>">buy</a></td>
            </tr>
        <?php }
         ?>
        </table>
	</fieldset>
</body>
</html>