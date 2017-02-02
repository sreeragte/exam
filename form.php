<?php

if(isset($_GET['id']))
{
	$id1=$_GET['id'];
	$con=mysqli_connect('localhost','root','',"examemp")or die("connection error");
   $query="select * from employe where id='$id1'";
   $result=mysqli_query($con,$query);
   while ($res=mysqli_fetch_array($result)) 
   {
   	$name=$res['name'];
   	$mob=$res['phone'];
	$email=$res['email'];
	$gend=$res['gender'];
	$hob=$res['hobbies'];
	$hobi=explode(",", $hob);
	$cntry=$res['country'];
   }
}
else
{
    $name="";
    $mob="";
    $email="";
    $gend="";
    $hob="";
    $hobi="";
    $cntry="";
}


?>


<html>
<head></head>
<body>
	<center><h2>Add employee</h2></center>
    <form method="POST" action="proces.php" enctype="multipart/form-data">
    	Name:<input type="textbox" name="fname" value=
    	"<?php echo $name; ?>" placeholder="name"><br/>
        phone:<input type="textbox" name="phone" placeholder="phone" value="<?php echo $mob; ?>"><br/>
        Email:<input type="textbox" name="mail" placeholder="name" value="<?php echo $email; ?>"><br/>
        Gender:<input type="radio" name="gender" value="male"
        <?php if ($gend=="male")
        {
        ?>
        checked
        	<?php
       
        } ?>>Male
        <input type="radio" name="gender" value="female" <?php if ($gend=="female")
        {
        ?>
        checked
        <?php	
       
        } ?>>female<br/>
        Hobbies:<input type="checkbox" name="hobbies[]" value="music"
        <?php 
        if ($hobi!="") 
        {
        	if (in_array("music",$hobi))
        	 {
        		?>
        	checked<?php
        	}
        	
        }?>>Listening to music
        <input type="checkbox" name="hobbies[]" value="reading"<?php 
        if ($hobi!="") 
        {
        	if (in_array("reading",$hobi))
        	 {
        		?>
        	checked<?php
        	}
        	
        }?>>Reading
        <input type="checkbox" name="hobbies[]" value="browsing"
        <?php 
        if ($hobi!="") 
        {
        	if (in_array("browsing",$hobi))
        	 {
        		?>
        	checked<?php
        	}
        	
        }?>>Browsing
        <input type="checkbox" name="hobbies[]" value="playing"
        <?php 
        if ($hobi!="") 
        {
        	if (in_array("playing",$hobi))
        	 {
        		?>
        	checked<?php
        	}
        	
        }?>>Playing<br/>
         profile pic:<input type="file" name="file" placeholder="name"><br/>
         Country:<select name="country">
         	<option value="india"
         	 <?php if ($cntry=="india")
        {
        ?>
        selected
        	<?php
       
        } ?>>India</option>
         	<option value="america" 
         	<?php if ($cntry=="america")
        {
        ?>
        selected
        	<?php
       
        } ?>>America</option>
            <option value="australia"
            <?php if ($cntry=="australia")
        {
        ?>
        selected
        	<?php
       
        } ?>>Australia</option>
         </select><br/>
        <input type="submit" name="b" value="insert">
        <input type="submit" name="b" value="view">
        <input type="submit" name="b" value="update">
    </form>
</body>
</html>