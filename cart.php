<?php
session_start();

// Inicializar carrito si no existe
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Manejo de formulario para agregar productos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $product_price = (float)$_POST['product_price'];

    // Agregar producto al carrito
    $_SESSION['cart'][] = [
        'name' => $product_name,
        'price' => $product_price
    ];
}

// Eliminar un producto del carrito
if (isset($_GET['remove'])) {
    $index = (int)$_GET['remove'];
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindexar el carrito
    }
}

// Vaciar el carrito
if (isset($_GET['clear'])) {
    $_SESSION['cart'] = [];
}

// Descargar carrito como PDF
if (isset($_GET['buy'])) {
    require('fpdf/fpdf.php'); // Asegúrate de tener FPDF disponible

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(200, 10, 'Factura de Compra', 0, 1, 'C');
    $pdf->Ln(10);
    
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $pdf->Cell(100, 10, $item['name'], 1);
        $pdf->Cell(50, 10, '$' . number_format($item['price'], 2), 1, 1, 'C');
        $total += $item['price'];
    }

    $pdf->Ln(10);
    $pdf->Cell(100, 10, 'Total', 1);
    $pdf->Cell(50, 10, '$' . number_format($total, 2), 1, 1, 'C');
    
    // Salvar PDF en el navegador
    $pdf->Output('D', 'factura_compra.pdf');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #2c3e50;
            margin: 0;
        }

        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        main {
            padding: 20px;
        }

        .table thead {
            background-color: #2c3e50;
            color: white;
        }

        .btn-custom {
            background-color: #2c3e50;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #1a252f;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Carrito de Compras</h1>
    </header>
    <main>
        <div class="container">
            <?php if (!empty($_SESSION['cart'])): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0; 
                        foreach ($_SESSION['cart'] as $index => $item): 
                            $total += $item['price'];
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td>$<?php echo number_format($item['price'], 2); ?></td>
                                <td>
                                    <a href="cart.php?remove=<?php echo $index; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td>$<?php echo number_format($total, 2); ?></td>
                            <td>
                                <a href="cart.php?clear=true" class="btn btn-sm btn-warning">Vaciar Carrito</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            <?php else: ?>
                <p class="alert alert-info">El carrito está vacío.</p>
            <?php endif; ?>

            <a href="../tienda_muebles/tienda/tienda.php" class="btn btn-custom mt-3">Volver a la tienda</a>
            <a href="cart.php?buy=true" class="btn btn-custom mt-3">Comprar (Generar PDF)</a>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
