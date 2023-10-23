<?php

$electricityBill = 0;
$costArr = [3.50, 4.00, 5.20, 6.50];

function multiplyElectricityCosts(int $units, float $pricePerUnit): float
{
    $totalUnitCosts = $units * $pricePerUnit;
    return $totalUnitCosts;
}
function leftoverUnitAmount(int $unitAmount, $units): int
{
    $leftOverUnitAmount = $unitAmount - $units;
    return $leftOverUnitAmount;
}
function unitCosts(int $unitAmount, float $electricityBill, $costArr)
{
    // Om de code te optimaliseren zouden wij de gedupliceerde code
    // zoals: "$electricityBill = $electricityBill + multiplyElectricityCosts(50, $costArr[$i]);"
    // in een eigen functie zetten.
    // die functie addCostsToElectricityBill($unitamount, $costArr[$i])
    // zou 2 parameters mee krijgen: de hoeveelheid units en de index van de kosten array.
    // met die 2 parameters kan de functie uitrekenen hoeveel die units bij elkaar kosten
    // en ze toevoegen aan de electriciteit factuur.
    // ook zou deze functie de leftover units uitrekenen.
    // op deze manier zouden wij deze huiidige functie met 13 regels optimaliseren.
    
    for ($i = 0; $i < 4; $i++) {
        if ($i == 0) {
            if ($unitAmount >= 50) {
                $electricityBill = $electricityBill + multiplyElectricityCosts(50, $costArr[$i]);
                $unitAmount = leftoverUnitAmount($unitAmount, 50);
            } else {
                $electricityBill = $electricityBill + ($unitAmount * $costArr[$i]);
                $unitAmount = leftoverUnitAmount($unitAmount, $unitAmount);
            }
        }
        if ($i == 1) {
            if ($unitAmount >= 100) {
                $electricityBill = $electricityBill + multiplyElectricityCosts(100, $costArr[$i]);
                $unitAmount = leftoverUnitAmount($unitAmount, 100);
            } elseif ($unitAmount != 0) {
                $electricityBill = $electricityBill + ($unitAmount * $costArr[$i]);
                $unitAmount = leftoverUnitAmount($unitAmount, $unitAmount);
            }
        }
        if ($i == 2) {
            if ($unitAmount >= 100) {
                $electricityBill = $electricityBill + multiplyElectricityCosts(100, $costArr[$i]);
                $unitAmount = leftoverUnitAmount($unitAmount, 100);
            } elseif ($unitAmount != 0) {
                $electricityBill = $electricityBill + ($unitAmount * $costArr[$i]);
                $unitAmount = leftoverUnitAmount($unitAmount, $unitAmount);
            }
        }
        if ($i == 3) {
            if ($unitAmount != 0) {
                $electricityBill = $electricityBill + multiplyElectricityCosts($unitAmount, $costArr[$i]);
            }
        }
    }

    return $electricityBill;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Welcome to XAMPP</title>

    <meta name="description" content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

    <link href="stylsheets/electricityBill.css" rel="stylesheet" type="text/css" />
    <link href="stylsheets/normalize.css" rel="stylesheet" type="text/css" />

    <!-- <link href="../dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" /> -->
    <link href="..//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>

    <link href="images/vecteezy_blue-energy-thunder-lightning-bolt-symbol-or-electricity_20785841_185.png" rel="icon" type="image/png" />
</head>

<body class="gridContainer">

    <header class="header">
        <div class="imgContainer">
            <img src="images/vecteezy_blue-energy-thunder-lightning-bolt-symbol-or-electricity_20785841_185.png" alt="">
        </div>
        <h1>The Greenest Choice</h1>
        <div class="imgContainer"></div>
    </header>

    <nav class="navigation">
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Bills</a></li>
            <li><a href="">Summary</a></li>
        </ul>

        <div class="placeholder"></div>
    </nav>

    <div class="content">
        <!-- <div>
            <p>For first 50 units – Rs. 3.50/unit
            For next 100 units – Rs. 4.00/unit
            For next 100 units – Rs. 5.20/unit
            For units above 250 – Rs. 6.50/unit</p>
        </div> -->
        <!-- <div> -->
            <h1>Calculate your electricity bill:</h1>
            <div>
                <form method="post">
                    <input name="units" id="units"></input>
                    <button placeholder="Submit" type="submit">Submit</button>
                </form>
                
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $input = $_POST["units"];
                    if ($input != "") {
                        $totalCosts = unitCosts($input, $electricityBill, $costArr);
                    }
                }
                ?>
            <!-- </div> -->
        </div>


        <h1><?php echo "&#8364; " . number_format((float)$totalCosts, 2, ',', '.') ?></h1>
    </div>

    <footer class="footer">

    </footer>

</body>


</html>