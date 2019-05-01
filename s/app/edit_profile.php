                     
<fieldset>This is message box
		<?php require_once "../service/person_service.php"; ?>
		<?php $personName = $pEmail =  $Dob ="";
		?>
	<?php
	 //session_start();
	// var_dump($_GET['email']);
	 if(isset($_GET['email']))
    {
        $personName = trim($_GET['email']);                      
        $persons = getPersonsByEmail($personName)[0];
		//var_dump($persons);
    } 
	?>
	<?php
		if($_SERVER['REQUEST_METHOD']=="POST"){
        
        $personName=trim($_POST['name']);
        $pEmail=trim($_POST['email']);
        
        $Dob=trim($_POST['dob']);
       	 	

        //$person['id'] = $id;
        $persons['uName'] = $personName;
        $persons['email'] = $pEmail;
      
        $persons['dob'] = $Dob;
        }
	?>
</fieldset>
<br />

    <legend><b>EDIT PROFILE</b></legend>
    <form method="post">
        <br/>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="100"></td>
                <td width="10"></td>
                <td width="230"></td>
                <td></td>
            </tr>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><input name="name" type="text" value="<?=$persons['uName']?>"></td>
                <td></td>
            </tr>		
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input name="email" type="text" value="<?= $persons['email']?>">
                    <abbr title="hint: sample@example.com"><b>i</b></abbr>
                </td>
                <td></td>
            </tr>				
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>   
                    <input name="gender" type="radio" checked="checked">Male
                    <input name="gender" type="radio">Female
                    <input name="gender" type="radio">Other
                </td>
                <td></td>
            </tr>		
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td valign="top">Date of Birth</td>
                <td valign="top">:</td>
                <td>
                    <input name="dob" type="text" value="<?= $persons['dob']?>">
                    <font size="2"><i>(dd/mm/yyyy)</i></font>
                </td>
                <td></td>
            </tr>
        </table>
        <hr/>
        <input type="submit" value="Save">	
       <br> Back to <a href="settings.html">Settings</a>
    </form>
