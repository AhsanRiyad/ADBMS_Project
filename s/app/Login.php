<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>
<hr/>
<a href="../interface.html">HOME</a>
<hr/>
<?php
    session_start();
    $uname = $password = $role = "";
    $nameErr = $emailErr = "";
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $uname=trim($_POST['name']);
        $password=trim($_POST['pswrd']);

        $isValid = true;
        if($isValid==true){
            $login['name'] = $uname;
            $login['pswrd'] = $password;
        $login = getloginInfoFromDb($uname, $password);

        if($login['role']=="customer")
        {
              $_SESSION['uName'] = $login['uName'];
              header("location:user_index.php");
         }
        elseif($login['role']=="admin") 
    	{
        	echo "<script>
                        document.location='../admin/Admin_index.php';
                     </script>";
                die();

        }
        else
        {
        	echo "<script>
                        alert('incorrect username or password !!!');
                        document.location='../web_index.html';
                     </script>";
                die();
        }
        // if($uname == "admin" && $password == "abcd")
        // {
        // 	echo "<script>
        //                 alert('Record Added');
        //                 document.location='../admin/Admin_index.html';
        //              </script>";
        //         die();
        // }
        // else
        // {
        // 	echo "login failed !!";
        // }
       }
   }
?>
<form method="POST" target="_parent">
	<table width="100%" height="90%" align="center" cellspacing="1" cellpadding="10" border="0" bgcolor="white">
			<td>
				<table align="center" border="1" cellpadding="25" cellspacing="10" width="70%" height="100%">
					<tr>
						<td height="90" colspan="2"><b>LOGIN:</b></td>
					</tr>
					<tr>
						<td>
							<table border="0" cellpadding="0" cellspacing="15" width="60%" height="60%">
								<tr>
									<td>Username:</td>
									<td><input type="text" name="name" /></td>
								</tr>
								<tr>
									<td>Password:</td>
									<td><input type="text" name="pswrd" /></td>
								</tr>
								<tr>
									<td colspan="2"><input name="remember" type="checkbox">Remember Me</td>
								</tr>
								<tr>
									<td><input type="submit" value="Submit"></td>
        							<td><a href="forgot_password.html">Forgot Password?</a></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
	</table>
</form>