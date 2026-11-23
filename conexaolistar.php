<?php
// Conexão PDO usada pelas páginas públicas de listagem e detalhes de veículos.
$dbConfig = require __DIR__ . '/database_config.php';

try {
    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
        $dbConfig['host'],
        $dbConfig['port'],
        $dbConfig['database']
    );

    $conn = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (Throwable $err) {
    error_log('Voinich Motors - erro PDO na listagem: ' . $err->getMessage());
    http_response_code(500);
    exit('Não foi possível carregar os veículos. Verifique a configuração do banco de dados.');
}
