<?php
	session_start();

  function autoLoader($class){
		require_once("../classes/" . strtolower($class) . ".php");
	}
	spl_autoload_register('autoLoader');

	$page = '/home';

	if(isset($_POST['submit'])){

		if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){

      $dbCon = new DbCon();

			$username = $dbCon->real_escape_string($_POST['username']);
			$password = $dbCon->real_escape_string($_POST['password']);

			$sql = "SELECT * FROM admins WHERE username = '{$username}'";
			$result = $dbCon->query($sql);
			if($result->num_rows == 1){
				while($row = $result->fetch_object()) {
					$id = $row->id;
					$username = $row->username;
					$name = $row->name;
					$password = $row->password;
				}
				$password_hash = $password;
				if(password_verify($_POST['password'], $password_hash)){
					$_SESSION['id'] = $id;
					$_SESSION['username'] = $username;
					$_SESSION['name'] = $name;

					header("Location: ../admin/home");
				}else {
					header("Location: ../$page/?status=err3");
				}
			}else {
				header("Location: ../$page/?status=err3");
			}

		} else {
			// Missing username or password
			header("Location: ../$page/?status=err2");
		}
	} else {
		// If script attempted run without filling out form
		header("Location: ../$page/?status=err1");
	}
