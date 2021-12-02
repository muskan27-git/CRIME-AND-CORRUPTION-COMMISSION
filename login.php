<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Page</title>

<style>
	#type
	{
		height: 32px;
		width: 270px;
		border: 0;
  		outline: 0;
  		background: transparent;
  		border-bottom: 3px solid white;
  		color: white;
  		font-size: 25px;
	}

	#btn
	{
		height: 30px;
		width: 230px;
		background-color: orange;
		font-size: 20px;
		color: white;
	}

	table
	{
		border-radius: 25px;
		border:7px solid white;
		font-size: 25px;
		color: white;
		background:rgba(0,0,0,0.8);
	}

	input::-webkit-input-placeholder 
	{
    font-size: 20px;
    line-height: 3;
    color: white;
	}
</style>

</head>
<body background="images/admin_login_background1.jpg">
<?php
if($_POST)
{
	$mysqlhost='localhost';
$mysqlusername='root';
$mysqlpassword='Utkarsh1234'; 
$mysqldb='civildisobedience';
    $username=$_POST['username'];
    $password=$_POST['password'];
	$conn=mysqli_connect($mysqlhost,$mysqlusername,$mysqlpassword,$mysqldb);

    $query="SELECT * From users where username='$username' and password='$password'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['auth']='true';
        header('location:admin.php');
    }
	else {echo 'Wrong Username or Password';}
}

?>


<form method="POST" >
<br><br><br><br><br>
	<table bgcolor="black" border="0" align="center" width="25%" cellspacing="30">
		
		<tr>
			<td colspan="2" align="center"><img src="images/admin_logo.png" width="50%"></td>
		</tr>
		
		<tr>
			<td align="center"><input type="text" name="username" placeholder="username" id="type" required>
				</td>
		</tr>
	
		<tr>
			<td align="center"><input type="password" name="password" placeholder="password" id="type" required></td>
		</tr>

		<tr>
			<td colspan="2" align="center">
			<button id="btn"placeholder="Submit">Submit</button>
			</td>
		</tr>
	</table>
<br><br>
<br><br>

</form>



</body>
</html>