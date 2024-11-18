<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frecuencia de Caracteres</title>
     <!--insertando script para validacion de entradas-->
    <script>
        // Validación en el lado del cliente
        function validarTexto(event) {
            const input = document.getElementById('texto');
            const texto = input.value.trim();
            const regex = /^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/; // Permite solo letras y espacios

            if (!regex.test(texto)) {
                alert('Por favor, ingrese solo texto. No se permiten números ni caracteres especiales.');
                input.value = ""; // Limpia el campo de texto
                event.preventDefault(); // Evita que se envíe el formulario
            }
        }
    </script>
</head>
<body>
    <h1>Frecuencia de Caracteres en una Cadena</h1>
    <form method="post" onsubmit="validarTexto(event)">
        <label for="texto">Ingrese una palabra o frase (sin números):</label>
        <input type="text" id="texto" name="texto" required>
        <button type="submit">Calcular Frecuencia</button>
    </form>
</body>
</html>
