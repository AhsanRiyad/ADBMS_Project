<?php require_once "data_access.php"; ?>
<?php
    function addPersonToDb($person){
        $sql = "INSERT INTO customer(id, name, email, uName, pswrd, gender, dob, blood_group) VALUES (NULL, '$person[name]', '$person[email]', '$person[userName]', '$person[password]', '$person[gender]', '$person[dob]', '$person[blood]')";
        $result = executeSQL($sql);
        return $result;
    }
    
    function addLoginToDb($login){
        $sql = "INSERT INTO login(id, uName, pswrd, role) VALUES (NULL, '$login[userName]', '$login[password]', '$login[role]')";
        $result = executeSQL($sql);
        return $result;
    }
    
    function editPersonToDb($person){
        $sql = "UPDATE customer SET name='$person[name]', email='$person[email]', uName='$person[userName]', pswrd='$person[password]', gender='$person[gender]', dob='$person[dob]', blood_group='$person[blood]', role='$person[role]' WHERE id=$person[id]";
        $result = executeSQL($sql);
        return $result;
    }
    
    function removePersonFromDb($personId){
        $sql = "DELETE FROM customer WHERE id=$personId";        
        $result = executeSQL($sql);
        return $result;
    }
    
    function getAllPersonsFromDb(){
        $sql = "SELECT * FROM customer";        
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }

    function getPersonByCountFromDb(){
        $sql = "SELECT * FROM customer ORDER BY buy_count DESC ";        
        $result = executeSQL($sql);
		
		$persons = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $person;
    }
    
    function getPersonByIdFromDb($personId){
        $sql = "SELECT * FROM customer WHERE id=$personId";        
        $result = executeSQL($sql);
        
        $person = mysqli_fetch_assoc($result);
        
        return $person;
    }  

    function getloginInfoFromDb($username, $password){
        $sql = "SELECT * FROM login WHERE uName='$username' AND pswrd='$password'";        
        $result = executeSQL($sql);
          
        $row = mysqli_fetch_assoc($result);
        
        return $row;
    }    

    function getPersonsByNameFromDb($personName){
        $sql = "SELECT * FROM customer WHERE uName LIKE '%$personName%'";
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }
    
    function getPersonsByEmailFromDb($personEmail){
        $sql = "SELECT * FROM customer WHERE email LIKE '%$personEmail%'";
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }
    
    function getPersonsByNameOrEmailFromDb($key){
        $sql = "SELECT * FROM customer WHERE name LIKE '%$key%' OR email LIKE '%$key%'";
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }
    
?>
