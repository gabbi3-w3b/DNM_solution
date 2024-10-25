<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadratic Equation Solver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            color: white;
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

                        // Validate inputs
                        if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c) || $a == 0) {
                            echo '<div class="alert alert-danger">Error: Invalid input.</div>';
                            exit;
                        }

                        // Calculate the discriminant and solutions
                        $discriminant = ($b * $b) - (4 * $a * $c);
                        if ($discriminant < 0) {
                            echo '<div class="alert alert-info">No real solutions.</div>';
                            exit;
                        }
                        
                        $d = (-$b + sqrt($discriminant)) / (2 * $a);
                        $e = (-$b - sqrt($discriminant)) / (2 * $a);
                        
                        // Prepare data for the graph
                        $x_values = [];
                        $y_values = [];
                        for ($x = -10; $x <= 10; $x += 0.1) {
                            $y = $a * $x * $x + $b * $x + $c;
                            $x_values[] = $x;
                            $y_values[] = $y;
                        }
                    ?>

                    <h3 class="text-center">Equation:</h3>
                    <p class="text-center"><?php echo "$a$var<sup>2</sup> ± $b$var ± $c = 0"; ?></p>
                    <h3 class="text-center">Solutions:</h3>
                    <p class="text-center"><?php echo "Either $var = $d or $var = $e"; ?></p>

                    <h3 class="text-center">Graph of the Quadratic Function:</h3>
                    <canvas id="quadraticChart" width="400" height="200"></canvas>
                    <script>
                        const ctx = document.getElementById('quadraticChart').getContext('2d');
                        const chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: <?php echo json_encode($x_values); ?>,
                                datasets: [{
                                    label: 'Quadratic Function',
                                    data: <?php echo json_encode($y_values); ?>,
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    fill: true,
                                }]
                            },
                            options: {
                                scales: {
                                    x: {
                                        title: {
                                            display: true,
                                            text: 'X Values'
                                        }
                                    },
                                    y: {
                                        title: {
                                            display: true,
                                            text: 'Y Values'
                                        }
                                    }
                                }
                            }
                        });
                    </script>

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
