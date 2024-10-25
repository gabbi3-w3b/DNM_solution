<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadratic Equation Solver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bdy {
            background-color: #2b2e45;
            font-size: 20px;
            font-weight: 90;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bdy">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Quadratic Equation Solver
            </div>
            <div class="card-body">
                <?php
                    if (isset($_GET['find'])) {
                        $a = $_GET['ath'];
                        $b = $_GET['bth'];
                        $c = $_GET['cth'];
                        $var = $_GET['dth'];
                        $Varlength = strlen($var);

                        if ($Varlength > 3 || $Varlength < 0) {
                            echo "Your variable should range between 0-3";
                            exit;
                        }
                        if ($Varlength == 0) {
                            $var = "x";
                        }
                        if (is_numeric($var)) {
                            echo '<div class="alert alert-danger">Error: Variable must be an alphabetical character.</div>';
                            exit;
                        }

                        $d = ($b * $b) - 4 * $a * $c;

                        if ($d > 0) {
                            $root1 = (-$b + sqrt($d)) / (2 * $a);
                            $root2 = (-$b - sqrt($d)) / (2 * $a);
                            $factorizedForm = "$a($var - $root1)($var - $root2)";
                            $output = "Two distinct real roots: $root1, $root2";
                        } elseif ($d == 0) {
                            $root = -$b / (2 * $a);
                            if ($root < 0) {
                                $factorizedForm = "$a($var + " . abs($root) . ")^2";
                            } else {
                                $factorizedForm = "$a($var - $root)^2";
                            }
                            $output = "One repeated real root: $root";
                        } else {
                            $realPart = -$b / (2 * $a);
                            $imaginaryPart = sqrt(-$d) / (2 * $a);
                            $factorizedForm = "$a($var - $realPart + $imaginaryPart )($var - $realPart - $imaginaryPart )";
                            $output = "Complex roots: $realPart + $imaginaryPart , $realPart - $imaginaryPart ";
                        }

                        $equation = "$a $var^2 " . ($b >= 0 ? '+ ' : '- ') . abs($b) . "$var " . ($c >= 0 ? '+ ' : '- ') . abs($c) . " = 0";

                        echo "
                            <p>Equation: " . htmlspecialchars($equation) . "</p>
                            <p>Determinant: $d</p>
                            <p>Factorized Form: $factorizedForm</p>
                            <p>Roots: $output</p>
                            
                        ";/* so right here i would like to inset a graph plotting/chart functionality w
                           which would plot the graph according to the input a,b,c a tittle written under if need be it could be crossed with my html/css form for more of b
                           ootstrap5 features and css
                           *however, the graph coul use the roots to plot a graph of y=ax^2+-bx+-c or x against y or vice versa hoow ever the case may be*/
                    } 
                    else {
                        echo "Please provide input values and press Factorize.";
                    }
                ?>
            </div>
            <div class="card-footer">
                <form action="" method="get">
                    <div class="mb-3">
                        <input type="number" placeholder="insert ath number" class="form-control" id="ath" name="ath" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" placeholder="insert bth number" class="form-control" id="bth" name="bth" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" placeholder="insert cth number" class="form-control" id="cth" name="cth" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="insert variable (optional)" class="form-control" id="dth" name="dth">
                    </div>
                    <button type="submit" class="btn btn-primary" name="find">Factorize</button>
                    <a href="QM2_FzM.html" class="btn btn-info">Return</a>
                    <a href="index.html" class="btn btn-danger">Home page</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
