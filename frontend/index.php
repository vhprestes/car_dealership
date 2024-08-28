<?php
$api_url = 'http://localhost:5000/vehicles'; // URL da API

$response = file_get_contents($api_url);
$vehicles = json_decode($response, true)['vehicles'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionária - Veículos</title>
</head>
<body>
    <h1>Veículos Disponíveis</h1>
    <a href="create.php">Adicionar Novo Veículo</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($vehicles as $vehicle): ?>
            <tr>
                <td><?php echo $vehicle['id']; ?></td>
                <td><?php echo $vehicle['make']; ?></td>
                <td><?php echo $vehicle['model']; ?></td>
                <td><?php echo $vehicle['year']; ?></td>
                <td><?php echo $vehicle['price']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $vehicle['id']; ?>">Editar</a>
                    <a href="delete.php?id=<?php echo $vehicle['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
