<?php
    function currencyConverter($amount, $form_Currency, $to_Currency){
        $form_Currency = urlencode(strtoupper($form_Currency));
        $to_Currency = urlencode(strtoupper($to_Currency));

        $url = file_get_contents('https://free.currconv.com/api/v7/convert?q='.$form_Currency.'_'.$to_Currency.'&compact=ultra&apiKey=4686fe9607f81c64d26e');
        $json = json_decode($url, true);
       
        $val = $json[$form_Currency.'_'.$to_Currency];
        $converted_amount = $val * $amount;
        
        $data = array(
                
                'rate' => $val, 
                'converted_amount' => $converted_amount, 
                'form_Currency' => strtoupper($form_Currency),
                'to_Currency' => strtoupper($to_Currency)
            );
            
        echo json_encode($data);    
    }
?>