<?php

include("conexion.php");

if(isset($_POST['id'])){

$id = $_POST['id'];

$producto = mysqli_query($conexion,"SELECT * FROM productos WHERE id='$id'");
$p = mysqli_fetch_array($producto);

$nombre = $p['nombre'];
$precio = $p['precio'];

mysqli_query($conexion,"
INSERT INTO carrito(nombre,precio,cantidad)
VALUES('$nombre','$precio','1')
");

}

$consulta = mysqli_query($conexion,"SELECT * FROM carrito");

$total = 0;

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Carrito</title>

<link rel="stylesheet" href="css/styles.css">

</head>

<body>

<header>

<div class="logo">NIKE STORE</div>

<nav>

<a href="index.php">Inicio</a>
<a href="carrito.php">Carrito</a>

</nav>

</header>

<div class="contenido">

<h1>Productos en el carrito</h1>

<table class="tabla-carrito">

<tr>
<th>Producto</th>
<th>Precio</th>
<th>Cantidad</th>
</tr>

<?php while($p=mysqli_fetch_array($consulta)){ 

$total += $p['precio'] * $p['cantidad'];

?>

<tr>

<td><?php echo $p['nombre']; ?></td>

<td>$<?php echo $p['precio']; ?></td>

<td><?php echo $p['cantidad']; ?></td>

</tr>

<?php } ?>

</table>

<h2>Total: $<?php echo $total; ?></h2>

<br>

<a href="index.php">
<button>Seguir comprando</button>
</a>

</div>

</body>
</html>