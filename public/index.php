<?php

require_once "../vendor/autoload.php";



$request = $_SERVER['REQUEST_URI'];
$viewDir = '/views/';

$chunks = explode("/", $request);

switch ($chunks[1]) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'links.php';
        break;

    case 'token':
        $token = $chunks[2];
        require __DIR__ . $viewDir . 'tokens.php';
        break;

    case 'not-found':
    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Mi Página</title>
</head>

<body>
    <!-- Contenido de la página va aquí -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    

</body>

</html>

