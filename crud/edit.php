<?php
include ('include/config.php');
$id =$_GET['edit'];
$row=$database->get_row("Select * from student where std_id=?",array($id));
?>
<html>
<head>

</head>
<body>
<center>
<h1> Edit Records</h1>
<form action="edit.php?edit_form=<?php echo $id ?>"  method="post">
Student Name: <input type="text" name="ustdname" value="<?php echo $row->std_name ?>"/><br><br>
Student Address: <input type="text" name="ustdadd"  value="<?php echo $row->std_add ?>"/><br><br>
Student Contact: <input type="text" name="ustdcntct"  value="<?php echo $row->std_contact ?>"/><br><br>
Student DOB: <input type="date" name="udob"  value="<?php echo $row->std_dob ?>" /><br><br>
Student Email: <input type="email" name="ustdemail" value="<?php echo $row->std_email ?>" /><br><br>
 <input type="submit" name="update" value="Update" /><br><br>
 <input type="hidden" name="uid" value="<?php echo $id ?>" /> 
</center>


<?php




if(isset ($_POST['update'])){
	    $id=$_POST['uid'];
	    $name=$_POST['ustdname'];
		$add=$_POST['ustdadd'];
		$cntct=$_POST['ustdcntct'];
		$dob=$_POST['udob'];
		$email=$_POST['ustdemail'];
	
	$data = [
	'std_name' => $name,
	'std_add' => $add,
	'std_contact' => $cntct,
	'std_dob' => $dob,
	'std_email' => $email,
	];
	$clause =[
	'std_id' => $id
	];
	if($database->update('student',$data,$clause,1))
					{
						header("location:index.php");
					}
	}
					
?>
</body>

</html>