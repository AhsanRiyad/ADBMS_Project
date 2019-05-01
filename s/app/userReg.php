<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>
<hr/>
<a href="../interface.html">HOME</a>
<hr/>
<?php
    $name = $email = $uName = $pswrd = $gender = $dob = $blood_group = $user_role = "";
    $nameErr = $emailErr = "";
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name=trim($_POST['name']);
        $email=trim($_POST['email']);
        $uName=trim($_POST['userName']);
        $pswrd=trim($_POST['password']);
        $gender=trim($_POST['gender']);
        $dob = $_POST['dob'];
        $blood_group=trim($_POST['blood']);
        $user_role="customer";

         $isValid = true;
        if(empty($email)){
            $isValid = false;
            $emailErr = "*";
        }
        else if(isValidEmail($email)==false){
            $isValid = false;
            echo "Invalid email format<br/>";    
        }
        else if(isUniquePersonEmail($email)==false){
            $isValid = false;
            echo "Email is not unique<br/>";
        }
        
        if(empty($name)){
            $isValid = false;
            $nameErr = "*";
        }
        else if(isValidPersonName($name)==false){
            $isValid = false;
           echo "name must contain at least two words<br/>";
        }

        if(isUniquePersonUserName($uName)==false){
            $isValid = false;
            echo "user name must be unique<br/>";
        }
        if(strlen($pswrd)<8)
        {
            $isValid = false;
            echo "Password must not be less than eight (8) characters<br/>";
        }
		if($_POST['password'] != $_POST['confirmPassword'])
		{
			$isValid = false;
			echo "Password not matched";
		}
	
        if($isValid==true){
            $person['name'] = $name;
            $person['email'] = $email;
            $person['userName'] = $uName;
            $person['password'] = $pswrd;
            $person['gender'] = $gender;
            $person['dob'] = $dob;
            $person['blood'] = $blood_group;
            $person['role'] = $user_role;



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


<fieldset>This is message box</fieldset>
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
                <td>Name</td>
                <td>:</td>
                <td><input name="name" type="text"></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input name="email" type="text">
                    <abbr title="hint: sample@example.com"><b>i</b></abbr>
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
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
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>   
                    <input name="gender" type="radio" value="male">Male
                    <input name="gender" type="radio" value="female">Female
                    <input name="gender" type="radio" value="other">Other
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td valign="top">Date of Birth</td>
                <td valign="top">:</td>
                <td>
                    <input name="dob" type="text">  
                    <font size="2"><i>(yyyy-mm-dd)</i></font>
                </td>
                <td></td>
            </tr>
             <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Blood Group</td>
                <td>:</td>
                <td>   
                        <select name="blood">
                         <optgroup label="Blood Groups">
                                <option name="blood" value="A+">A+</option>
                                <option name="blood" value="AB+">AB+</option>
                                <option name="blood" value="A-">A-</option>
                                <option name="blood" value="B+">B+</option>
                                <option name="blood" value="B-">B-</option>
                                <option name="blood" value="O+">O+</option>
                                <option name="blood" value="O-">O-</option>
                            </optgroup>
                        </select>
                </td>
                <td></td>
            </tr>
        </table>
        <hr/>
        <input type="submit" value="Submit">
        <input type="reset">
    </form>
</fieldset>
<a href="regAs.html">Back</a><?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>
<hr/>
<a href="../interface.html">HOME</a>
<hr/>
<?php
    $name = $email = $uName = $pswrd = $gender = $dob = $blood_group = $user_role = "";
    $nameErr = $emailErr = "";
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name=trim($_POST['name']);
        $email=trim($_POST['email']);
        $uName=trim($_POST['userName']);
        $pswrd=trim($_POST['password']);
        $gender=trim($_POST['gender']);
        $dob = $_POST['dob'];
        $blood_group=trim($_POST['blood']);
        $user_role="customer";

         $isValid = true;
        if(empty($email)){
            $isValid = false;
            $emailErr = "*";
        }
        else if(isValidEmail($email)==false){
            $isValid = false;
            echo "Invalid email format<br/>";    
        }
        else if(isUniquePersonEmail($email)==false){
            $isValid = false;
            echo "Email is not unique<br/>";
        }
        
        if(empty($name)){
            $isValid = false;
            $nameErr = "*";
        }
        else if(isValidPersonName($name)==false){
            $isValid = false;
           echo "name must contain at least two words<br/>";
        }

        if(isUniquePersonUserName($uName)==false){
            $isValid = false;
            echo "user name must be unique<br/>";
        }
        if(strlen($pswrd)<8)
        {
            $isValid = false;
            echo "Password must not be less than eight (8) characters<br/>";
        }
		if($_POST['password'] != $_POST['confirmPassword'])
		{
			$isValid = false;
			echo "Password not matched";
		}
	
        if($isValid==true){
            $person['name'] = $name;
            $person['email'] = $email;
            $person['userName'] = $uName;
            $person['password'] = $pswrd;
            $person['gender'] = $gender;
            $person['dob'] = $dob;
            $person['blood'] = $blood_group;
            $person['role'] = $user_role;



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


<fieldset>This is message box</fieldset>
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
                <td>Name</td>
                <td>:</td>
                <td><input name="name" type="text"></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input name="email" type="text">
                    <abbr title="hint: sample@example.com"><b>i</b></abbr>
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
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
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>   
                    <input name="gender" type="radio" value="male">Male
                    <input name="gender" type="radio" value="female">Female
                    <input name="gender" type="radio" value="other">Other
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td valign="top">Date of Birth</td>
                <td valign="top">:</td>
                <td>
                    <input name="dob" type="text">  
                    <font size="2"><i>(yyyy-mm-dd)</i></font>
                </td>
                <td></td>
            </tr>
             <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Blood Group</td>
                <td>:</td>
                <td>   
                        <select name="blood">
                         <optgroup label="Blood Groups">
                                <option name="blood" value="A+">A+</option>
                                <option name="blood" value="AB+">AB+</option>
                                <option name="blood" value="A-">A-</option>
                                <option name="blood" value="B+">B+</option>
                                <option name="blood" value="B-">B-</option>
                                <option name="blood" value="O+">O+</option>
                                <option name="blood" value="O-">O-</option>
                            </optgroup>
                        </select>
                </td>
                <td></td>
            </tr>
        </table>
        <hr/>
        <input type="submit" value="Submit">
        <input type="reset">
    </form>
</fieldset>
<a href="regAs.html">Back</a><?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>
<hr/>
<a href="../interface.html">HOME</a>
<hr/>
<?php
    $name = $email = $uName = $pswrd = $gender = $dob = $blood_group = $user_role = "";
    $nameErr = $emailErr = "";
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name=trim($_POST['name']);
        $email=trim($_POST['email']);
        $uName=trim($_POST['userName']);
        $pswrd=trim($_POST['password']);
        $gender=trim($_POST['gender']);
        $dob = $_POST['dob'];
        $blood_group=trim($_POST['blood']);
        $user_role="customer";

         $isValid = true;
        if(empty($email)){
            $isValid = false;
            $emailErr = "*";
        }
        else if(isValidEmail($email)==false){
            $isValid = false;
            echo "Invalid email format<br/>";    
        }
        else if(isUniquePersonEmail($email)==false){
            $isValid = false;
            echo "Email is not unique<br/>";
        }
        
        if(empty($name)){
            $isValid = false;
            $nameErr = "*";
        }
        else if(isValidPersonName($name)==false){
            $isValid = false;
           echo "name must contain at least two words<br/>";
        }

        if(isUniquePersonUserName($uName)==false){
            $isValid = false;
            echo "user name must be unique<br/>";
        }
        if(strlen($pswrd)<8)
        {
            $isValid = false;
            echo "Password must not be less than eight (8) characters<br/>";
        }
		if($_POST['password'] != $_POST['confirmPassword'])
		{
			$isValid = false;
			echo "Password not matched";
		}
	
        if($isValid==true){
            $person['name'] = $name;
            $person['email'] = $email;
            $person['userName'] = $uName;
            $person['password'] = $pswrd;
            $person['gender'] = $gender;
            $person['dob'] = $dob;
            $person['blood'] = $blood_group;
            $person['role'] = $user_role;



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


<fieldset>This is message box</fieldset>
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
                <td>Name</td>
                <td>:</td>
                <td><input name="name" type="text"></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input name="email" type="text">
                    <abbr title="hint: sample@example.com"><b>i</b></abbr>
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
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
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>   
                    <input name="gender" type="radio" value="male">Male
                    <input name="gender" type="radio" value="female">Female
                    <input name="gender" type="radio" value="other">Other
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td valign="top">Date of Birth</td>
                <td valign="top">:</td>
                <td>
                    <input name="dob" type="text">  
                    <font size="2"><i>(yyyy-mm-dd)</i></font>
                </td>
                <td></td>
            </tr>
             <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Blood Group</td>
                <td>:</td>
                <td>   
                        <select name="blood">
                         <optgroup label="Blood Groups">
                                <option name="blood" value="A+">A+</option>
                                <option name="blood" value="AB+">AB+</option>
                                <option name="blood" value="A-">A-</option>
                                <option name="blood" value="B+">B+</option>
                                <option name="blood" value="B-">B-</option>
                                <option name="blood" value="O+">O+</option>
                                <option name="blood" value="O-">O-</option>
                            </optgroup>
                        </select>
                </td>
                <td></td>
            </tr>
        </table>
        <hr/>
        <input type="submit" value="Submit">
        <input type="reset">
    </form>
</fieldset>
<a href="regAs.html">Back</a>
