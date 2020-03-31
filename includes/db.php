<?php
//Destroy entire website session
//session_start();
//$_SESSION = array();
//if (ini_get("session.use_cookies")) {
//    $params = session_get_cookie_params();
//    setcookie(session_name(), '', time() - 42000,
//        $params["path"], $params["domain"],
//        $params["secure"], $params["httponly"]
//    );
//}
//session_destroy();


session_start();
require_once ("config.php");
$currency = '&#8358;';
$connection=new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$connection){
    die("unable to connect::". mysqli_error());
}else{
    echo "";
}

//Order delivery charge
$set_default_charge = "SELECT meta_value FROM settings where meta_name = 'SDC' and meta_status = 1";
$sdc = mysqli_query($connection, $set_default_charge);
if(mysqli_num_rows($sdc) > 0){
    $sdc_data = mysqli_fetch_assoc($sdc);
}
if(isset($sdc_data) && !empty($sdc_data)) {
    $_ENV["set_delivery_charge"] = doubleval($sdc_data["meta_value"]);
}

//Payment gateway set secret key
$set_secret_key = "SELECT * FROM settings where meta_name = 'SSK' and meta_status = 1";
$ssk = mysqli_query($connection, $set_secret_key);
if(mysqli_num_rows($ssk) > 0){
    $ssk_data = mysqli_fetch_assoc($ssk);
}
if(isset($ssk_data) && !empty($ssk_data)){
    $_ENV["set_secret_key"] = $ssk_data["meta_value"];
}


//Payment gateway set public key
$set_public_key = "SELECT meta_value FROM settings where meta_name = 'SPK' and meta_status = 1";
$spk = mysqli_query($connection, $set_public_key);
if(mysqli_num_rows($spk) > 0){
    $spk_data = mysqli_fetch_assoc($spk);
}
if(isset($spk_data) && !empty($spk_data)) {
    $_ENV["set_public_key"] = $spk_data["meta_value"];
}

