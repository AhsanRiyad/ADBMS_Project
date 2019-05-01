<?php require_once "../service/person_service.php"; ?>
<?php
	$cName = $cEmail = $cUname = $cPswrd = $cGender = $cDob = $cBG = "";
?>
<?php session_start(); ?>
<?php
    if(isset($_SESSION['uName']))
    {
        $personUname = trim($_SESSION['uName']);                      
        $persons = getPersonsByEmail($personUname);
    }
?> 
<?php
	 if($_SERVER['REQUEST_METHOD']=="POST"){
        //fetching
        /*$cName=trim($_POST['name']);
        $cEmail=trim($_POST['email']);
        $cUname=trim($_POST['userName']);
        $cPswrd=trim($_POST['password']);
        $cGender=trim($_POST['gender']);	 	
        $cDob=trim($_POST['dob']);
        $cBG=trim($_POST['blood']); */

        //assigning
        /*$person['name'] = $cName;
        $person['email'] = $cEmail;
        $person['userName'] = $cUname;
        $person['password'] = $cPswrd;
        $person['gender'] = $cGender;
        $person['dob'] = $cDob;
        $person['blood'] = $cBG;*/

   	}
?>
<fieldset>
    <legend><b>PROFILE</b></legend>
    <form method="POST">
        <br/>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="130"></td>
                <td width="10"></td>
                <td width="230"></td>
                <td></td>
            </tr>
            <?php foreach ($persons as $person) { ?>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><?= $person['name']?></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <?= $person['email']?>
                    
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>User Name</td>
                <td>:</td>
                <td><?= $person['uName']?></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><?= $person['pswrd']?></td>
                <td></td>
            </tr>      
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>   
                    <?=$person['gender']?>
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td valign="top">Date of Birth</td>
                <td valign="top">:</td>
                <td>
                    <?= $person['dob']?>
                    <font size="2"><i>(yyyy-mm-dd)</i></font>
                </td>
                <td></td>
            </tr>
             <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Blood Group</td>
                <td>:</td>
                <td>   
                        <?=$person['blood_group']?>
                </td>
                <td></td>
            </tr>
            <?php } ?>
        </table>	
        <hr/>
        <a href="edit_profile.php?email=<?=$person['email']?>">Edit</a>
        <br> Back to <a href="settings.html">Settings</a>
    </form>
</fieldset><?php require_once "../service/person_service.php"; ?>
<?php
	$cName = $cEmail = $cUname = $cPswrd = $cGender = $cDob = $cBG = "";
?>
<?php session_start(); ?>
<?php
    if(isset($_SESSION['uName']))
    {
        $personUname = trim($_SESSION['uName']);                      
        $persons = getPersonsByEmail($personUname);
    }
?> 
<?php
	 if($_SERVER['REQUEST_METHOD']=="POST"){
        //fetching
        /*$cName=trim($_POST['name']);
        $cEmail=trim($_POST['email']);
        $cUname=trim($_POST['userName']);
        $cPswrd=trim($_POST['password']);
        $cGender=trim($_POST['gender']);	 	
        $cDob=trim($_POST['dob']);
        $cBG=trim($_POST['blood']); */

        //assigning
        /*$person['name'] = $cName;
        $person['email'] = $cEmail;
        $person['userName'] = $cUname;
        $person['password'] = $cPswrd;
        $person['gender'] = $cGender;
        $person['dob'] = $cDob;
        $person['blood'] = $cBG;*/

   	}
?>
<fieldset>
    <legend><b>PROFILE</b></legend>
    <form method="POST">
        <br/>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="130"></td>
                <td width="10"></td>
                <td width="230"></td>
                <td></td>
            </tr>
            <?php foreach ($persons as $person) { ?>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><?= $person['name']?></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <?= $person['email']?>
                    
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>User Name</td>
                <td>:</td>
                <td><?= $person['uName']?></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><?= $person['pswrd']?></td>
                <td></td>
            </tr>      
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>   
                    <?=$person['gender']?>
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td valign="top">Date of Birth</td>
                <td valign="top">:</td>
                <td>
                    <?= $person['dob']?>
                    <font size="2"><i>(yyyy-mm-dd)</i></font>
                </td>
                <td></td>
            </tr>
             <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Blood Group</td>
                <td>:</td>
                <td>   
                        <?=$person['blood_group']?>
                </td>
                <td></td>
            </tr>
            <?php } ?>
        </table>	
        <hr/>
        <a href="edit_profile.php?email=<?=$person['email']?>">Edit</a>
        <br> Back to <a href="settings.html">Settings</a>
    </form>
</fieldset><?php require_once "../service/person_service.php"; ?>
<?php
	$cName = $cEmail = $cUname = $cPswrd = $cGender = $cDob = $cBG = "";
?>
<?php session_start(); ?>
<?php
    if(isset($_SESSION['uName']))
    {
        $personUname = trim($_SESSION['uName']);                      
        $persons = getPersonsByEmail($personUname);
    }
?> 
<?php
	 if($_SERVER['REQUEST_METHOD']=="POST"){
        //fetching
        /*$cName=trim($_POST['name']);
        $cEmail=trim($_POST['email']);
        $cUname=trim($_POST['userName']);
        $cPswrd=trim($_POST['password']);
        $cGender=trim($_POST['gender']);	 	
        $cDob=trim($_POST['dob']);
        $cBG=trim($_POST['blood']); */

        //assigning
        /*$person['name'] = $cName;
        $person['email'] = $cEmail;
        $person['userName'] = $cUname;
        $person['password'] = $cPswrd;
        $person['gender'] = $cGender;
        $person['dob'] = $cDob;
        $person['blood'] = $cBG;*/

   	}
?>
<fieldset>
    <legend><b>PROFILE</b></legend>
    <form method="POST">
        <br/>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="130"></td>
                <td width="10"></td>
                <td width="230"></td>
                <td></td>
            </tr>
            <?php foreach ($persons as $person) { ?>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><?= $person['name']?></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <?= $person['email']?>
                    
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>User Name</td>
                <td>:</td>
                <td><?= $person['uName']?></td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><?= $person['pswrd']?></td>
                <td></td>
            </tr>      
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>   
                    <?=$person['gender']?>
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td valign="top">Date of Birth</td>
                <td valign="top">:</td>
                <td>
                    <?= $person['dob']?>
                    <font size="2"><i>(yyyy-mm-dd)</i></font>
                </td>
                <td></td>
            </tr>
             <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Blood Group</td>
                <td>:</td>
                <td>   
                        <?=$person['blood_group']?>
                </td>
                <td></td>
            </tr>
            <?php } ?>
        </table>	
        <hr/>
        <a href="edit_profile.php?email=<?=$person['email']?>">Edit</a>
        <br> Back to <a href="settings.html">Settings</a>
    </form>
</fieldset>
