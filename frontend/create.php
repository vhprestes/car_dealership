<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'make' => $_POST['make'],
        'model' => $_POST['model'],
        'year' => $_POST['year'],
        'price' => $_POST['price']
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ]
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents('http://localhost:5000/vehicles', false, $context);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Veículo</title>
</head>
<body>
    <h1>Adicionar Veículo</h1>
    <form method="POST" action="create.php">
        <?php include 'vehicle_form.php'; ?>
        <button type="submit">Adicionar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
