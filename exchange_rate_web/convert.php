<?php
    include_once("functions.php");
    if(isset($_POST['convert'])) {
        $form_Currency = trim($_POST['form_currency']);
        $to_Currency = trim($_POST['to_currency']);
        $amount = trim($_POST['amount']);

        if($form_Currency == $to_Currency ) {
            $data = array('error' => '1');
            echo json_encode($data);
            exit;
        }

        $converted_currency = currencyConverter($amount, $form_Currency, $to_Currency);
        echo $converted_currency;
        
    }
?>