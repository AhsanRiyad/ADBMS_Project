<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>
<hr/>
<a href="../interface.html">HOME</a>
<hr/>
<?php
    $uName = $pswrd = $user_role = "";
    $nameErr = $emailErr = "";
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $uName=trim($_POST['userName']);
        $pswrd=trim($_POST['password']);
        $user_role="admin";

         $isValid = true;
        // if(empty($email)){
        //     $isValid = false;
        //     $emailErr = "*";
        // }
        // else if(isValidEmail($email)==false){
        //     $isValid = false;
        //     $emailErr = "Invalid email format";
        // }
        
        // if(empty($name)){
        //     $isValid = false;
        //     $nameErr = "*";
        // }
        // else if(isValidPersonName($name)==false){
        //     $isValid = false;
        //     $nameErr = "At least two words required, Only letters and white space allowed";
        // }
		if($_POST['password'] != $_POST['confirmPassword'])
		{
			$isValid = false;
			echo "Password not matched";
		}
        
        if($isValid==true){
             $person['userName'] = $uName;
              $person['password'] = $pswrd;
                  $person['role'] = $user_role;
                    //var_dump($person);



            addLogin($person);


            if(addPerson($person)==true){
                echo "<script>
                        alert('Record Added');
                        document.location='userReg.php';
                     </script>";
                die();
            }
            else{
                echo "Internal Error<hr/>";
            }
        }
    }
?>

<fieldset>ADD New Admin Credentials</fieldset>
<br />
<fieldset>
    <legend><b>REGISTRATION</b></legend>
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
                <td><input name="userName" type="text"></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input name="password" type="password"></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Confirm Password</td>
                <td>:</td>
                <td><input name="confirmPassword" type="password"></td>
                <td></td>
            </tr>       
        </table>
        <hr/>
        <input type="submit" value="Submit">
        <input type="reset">
    </form>
</fieldset>
<a href="regAs.html">Back</a>
