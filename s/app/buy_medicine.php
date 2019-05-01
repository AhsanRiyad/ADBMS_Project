<?php require_once "../service/medicine_service.php"; ?>
<?php
	$medName = $id = $indiCation = $generic = $medPrice = $medQuantity = $total_q = "";

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

        $medicineOrder = array();

        $medName=trim($_POST['medName']);
        $indiCation=trim($_POST['indication']);
        $generic=trim($_POST['generic']);
        $medPrice=trim($_POST['price']);
        $medQuantity=trim($_POST['quantity']);   

        if (!empty($medQuantity)) {
            $medicineOrder['medName'] = $medName;
            //$medicineOrder['indication'] = $indiCation;
            //$medicineOrder['generic'] = $generic;
            //$medicineOrder['price'] = $medPrice;
            $medicineOrder['quantity'] = $medQuantity;

            if($_POST['quantity'] <= $medicine['quantity'])
            {
                $total_q = $medPrice * $medQuantity;
                $medicineOrder['total_q'] = $total_q;
                

            }
            else
            {
                echo "Quantity can not exceed the maximum limit " . $medicine['quantity'];
            }
           // addOrder($medicineOrder);

            if(addOrder($medicineOrder)==true){
                echo "success";
            }
            else{
                echo "Internal Error<hr/>";
                var_dump($medicineOrder);
            }


            
        }
        else
            {
                echo "Quantity can not be empty";
            }

        
        }
?>
<fieldset>
    <legend><b>Buy Medicines</b></legend>
    <form method="post">
        <table border="0" cellspacing="0" cellpadding="3">
            <!-- <tr>
                <td>Id</td>
                <td><input name="id" value="<?= $id ?>"/></td>
                
            </tr> -->
            <tr>
                <td width="20%">Medicine Name</td>
                <td>:</td>
                <td><input name="medName" value="<?= $medicine['med_name']; ?>"/></td>
                
            </tr>
            <tr>
                <td>Indication</td>
                <td>:</td>
                <td><input name="indication" value="<?= $medicine['indication']; ?>"/></td>
                
            </tr>
            <tr>
                <td>Generic</td>
                <td>:</td>
                <td><input name="generic" value="<?= $medicine['generic']; ?>"/></td>
                
            </tr>
            <tr>
                <td>Price</td>
                <td>:</td>
                <td><input name="price" value="<?= $medicine['price']?>"/></td>
                
            </tr>
            <tr>
                <td>Quantity you want</td>
                <td>:</td>
                <td><input name="quantity" type="text"/></td>
                
            </tr>
            <tr>
                <td>Total Cost</td>
                <td>:</td>
                <td><?php echo $total_q; ?></td>
            </tr>
        </table>
        <hr/>
        <input type="submit" value="SUBMIT" /><br/><br>
        <a href="medicine_list.php">Back</a>
    </form>
</fieldset>