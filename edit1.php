<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "erp";
// Create connection
$connn = new mysqli($servername, $username, $password,$db);$id = $_GET['id'];
$sql = "SELECT * FROM user where id='$id'";
$result = mysqli_query($connn,$sql);

while($row = mysqli_fetch_array($result))
{
  $name=$row['username'];
$email=$row['email'];
$type=$row['usertypeid'];

if(isset($_POST['submit'])){

$z=$_POST["id"];


$name=$_POST['username'];
$email=$_POST['email'];
$type=$_POST['type'];




$sql = "UPDATE user SET username='$name', email='$email',usertypeid='$type' WHERE id=$z";
mysqli_query($connn, $sql);
/*
$z=$_POST["id"];
$sql = "DELETE FROM property WHERE id='$z'";
if ($connn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $connn->error;
}
*/
}

  }



?>
<form action="" method="post" enctype="multipart/form-data">


<b>username:</b>
<input class="input" type="text" name="username"  value="<?php echo $name;?>">
<br>
<br>
<b>email:</b>
<input class="input" type="text" name="email"  value="<?php echo $email;?>">
<br>
<b>usertype:</b>
<input class="input" type="text" name="type"  value="<?php echo $type;?>">
<br>
<input type="hidden" name="id"   value="<?php echo $id;?>">

<input type="submit" name="submit">

</form>