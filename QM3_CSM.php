<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadratic Equation Solver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
                .bdy{
            background-color:#2b2e45;
            font-size: 20px;
            font-weight:90;
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
                    $a=$_GET['ath'];
                    $b=$_GET['bth'];
                    $c=$_GET['cth'];
                    $d=$_GET['dth'];

                    //check variable
                    if(is_numeric($d)){
                        echo "variable should not be a numeric value";
                        exit;
                    }
                    if(strlen($d)>2|| strlen($d<0)){
                        echo "variable must range between 1 and 2, <br>You can choose to leave the box empty.";
                        exit;
                    }
                    if($a==0){
                        echo "Error: Division by zero.";
                        exit;
                    }


                    /**arithmetic**/
                    //calculate det
                    $determinant = ($b * $b) - (4 * $a * $c);

                    // calculate solutions
                    if($determinant>=0){
                        $sol1 = (((-$b + sqrt($determinant))/(2*$a)));
                        $sol2 = (((-$b - sqrt($determinant))/(2*$a)));

                        //display
                        if(strlen($d)==0){
                        echo "Solutions:<br> either x = $sol1 <br>or x = $sol2";
                        }
                        else{
                            echo "Solutions:<br> either $d = $sol1 <br>or $d = $sol2";
                        }

                    }

                    else {
                        //calculating complex solutions;
                        $real= -$b/ ( 2 * $a );
                        $imaginary= sqrt(-$determinant)/( 2 * $a);

                        //complex results
                        echo "Complex Solutions: <br>";
                        if(strlen($d)==0){
                            echo "x =", $real, "i  ± x = ", $sol2, "<br>";
                            }
                            else{
                                echo "$d = $real i ± $d = $imaginary i ";
                            }
                    }

                    ?>
                </div>
                <div class="card-footer">
                    <form action="" method="get">
                        <div class="mb-3">
                            
                            <input type="number" placeholder="insert ath number" class="form-control" id="ath" name="ath" required>
                        </div>
                        <div class="mb-3">
                        
                            <input type="number"  placeholder="insert bth number" class="form-control" id="bth" name="bth" required>
                        </div>
                        <div class="mb-3">
                        
                            <input type="number" placeholder="insert cth number" class="form-control" id="cth" name="cth" required>
                        </div>
                        <div class="mb-3">
                        
                            <input type="text" placeholder="insert variable(optional)" class="form-control" id="dth" name="dth" >
                        </div>

                        <button type="submit" class="btn btn-secondary" name="find">Factorize</button>
                    <a href="QM2_FzM.html" class="btn btn-info">Return</a>
                    <a href="index.html" class="btn btn-danger">Home page</a>
                    </form>

                </div>
        </div>
    </div>
</body>
</html>


