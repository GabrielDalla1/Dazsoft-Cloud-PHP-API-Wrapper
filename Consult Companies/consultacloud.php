<?php

//endpoint da api
$url = 'https://XXXXXXX.com.br/pabx/api.php';



$valor = 0; // Inicializa a variável com valor 0


//array que realiza a consulta
$data = array(
    'autenticacao' => array(
        'usuario' => 'TOKEN_NAME',
        'token' => 'TOKEN_HASH'
    ),
    'acao' => 'listar_clientes',
    'cliente_id' => "",
    'nome' => "",
    'pos_registro_inicial' => $valor,
);

//trata a array para json
$data_string = json_encode($data);

//inicializa a sessão
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string)
));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$result = curl_exec($ch);

if ($result === false) {
    // Handle error
    echo "Failed to call the API: " . curl_error($ch);
} else {
    // Process the API response
    $response = json_decode($result, true);
    // Access the returned company information
    // Example: $companyName = $response['empresas'][0]['nome'];
    
}
   $responsee = json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_OBJECT_AS_ARRAY );
    echo "<pre>";
         print_r($responsee);
    echo "</pre>";
curl_close($ch);

?>
