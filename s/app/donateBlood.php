<table width="100%" height = "100%" align="center" cellspacing="1" cellpadding="10" border="1" bgcolor="black">
      
			<tr bgcolor="white" align="center">
			     <td height="150" colspan="3">
			     	 <h1>Donate Blood</h1>
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
                <td>User Name</td>
                <td>:</td>
                <td><input name="name" type="text"></td>
                <td></td>
            </tr>
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
                <td>Blood Group</td>
                <td>:</td>
                <td>   
                    <select name="bg">
                     <optgroup label="Blood Groups">
                            <option value="A+">A+</option>
                            <option value="AB+">AB+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </optgroup>
                    </select>
                </td>
                <td></td>
            </tr>			
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Contact no</td>
                <td>:</td>
                <td><input name="contact" type="text"></td>
                <td></td>
            </tr>		
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Area</td>
                <td>:</td>
                <td>   
                    <select name="area">
                        <optgroup label="Areas">
                            <option value="Dhanmondi">Dhanmondi</option>
                            <option value="Gulshan">Gulshan</option>
                            <option value="Banani">Banani</option>
                            <option value="Mirpur">Mirpur</option>
                        </optgroup>
                    </select>
                </td>
                <td></td>
            </tr>		
             <tr><td colspan="4"><hr/></td></tr>
        </table>
        <hr/>
        <input type="submit" value="submit">
    </form>
</td></tr>
</select>
          <ul align="left">
 
            </ul>
       </tr>
		</table>
<a href="../Blood_Bank.html">Back</a>

<?php require_once "../service/medicine_service.php";?> 
<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $bloodName=trim($_POST['name']);
        $bloodGroup = trim($_POST['bg']);
        $contactNo = trim($_POST['contact']);
        $area = trim($_POST['area']);

        $blood['name'] = $bloodName;
        $blood['bg'] = $bloodGroup;
        $blood['contact'] = $contactNo;
        $blood['area'] = $area;

        if (donateBlood($blood) == true) {
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