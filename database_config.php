<?php
/**
 * Configuração compartilhada do banco de dados.
 * Credenciais de produção são geradas pelo workflow de deploy.
 * Em produção, config.local.php é criado pelo GitHub Actions e não fica no Git.
 * Deploy automático para InfinityFree habilitado via variável do repositório.
 */
$localConfigPath = __DIR__ . '/config.local.php';
$localConfig = is_file($localConfigPath) ? require $localConfigPath : [];

$getConfigValue = static function (string $key, string $default) use ($localConfig): string {
    if (isset($localConfig[$key]) && $localConfig[$key] !== '') {
        return (string) $localConfig[$key];
    }

    $environmentValue = getenv('MYSQL_' . strtoupper($key));
    return ($environmentValue !== false && $environmentValue !== '')
        ? (string) $environmentValue
        : $default;
};

return [
    'host' => $getConfigValue('host', 'localhost'),
    'username' => $getConfigValue('username', 'root'),
    'password' => $getConfigValue('password', ''),
    'database' => $getConfigValue('database', 'loja'),
    'port' => (int) $getConfigValue('port', '3306'),
];
