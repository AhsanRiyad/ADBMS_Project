<?php require_once "data_access.php"; ?>
<?php
	function addMedicineToDb($medicine)
	{
		$sql = "INSERT INTO medicine (id,med_name,indication,generic,price,quantity) VALUES (NULL,'$medicine[medName]','$medicine[indication]','$medicine[generic]','$medicine[price]','$medicine[quantity]')";
		 $result = executeSQL($sql);
        return $result;
	}

     function addOrderToDb($order){
	$sql = "INSERT INTO order_report (orderId, orderName, orderQuantity, orderCost) VALUES (NULL, '$order[medName]', '$order[quantity]', '$order[total_q]')";
	$result = executeSQL($sql);
	return $result;
    }

	function donateBLoodToDb($blood){
        $sql = "INSERT INTO donate_blood (donor_id, donar_name, donar_BG, donar_contact, donar_area) VALUES (NULL, '$blood[name]', '$blood[bg]', '$blood[contact]', '$blood[area]')";
        $result = executeSQL($sql);
        return $result;
   	 }

	function editMedicineToDb($medicine)
	{
		$sql = "UPDATE medicine SET med_name='$medicine[medName]', indication='$medicine[indication]',generic='$medicine[generic]', price='$medicine[price]', quantity='$medicine[quantity]' WHERE id=$medicine[id]";
        $result = executeSQL($sql);
        return $result;
	}
	function removeMedicineFromDb($medicineID)
	{
		$sql = "DELETE FROM medicine WHERE id=$medicineID";
        $result = executeSQL($sql);
        return $result;
	}
	 function getAllMedicinesFromDb(){
        $sql = "SELECT * FROM medicine";        
        $result = executeSQL($sql);
        
        $medicines = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $medicines[$i] = $row;
        }
        
        return $medicines;
    }
	function getAllDonorsFromDb(){
        $sql = "SELECT * FROM donate_blood";        
        $result = executeSQL($sql);
        
        $donors = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $donors[$i] = $row;
        }
        
        return $donors;
    }
     function getMedicineByIdFromDb($medicineId){
        $sql = "SELECT * FROM medicine WHERE id=$medicineId";        
        $result = executeSQL($sql);
        
        $medicine = mysqli_fetch_assoc($result);
        
        return $medicine;
    } 
	function getDonorsByIdFromDb($donorId){
        $sql = "SELECT * FROM donate_blood WHERE id=$donorId";        
        $result = executeSQL($sql);
        
        $medicine = mysqli_fetch_assoc($result);
        
        return $medicine;
    } 
    function getMedicinesByNameFromDb($meDName){
        $sql = "SELECT * FROM medicine WHERE med_name LIKE '%$meDName%'";
        $result = executeSQL($sql);
        
        $medicines = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $medicines[$i] = $row;
        }
        
        return $medicines;
    }
	
	function getDonorsByNameFromDb($DName){
        $sql = "SELECT * FROM donate_blood WHERE donar_name LIKE '%$DName%'";
        $result = executeSQL($sql);
        
        $donors = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $donors[$i] = $row;
        }
        
        return $donors;
    }
	
    function getByMedicineNameOrIdFromDb($key){
        $sql = "SELECT * FROM medicine WHERE med_name LIKE '%$key%' OR id LIKE '%$key%'";
        $result = executeSQL($sql);
        
        $medicines = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $medicines[$i] = $row;
        }
        return $medicines;
    }
	function getByDonorsNameOrIdFromDb($key){
        $sql = "SELECT * FROM donate_blood WHERE donar_name LIKE '%$key%' OR donor_id LIKE '%$key%'";
        $result = executeSQL($sql);
        
        $medicines = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $medicines[$i] = $row;
        }
        return $medicines;
    }
    function getMedicineByIndicationFromDb($Indication){
        $sql = "SELECT * FROM medicine WHERE indication=$Indication";        
        $result = executeSQL($sql);
        
        $medicine = mysqli_fetch_assoc($result);
        
        return $medicine;
    }
    function getMedicineByGenericFromDb($Generic){
        $sql = "SELECT * FROM medicine WHERE generic=$Generic";        
        $result = executeSQL($sql);
        
        $medicine = mysqli_fetch_assoc($result);
        
        return $medicine;
    }
function getMedByCountFromDb(){
        $sql = "SELECT * FROM medicine ORDER BY sell_count DESC ";        
        $result = executeSQL($sql);
		
		$persons = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $person;
    }
?>
