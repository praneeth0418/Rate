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

<form action="rateit.php" method="post">
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