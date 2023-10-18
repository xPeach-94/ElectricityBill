
<?php

$electricityBill = 0;

function addAmount ($currentAmount, $addAmount) {
    return $currentAmount + $addAmount;
}

function multiplyElectricityCosts (int $units, float $pricePerUnit): float
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
    for ($i=1; $i <= 4; $i++) { 
        if ($i == 1) 
        {
            if($unitAmount >= 50)
            {
                $electricityBill = $electricityBill + multiplyElectricityCosts(50,3.50);
                $unitAmount = leftoverUnitAmount($unitAmount, 50);
            }
            else 
            {
                $electricityBill = $electricityBill + ($unitAmount * 3.50);
                $unitAmount = leftoverUnitAmount($unitAmount, $unitAmount);
            }
        } 
        if ($i == 2)
        {
            if ($unitAmount >= 100)
            {
                $electricityBill = $electricityBill + multiplyElectricityCosts(100,4.00);
                $unitAmount = leftoverUnitAmount($unitAmount, 100);
            } 
            elseif ($unitAmount != 0)
            { 
                $electricityBill = $electricityBill + ($unitAmount * 4.00);
                $unitAmount = leftoverUnitAmount($unitAmount, $unitAmount);
            }
        }
        if ($i == 3) 
        {
            if ($unitAmount >= 100)
            {
                $electricityBill = $electricityBill + multiplyElectricityCosts(100,5.20);
                $unitAmount = leftoverUnitAmount($unitAmount, 100);
            }
            elseif ($unitAmount != 0) 
            {
                $electricityBill = $electricityBill + ($unitAmount * 5.20);
                $unitAmount = leftoverUnitAmount($unitAmount, $unitAmount);
            }
        }
        if ($i == 4)
        {
            if ($unitAmount != 0)
            {
                $electricityBill = $electricityBill + multiplyElectricityCosts($unitAmount,6.50);
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
      <meta charset="UTF-8">
    </head>
    <body>
        <h1>Calculate your electricity bill</h1>
    <form method="post">
        <input name="units" id="units"></input>
        <button placeholder="Submit" type="submit">Submit</button>
    </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $input = $_POST ["units"];
            if ($input!="") {
               $totalCosts = unitCosts($input, $electricityBill);        
            }
        }        
    ?>
    <!-- prijzen erbij zetten -->
    <h1><?php echo "&#8364; " . number_format((float)$totalCosts, 2, ',','.') ?></h1>
    </body>

    
</html>

<!-- echo "<pre>";
        // var_dump($totalCosts);
        // echo "</pre>"; -->