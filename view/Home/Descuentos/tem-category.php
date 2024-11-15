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
            <div class="two-colunm-descount">
                <div class="descount-category">
                    <form method="POST" id="myFormCATEGORY">
                        <h2>Descuento por categoría</h2>
                        <label for="categorySelect">Selecciona una categoría:</label>
                        <select id="categorySelect">
                            <!-- Opciones cargadas dinámicamente -->
                        </select>
                        <label for="discountInput">Introduce el porcentaje de descuento:</label>
                        <input type="number" id="discountInput" placeholder="Por ejemplo, 20 para un 20%">

                        <button type="submit">Aplicar Descuento</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>