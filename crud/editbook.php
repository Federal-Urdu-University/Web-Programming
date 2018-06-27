<?php
function isSelected($row,$sid){
	if($row==$sid)
	return "Selected";
}

include ('include/config.php');
$id =$_GET['edit'];

$std=$database->get_row("SELECT b.book_id,b.created_by,b.catogery_fk,b.b_name,sub.name,std.std_name,std.std_email
FROM books b
Left  JOIN subject sub on b.catogery_fk=sub.id
 left JOIN student std on b.created_by=std.std_id where b.book_id=? order by b.book_id desc "  ,array($id));
?>
<html>
<head>

</head>
<body>
<center>
<h1> Edit Records</h1>
<form action="editbook.php?    edit_form=<?php echo $id ?>"  method="post">

Book Name: <input type="text" name="ubname" value = "<?php echo $std->b_name ?>"/><br><br>
Student Name:  <select  name ="usname" >
<?php
$sid=$std->created_by;
$cid=$std->catogery_fk;
$results=$database->get_results("Select * from student");
foreach($results as $row){
echo "<option value ='$row->std_id'  ".isSelected($row->std_id,$sid).">$row->std_name</option>"; 

}?> 
<select/></br>
<?php echo $cid;?>
Book Category : <select  name ="ucname">
<?php

$results=$database->get_results("Select * from subject");
foreach($results as $row)
echo "<option value = '$row->id' ".isSelected($row->id,$cid)." >$row->name</option>"; 
?>
<select/><br><br>

 <input type="submit" name="update" value="Update" /><br><br>
 <input type="hidden" name="uid" value="<?php echo $id ?>" /> 
</center>


<?php 




if(isset ($_POST['update'])){
	          $book_id=$_POST['uid'];
          $sname=$_POST['usname'];
	$bname=$_POST['ubname'];
	$cname=$_POST['ucname'];
		
	
	
	$data = [
	'b_name' => $bname,
	'catogery_fk' => $cname,
	'created_by' => $sname,
	
	];
	
	$clause =[
	'book_id' => $book_id
	];
	
	if($database->update('books',$data,$clause,1))
					{
						header("location:addbook.php");
					}
	}
					
?>
</body>

</html>