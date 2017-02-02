<?php
$con=mysqli_connect('localhost','root','',"examemp")or die("connection error");
$btn=$_POST['b'];
if ($btn=="insert") 
{
	$name=$_POST['fname'];
	$mob=$_POST['phone'];
	$email=$_POST['mail'];
	$gend=$_POST['gender'];
	$hob=$_POST['hobbies'];
	$hobi=implode(",", $hob);
	$photo=$_FILES['file'];
	$cntry=$_POST['country'];
	$tpname=$photo['tmp_name'];
	$path="image/".$photo['name'];
	move_uploaded_file($tpname, $path);
	$qry="insert into employe(name,phone,email,gender,hobbies,photo,country)values('$name','$mob','$email','$gend','$hobi','$path','$cntry')";
	mysqli_query($con,$qry);
}
if($btn=="view") 
{
	$qry1="select * from employe";
	$result=mysqli_query($con,$qry1);
	if (mysqli_num_rows($result)>0) 
	{
		echo "<table border=1>";
		echo "<tr><th>Pic</th><th>Name</th><th>Phone</th><th>Email</th></tr>";
		while ($r=mysqli_fetch_array($result)) 
		{
			echo "<tr>";
			echo "<td>"?><img src=<?php echo $r['photo'];?> width=70 height=80></td>
			<?php
			echo "<td>".$r["name"]."</td>";
			echo "<td>".$r["phone"]."</td>";
			echo "<td>".$r["email"]."</td>";
		?>
			<td><a href="form.php?id=<?php echo $r['id'];?>">edit</a></td>
			<td><a href="proces.php?id=<?php echo $r['id'];?>">delete</a></td>
			<?php
			echo "</tr>";
		}
		echo "</table>";
	}
}
if(isset($_GET['id']))
{
    $id2=$_GET['id'];
    $co=mysqli_connect('localhost','root','',"examemp")or die("connection error");
   $query="delete from employe where id='$id2'";
   $result=mysqli_query($co,$query);
  }

?>