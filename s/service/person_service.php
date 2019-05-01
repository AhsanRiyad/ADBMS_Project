<?php require_once "../data/person_data_access.php"; ?>
<?php
    function addPerson($person){
        return addPersonToDb($person);
    }

    function addLogin($login){
        return addLoginToDb($login);
    }
    
    function editPerson($person){
        return editPersonToDb($person);
    }
    
    function removePerson($personId){
        return removePersonFromDb($personId);
    }
    
    function getAllPersons(){
        return getAllPersonsFromDb();
    }
    
    function getPersonById($personId){
        return getPersonByIdFromDb($personId);
    }
    
    function getPersonsByName($personName){
        return getPersonsByNameFromDb($personName);
    }
    
    function getPersonsByEmail($personEmail){
        return getPersonsByEmailFromDb($personEmail);
    }
    
    function getPersonsByNameOrEmail($key){
        return getPersonsByNameOrEmailFromDb($key);
    }
    
    function isUniquePersonEmail($personEmail){
        $persons  = getAllPersons();
        $isUnique = true;
        foreach($persons as $person){
            if($person['EMAIL']==$personEmail){
                $isUnique = false;
                break;
            }
        }
        return $isUnique;
    }

    function isUniquePersonUserName($personUName){
        $persons  = getAllPersons();
        $isUnique = true;
        foreach($persons as $person){
            if($person['UNAME']==$personUName){
                $isUnique = false;
                break;
            }
        }
        return $isUnique;
    }
    
    function isUniquePersonEmailForUpdate($personId, $personEmail){
        $persons  = getAllPersons();
        $isUnique = true;
        foreach($persons as $person){
            if($person['ID']!=$personId && $person['EMAIL']==$personEmail){
                $isUnique = false;
                break;
            }
        }
        return $isUnique;
    }
    
    function isValidPerson($personId){
        $persons = getAllPersons();
        $isValid = false;
        foreach($persons as $person){
            if($person['ID']==$personId){
                $isValid = true;
                break;
            }
        }
        return $isValid;
    }
?>