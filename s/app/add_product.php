<fieldset>
    <legend><b>Add Product</b></legend>

    <form method="post">
        <br/>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="130"></td>
                <td width="10"></td>
                <td width="230"></td>
                <td></td>
            </tr>
			<tr>
                <td>Product ID</td>
                <td>:</td>
                <td><input name="pro_id" type="text"></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Product Name</td>
                <td>:</td>
                <td><input name="pro_name" type="text"></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Price</td>
                <td>:</td>
                <td><input name="pro_price" type="text"></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Quantity</td>
                <td>:</td>
                <td><input name="pro_quan" type="text"></td>
                <td></td>
            </tr>                  
        </table>
        <hr/>
        <input type="submit" value="Submit">&nbsp;
        <a href="./retrieve_product.php">Preview data</a>
    </form>
</fieldset>
<a href="add_delete_products.php">Back</a>

<?php require_once "../service/otherProd_service.php";?> 
<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $pro_id=trim($_POST['pro_id']);
        $pro_name=trim($_POST['pro_name']);
        $pro_quan = trim($_POST['pro_quan']);
        $pro_price = trim($_POST['pro_price']);
		
		$Product['pro_id'] = $pro_id;
        $Product['pro_name'] = $pro_name;
        $Product['pro_quan'] = $pro_quan;
        $Product['pro_price'] = $pro_price;

        if (addProduct($Product) == true) {
            echo "<script>
                     alert('Record Added');
                    </script>";
            die();
        }
        else{
            echo "Internal issue<br/>";
        }

    }
?>


