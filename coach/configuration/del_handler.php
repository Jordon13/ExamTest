<?php

include "delete.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    @$getid = secure_data($_POST['info']);
}


function secure_data($data)
{   $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$Del_Row = new Delete;
$Del_Row->del_row($getid);

?>
