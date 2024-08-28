<?php
$vehicle_id = $_GET['id'];

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
            'method'  => 'PUT',
            'content' => json_encode($data),
        ]
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents("http://localhost:5000/vehicles/$vehicle_id", false, $context);

    header('Location: index.php');
    exit;
} else {
    $vehicle = json_decode(file_get_contents("http://localhost:5000/vehicles/$vehicle_id"), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Veículo</title>
</head>
<body>
    <h1>Editar Veículo</h1>
    <form method="POST" action="update.php?id=<?php echo $vehicle_id; ?>">
        <?php include 'vehicle_form.php'; ?>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
