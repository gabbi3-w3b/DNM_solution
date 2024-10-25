<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadratic Equation Solver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .body {
            background-color: #393d5b;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .card {
            background-color: #7b81a9;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: white;
        }
        .alert {
            margin-bottom: 20px;
        }
        .btn {
            margin: 10px;
        }
        a:link {
            color: rgb(206, 0232, 224);
        }
        a:hover {
            color: #0066cc;
        }
        a:focus {
            color: #6fff00;
        }
        .links {
            text-align: center;
            margin-top: 20px;
            
        }
    </style>
</head>
<body class="body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2 class="text-center">Quadratic Equation Solver</h2>
                    <?php
                        // Retrieve parameters from the URL
                        $a = $_GET['ath'];
                        $b = $_GET['bth'];
                        $c = $_GET['cth'];
                        $var = isset($_GET['dth']) ? $_GET['dth'] : 'x';
                        $Varlength = strlen($var);

                        // Validate variable input
                        if (is_numeric($var) || $Varlength > 5) {
                            echo '<div class="alert alert-danger">Error: Invalid variable input. Please provide a valid alphabetical character.</div>';
                            exit;
                        }
                        if ($Varlength==0){
                            $var='x';
                        }
                        
                        if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
                            echo '<div class="alert alert-danger">Error: Invalid input. Please provide numeric values.</div>';
                            exit;
                        } elseif ($a == 0) {
                            echo '<div class="alert alert-danger">Error: Division by zero. \'a\' cannot be zero.</div>';
                            exit;
                        }
                        
                        // to Calculate the discriminant and solutions
                        $discriminant = ($b * $b) - (4 * $a * $c);
                        if ($discriminant < 0) {
                            echo '<div class="alert alert-info">No real solutions.</div>';
                            
                            exit;
                        }
                        
                        $d = (-$b + sqrt($discriminant)) / (2 * $a);
                        $e = (-$b - sqrt($discriminant)) / (2 * $a);
                    ?>

                    <h3 class="text-center">Equation:</h3>
                    <p class="text-center">
                        <?php echo "$a$var<sup>2</sup> ± $b$var ± $c = 0"; ?>
                    </p>
                    <h3 class="text-center">Solutions:</h3>
                    <p class="text-center">
                        <?php echo "Either $var = $d or $var = $e"; ?>
                    </p>
                    <div class="links">
                        <a href="QM1_FM.html" class="links">Formular Method</a>
                        <a href="index.html" class="btn btn-danger"><< Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
