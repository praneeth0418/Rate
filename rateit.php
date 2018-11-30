<?php
include 'star.php';
include 'sql_con.php';

if (isset($_POST['search'])) 
{
	$tag=$_POST["search"];
	$Name     = $_POST['name'];
	//$Name     = mysql_real_escape_string($Name);
	$cata = $_POST['search'];
	//$cata = mysql_real_escape_string($cata);
		
	echo '<h2>Welcome ' .$_POST['name'].',  Rate ' .$_POST['search'].' collection</h2>';
	//echo '<h2>'.$rate.'</h2>';
	if (isset($_POST['star'])) 
		{
			$rating = $_POST['star'];
		//$rating = mysql_real_escape_string($rating);
			$query    = "INSERT INTO rating (Name, Catagory, Rating) 
             VALUES('$Name', '$cata', '$rating')";
			$result=mysql_query($query) or trigger_error(mysql_error()." in ".$query);
			if($result){echo "inserted successfully";}
		}
	
		
	
	
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