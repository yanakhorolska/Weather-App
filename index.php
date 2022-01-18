<?php 
include 'config.php';
error_reporting(E_ERROR | E_PARSE);
$weather = '';
$error = '';
if(isset($_GET["city"])){

    $urlContent = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q='.$_GET['city'].'&units=metric&appid='.$api_key);
    $forcastArray = json_decode($urlContent, true);
    

   if($forcastArray['cod'] == 200) {
    $weather = 'The weather in '.$_GET["city"].':'.'<br>'.$forcastArray['weather'] [0] ['description'];
    $weather = $weather.'<br>'.'The temperature is '.$forcastArray['main'] ['temp'].'&deg'.'C'.'<br>'.'The speed of wind is '.$forcastArray['wind'] ['speed'].' m/s';
   } else {
       $error = "The city name is not correct, please enter the correct name";
   }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Passion+One:wght@700&family=Secular+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <title>Weather App</title>
  </head>
  <body>
    <div class="container" id="mainDiv">
    <div class="block_blur">
    <h1 class="mainHeader">Weather in The City</h1>
    <form>
  <div class="mb-3">
    <label for="city" class="form-label label_city">Input a city name</label>
    <input type="text" name="city" class="input-disabled-border-color form-control city_input" id="city" aria-describedby="Forcast city" placeholder="Enter city name">
    <button type="submit" class="btn city_button">Choose</button>
</form>
          </div>
          <div class ="descr">

                <?php

                    if($weather) {
                        echo '<div class="alert alert-primary" role="alert">'.$weather.'</div>';
                    } else if ($error) {
                        echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                    }

                ?>
 </div>
        
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>