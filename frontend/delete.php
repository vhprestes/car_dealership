<?php
$vehicle_id = $_GET['id'];

$options = [
    'http' => [
        'method'  => 'DELETE'
    ]
];

$context  = stream_context_create($options);
$result = file_get_contents("http://localhost:5000/vehicles/$vehicle_id", false, $context);

header('Location: index.php');
exit;
?>
