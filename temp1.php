
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Weather Detail By Bhavisha Rajani</title>
	<meta name="description" content="How to Weather with PHP & openweathermap in 3 easy steps" />
	<meta name="keywords" content="css, html5, php" />
	<meta name="author" content="Javier Palmieri for Wdrfree.com" />
	<link rel="shortcut icon" href="favicon.ico">
    	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="main.css" />


</head>

<body>
  <center>  <form name='form' method='get'>

City Name: <input type="text" name="name" id="textboxid" ><br/>

<input type="submit" name="submit" value="Submit" class="button">
   </form></center>

<?php
$q = isset($_GET['name']) ? $_GET['name']:'rajkot';;

$url = "http://api.openweathermap.org/data/2.5/weather?q=".$q."&APPID=97420ae758c034acdb6f77efbaa90cf3";

$contents = file_get_contents($url);
$clima=json_decode($contents);

$temp_max=$clima->main->temp_max;
$temp_max1 = $temp_max-273.15; 
$temp_min=$clima->main->temp_min;
$icon=$clima->weather[0]->icon.".png";
$flag = $clima->sys->country;
$today = date("F j, Y, g:i a, T");
$cityname = $clima->name; 
$flag1 = strtolower($flag);
$flag1 .= ".png";


?>
     <div id="clima">
         <p class="city"><?php echo $cityname; ?><p class="icon1"><?php echo "<img src='http://openweathermap.org/images/flags/" . $flag1 ."'/ >"; ?></p></p><br/>
        <p class="date"><?php echo $today; ?></p>
        <p class="temp"><?php echo $temp_max1; ?>&deg;<span>c</span></p>
     
        <p class="icon"><?php echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >"; ?></p>
    </div>
</body>
</html>