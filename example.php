<?php

include __DIR__ . "/src/ErpNet/Client.php";

$username = "username";
$password = "password";


$erpNet = new \ErpNet\Client();
$erpNet->setCookieFile('cookie.txt');

$erpNet->post('/api/Auth/Login', [
    'username' => $username,
    'password' => $password
]);

// Consulta os níveis de usuário
$niveis = $erpNet->get('/api/Cadastro/Pessoa/NivelUsuario');

// Insere um nível de usuário
$insert = $erpNet->post('/api/Cadastro/Pessoa/NivelUsuario', [
    'Descricao' => 'Teste do Marcelo'
]);

// Atualiza um registro
$put = $erpNet->put('/api/Cadastro/Pessoa/NivelUsuario', [
    'ID' => $insert['Data']['ID'],
    'Descricao' => 'TWXYZ'
]);

$delete = $erpNet->delete('/api/Cadastro/Pessoa/NivelUsuario', [
    'ID' => $insert['Data']['ID']
]);

var_dump($insert);
var_dump($put);
var_dump($delete);