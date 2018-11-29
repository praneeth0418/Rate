<?php
include 'home.php';

$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// error handling
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST['search'])) 
{
	$tag=$_POST["search"];
	echo '<h2>Welcome ' .$_POST['name'].',  Rate ' .$_POST['search'].' collection'.'  '.$rate. '</h2>';
	//echo '<h2>'.$rate.'</h2>';
	$url='https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=d4aea15010e4c14047c30d29d0e0dfa8&tags='.$tag.'&format=json&nojsoncallback=1';
	$data=json_decode(file_get_contents($url));
	$photos=$data->photos->photo;
	foreach($photos as $photo)
	{
		echo '<body>';
		$url='http://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'.jpg';
		echo '<p><a href="'.$url.'"><img src="'.$url.'" style="width:100px;height:100px;left:50%;"></a></p>';
		echo '</body>';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>rate it</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet/">
<link href="css/font-awesome.css" rel="stylesheet/">
<link href="css/rating.css" rel="stylesheet/">
<style> 
input[type=text] {
    width: 250px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 20px 20px 20px 20px;
	
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 40%;
}
</style>
</head>
<body>

	<script src="js/jquery.min.js"></script>
	<script src="js/rating.js"></script>
	<script src="js/bootstrap.js"></script>
	
		
<p>Search for the images you want to rate :</p>

<form action="conn.php" method="post">
  Enter Name: <input type="text" name="name" placeholder="enter name">
  <br/>
  <br/>
  Search:<input type="text" name="search" placeholder="Search cat, dog etc..">
  <br/>
  <br/>
  <input type="submit">
</form>

</body>
</html>