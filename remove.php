<?php
include("dbconfig.php");

$id = 0;
if(isset($_POST['id'])){
   $id = mysqli_real_escape_string($conn,$_POST['id']);
}

if($id > 0){

  $query1 = "SELECT * FROM `grocery` WHERE `id` = '$id'";
  $checkRecord = mysqli_query($conn,$query1);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query2 = "DELETE FROM `grocery` WHERE `id` = '$id'";
    mysqli_query($conn,$query2);
    echo 1;
    exit;
  }else{
    echo 0;
    exit;
  }
}

?>