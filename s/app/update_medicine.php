<?php require_once "../service/medicine_service.php"; ?>
<?php
	$medName = $id = $indiCation = $generic = $medPrice = $medQuantity = "";
?>

<?php
    if(isset($_GET['id']))
    {
        $medicineId = trim($_GET['id']);                      
        $medicine = getMedicineById($medicineId);
    }
?> 
<?php
	 if($_SERVER['REQUEST_METHOD']=="POST"){
        //$id=$_POST['id'];
        $medName=trim($_POST['medName']);
        $indiCation=trim($_POST['indication']);
        $generic=trim($_POST['generic']);
        $medPrice=trim($_POST['price']);
        $medQuantity=trim($_POST['quantity']);	 	

        //$medicine['id'] = $id;
        $medicine['medName'] = $medName;
        $medicine['indication'] = $indiCation;
        $medicine['generic'] = $generic;
        $medicine['price'] = $medPrice;
        $medicine['quantity'] = $medQuantity;
	 

	  if(editMedicine($medicine)==true){
                echo "<script>
                        alert('Record Updated');
                        document.location='retrieve_medicine.php';
                     </script>";
                die();
            }
            else{
                echo "Internal Error<hr/>";
                die();
            }
        }
?>
<fieldset>
    <legend>UPDATE</legend>
    <form method="post">
        <table border="0" cellspacing="0" cellpadding="3">
            <!-- <tr>
                <td>Id</td>
                <td><input name="id" value="<?= $id ?>"/></td>
                
            </tr> -->
            <tr>
                <td>Medicine Name</td>
                <td><input name="medName" value="<?= $medicine['med_name']?>"/></td>
                
            </tr>
            <tr>
                <td>Indication</td>
                <td><input name="indication" value="<?= $medicine['indication']?>"/></td>
                
            </tr>
            <tr>
                <td>Generic</td>
                <td><input name="generic" value="<?= $medicine['generic']?>"/></td>
                
            </tr>
            <tr>
                <td>Price</td>
                <td><input name="price" value="<?= $medicine['price']?>"/></td>
                
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input name="quantity" value="<?= $medicine['quantity']?>"/></td>
                
            </tr>
        </table>
        <hr/>
        <input type="submit" value="SAVE" /><br/>
        <a href="add_delete_meds.php">Back</a>
    </form>
</fieldset>