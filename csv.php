<?php
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $company_name = "";
            if (isset($column[0])) {
                $userId = mysqli_real_escape_string($conn, $column[0]);
            }
            $email = "";
            if (isset($column[1])) {
                $email = mysqli_real_escape_string($conn, $column[1]);
            }
            $website = "";
            if (isset($column[2])) {
                $website = mysqli_real_escape_string($conn, $column[2]);
            }
            $phone = "";
            if (isset($column[3])) {
                $phone = mysqli_real_escape_string($conn, $column[3]);
            }
            $campaign = "";
            if (isset($column[4])) {
                $campaign = mysqli_real_escape_string($conn, $column[4]);
            }
            
            $sqlInsert = "INSERT into users (userId,userName,password,firstName,lastName)
                   values (?,?,?,?,?)";
            $paramType = "issss";
            $paramArray = array(
                $company_name,
                $email,
                $website,
                $phone,
                $campaign
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>