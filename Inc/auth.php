<?php
	require_once 'init.php';
	session_start();
function logout(){ 
     if(isset($_POST['logout'])){ 
      session_destroy(); 
     } 
    }
logout();
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
				echo json_encode([2]);
			}else{
				echo json_encode([3]);
			}
		}
	}
	
	function getData(){
		if(isset($_POST['getData'])){
			echo json_encode(['id'=>$_SESSION['id'],
							  'name'=>$_SESSION['name'], 
							  'cash'=>$_SESSION['cash'], 
							  'lvl'=>$_SESSION['lvl'],
							  'money'=>$_SESSION['money']],
                                                           JSON_UNESCAPED_UNICODE
							);
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

	auth($link);
	getData();


?>
