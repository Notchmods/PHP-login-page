<!DOCTYPE html>
<html>
<head>
<title>Login page</title>
</head>
<body>
<form action="Loginpage.php" method="get">
<h1>Create a new account</h1>
<h2>Username:</h2>
<input type="text" name="username"/>
<h2>Password:</h2>
<input type="text" name="password"/>
<br></br>
<input type="submit" name="Createaccount"/>
<br></br>		
<h1>Login</h1>
<h2>Username:</h2>
<input type="text" name="usernamelogin"/>
<h2>Password:</h2>
<input type="text" name="passwordlogin"/>
<br></br>
<input type="submit" name="loginbutton"/> 
</form>
</body>
<?php
$Usernamefile= "Username.txt";
$Passwordfile="Password.txt";
$storeduname=fopen($Usernamefile,'r');
$storedpass = fopen($Passwordfile,'r');
setcookie("Username",fgets($storeduname),time()+86400*30);
setcookie("Password",fgets($storedpass),time()+86400*30);	
if(isset($_GET["Createaccount"])){
$username=$_GET["username"];
$password=$_GET["password"];	
$handle = fopen($Usernamefile,'w');
$handlepass = fopen($Passwordfile,'w');
fwrite($handle,$_GET["username"]);
fwrite($handlepass,$_GET["password"]);
}

if(isset($_GET["loginbutton"])){
	$handle = fopen($Usernamefile,'r');
	if($_GET["usernamelogin"]==$_COOKIE["Username"]){
		if($_GET["passwordlogin"]==$_COOKIE["Password"]){
		header("Location:Mainpage.php");
	}
	}else{
		echo"Incorrect username or password";
	}
}

?> 
</html>