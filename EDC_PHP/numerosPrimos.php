<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Números Primos</title>
</head>
<body>
    <h1>Verificar si un número es primo</h1>
    <form method="post">
        <label for="numero">Ingrese un número:</label>
        <input type="number" id="numero" name="numero" min="2" required>
        <button type="submit">Verificar</button>
    </form>
    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Leer el número ingresado
        $numero = intval($_POST['numero']);

        // Función para determinar si un número es primo
        function esPrimo($num) {
            if ($num < 2) {
                return false; // Los números menores a 2 no son primos
            }

            // Verificar si es divisible por algún número entre 2 y la raíz cuadrada del número
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i === 0) {
                    return false; // Si es divisible, no es primo
                }
            }

            return true; // Si no se encontró ningún divisor, es primo
        }

        // Verificar si el número ingresado es primo
        if (esPrimo($numero)) {
            echo "<h2>Resultado:</h2>";
            echo "<p>El número $numero <strong>es primo</strong>.</p>";
        } else {
            echo "<h2>Resultado:</h2>";
            echo "<p>El número $numero <strong>no es primo</strong>.</p>";
        }
    }
    ?>
</body>
</html>