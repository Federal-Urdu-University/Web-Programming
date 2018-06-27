<?php
include ('include/config.php');
?>
<html>
<head>

</head>
<body>
<center>
<h1> Add Student Records</h1>
<form action="index.php"  method="post">
Student Name: <input type="text" name="stdname"/><br><br>
Student Address: <input type="text" name="stdadd"/><br><br>
Student Contact: <input type="text" name="stdcntct"/><br><br>
Student DOB: <input type="date" name="dob" /><br><br>
Student Email: <input type="email" name="stdemail"/><br><br>
 <input type="submit" name="submit" value="Submit" /><br><br>
</center>
</form>
<?php

if(isset($_POST['submit']))
{
	$name=$_POST['stdname'];
	$add=$_POST['stdadd'];
	$cntct=$_POST['stdcntct'];
	$dob=$_POST['dob'];
    $email=$_POST['stdemail'];

	$data = [
	'std_name' => $name,
	'std_add' => $add,
	'std_contact' => $cntct,
	'std_dob' => $dob,
	'std_email' => $email,
	];
	
	$lastId=$database->insert('student',$data);
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
<th>Student ID</th>
<th>Student Name</th>
<th>Student Address</th>
<th>Student Contact</th>
<th>Student DOB</th>
<th>Student Email</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php


if (isset($_GET['del']))
{
	$del_id=$_GET['del'];
	$where =[
	'std_id' =>$del_id
	];
	
	//global $database;
	if($database->delete( 'student', $where, 1 )){
	 
	
		echo "Selected User of id $del_id Deleted Succesfully.";
	}
	
}

$results=$database->get_results("Select * from student ");
foreach($results as $row)
{
	
	
 echo "<tr align='center'>
	<td>$row->std_id</td>
	<td>$row->std_name</td>
	<td>$row->std_add</td>
	<td>$row->std_contact</td>
	<td>$row->std_dob</td>
	<td>$row->std_email</td>
	<td><a href='edit.php?edit=$row->std_id' >Edit</td>
	<td><a href='index.php?del=$row->std_id' >Delete</td>
	</tr>";
	
	}
	
	
?>

	
</table>
</div>

	</body>

</html>