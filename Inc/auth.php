<?php
	require_once 'init.php';
	session_start();
	function logout(){ 
	     if(isset($_POST['logout'])){ 
	      session_destroy(); 
	     } 
	    }

	function auth($link){
		if(isset($_POST['authLogin']) and isset($_POST['authPassword'])){
			$login = $_POST['authLogin'];
			$password = $_POST['authPassword'];
			$query = "SELECT * FROM users WHERE email='$login' AND password='$password'";
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			$user = mysqli_fetch_assoc($result);
			if(!empty($user)){
				$ip = GetIP();
				$query = "UPDATE users SET ip='$ip' WHERE id=$user[id]";
				mysqli_query($link, $query) or die(mysqli_error($link));
				$_SESSION['name'] = $user['name'];
				$_SESSION['id'] = $user['id'];
				$_SESSION['cash'] = $user['cash'];
				$_SESSION['money'] = $user['money'];
				$_SESSION['lvl'] = $user['lvl'];
				echo 222;
			}else{
				echo "wrong username or password";
			}
		}
	}
	
	function getData(){
		if(isset($_POST['getData'])){
			echo json_encode([['id'=>$_SESSION['id'],
							  'name'=>$_SESSION['name'], 
							  'cash'=>$_SESSION['cash'], 
							  'lvl'=>$_SESSION['lvl'],
<<<<<<< HEAD
							  'money'=>$_SESSION['money'],
                                JSON_UNESCAPED_UNICODE
							]);
		}
	}

	function getProfileInfo($link){
		if(isset($_POST['profile'])){
			$query = "SELECT users.kills, users.deaths, users.tournaments, users.flags, users.lvl, users.money, users.cash, users.info, users.skin, weapons.id as weap_id, weapons.name as weapon_name  FROM users LEFT JOIN users_weapons ON users_weapons.user_id=users.id LEFT JOIN weapons ON users_weapons.weapon_id=weapons.id WHERE users.id=$_SESSION[id]";
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
			echo json_encode($data, JSON_UNESCAPED_UNICODE);
=======
							  'money'=>$_SESSION['money']]],
                                JSON_UNESCAPED_UNICODE
							);
>>>>>>> 08ca04340058a2af687321eebadb1ba6e4dc7eb1
		}
	}

	function getProfileInfo($link){
		if(isset($_POST['profile'])){
			$query = "SELECT users.kills, users.deaths, users.tournaments, users.flags, users.lvl, users.money, users.cash, users.info, users.skin, weapons.*, weapons.name as weapon_name,  FROM users LEFT JOIN users_weapons ON users_weapons.user_id=users.id LEFT JOIN weapons ON users_weapons.weapons_id=weapons.id WHERE users.id=$_SESSION[id]";
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
			echo json_encode($data, JSON_UNESCAPED_UNICODE);
		}
	}

    function GetIP() {
          if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
          } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
          } else {
            $ip = $_SERVER['REMOTE_ADDR'];
          }
          return $ip;
    }

    logout();
	auth($link);
	getProfileInfo($link);
	getData();


?>

