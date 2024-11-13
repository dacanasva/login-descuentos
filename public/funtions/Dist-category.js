const WooCommerceRestApi = require("@woocommerce/woocommerce-rest-api").default;
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
async function applyCategoryDiscount() {
    try {
        // Obtener categorías
        const { data: categories } = await WooCommerce.get('products/categories');
        
        // Imprimir categorías disponibles
        console.log("➜ Categorías disponibles:");
        categories.forEach((category, index) => {
            console.log(`${index}: ${category.name} (ID: ${category.id})`);
        });

        // Solicitar selección de categoría
        const selectedCategoryIndex = parseInt(await askQuestion("Selecciona el número de la categoría: "));
        
        if (selectedCategoryIndex < 0 || selectedCategoryIndex >= categories.length) {
            console.log("Categoría no válida.");
            return;
        }

        const selectedCategoryId = categories[selectedCategoryIndex].id;

        // Solicitar porcentaje de descuento
        const discountPercentage = parseFloat(await askQuestion("Introduce el porcentaje de descuento (por ejemplo, 20 para un 20%): "));
        
        if (isNaN(discountPercentage) || discountPercentage < 0 || discountPercentage > 100) {
            console.log("Porcentaje de descuento no válido. Debe estar entre 0 y 100.");
            return;
        }

        // Obtener productos de la categoría seleccionada
        const { data: products } = await WooCommerce.get('products', { category: selectedCategoryId });

        // Aplicar descuento a cada producto
        for (const product of products) {
            // Verificar si el producto tiene precio regular
            if (product.regular_price) {
                const regularPrice = parseFloat(product.regular_price);
                const salePrice = regularPrice * (1 - (discountPercentage / 100));

                // Actualizar producto con nuevo precio de venta
                await WooCommerce.put(`products/${product.id}`, {
                    sale_price: salePrice.toFixed(2)
                });

                console.log(`➜ Producto actualizado: ${product.name} con nuevo precio de venta: ${salePrice.toFixed(2)}`);
            } else {
                console.log(`➜ Producto ${product.name} no tiene precio regular, no se aplica descuento.`);
            }
        }

    } catch (error) {
        console.error('Error:', error.message);
    }
}

// Ejecutar el script
applyCategoryDiscount();