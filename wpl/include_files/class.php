<?php
// Our main class
if(!class_exists('FunctionsClass')){
	class FunctionsClass {
		
		function register($redirect) {
			global $msdb;
			$current = 'http'. ((!empty($_SERVER['HTTPS'])) ? "s" : "") .'://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$referrer = $_SERVER['HTTP_REFERER'];
			if ( !empty ( $_POST ) ) {
				if ( $referrer == $current ) {
					require_once('db.php');
					$table = 'store_users';

					$fields = array('user_name', 'user_login', 'user_pass', 'user_email', 'user_registered');
					
					$values = $msdb->clean($_POST);
					
					$username = $_POST['name'];
					$userlogin = $_POST['username'];
					$userpass = $_POST['password'];
					$useremail = $_POST['email'];
					$userreg = $_POST['date'];
					
					//our custom made nonce based on the registered data of the user
					$nonce = md5('registration-' . $userlogin . $userreg . NONCE_SALT);					
					//hash the password using the nonce
					$userpass = $msdb->hash_password($userpass, $nonce);
					
					//Recompile our $value array to insert into the database
					$values = array(
								'name' => $username,
								'username' => $userlogin,
								'password' => $userpass,
								'email' => $useremail,
								'date' => $userreg
							);
					
					// we insert our hashed password in the database
					$insert = $msdb->insert($link, $table, $fields, $values);
					
					if ( $insert == TRUE ) {
						$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
						$aredirect = str_replace('register.php', $redirect, $url);
						
						header("Location: $redirect?reg=true");
						exit;
					}
				} else {
					die('This submission did not come from Music Store page');
				}
			}
		}
		
		function login($redirect) {
			global $msdb;
		
			if ( !empty ( $_POST ) ) {
				$values = $msdb->clean($_POST);
				$subname = $values['username'];
				$form_passwd = $values['password'];
				$table = 'store_users';
				$sql = "SELECT * FROM $table WHERE user_login = '" . $subname . "'";
				$results = $msdb->select($sql);
				if (!$results) {
					die('Sorry, that username does not exist!');
				}
				
				$results = mysql_fetch_assoc( $results );
				
				$storeg = $results['user_registered'];

				$db_password = $results['user_pass'];
				//regenerate the same nonce used while storing the user password in the database
				$nonce = md5('registration-' . $subname . $storeg . NONCE_SALT);
					
				$form_passwd = $msdb->hash_password($form_passwd, $nonce);

				//check if this submitted password matches the stored password
				if ( $form_passwd == $db_password ) {
					
					//If there's a match, we rehash password to store in a cookie
					$authnonce = md5('cookie-' . $subname . $storeg . AUTH_SALT);
					$authID = $msdb->hash_password($form_passwd, $authnonce);
					
					//Set our authorization cookie
					setcookie('musicstorecookie[user]', $subname, 0, '', '', '', true);
					setcookie('musicstorecookie[authID]', $authID, 0, '', '', '', true);
					
					//Build our redirect
					$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
					$redirect = str_replace('login.php', $redirect, $url);
					
					//Redirect to the home page
					header("Location: $redirect");
					exit;	
				} else {
					return 'invalid';
				}
			} else {
				return 'empty';
			}
		}
		
		function logout() {
			//Expire our auth coookie to log the user out
			$idout = setcookie('musicstorecookie[authID]', '', -3600, '', '', '', true);
			$userout = setcookie('musicstorecookie[user]', '', -3600, '', '', '', true);
			
			if ( $idout == true && $userout == true ) {
				return true;
			} else {
				return false;
			}
		}
		
		function checkLogin() {
			global $msdb;
			
			$cookie = $_COOKIE['musicstorecookie'];
			
			$user = $cookie['user'];
			$authID = $cookie['authID'];
			
			if ( !empty ( $cookie ) ) {
				
				//Query the database for the selected user
				$table = 'store_users';
				$sql = "SELECT * FROM $table WHERE user_login = '" . $user . "'";
				$results = $msdb->select($sql);

				if (!$results) {
					die('Sorry, that username does not exist!');
				}
				
				$results = mysql_fetch_assoc( $results );
		
				$storeg = $results['user_registered'];

				//The hashed password of the stored matching user
				$db_password = $results['user_pass'];

				//Rehash password to see if it matches the value stored in the cookie
				$authnonce = md5('cookie-' . $user . $storeg . AUTH_SALT);
				$db_password = $msdb->hash_password($db_password, $authnonce);
				
				if ( $db_password == $authID ) {
					$results = true;
				} else {
					$results = false;
				}
			} 
			
			return $results;
		}
	}
}

//Instantiate our database class
$fun = new FunctionsClass;
?>