<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php

	$host = 'localhost';
	$user = 'root';
	$pw = '1234';
	$dbName = 'spurs';
	$mysqli = new mysqli($host, $user, $pw, $dbName);

	$email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];



	$sql = "insert into member (
            email,
            password,
            name
	)";
	
	$sql = $sql. "values (
			'$email',
			'$password',
			'$name'
	)";

	if($mysqli->query($sql)){ 
		echo '<script>alert("Nice To Meet You!")</script>'; 
	}else{ 
		echo '<script>alert("fail to insert sql")</script>';
	}

	mysqli_close($mysqli);
?>

<script>
	location.href = "login.html";
</script>

</html>
