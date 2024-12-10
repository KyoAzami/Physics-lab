<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style6.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Pysics lab</title>
</head>
<body>
    <header>

        <button id="menu-toggle">&#9776;</button>

        <a href="../index.html"><i class="fa-solid fa-house-chimney"></i></a>

        <h1></h1>

    </header>


    <nav id="side-menu" class="side-menu">
        
        <ul id="list">
            <li><a href="../index.html">Inicio</a></li>
            <li><a href="../introduccion.html">Introduccion</a></li>
            <li><a href="../teoria.html">Teoria</a></li>
            <li><a href="../formulas.html">Formulas</a></li>
            <li><a href="../ejemplos.html">Ejemplos</a></li>
            <li><a href="./php/calculadora.php">Calculadora</a></li>
        </ul>
        
    </nav>


    <main id="main-content">

        <h1 id="title">Physics Lab</h1>

        <br>

        <section id="text1">


            <center><div class="box">
                <h3>Introduzca los siguientes datos</h3>
                <form action="" method="post">
                    <input type="number" name="a" id="a" placeholder="Introduzca en newtons la medida de su vector a" required> <br>
                    <input type="number" name="b" id="b" placeholder="Introduzca en newtons la medida de su vector b" required> <br>
                    <input type="number" name="e" id="e" placeholder="Introduzca en grados la medida del ángulo externo" required> <br>
                    <input type="submit" name="btna" id="btna" class="btn" value="Enviar">
                </form>

                <form action="" method="get">
                    <input type="submit" name="btnb" id="btnb" class="btn" value="Historial de operaciones">
                    <input type="submit" name="clear" id="clear" class="btn" value="Borrar historial">
                </form>

            </div></center>

            <br>

            <center><div class="res">
                <h3>Resultado:</h3>

            <?php
                session_start();

                if (!isset($_SESSION['history'])) {
                    $_SESSION['history'] = [];
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $a = $_POST['a'];
                    $b = $_POST['b'];
                    $e = $_POST['e'];

                    if (is_numeric($a) && is_numeric($b) && is_numeric($e) && $a > 0 && $b > 0 && $e > 0 && $e < 180) {
                        $aux = deg2rad(180 - $e);
                        $r = sqrt((pow($a, 2) + pow($b, 2)) - (2 * $a * $b * cos($aux)));

                        if ($r != 0) {
                            $alph = asin(($b * sin($aux)) / $r);

                            $result = [
                                'a' => $a,
                                'b' => $b,
                                'e' => $e,
                                'r' => round($r, 2),
                                'alph' => round(rad2deg($alph), 2)
                            ];

                            $_SESSION['history'][] = $result;
                            echo "<table class=\"tab\"> <tr> <th class=\"enc\">Datos</th> <th class=\"enc\">Formula</th> <th class=\"enc\">Sustitucion</th> <th class=\"enc\">Resultados</th> </tr>";
                            echo "<tr>";
                            echo "<th class=\"enc\">Vector a = $a <br> Vector b = $b <br> Angulo externo = $e</th>";
                            echo "<th class=\"enc\">√(a^2+b^2-2(a)(b)cos(Angulo interno)) <br> asin(b*sin(e)/vector resultante)<br></th>";
                            echo "<th class=\"enc\">√($a^2+$b^2-2(a)(b)cos(" . round(rad2deg($aux), 2) . ")) <br> asin($b*sin($e)/" . round($r, 2) . ")<br></th>";
                            echo "<th class=\"enc\">Vector resutante = " . round($r, 2) . "n <br> Angulo Resultante = " . round(rad2deg($alph), 2) . "°";
                            /*echo "<br>El desarrollo de la operación para obtener el vector resultante es: <br> √($a^2+$b^2-2($a)($b)cos(" . round(rad2deg($aux), 2) . ")) <br>";
                            echo "<br>El vector resultante tiene el valor en newtons de: " . round($r, 2) . "n <br>";
                            echo "<br><br> El desarrollo de la operación para obtener el ángulo resultante es: <br> asin($b*sin($e)/" . round($r, 2) . ")<br>";
                            echo "<br>El valor del ángulo resultante es de: " . round(rad2deg($alph), 2) . "°";*/
                            echo "</table>";

                        } else {
                            echo "Error en el cálculo del vector resultante.";
                        }
                    } else {
                        echo "Por favor, introduzca valores adecuados";
                    }
                }

                echo "</div></center> <br>";

            if (isset($_GET['btnb'])) {
                echo "<center><div class=\"res\">";
                echo "<h3>Historial</h3>";
                echo "<table class=\"tab\"> <tr> <th class=\"enc\">Op.</th> <th class=\"enc\">Vector a</th> <th class=\"enc\">Vector b</th> <th class=\"enc\">Ángulo externo</th> <th class=\"enc\">Vector resultante</th> <th class=\"enc\">Ángulo resultante</th> </tr>";

                foreach ($_SESSION['history'] as $index => $entry) {
                    echo "<tr>";                        echo "<td class=\"enc\">" . ($index + 1) . "</td>";
                    echo "<td class=\"enc\">" . $entry['a'] . "</td>";
                    echo "<td class=\"enc\">" . $entry['b'] . "</td>";
                    echo "<td class=\"enc\">" . $entry['e'] . "</td>";
                    echo "<td class=\"enc\">" . $entry['r'] . "n</td>";
                    echo "<td class=\"enc\">" . $entry['alph'] . "°</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div></center>";
            }

            if (isset($_GET['clear'])) {
                $_SESSION['history'] = [];
                echo "<center><div class=\"res\">";
                echo "<h3>Historial borrado con éxito.</h3>";
                echo "</div></center>";
            }
            ?>


            <div class="forbiden">

                <a href="../ejemplos.html" class="btn">Anterior</a>

                <a href="../index.html" class="btn">Finalizar</a>

            </div>


        </section>

    </main>

    <footer>

    </footer>

</body>
<script src="../JavaScript/lateralMenu.js"></script>

</html>