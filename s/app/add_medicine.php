<fieldset>
    <legend><b>Add Medicine</b></legend>

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
                <td>Medicine Name</td>
                <td>:</td>
                <td><input name="medName" type="text"></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Instruction</td>
                <td>:</td>
                <td>
                    <textarea name="indication" type="text"></textarea>    
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Generic</td>
                <td>:</td>
                <td><input name="generic" type="text"></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Price</td>
                <td>:</td>
                <td><input name="price" type="text"></td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Quantity</td>
                <td>:</td>
                <td><input name="quantity" type="text"></td>
                <td></td>
            </tr>                  
        </table>
        <hr/>
        <input type="submit" value="Submit">&nbsp;
        <a href="retrieve_medicine.php">Preview data</a>
    </form>
</fieldset>
<a href="add_delete_meds.php">Back</a>

<?php require_once "../service/medicine_service.php";?> 
<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $medname=trim($_POST['medName']);
        $indiCation = trim($_POST['indication']);
        $generic = trim($_POST['generic']);
        $medPrice = trim($_POST['price']);
        $medQuantity = trim($_POST['quantity']);

        $medicine['medName'] = $medname;
        $medicine['indication'] = $indiCation;
        $medicine['generic'] = $generic;
        $medicine['price'] = $medPrice;
        $medicine['quantity'] = $medQuantity;

        if (addMedicine($medicine) == true) {
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


