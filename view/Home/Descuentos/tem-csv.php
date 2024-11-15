<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

                    <button type="submit">Aplicar Descuento</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>