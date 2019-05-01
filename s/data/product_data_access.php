<?php require_once "data_access.php"; ?>
<?php
	function addProductToDb($Product)
	{
		$sql = "INSERT INTO product (pro_id,pro_name,pro_quan,pro_price) VALUES ('$Product[pro_id]','$Product[pro_name]','$Product[pro_quan]','$Product[pro_price]')";
		$result = executeSQL($sql);
        return $result;
	}

	function editProductToDb($Product)
	{
		$sql = "UPDATE product SET pro_name='$Product[pro_name]', pro_quan='$Product[pro_quan]', pro_price='$Product[pro_price]' WHERE pro_id=$Product[pro_id]";
        $result = executeSQL($sql);
        return $result;
	}
	function removeProductFromDb($ProductID)
	{
		$sql = "DELETE FROM product WHERE pro_id=$ProductID";
        $result = executeSQL($sql);
        return $result;
	}
	 function getAllProductFromDb(){
        $sql = "SELECT * FROM product";        
        $result = executeSQL($sql);
        
        $medicines = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $product[$i] = $row;
        }
        
        return $product;
    }
     function getProductByIdFromDb($ProductId){
        $sql = "SELECT * FROM product WHERE pro_id=$ProductId";        
        $result = executeSQL($sql);
        
        $product = mysqli_fetch_assoc($result);
        
        return $product;
    } 
    function getProductByNameFromDb($pro_name){
        $sql = "SELECT * FROM product WHERE pro_name LIKE '%$pro_name%'";
        $result = executeSQL($sql);
        
        $product = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $product[$i] = $row;
        }
        
        return $product;
    }
    function getByProductNameOrIdFromDb($key){
        $sql = "SELECT * FROM product WHERE pro_name LIKE '%$key%' OR id LIKE '%$key%'";
        $result = executeSQL($sql);
        
        $product = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $product[$i] = $row;
        }
        return $product;
    }
   
?>
