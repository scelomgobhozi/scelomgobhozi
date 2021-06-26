<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){

 $base = $_POST['base'];
 $amount = $_POST['amount'];
 $vsCurr = $_POST['vscurrency'];   


 strtoupper($base);
 strtoupper($vsCurr);
 $apikey = 'cecfbca60e560aa6c52eba7a';

 
if( empty($base)){
 echo"<script> alert('Enter the base  currency'); </script>"; 



 die();
}
if( empty($amount)){
    echo"<script> alert('Please enter the amount you wish to convert'); </script>"; 
    die();
}

if( empty($vsCurr)){
    echo"<script> alert('Blank 'To' input field'); </script>"; 
    die();
}else{


//  -----------------------------For API code ---------------------------------

$ch = curl_init();

$url = "https://v6.exchangerate-api.com/v6/{$apikey}/pair/{$base}/{$vsCurr}/{$amount}";


curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);

// echo CURLOPT_RETURNTRANSFER;
$resp = curl_exec($ch);

if ($e = curl_error($ch)){
    echo $e;  
}

else{
 $decoded = json_decode($resp,true); 
   
}
 

}



}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter</title>
 <link rel="stylesheet" href="style.css">
   
</head>
<body>

<nav><h1> Currency Converter </h1></nav>



<section>

<div class="form-wrapper">

<form action="index.php" method="POST">


<div class="L-I1" >

<label for="">From</label>
<input placeholder="ZAR" class="baseC" name="base" type="text">

<input class="amount" name="amount" type="text"  placeholder="Amount">

</div>



<div class="L-I2" >

<label for="">To</label>
<input class="vscurrency" name="vscurrency" type="text" placeholder="US">



</div>


<div class="S-I">

<button class="sub-btn" type="submit" >Convert</button>
<label for="">  <?php echo $base."  "; echo $decoded['conversion_result']; ?> </label>


</div>



</form>
</div>
</section>



</body>
</html>