<!-- <?php 

session_start(); 
require('../backendPart/config.php');

if(isset($_GET['staffId'])){
    $sql = 'SELECT * from cart inner join pizza using (PizzaID) where StaffID = '.$_GET['staffId'].';';
    
    $state = $conn->prepare($sql);

        $state->execute();
        $result = $stmt->get_result(); 
while($cartItems = $result->fetch_assoc()){

    $_sql = "";
}

        header("location: orderPage.php");

}
else{
    echo "No id passes";
}
?> -->