<?php
function parseEquation($equation) {
    $equation = str_replace(' ', '', $equation); // Remove spaces
    $equation = str_replace('==', '=', $equation); // Normalize ==

    // Patterns for quadratic equations
    $patterns = array(
        '/^(-?\d*)x\^2([+-]?\d*)x([+-]?\d*)=0$/',
        '/^(-?\d*)x\^2([+-]?\d*)=0$/',
        '/^(-?\d*)x\^2=([+-]?\d+)$/',
        '/^x\^2([+-]?\d*)x([+-]?\d*)=0$/',
        '/^x\^2([+-]?\d*)=0$/',
        '/^x\^2=([+-]?\d+)$/',
        '/^(-?\d*)x\^2=([+-]?\d+)$/',
        '/^(-?\d+)x\^2([+-]?\d+)x([+-]?\d*)=0$/'
    );

    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $equation, $matches)) {
            // Extract coefficients (a, b, c)
            $a = isset($matches[1]) ? ($matches[1] == '' ? 1 : (int)$matches[1]) : 1; // Default to 1 if missing
            $b = isset($matches[2]) ? (int)$matches[2] : 0; // Default to 0 if missing
            $c = isset($matches[3]) ? (int)$matches[3] : 0; // Default to 0 if missing
            
            return array($a, $b, $c);
        }
    }
    
    return false; // Invalid equation format
}

if (isset($_POST['equation'])) {
    $equation = $_POST['equation'];
    $coefficients = parseEquation($equation);
    
    if ($coefficients) {
        list($a, $b, $c) = $coefficients;

        // Determine solution method
        if ($b == 0 && $c == 0) {
            $method = "Use factorization method.";
        } elseif ($b != 0 && $c == 0) {
            $method = "Use formula method.";
        } elseif ($b * $b - 4 * $a * $c == 0) {
            $method = "Use factorization method.";
        } else {
            $method = "Use completing the square method.";
        }
        
        // Display solution method
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Quadratic Solution Method</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body {
            
                    background-color: #ebe9e9;
                    color: #00ca00;
                }
            </style>
        </head>
        <body>
            <div class="container text-center my-5">
                <h1 class="title">Solution Method</h1>
                <p>Your equation: <?= htmlspecialchars($equation) ?></p>
                <p>Recommended solution method: <?= htmlspecialchars($method) ?></p>
                <button id="solveUsingButton" class="btn btn-success" onclick="redirectToSolve('<?= htmlspecialchars($method) ?>', '<?= htmlspecialchars($equation) ?>')">SOLVE USING <?= htmlspecialchars($method) ?></button>
                <p>No need to solve. This page is for identification purposes only.</p>
                <a href="Q4_DKn.html" class="btn btn-secondary">Back</a>
            </div>

            <script>
                function redirectToSolve(method, equation) {
                    let url = '';

                    // Determine the subpage based on the method
                    switch (method) {
                        case 'Use factorization method.':
                            url = 'QM2_FzM.html';
                            break;
                        case 'Use formula method.':
                            url = 'QM1_FM.html';
                            break;
                        case 'Use completing the square method.':
                            url = 'QM3_CSM.html';
                            break;
                        default:
                            alert('Unknown method!');
                            return;
                    }

                    // Append the equation as a query parameter
                    url += `?equation=${encodeURIComponent(equation)}`;
                    window.location.href = url;
                }
            </script>
        </body>
        </html>
        <?php
    } else {
        echo "Error: Invalid equation format.";
    }
} else {
    echo "Error: No equation provided.";
}
?>
