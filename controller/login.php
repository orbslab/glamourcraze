<?php
	include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Glamourlady">
    <meta name="keywords" content="Glamourlady, Glamour, Sylhet">
    <meta name="author" content="OrbsLab">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Glamourlady | Your Passion is Our Attitude</title>
    
    <link rel="icon" href="image/icon.png">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
</head>

<body">
	<div class="logo"></div>
	<div class="login-block">
		<form action="" method="post">
		    <h1>Glamour Craze</h1>
		    <input type="text" value="" placeholder="Username" name="username" />
		    <input type="password" value="" placeholder="Password" name="password" />
		    <button name="login">Login</button>
	    </form>
	    <?php
	    	if (isset($_POST['login'])) {
	    		$username = $_POST['username'];
	    		$password = $_POST['password'];

	    		try {
                    $stmt = $conn->prepare("SELECT admin_name, admin_pass FROM admin WHERE admin_name=:admin_name");
                    $stmt->execute([':admin_name' => $username]);

                    if($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        	if($row['admin_name'] == $username && $row['admin_pass'] == $password) {
                        		session_start();
                        		$_SESSION["admin_name"] = $username;
                        		echo "<script>location.href = 'index.php';</script>";
                        	} else {
                        		echo "Wrong Username or Password";
                        	}
                        }
                    }
                } catch(PDOExeption $e) {
                	echo "Error: ".$e->getMessage();
                }
                $stmt = null;
	    	}
	    ?>
	</div>
</body>
</html>