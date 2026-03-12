<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");

$consulta = mysqli_query($conexion,"SELECT * FROM productos");

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<title>Tienda Nike</title>

<link rel="stylesheet" href="css/styles.css">

</head>

<body>

<header>

<div class="logo">NIKE STORE</div>

<nav>

<a href="index.php">Inicio</a>
<a href="servicio.html">Servicios</a>
<a href="nosotros.html">Nosotros</a>
<a href="contacto.html">Contacto</a>
<a href="carrito.php">Carrito</a>

</nav>

</header>


<!-- BANNER PRINCIPAL -->

<section class="banner">

<h1>JUST DO IT</h1>

<p>Descubre los mejores tenis Nike con estilo y comodidad.</p>

<a href="#productos" class="btn-banner">Ver Productos</a>

</section>


<!-- PRODUCTOS -->

<section id="productos" class="productos">

<?php while($p = mysqli_fetch_array($consulta)){ ?>

<div class="card">

<img src="<?php echo $p['imagen']; ?>">

<h3><?php echo $p['nombre']; ?></h3>

<p class="precio">$<?php echo $p['precio']; ?></p>

<form action="carrito.php" method="POST">

<input type="hidden" name="id" value="<?php echo $p['id']; ?>">

<button>Agregar al carrito</button>

</form>

</div>

<?php } ?>

</section>


<!-- PROMOCION -->

<section class="promo">

<h2>🔥 Nuevas Colecciones Nike</h2>

<p>Encuentra los modelos más nuevos y exclusivos del mercado.</p>

</section>


<!-- FOOTER -->

<footer>

<p>© 2026 Nike Store | Proyecto Web</p>

</footer>


</body>
</html>