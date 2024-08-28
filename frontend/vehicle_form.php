<?php
$make = $vehicle['make'] ?? '';
$model = $vehicle['model'] ?? '';
$year = $vehicle['year'] ?? '';
$price = $vehicle['price'] ?? '';
?>

<label for="make">Marca:</label>
<input type="text" id="make" name="make" value="<?php echo $make; ?>" required><br>

<label for="model">Modelo:</label>
<input type="text" id="model" name="model" value="<?php echo $model; ?>" required><br>

<label for="year">Ano:</label>
<input type="number" id="year" name="year" value="<?php echo $year; ?>" required><br>

<label for="price">Preço:</label>
<input type="number" id="price" name="price" step="0.01" value="<?php echo $price; ?>" required><br>
