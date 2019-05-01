<title>delete medicine</title>
        
<?php require_once "../service/otherProd_service.php";?>

<?php
    if(isset($_GET['pro_id']))
    {
       // $medicineName = trim($_GET['medName']);
        //$med = getMedicinesByName($med);

        $ProductID = trim($_GET['pro_id']);                      
        $Product = getProductById($ProductID);
		var_dump($Product);
    }
?> 

<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
    if(removeProduct($ProductID)==true)
    {
        echo "<script>
                alert('Record Deleted');
                document.location='retrieve_medicine.php';
             </script>";
        die();
    }
}
?>

<fieldset>
    <legend><b>Are You Sure?</b></legend>
    <form method="post">
        <br/>
        <table width="30%" cellpadding="2" cellspacing="0">
    
            <tr>
                <td>Medicine Name :</td>
                <td>
                    <?= $Product['pro_name']?>  
                </td>
            </tr>
            <tr>
                <td>Id:</td>
                <td><?= $Product['pro_id']?></td>      
            </tr>                  
        </table>
        <hr/>
        <input type="Submit" value="delete"/> &nbsp;
        <a href="retrieve.php">Preview data</a>
    </form>
</fieldset>
<a href="add_delete_products.php">Back</a>

