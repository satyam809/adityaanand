<?php 
require 'config.php';
if (isset($_GET['export'])) {
        $sql = "SELECT * FROM `contact`";  
        $setRec = $conn->query($sql);  
        $columnHeader = '';  
        $columnHeader = "id" . "\t" . "name" . "\t" . "email" . "\t" ."subject" . "\t" ."message" ."\t" ."date" ."\t";  
        $setData = '';  
          while ($rec = mysqli_fetch_row($setRec)) {  
            $rowData = '';  
            foreach ($rec as $value) {  
                $value = '"' . $value . '"' . "\t";  
                $rowData .= $value;  
            }  
            $setData .= trim($rowData) . "\n";   
        }  
        header("Content-type: application/octet-stream");  
        header("Content-Disposition: attachment; filename=contact.xls");  
        header("Pragma: no-cache");  
        header("Expires: 0");  

        echo ucwords($columnHeader) . "\n" . $setData . "\n";
    }
?>