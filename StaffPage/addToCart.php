<?php 

session_start(); 
require('../backendPart/config.php');

if(isset($_GET['id'])){
    $sql = "INSERT into cart (PizzaID, StaffID) 
    VALUES (?, ?)";
    
    $state = $conn->prepare($sql);
    $state->bind_param("si", $_GET["id"], $_SESSION["STAFFID"]);

        $state->execute();

        header("location: orderPage.php");

}
else{
    echo "No id passes";
}
?>