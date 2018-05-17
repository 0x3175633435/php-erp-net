# php-erp-net

Biblioteca do PHP para consumo das funcionalidades do ERP.Net da Unimake Software.

```php

$username = "username";
$password = "password";

// Nova instância do cliente
$erpNet = new \ErpNet\Client();

// IMPORTANTE!
// Não defina um caminho que possa ser acessado pela web!
$erpNet->setCookieFile('cookie.txt');

// Requisição de login
// Deve ser sempre executada antes das demais requisições
$erpNet->post('/api/Auth/Login', [
    'username' => $username,
    'password' => $password
]);

// Consulta os níveis de usuário.
$niveis = $erpNet->get('/api/Cadastro/Pessoa/NivelUsuario');

// Insere um nível de usuário.
$insert = $erpNet->post('/api/Cadastro/Pessoa/NivelUsuario', [
    'Descricao' => 'Teste do Marcelo'
]);

// Atualiza um registro,
// Se não for informado um ID, um novo registro será criado.
$put = $erpNet->put('/api/Cadastro/Pessoa/NivelUsuario', [
    'ID' => $insert['Data']['ID'],
    'Descricao' => 'TWXYZ'
]);

// Remove o registro.
$delete = $erpNet->delete('/api/Cadastro/Pessoa/NivelUsuario', [
    'ID' => $insert['Data']['ID']
]);

```
