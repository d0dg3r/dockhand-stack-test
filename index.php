<?php
header('Content-Type: text/html; charset=utf-8');
$vars = [
    'APP_NAME', 'APP_ENV', 'TZ', 'DEBUG',
    'DATABASE_PASSWORD', 'API_KEY', 'ADMIN_TOKEN'
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vault Test - Environment Variables</title>
    <style>
        body { font-family: monospace; background: #1a1a2e; color: #eee; padding: 20px; }
        h1 { color: #00d4ff; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; }
        th, td { border: 1px solid #333; padding: 12px; text-align: left; }
        th { background: #16213e; color: #00d4ff; }
        tr:nth-child(even) { background: #1f2940; }
        .secret { color: #ff6b6b; }
        .env { color: #4ade80; }
        .time { color: #888; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Dockhand Vault Test</h1>
    <p>Environment Variables loaded at runtime:</p>
    <table>
        <tr><th>Variable</th><th>Value</th><th>Type</th></tr>
        <?php foreach ($vars as $var): ?>
        <tr>
            <td><?= $var ?></td>
            <td><?= htmlspecialchars(getenv($var) ?: '(not set)') ?></td>
            <td class="<?= in_array($var, ['DATABASE_PASSWORD', 'API_KEY', 'ADMIN_TOKEN']) ? 'secret' : 'env' ?>">
                <?= in_array($var, ['DATABASE_PASSWORD', 'API_KEY', 'ADMIN_TOKEN']) ? 'Secret (Vault)' : 'Env File' ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p class="time">Last refresh: <?= date('Y-m-d H:i:s') ?></p>
    <p class="time">Container ID: <?= gethostname() ?></p>
</body>
</html>