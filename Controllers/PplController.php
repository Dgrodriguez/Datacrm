<?php

require 'Models/Cliente.php';

class PplController {
    private $accessKey = 'IwIHRvYcgN3SRC2B';

    public function index() {
        require 'Views/HomeView.php';
    }

    public function getToken() {
        $url = "https://develop1.datacrm.la/jdimate/pruebatecnica/webservice.php";
        $data = [
            'operation' => 'getchallenge',
            'username' => 'prueba'
        ];

        $url .= '?' . http_build_query($data);

        $options = ['http' => ['method' => 'GET']];

        $context = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
            return null; // Handle error
        }

        $responseData = json_decode($response, true);
        return $responseData['result']['token'] ?? null;
    }

    public function login() {
        $url = "https://develop1.datacrm.la/jdimate/pruebatecnica/webservice.php";

        $token = $this->getToken();

        if (!$token) {
            return null; // Handle token retrieval failure
        }

        $generatedKey = md5(strval($token . $this->accessKey));

        $data = [
            'operation' => 'login',
            'username' => 'prueba',
            'accessKey' => $generatedKey
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
            return null; // Handle error
        }

        $responseData = json_decode($response, true);
        return $responseData['result']['sessionName'] ?? null;
    }

    public function obtenerData() {
        $url = "https://develop1.datacrm.la/jdimate/pruebatecnica/webservice.php";

        $sessionName = $this->login();

        if (!$sessionName) {
            return null; // Handle login failure
        }

        $data = [
            'operation' => 'query',
            'sessionName' => $sessionName,
            'query' => 'SELECT id, contact_no, lastname, createdtime FROM Contacts;'
        ];

        $url .= '?' . http_build_query($data);

        $options = ['http' => ['method' => 'GET']];

        $context = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
            return null; // Handle error
        }

        $responseData = json_decode($response, true);
        return $responseData;
    }
}

?>
