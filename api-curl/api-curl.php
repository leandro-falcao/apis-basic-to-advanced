<?php

/**
vamos usar a api com curl recebendo param na url de método GET   
**/
class orderCurl
{
    public function sendCurl()
    {
        //receber o valor de input vindo do postman via json atravez do body
        $vindoPostamanBodyjson = file_get_contents('php://input');
        $data = json_decode($vindoPostamanBodyjson, true);
        $nome = $data['nome'];


        // Constrói a URL da solicitação GET
        $url = "https://api.agify.io/?name={$nome}"; //. http_build_query($getParams);

        // Inicializa a sessão cURL
        $ch = curl_init();

        // Define as opções de cURL usando curl_setopt_array()
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $options);

        // Executa a solicitação cURL1111111
        $response = curl_exec($ch);

        // Verificando se ocorreu algum erro durante a solicitação cURL
        if (curl_errno($ch)) {
            echo 'Erro: ' . curl_error($ch);
        }

        // Fecha o cURL
        curl_close($ch);

        // Exibe a resposta da solicitação cURL
        return $response;



    }


}

