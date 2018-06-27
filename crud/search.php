<?php
include ('include/config.php');
?>

<?php


if(isset ($_POST['search']))
{    
    $book_id=$_POST['book_id'];
	$results=$database->get_row("SELECT b.book_id,b.catogery_fk,b.b_name,sub.name,std.std_name,std.std_email FROM books b JOIN subject sub on b.catogery_fk=sub.id JOIN student std on b.created_by=std.std_id order by b.book_id desc LIMIT 1");
foreach ($results as $row)
{
	 $b_name    = "b_name";
     $std_name  = "std_name";
     $std_email = "std_email";
     $name      = "name";
}	}
	else 
	{
		
$b_name    = "";
$std_name  = "";
$std_email = "";
$name      = "";
	
	}
	
 ?>
<!DOCTYPE html>
<html>
<head>
<title>
PHP FIND DATA
</title>
<meta charset ="UTF-8">
<meta name = "viewport" content="width =device-width, initial-scale=1.0">
</head>
<body>
<form action="search.php? search_form=<?php echo $book_id ?> " method = "post">
Book ID: <input type="text" name="book_id" value="<?php echo $book_id ?>"><br><br>
Book Name: <input type="text" name="b_name" value="<?php echo $b_name ?>"><br><br>
Student Name: <input type="text" name="std_name" value="<?php echo $std_name ?>"><br><br>
Book Category: <input type="text" name="name" value="<?php echo $name ?>"><br><br>
 <input type="submit" name="search" value="Find"><br><br>
 </form>
</body>
</html>