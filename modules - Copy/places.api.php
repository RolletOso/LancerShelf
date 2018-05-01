<?php
	
	$json = file_get_contents('https://maps.googleapis.com/maps/api/place/autocomplete/json?input=uyo%20nigeria&types=establishment&location=37.76999,-122.44696&radius=500&key=AIzaSyD3YScNrjEv1RhJH31zJjrKF2l1wW7proo');

// Decode the JSON string into an object
//$obj = json_decode($json);

// In the case of this input, do key and array lookups to get the values
echo($json);
	
	?>