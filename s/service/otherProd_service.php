<?php require_once "../data/product_data_access.php"; ?>
<?php
	function addProduct($Product)
	{
		return addProductToDb($Product);
	}
	function editProduct($Product)
	{
        return editProductToDb($Product);
    }
    function buyProduct($Product)
    {
        return buyProductToDb($Product);
    }
    function removeProduct($ProductId){
        return removeProductFromDb($ProductId);
    }
     function getAllProduct(){
        return getAllProductFromDb();
    }
    function getProductById($ProductId){
        return getProductByIdFromDb($ProductId);
    }
    function getProductByName($meDName){
        return getProductByNameFromDb($meDName);
    }
    function getProductByIdOrName($key){
        return getByProductNameOrIdFromDb($key);
    }
    function getProductByIndication($Indication){
    	return getProductByIndicationFromDb($Indication);
    }
    function getProductByGeneric($Generic){
    	return getProductByGenericFromDb($Generic);
    }

    function addOrder($order){
        return addOrderToDb($order);
    }
?>