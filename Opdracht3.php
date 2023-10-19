<?php

$electricityBill = 0;

function addAmount($currentAmount, $addAmount)
{
    return $currentAmount + $addAmount;
}

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
// function en array maken electricityunticosts naam weizigen unitcosts zijn hardcoded
function unitCosts(int $unitAmount, float $electricityBill)
{
    for ($i = 1; $i <= 4; $i++) {
        if ($i == 1) {
            if ($unitAmount >= 50) {
                $electricityBill = $electricityBill + multiplyElectricityCosts(50, 3.50);
                $unitAmount = leftoverUnitAmount($unitAmount, 50);
            } else {
                $electricityBill = $electricityBill + ($unitAmount * 3.50);
                $unitAmount = leftoverUnitAmount($unitAmount, $unitAmount);
            }
        }
        if ($i == 2) {
            if ($unitAmount >= 100) {
                $electricityBill = $electricityBill + multiplyElectricityCosts(100, 4.00);
                $unitAmount = leftoverUnitAmount($unitAmount, 100);
            } elseif ($unitAmount != 0) {
                $electricityBill = $electricityBill + ($unitAmount * 4.00);
                $unitAmount = leftoverUnitAmount($unitAmount, $unitAmount);
            }
        }
        if ($i == 3) {
            if ($unitAmount >= 100) {
                $electricityBill = $electricityBill + multiplyElectricityCosts(100, 5.20);
                $unitAmount = leftoverUnitAmount($unitAmount, 100);
            } elseif ($unitAmount != 0) {
                $electricityBill = $electricityBill + ($unitAmount * 5.20);
                $unitAmount = leftoverUnitAmount($unitAmount, $unitAmount);
            }
        }
        if ($i == 4) {
            if ($unitAmount != 0) {
                $electricityBill = $electricityBill + multiplyElectricityCosts($unitAmount, 6.50);
            }
        }
    }

    // for ($i=1; $i <= $unitAmount; $i++) { 
    //     if ($i <= 50) 
    //     {
    //         $electricityBill = $electricityBill + 3.50;

    //         // echo $i ." " ;
    //         // echo $electricityBill ." " ."<br>" ;
    //     } 
    //     if ($i > 50 && $i <= 150) { 
    //         $electricityBill = $electricityBill + 4.00;

    //     }
    //     if ($i > 150 && $i <= 250) {
    //         $electricityBill = $electricityBill + 5.20;

    //     }
    //     if ( $i > 250) {
    //         $electricityBill = $electricityBill + 6.50;

    //     }
    // }

    // if($unitAmount > 250 )
    // {
    //     $unitAmount = $unitAmount - 250;
    //     $tier0 = (50 * 3.50);
    //     $tier1 = (100 * 4.00);
    //     $tier2 = (100 * 5.20);
    //     $tier3 = ($unitAmount * 6.50);
    //     $electricityBill = $tier0+$tier1+$tier2+$tier3;
    // }
    // elseif ($unitAmount > 150) {
    //     $unitAmount = $unitAmount - 150;
    //     $tier0 = (50 * 3.50);
    //     $tier1 = (100 * 4.00);
    //     $tier2 = ($unitAmount * 5.20);
    //     $electricityBill = $tier0+$tier1+$tier2;
    // }
    // elseif ($unitAmount > 50) {
    //     $unitAmount = $unitAmount - 50;
    //     $tier0 = (50 * 3.50);
    //     $tier1 = ($unitAmount * 4.00);
    //     $electricityBill = $tier0+$tier1;
    // }
    // else{
    //     $tier0 = ($unitAmount * 3.50);
    //     $electricityBill = $tier0;
    // }

    return $electricityBill;
}

// {
//     if   ($unitAmount <=50) {
//     // echo ("Euro. 3.50/unit");
//     $electrictyBill = $unitAmount * 3.50;
//     return $electrictyBill;

// } 
//    elseif ($unitAmount > 50 && $unitAmount <= 150) {
//     // echo ("Euro. 4.00/unit");

// } 
//    elseif ($unitAmount > 150 && $unitAmount <= 250) {
//     // echo ("Euro. 5.20/unit");
// }
//    elseif ($unitAmount > 250) {
//     // echo ("Euro. 6.50/unit");
// }};
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
        <div class="imgContainer">
            <img src="images/vecteezy_blue-energy-thunder-lightning-bolt-symbol-or-electricity_20785841_185.png" alt="">
        </div>
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
                    $totalCosts = unitCosts($input, $electricityBill);
                }
            }
            ?>
        </div>

        <!-- prijzen erbij zetten -->
        <h1><?php echo "&#8364; " . number_format((float)$totalCosts, 2, ',', '.') ?></h1>
    </div>

    <footer class="footer">

    </footer>

</body>


</html>

<!-- echo "<pre>";
        // var_dump($totalCosts);
        // echo "</pre>"; -->