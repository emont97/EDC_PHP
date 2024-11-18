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
            // Función para calcular la frecuencia de cada carácter
            function calcularFrecuencia($cadena) {
                $frecuencia = []; // Array para almacenar la frecuencia de cada carácter

                // Convertir la cadena a un array de caracteres
                $caracteres = str_split($cadena);

                // Recorrer los caracteres y contar las ocurrencias
                foreach ($caracteres as $caracter) {
                    if (isset($frecuencia[$caracter])) {
                        $frecuencia[$caracter]++; // Si el carácter ya existe, incrementa su frecuencia
                    } else {
                        $frecuencia[$caracter] = 1; // Si es la primera vez que aparece, inicializa la frecuencia
                    }
                }

                return $frecuencia; // Retorna el array con las frecuencias
            }

            // Calcular la frecuencia de los caracteres en la cadena ingresada
            $frecuencias = calcularFrecuencia($texto);

            echo "<h2>Frecuencia de Caracteres:</h2>";
            echo "<ul>";
            foreach ($frecuencias as $caracter => $cantidad) {
                echo "<li>Caracter '$caracter' aparece $cantidad veces.</li>";
            }
            echo "</ul>";
        }
    }
    ?>
</body>
</html>
