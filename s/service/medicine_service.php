<?php require_once "../data/medicine_data_access.php"; ?>
<?php
	function addMedicine($medicine)
	{
		return addMedicineToDb($medicine);
	}
	function editMedicine($medicine)
	{
        return editMedicineToDb($medicine);
    	}
	function donateBlood($blood)
	{
		return donateBLoodToDb($blood);
	}
	
    function buyMedicine($medicine)
    {
        return buyMedicineToDb($medicine);
    }
    function removeMedicine($medicineId){
        return removeMedicineFromDb($medicineId);
    }
     function getAllMedicines(){
        return getAllMedicinesFromDb();
    }
	 function getAllDonors(){
        return getAllDonorsFromDb();
    }
    function getMedicineById($medicineId){
        return getMedicineByIdFromDb($medicineId);
    }
	function getDonorsById($medicineId){
        return getDonorsByIdFromDb($medicineId);
    }
    function getMedicinesByName($meDName){
        return getMedicinesByNameFromDb($meDName);
    }
	function getDonorsByName($DName){
        return getDonorsByNameFromDb($DName);
    }
    function getMedicinesByIdOrName($key){
        return getByMedicineNameOrIdFromDb($key);
    }
	function getDonorsByIdOrName($key){
        return getByDonorsNameOrIdFromDb($key);
    }
    function getMedicineByIndication($Indication){
    	return getMedicineByIndicationFromDb($Indication);
    }
    function getMedicineByGeneric($Generic){
    	return getMedicineByGenericFromDb($Generic);
    }

    function addOrder($order){
        return addOrderToDb($order);
    }
?>
