<?php require_once "../service/otherProd_service.php"; ?>
<?php
	$pro_id= $pro_name = $pro_quan= $pro_price= $total_q = "";

?>

<?php
    if(isset($_GET['pro_id']))
    {
        $ProductID = trim($_GET['pro_id']);                      
        $product = getProductById($ProductID);
		
    }
?> 
<?php

	 if($_SERVER['REQUEST_METHOD']=="POST"){

        $ProductOrder = array();
        
		$pro_id=trim($_POST['pro_id']); 
        $pro_name=trim($_POST['pro_name']);
        $pro_quan=trim($_POST['pro_quan']);
		$pro_price=trim($_POST['pro_price']);
		
        if (!empty($pro_quan)) {
            $ProductOrder['pro_name'] = $pro_name;
            $ProductOrder['pro_quan'] = $pro_quan;

            if($_POST['pro_quan'] <= $product['pro_quan'])
            {
                $total_q = $pro_price * $pro_quan;
                $ProductOrder['total_q'] = $total_q;
                

            }
            else
            {
                echo "Quantity can not exceed the maximum limit " . $product['pro_quan'];
            }
           // addOrder($medicineOrder);

            if(addOrder($ProductOrder)==true){
                echo "success";
            }
            else{
                echo "Internal Error<hr/>";
                var_dump($ProductOrder);
            }


            
        }
        else
            {
                echo "Quantity can not be empty";
            }

        
        }
?>
<fieldset>
    <legend><b>Buy Products</b></legend>
    <form method="post">
        <table border="0" cellspacing="0" cellpadding="3">
            <tr>
                <td width="20%">Product ID</td>
                <td>:</td>
                <td><input name="pro_id" value="<?= $pro_id ?>"/></td>
                
            </tr> 
            <tr>
                <td width="20%">Product Name</td>
                <td>:</td>
                <td><input name="pro_name" value="<?= $product['pro_name']; ?>"/></td>  
            </tr>
            
			<tr>
                <td>Price</td>
                <td>:</td>
                <td><input name="pro_price" value="<?= $product['pro_price']?>"/></td>
                
            </tr>
            <tr>
                <td>Quantity you want</td>
                <td>:</td>
                <td><input name="pro_quan type="text"/></td>
                
            </tr>
            <tr>
                <td>Total Cost</td>
                <td>:</td>
                <td><?php echo $total_q; ?></td>
            </tr>
        </table>
        <hr/>
        <input type="submit" value="SUBMIT" /><br/><br>
        <a href="OtherProduct.php">Back</a>
    </form>
</fieldset>
