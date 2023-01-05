<?php
	session_start();
	$file = file("NumberFile/Data.txt");
	$_SESSION['count4'] = isset($_SESSION['count4']) ? $_SESSION['count4'] : 0;
	$_SESSION['count6'] = isset($_SESSION['count6']) ? $_SESSION['count6'] : 0;
	$_SESSION['count8'] = isset($_SESSION['count8']) ? $_SESSION['count8'] : 0;
	$_SESSION['result'] = isset($_SESSION['result']) ? $_SESSION['result'] : 0;
	$_SESSION['Tresult'] = isset($_SESSION['Tresult']) ? $_SESSION['Tresult'] : 0;

	
	if(isset($_POST["4bit"])) {
		$count4 = $_SESSION['count4'];
		for($i = ($count4 * 4) ; $i < (($count4 * 4) + 4) ; $i++) {
			if( $i == ($count4 * 4) ) {
				$result = $file[$i]%2;
			}
			else {
				$result = $result.($file[$i]%2);
			}
		}
		$_SESSION['count4']++;
		$_SESSION['result'] = bindec($result);
	}
	
	if(isset($_POST["6bit"])) {
		$count6 = $_SESSION['count6'];
		for($i = ($count6 * 6) ; $i < (($count6 * 6) + 6) ; $i++) {
			if( $i == ($count6 * 6) ) {
				$result = $file[$i]%2;
			}
			else {
				$result = $result.($file[$i]%2);
			}
		}
		$_SESSION['count6']++;
		$_SESSION['result'] = bindec($result);
	}
	
	if(isset($_POST["8bit"])) {
		$count8 = $_SESSION['count8'];
		for($i = ($count8 * 8) ; $i < (($count8 * 8) + 8) ; $i++) {
			if( $i == ($count8 * 8) ) {
				$result = $file[$i]%2;
			}
			else {
				$result = $result.($file[$i]%2);
			}
		}
		$_SESSION['count8']++;
		$_SESSION['result'] = bindec($result);
	}
?>
<style>
body {
	
	background-image: linear-gradient(rgba(255, 255, 255), rgba(5, 6, 66, 0.5)), url(images/body.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
	margin:0;
}

h1 {
	color: white;
}

#header {
	background-image: url("images/header.jpg");
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
	padding: 20px 5px;
	position: fixed;
	top: 0;
	width: 100%
}	

input {
	text-align: center;
	color: white;
}

#answer {
	border-radius:60px;
}

.bits {
	border-radius:60px;
	margin:10px 5px;
	padding: 5px;
}

.reset {
	border-radius:60px;
	margin-left: 15px;
	margin-top : 10px;
	margin-right: 10px;
	margin-bottom: 5px;
	padding: 5px;
}

#result1 {
	border-radius:60px;
	padding-top: 250px;
	width: 100%;
}


</style>
<html>
<head>
<title>True Random Number Generator</title>
</head>
<body>
<div id = "header">
<center>
<h1> True Random Number Generator </h1>
<p><input type = "text" id = "answer" disabled value = '<?php if(isset($_POST["4bit"]) || isset($_POST["6bit"]) || isset($_POST["8bit"]) ) { echo $_SESSION["result"]; }
?>' ></p>
<p>
<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<button class = "bits" name = "4bit" >4-bit Number</button>
<button class = "bits" name = "6bit">6-bit Number</button>
<button class = "bits" name = "8bit">8-bit Number</button>
<button class = "reset" name = "reset">Reset Data</button>
</form>
</p>
</div>	
<div id = "result1">
<?php 
	if ( $_SESSION['Tresult'] !== 0 ) {
		echo "<center><div class = 'result2' style = 'border-radius:60px;'>".$_SESSION['Tresult']."</div></center>";
		$_SESSION['Tresult'] = $_SESSION['Tresult']."<div class = 'result2' style = 'border-radius:60px; border-style:solid; width:40%; float: left; margin: 8px 30px; margin-left:60px; padding-top: 3px; padding-bottom: 3px;'>".$_SESSION['result']."</div>";
		
	}
	else {
		$_SESSION['Tresult'] = "<center><div class = 'result2' style = 'border-radius:60px; border-style:solid; width:40%; float: left; margin: 8px 30px; margin-left:60px; padding-top: 3px; padding-bottom: 3px;'>".$_SESSION['result']."</div></center>";
	}
	
	if( isset($_POST['reset']) ) {
		session_destroy();
	}
?>
<div>
</center>
</body>
</html>