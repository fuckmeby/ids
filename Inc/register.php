<?php
    require_once 'init.php';
    session_start();
    function register($link){
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $query = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $user = mysqli_fetch_assoc($result);
            $now_date = date('Y-m-d H:i:s');
            $ip = GetIP();
            if(!$user){
                $query = "INSERT INTO users SET name='$name', email='$email', password='$password', created_at='$now_date',kills=0, deaths=0, tournaments=0, flags=0, clan_id=0, lvl=0, `money`=0, cash=0, info='', banned=0, skin=0, ip='$ip'";
                    mysqli_query($link, $query) or die(mysqli_error($link));
                $_SESSION['id'] = mysqli_insert_id($link);
                $_SESSION['name'] = $name;
                $_SESSION['lvl'] = 0;
                $_SESSION['money'] = 0;
                $_SESSION['cash'] = 0;
                echo json_encode([1]);
            }else{
                    echo json_encode([0]);
            }
        }   
    }
    
    function checkPassword($password, $password_confirm){
        return $password === $password_confirm;
        
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

    register($link);
    


?>