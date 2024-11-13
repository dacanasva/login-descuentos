const WooCommerceRestApi = require("@woocommerce/woocommerce-rest-api").default;
const fs = require('fs');
const csv = require('csv-parser');
const readline = require('readline');

// Configuración de la API de WooCommerce
const WooCommerce = new WooCommerceRestApi({
    url: 'http://localhost:8080/wordpress/',
    consumerKey: 'ck_03d37f7c11559ff35484a77883d921e98053a1f9',
    consumerSecret: 'cs_d743d76be10065ed0c0ada82ea2cbef3b9e3d190',
    version: 'wc/v3'
});

// Función para leer entrada del usuario de forma asíncrona
function askQuestion(query) {
    const rl = readline.createInterface({
        input: process.stdin,
        output: process.stdout,
    });

    return new Promise(resolve => rl.question(query, ans => {
        rl.close();
        resolve(ans);
    }))
}

// Función principal asíncrona
async function processDiscounts() {
    try {
        // Pedir ruta del archivo CSV
        const csvFilePath = await askQuestion("Introduce la ruta del archivo CSV: ");

        // Verificar si el archivo existe
        if (!fs.existsSync(csvFilePath)) {
            console.log("El archivo CSV no existe.");
            return;
        }

        // Leer el archivo CSV
        const discounts = await new Promise((resolve, reject) => {
            const results = [];
            fs.createReadStream(csvFilePath)
                .pipe(csv())
                .on('data', (data) => results.push(data))
                .on('end', () => resolve(results))
                .on('error', (error) => reject(error));
        });

        console.log('***********************************************************************************************************************');
        console.log('****** Introduzca la fecha y hora de inicio y terminacion en la que desea aplicar los descuentos a los productos ******');
        
        // Pedir fechas de inicio y fin
        const startDate = await askQuestion("Inicio del descuento (formato YYYY-MM-DD HH:mm:ss): ");
        const endDate = await askQuestion("Terminacion del descuento (formato YYYY-MM-DD HH:mm:ss): ");
        console.log('***********************************************************************************************************************');

        // Procesar cada descuento
        for (const item of discounts) {
            const sku = item.sku; // Ajusta esto según la estructura de tu CSV
            const discountPercentage = parseFloat(item.discount); // Ajusta esto según la estructura de tu CSV

            try {
                // Buscar producto por SKU
                const { data: products } = await WooCommerce.get('products', { sku: sku });

                if (products.length > 0) {
                    const productId = products[0].id;

                    // Obtener detalles del producto
                    const { data: product } = await WooCommerce.get(`products/${productId}`);
                    
                    // Calcular nuevo precio de venta
                    const regularPrice = parseFloat(product.regular_price);
                    const discountAmount = (regularPrice * discountPercentage) / 100;
                    const newSalePrice = regularPrice - discountAmount;

                    // Actualizar producto
                    await WooCommerce.put(`products/${productId}`, {
                        sale_price: newSalePrice.toFixed(2),
                        date_on_sale_from: startDate,
                        date_on_sale_to: endDate
                    });

                    console.log(`➜ Producto actualizado: SKU ${sku} con nuevo precio de venta: ${newSalePrice.toFixed(2)}, desde ${startDate} hasta ${endDate}`);
                } else {
                    console.log(`➜ Producto con SKU ${sku} no encontrado.`);
                }
            } catch (productError) {
                console.error(`Error procesando producto ${sku}:`, productError.message);
            }
        }
    } catch (error) {
        console.error('Error general:', error.message);
    }
}

// Ejecutar el script
processDiscounts();