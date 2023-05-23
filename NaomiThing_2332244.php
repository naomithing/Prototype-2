<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather App</title>
  <link rel="stylesheet" href="./NaomiThing_2332244.css">
  <script src="./NaomiThing_2332244.js" defer></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
    <div class="card">
    <div class="search">
      <input type="text" class="search-bar" placeholder="Search" value="">
      <button>
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z"
            clip-rule="evenodd"></path>
          <path fill-rule="evenodd"
            d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <div class="weather">
      <h2 class="city">Weather in Glasgow</h2>
      <h1 class="temp">Temp range: --</h1>
      <div class="left">
        <img src="https://openweathermap.org/img/wn/04n.png" alt="" class="icon" />
      <div class="description">Unknown</div>
      </div>
      <div class="right">
        <div class="humidity">Humidity: --</div>
        <div class="wind">Wind speed: --</div>
        <div class="max">max: --</div>
        <div class="min">min:--</div>
        <div class="rainfall">Rainfall: --</div>
      </div>
      <div class="date">--,--</div>
    </div>
  </div>
    </div>
</body>

</html>
<?php

     //create the connection
     $conn = mysqli_connect("localhost","root","","db10");
     if (mysqli_error($conn)) {
        die("Error in query: " . mysqli_error($conn));
    }

     //fetch from api
     $json_data=file_get_contents("https://api.openweathermap.org/data/2.5/weather?&units=metric&q=wigan&appid=ac7cdc20b49facdb25862d9fc16a501f");
     //convert into json format
     $data = json_decode($json_data,true);
     //access the data 
     $city = $data['name'];
     $temp = $data['main']['temp'];
     $humidity = $data['main']['humidity'];
     $wind_speed =$data['wind']['speed'];
     $pressure = $data['main']['pressure'];
    //  $timestamp = $data['dt'];
    //  $date = gmdate("Y-m-d\TH:i:s\Z", $timestamp);
    //  echo "$date";
     //query 
     $sql = "INSERT INTO weather(Id,City_Name,Temperature,Humidity,Wind_Speed) VALUES('1','$city','$temp','$humidity','$wind_speed')";
     echo "$sql";
     //run the query
     mysqli_query($conn,$sql);
 
    ?>