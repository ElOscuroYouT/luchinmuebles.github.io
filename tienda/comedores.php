<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda | Comedores | LUCHIN</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="../Imagenes/logomuebles2.png">
</head>
<body>
    <main>
        <h2>Productos de Comedores</h2>
        <div class="product-list" id="product-list">
            <!-- Producto 1 -->
            <div class="product">
                <img src="../Imagenes/mesacom1.jpg" alt="Mesa de Comedor">
                <h3>Mesa de Comedor</h3>
                <p>Precio: $250</p>
                <form action="../cart.php" method="POST">
                    <input type="hidden" name="product_name" value="Mesa de Comedor">
                    <input type="hidden" name="product_price" value="250">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </div>

            <!-- Producto 2 -->
            <div class="product">
                <img src="../Imagenes/silla1com.jpg" alt="Silla de Comedor">
                <h3>Silla de Comedor</h3>
                <p>Precio: $75</p>
                <form action="../cart.php" method="POST">
                    <input type="hidden" name="product_name" value="Silla de Comedor">
                    <input type="hidden" name="product_price" value="75">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </div>

            <!-- Producto 3 -->
            <div class="product">
                <img src="../Imagenes/mesa1com.jpg" alt="Mesa Extensible">
                <h3>Mesa Extensible</h3>
                <p>Precio: $300</p>
                <form action="../cart.php" method="POST">
                    <input type="hidden" name="product_name" value="Mesa Extensible">
                    <input type="hidden" name="product_price" value="300">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </div>

            <!-- Producto 4 -->
            <div class="product">
                <img src="../Imagenes/silla1padd.jpg" alt="Silla Padded">
                <h3>Silla Padded</h3>
                <p>Precio: $85</p>
                <form action="../cart.php" method="POST">
                    <input type="hidden" name="product_name" value="Silla Padded">
                    <input type="hidden" name="product_price" value="85">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </div>

            <!-- Producto 5 -->
            <div class="product">
                <img src="../Imagenes/mesa1com1.jpeg" alt="Mesa de Comedor">
                <h3>Mesa de Comedor</h3>
                <p>Precio: $250</p>
                <form action="../cart.php" method="POST">
                    <input type="hidden" name="product_name" value="Mesa de Comedor">
                    <input type="hidden" name="product_price" value="250">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </div>

            <!-- Producto 6 -->
            <div class="product">
                <img src="../Imagenes/silla2com.jpg" alt="Silla de Comedor">
                <h3>Silla de Comedor</h3>
                <p>Precio: $75</p>
                <form action="../cart.php" method="POST">
                    <input type="hidden" name="product_name" value="Silla de Comedor">
                    <input type="hidden" name="product_price" value="75">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </div>

            <!-- Producto 7 -->
            <div class="product">
                <img src="../Imagenes/mesa2com.jpeg" alt="Mesa Extensible">
                <h3>Mesa Extensible</h3>
                <p>Precio: $300</p>
                <form action="../cart.php" method="POST">
                    <input type="hidden" name="product_name" value="Mesa Extensible">
                    <input type="hidden" name="product_price" value="300">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </div>

            <!-- Producto 8 -->
            <div class="product">
                <img src="../Imagenes/silla2padd.jpeg" alt="Silla Padded">
                <h3>Silla Padded</h3>
                <p>Precio: $85</p>
                <form action="../cart.php" method="POST">
                    <input type="hidden" name="product_name" value="Silla Padded">
                    <input type="hidden" name="product_price" value="85">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </div>

            <!-- Producto 9 -->
            <div class="product">
                <img src="../Imagenes/mesa1com2.jpg" alt="Mesa de Comedor">
                <h3>Mesa de Comedor</h3>
                <p>Precio: $250</p>
                <form action="../cart.php" method="POST">
                    <input type="hidden" name="product_name" value="Mesa de Comedor">
                    <input type="hidden" name="product_price" value="250">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </div>

            <!-- Producto 10 -->
            <div class="product">
                <img src="../Imagenes/silla3com.jpg" alt="Silla de Comedor">
                <h3>Silla de Comedor</h3>
                <p>Precio: $75</p>
                <form action="../cart.php" method="POST">
                    <input type="hidden" name="product_name" value="Silla de Comedor">
                    <input type="hidden" name="product_price" value="75">
                    <button type="submit">Agregar al Carrito</button>
                </form>
            </div>

            <!-- Agrega más productos aquí -->
        </div>
    </main>
</body>
</html>
