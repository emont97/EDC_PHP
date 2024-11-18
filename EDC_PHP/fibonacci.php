<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serie Fibonacci</title>
</head>

<body>
    <h1>Generador de Serie Fibonacci</h1>
    <form method="post">
        <label for="n">Ingrese el número de términos:</label>
        <input type="number" id="n" name="n" min="1" required>
        <button type="submit">Generar</button>
    </form>
    <!--insertando codigo PHP-->
    <?php
    //verificar envio de formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Leer el valor ingresado
        $n = intval($_POST['n']); // Convertir la entrada a un entero

        // Función para generar la serie de Fibonacci
        function generarFibonacci($n)
        {
            if ($n < 1) {
                return "El número debe ser mayor o igual a 1.";
            }

            $fibonacci = [];
            if ($n == 1) {
                $fibonacci[] = 0;
                return $fibonacci;
            }

            $fibonacci[] = 0;
            $fibonacci[] = 1;

            for ($i = 2; $i < $n; $i++) {
                $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
            }

            return $fibonacci;
        }

        // Generar y mostrar la serie Fibonacci
        $resultado = generarFibonacci($n);

        echo "<h2>Resultado:</h2>";
        if (is_array($resultado)) {
            echo "<p>Los primeros $n términos de la serie de Fibonacci son:</p>";
            echo "<p>" . implode(", ", $resultado) . "</p>";
        } else {
            echo "<p>$resultado</p>";
        }
    }
    ?>
</body>

</html>