<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="" method="post">	
  <input type="text" placeholder="Enter Username" name="username"><br><br>

      <input type="text" placeholder="Enter Email" name="email" ><br><br>

      <input type="password" placeholder="Enter Password" name="psw" ><br><br>


<b>Buyer</b><input type="radio" name="type" value="buyer" id="rd" checked> 
<b>Seller</b><input type="radio" name="type" value="seller" id="rd">  <br> <br> 
      <input type="submit" name="submit" id="button">
<button name="button">show all user</button>

</form>


</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "erp";
// Create connection
$connn = new mysqli($servername, $username, $password,$db);

if(isset($_POST['submit'])){

$fn = $_POST["username"];
$em = $_POST["email"];
$ps = $_POST["psw"];
$type =$_POST["type"];
$x;
if($type=="seller")
{
$x=1;
}
else
{
	$x=3;
}

$sql = "INSERT INTO user(username, password,email,usertypeid)
VALUES('$fn','$ps','$em','$x')";		
$query = mysqli_query($connn, $sql); 

}
if(isset($_POST['button'])){

$sql = "SELECT * FROM user ";
$result = $connn->query($sql);  

if ($result->num_rows > 0) 
{ 
   echo "<table ><tr><th>username</th><th>email</th><th>usertypeid</th><th>edit</th><th>delete</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc())
     {
  echo "<tr>";
  echo "<td>". $row['username'] ."</td>";
  echo "<td>". $row['email'] ."</td>";
  echo "<td>". $row['usertypeid'] ."</td>";
   echo "<td><a href=edit1.php?id=" . $row['id'] . ">edit</a></td>";  
   echo "<td><a href=delete.php?id=" . $row['id'] . ">delete</a></td>"; 



}


    echo "</table>";
} else
 {
    echo "0 results";
}

}
  ?>