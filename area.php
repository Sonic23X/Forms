<?php

try {
    $wsdl_url = 'http://localhost:8080/VolumenFG/Esfera?wsdl';
    $client = new SOAPClient($wsdl_url);
    $rad = (String) $_POST['numero'];
    $params = array(
        'radio' => $rad,
    );
    $return = $client->Area($params);
    echo "Resultado: " . $return->return;
} catch (Exception $e) {
    echo "Exception occured: " . $e;
}