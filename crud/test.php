<?php 

include ('include/config.php');
$id=$_GET['id'];
$rows = $database->num_rows("Select count(std_id) from student ");
echo $rows."<br />";

$row=$database->get_row("Select * from student where std_id=?",array($id));
	
	
		echo "<tr align='center'>
	<td>$row->std_id</td>
	<td>$row->std_name</td>
	<td>$row->std_add</td>
	<td>$row->std_contact</td>
	<td>$row->std_dob</td>
	<td>$row->std_email</td>
	<td><a href='edit.php?edit=$showid' >Edit</td>
	<td><a href='index.php?del=$showid' >Delete</td>
	</tr>";
	
	
	
	
	
?>


?>