<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Palíndromos</title>
    <!--insertando script para validacion de entradas-->
    <script>
        // Validación en el lado del cliente
        function validarTexto(event) {
            const texto = document.getElementById('texto').value;
            const regex = /^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/;
            if (!regex.test(texto)) {
                alert('Por favor, ingrese solo texto. No se permiten números ni caracteres especiales.');
                input.value = ""; //limpia el camo de texto
                event.preventDefault(); // Evita que se envíe el formulario
            }
        }
    </script>
</head>

<body>
    <h1>Verificar si una cadena es un palíndromo</h1>
    <form method="post" onsubmit="validarTexto(event)">
        <label for="texto">Ingrese una palabra o frase:</label>
        <input type="text" id="texto" name="texto" required>
        <button type="submit">Verificar</button>
    </form>
    <!--insertando codigo PHP-->
    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Leer la cadena de texto ingresada
        $texto = trim($_POST['texto']); // Eliminar espacios al inicio y al final
        // Validar que no contenga números
        if (preg_match('/\d/', $texto)) {
            echo "<h2>Error:</h2>";
            echo "<p>Por favor, ingrese únicamente texto. No se permiten números.</p>";
        } else {

            // Función para determinar si una cadena es un palíndromo
            function esPalindromo($cadena)
            {
                // Convertir a minúsculas y eliminar caracteres no alfanuméricos
                $cadena = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $cadena));

                // Comparar la cadena con su reverso
                return $cadena === strrev($cadena);
            }

            // Verificar si la cadena ingresada es un palíndromo
            if (esPalindromo($texto)) {
                echo "<h2>Resultado:</h2>";
                echo "<p>La cadena <strong>'$texto'</strong> <strong>es un palíndromo</strong>.</p>";
            } else {
                echo "<h2>Resultado:</h2>";
                echo "<p>La cadena <strong>'$texto'</strong> <strong>no es un palíndromo</strong>.</p>";
            }
        }
    }
    ?>
</body>

</html>