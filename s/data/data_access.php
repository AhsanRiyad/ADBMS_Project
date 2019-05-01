<?php
    /*$host="127.0.0.1";
    $user="root";
    $pass="";
    $dbname="sheba";
    $port=3306;
   
    function executeSQL($sql){
        global $host, $user, $pass, $dbname, $port;
        
        $link=mysqli_connect($host, $user, $pass, $dbname, $port);
        $result = mysqli_query($link, $sql);
        mysqli_close($link);
        
        return $result;
    }*/






function executeSQL($sql){

// Connects to the XE service (i.e. database) on the "localhost" machine
$conn = oci_connect('sheba', '1234', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$result = oci_parse($conn, $sql);
oci_execute($result);

oci_close($conn);
return $result;
}
/*echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
        
    }
    echo "</tr>\n";
    echo $row['PRODUCT_ID'];

}
echo "</table>\n";


*/
  //oci_execute($stid);
//echo $result[1]['product_name'];
//$row = oci_fetch_array($stid);
//print_r($row[2]['PRODUCT_NAME']);
//echo $row['PRODUCT_ID'];

?>
