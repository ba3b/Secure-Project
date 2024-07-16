<?php
session_start(); 
require('../backendPart/config.php');

$token = $_POST["stripeToken"];
$tokenCardType = $_POST["stripeTokenType"];
$amount = '';
$order_id = $_GET['order_id'];
$id = $_GET['order_id'];


$charge = \Stripe\Charge::create([
    // 'amount' => 5.5,
    'description' => $order_id,
    'currency' => 'myr',
    'source' => $token,
]);


if ($charge) {

    header("Location:staffMainPage.php");
}

?>