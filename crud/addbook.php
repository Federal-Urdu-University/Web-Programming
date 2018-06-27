<?php
include ('include/config.php');
?>

<html>
<head>

</head>
<body>
<center>
<h1> Add Book Records</h1>
<form action="addbook.php"  method="post">

Book Name: <input type="text" name="bname"/><br><br>
Student Name:  <select  name ="sname">
<?php
$results=$database->get_results("Select * from student");
foreach($results as $row)
echo "<option value = $row->std_id >$row->std_name</option>"; 
?>
<select/></br>
Book Category : <select  name ="cname">
<?php
$results=$database->get_results("Select * from subject");
foreach($results as $row)
echo "<option value = $row->id >$row->name</option>"; 
?>
<select/><br><br>

 <input type="submit" name="submit" value="Submit" /><br><br>
</center>
</form>
<?php

if(isset($_POST['submit']))
{
	$sname=$_POST['sname'];
	$bname=$_POST['bname'];
	$cname=$_POST['cname'];
	

	$data = [
	'b_name' => $bname,
	'catogery_fk' => $cname,
	'created_by' => $sname,
	
	];
	
	$lastId=$database->insert('books',$data);
}

?>
<?php
if(isset  ($_GET['action'])=='add')
{
	echo "User has been added successfully";
} 
$DBH=null;?>
<div align='center'>
<table border="2" width="600">
<tr>
<th>Book ID</th>
<th>Book Name</th>
<th>Student Name</th>
<th>Student Email</th>
<th>Book Category</th>

<th>Edit</th>
<th>Delete</th>
</tr>

<?php


if (isset($_GET['del']))
{
	$del_id=$_GET['del'];
	$where =[
	'book_id' =>$del_id
	];
	
	//global $database;
	if($database->delete( 'books', $where, 1 )){
	 
	
		echo "Selected book of id $del_id Deleted Succesfully.";
	}
	
}

$results=$database->get_results("SELECT b.book_id,b.catogery_fk,b.b_name,sub.name,std.std_name,std.std_email
FROM books b
 JOIN subject sub on b.catogery_fk=sub.id
JOIN student std on b.created_by=std.std_id order by b.book_id desc");
foreach($results as $row )
{
	
	
 echo "<tr align='center'>
	<td>$row->book_id</td>
	<td>$row->b_name</td> 
	<td>$row->std_name</td>
	<td>$row->std_email</td>
	<td>$row->name</td>
	<td><a href='editbook.php?edit=$row->book_id' >Edit</td>
	<td><a href='addbook.php?del=$row->book_id' >Delete</td>
	</tr>";
	
	}
	

	
	
	
?> 

	
	
	
</table>
</div>

	</body>

</html>