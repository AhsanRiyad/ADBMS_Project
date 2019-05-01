<title>delete medicine</title>
        
<?php require_once "../service/medicine_service.php";?>

<?php
    if(isset($_GET['id']))
    {
       // $medicineName = trim($_GET['medName']);
        //$med = getMedicinesByName($med);

        $medicineId = trim($_GET['id']);                      
        $medicine = getMedicineById($medicineId);
    }
?> 

<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
    if(removeMedicine($medicineId)==true)
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
                    <?= $medicine['med_name']?>  
                </td>
            </tr>
            <tr>
                <td>Id:</td>
                <td><?= $medicine['id']?></td>      
            </tr>                  
        </table>
        <hr/>
        <input type="Submit" value="delete"/> &nbsp;
        <a href="retrieve.php">Preview data</a>
    </form>
</fieldset>
<a href="add_delete_meds.php">Back</a>

