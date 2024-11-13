
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo-linea estetica.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/Dashboard.css">
    <link rel="shortcut icon" href="../../public/img/logo-linea estetica.png" type="image/x-icon">
    <title>Dashboard</title>
</head>
<body>
    <?php 
    include('../../public/includes/navbar.php')
    ?>
    <div class="content">
        <main>
            <div class="tittle-descount">
                <h1>Descuentos</h1>
            </div>
            <div class="descount-TimeCSV">
                <h2>Descuento por archivo CSV temporal</h2>
                <form action="funtions/Dest-csv-time.php" method="POST" id="myFormTIMECSV" enctype="multipart/form-data">
                    <label for="archivo">Selecciona un archivo (solo CSV):</label>
                    <input type="file" id="archivo" name="archivo" accept=".csv" required>

                    <label for="tiempoInicio">Fecha y hora de inicio:</label>
                    <input type="datetime-local" id="tiempoInicio" name="tiempoInicio" required>

                    <label for="tiempoFin">Fecha y hora de fin:</label>
                    <input type="datetime-local" id="tiempoFin" name="tiempoFin" required>

                    <button type="submit">Enviar</button>
                </form>
            </div>
            <div class="two-colunm-descount">
                <div class="descount-category">
                    <form action="funtions/Dest-category.php" method="POST" id="myFormCATEGORY">
                        <h2>Descuento por categoría</h2>
                        <label for="categoria">Selecciona una categoría:</label>
                        <select id="categoria" name="categoria" required>
                            <option value="" disabled selected>-- Selecciona una categoría --</option>
                            <option value="categoria1">Categoría 1</option>
                            <option value="categoria2">Categoría 2</option>
                            <option value="categoria3">Categoría 3</option>
                            <option value="categoria4">Categoría 4</option>
                        </select>
                        <label for="porcentaje">Ingresa un porcentaje (0-100):</label>
                        <input type="number" id="porcentaje" name="porcentaje" min="0" max="100" required>
                        <button type="submit">Enviar</button>
                    </form>
                </div>
                <div class="descount-CSV">
                    <h2>Descuento por archivo CSV</h2>
                    <form action="funtions/Dest-sku-csv.php" method="POST" id="myFormCSV" enctype="multipart/form-data">
                        <label for="archivo">Selecciona un archivo (solo CSV):</label>
                        <input type="file" id="archivo" name="archivo" accept=".csv" required>
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>