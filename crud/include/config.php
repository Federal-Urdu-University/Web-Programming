<?php 

// Turn off all error reporting
error_reporting(1);
require_once('include/db.php' );



  $params = array(
     'host' => 'localhost', 
     'user' => 'root', 
     'password' => '', 
     'database' => 'project'
 );
 global $database;
//Initiate the class as a new instance
try {
    $database = new SimplePDO( $params );
} catch( PDOException $e ) {
   
  echo 'Error: ' . $e->getMessage();
}
/*
$list = array( 1,2, 3);

//Map of prepared "?" statements to correspond
$prep_bindings = $database->prepare_in( $list );

$results = $database->get_results("select s.id, m.title as 'movie' , m.releaseDate, s.status FROM slider s , movie m  WHERE m.id=s.movie_id ORDER by s.id ASC LIMIT 1");
foreach($results as $k)
echo "slider Id=$k->id slider title $k->title slider Status $k->status and movie name $k->movie movie date $k->releaseDate </br>";


$results =$database->get_results( "select poster from movies where id IN (1,2,3,4,5,6,8) LIMIt 100");
	//print_r($rows);
		$thumbs=array();
	 
		foreach ($results as $row) { 
				
			array_push($thumbs,$row->poster);
		}
		
		print_r($thumbs);
*/



?>