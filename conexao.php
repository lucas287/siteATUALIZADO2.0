<?php
$dbConfig = require __DIR__ . '/database_config.php';

try {
    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
        $dbConfig['host'],
        $dbConfig['port'],
        $dbConfig['database']
    );

    // PDO é usado pelas telas de veículos e listagens.
    $conn2 = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    // MySQLi é usado pelas telas administrativas e autenticação existentes.
    mysqli_report(MYSQLI_REPORT_OFF);
    $conn = new mysqli(
        $dbConfig['host'],
        $dbConfig['username'],
        $dbConfig['password'],
        $dbConfig['database'],
        $dbConfig['port']
    );

    if ($conn->connect_errno) {
        throw new RuntimeException('Falha na conexão MySQLi: ' . $conn->connect_error);
    }

    $conn->set_charset('utf8mb4');
} catch (Throwable $err) {
    error_log('Voinich Motors - erro de conexão com banco: ' . $err->getMessage());
    http_response_code(500);
    exit('Não foi possível conectar ao banco de dados. Verifique a configuração da hospedagem.');
}
