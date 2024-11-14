const consumerKey = 'ck_03d37f7c11559ff35484a77883d921e98053a1f9';
const consumerSecret = 'cs_d743d76be10065ed0c0ada82ea2cbef3b9e3d190';
const categoriesUrl = 'http://localhost:8080/wordpress/wp-json/wc/v3/products/categories';

// Función para cargar las categorías al cargar la página
async function loadCategories() {
    try {
        const response = await axios.get(categoriesUrl, {
            auth: {
                username: consumerKey,
                password: consumerSecret
            }
        });

        const categories = response.data;
        const categorySelect = document.getElementById('categoria');

        // Limpiar opciones existentes
        categorySelect.innerHTML = '<option value="" disabled selected>-- Selecciona una categoría --</option>';

        // Agregar cada categoría al select
        categories.forEach(category => {
            const option = document.createElement('option');
            option.value = category.id; // Usamos el ID de la categoría como valor
            option.textContent = category.name; // El nombre de la categoría como texto
            categorySelect.appendChild(option);
        });
    } catch (error) {
        console.error('Error al cargar las categorías:', error);
        alert('Ocurrió un error al cargar las categorías.');
    }
}

// Llamar a la función para cargar las categorías al cargar la página
loadCategories();

document.getElementById('myFormCATEGORY').addEventListener('submit', async function(event) {
    event.preventDefault(); // Evita el envío del formulario

    const categoryId = document.getElementById('categoria').value; // Captura la categoría seleccionada
    const discountPercentage = parseFloat(document.getElementById('porcentaje').value); // Captura el porcentaje

    try {
        const productsResponse = await axios.get('http://localhost:8080/wordpress/wp-json/wc/v3/products', {
            params: {
                category: categoryId
            },
            auth: {
                username: consumerKey,
                password: consumerSecret
            }
        });

        const products = productsResponse.data;

        for (const product of products) {
            if (product.regular_price) {
                const regularPrice = parseFloat(product.regular_price);
                const salePrice = (regularPrice * (1 - (discountPercentage / 100))).toFixed(2); // Aplica el descuento

                await axios.put(`http://localhost:8080/wordpress/wp-json/wc/v3/products/${product.id}`, {
                    sale_price: salePrice
                }, {
                    auth: {
                        username: consumerKey,
                        password: consumerSecret
                    }
                });

                console.log(`Producto actualizado: ${product.name} con nuevo precio de venta: ${salePrice}`);
            } else {
                console.log(`Producto ${product.name} no tiene precio regular, no se aplica descuento.`);
            }
        }
        alert('Descuentos aplicados correctamente.');
    } catch (error) {
        console.error('Error:', error);
        alert('Ocurrió un error al aplicar el descuento.');
    }
});