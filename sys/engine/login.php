<?PHP

//Start session
session_start();
 
//Include database connection details
require_once(__DIR__.'/../db_con/db.php');
 
//Array to store validation errors
$errmsg_arr = array();
 
//Validation error flag
$errflag = false;
 
//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {

	$str = @trim($str);

	if(get_magic_quotes_gpc()) {

		$str = stripslashes($str);
	}

	return mysql_real_escape_string($str);
}
 
//Sanitize the POST values
$username = clean($_POST['email']);
$password = clean($_POST['password']);
 
//Input Validations
if($username == '') {
	
	$errmsg_arr[] = 'Username missing';
	$errflag = true;
}

if($password == '') {
	
	$errmsg_arr[] = 'Password missing';
	$errflag = true;
}
 
//If there are input validations, redirect back to the login form
if($errflag) {

	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: ../../404.php");
	exit();
}
 
//Create query
$qry="SELECT * FROM user WHERE username='$username' AND password='".md5($_POST['password'])."'";
$result=mysql_query($qry);

$qry2="UPDATE user SET online='1' where username='$username'";
$result2=mysql_query($qry2);
 
//Check whether the query was successful or not
if($result) {

	if(mysql_num_rows($result) > 0) {

	//Login Successful
	session_regenerate_id();
	$member = mysql_fetch_assoc($result);
	$_SESSION['SESS_MEMBER_ID'] = $member['id_pegawai'];
	$_SESSION['SESS_FIRST_NAME'] = $member['username'];
	$_SESSION['SESS_LAST_NAME'] = $member['password'];
	session_write_close();

	$role_user= mysql_query("select * from user where username='$username'");
	$data = mysql_fetch_array($role_user);

	if($data['role']=="1") {
	
		header("Location: ../../dashboard.php?.idm=03b9dccb9f840822af6d4768c8194697&&dis-03b9dccb9f840822af6d4768c819469703b9dccb9f840822af6d4768c8194697");
	
	} else if($data['role']=="2") {
	
		header("Location: home.php");

	} else if($data['role']=="3") {
	
		header("Location: home.php");
	
	} else {
		
		header("Location: 404.php");
	}

	exit();

} else {

	//Login failed
	$errmsg_arr[] = 'user name and password not found';
	$errflag = true;
	
	if($errflag) {
		
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ../../index.php?msg=303");
		exit();
		
		}
	}

} else { 

	die("Query failed");
}

?>
