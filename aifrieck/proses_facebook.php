<?php
session_start();
require_once 'src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '1635071736526852',
  'secret' => '38be423cb3986009f3082e5e15ce279f',
));

// Get User ID
$user = $facebook->getUser();

if (!empty($user)) {
  try {

    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }

  if(!empty($user_profile)) {

		$connect    = mysqli_connect('localhost', 'root', '', 'aifrieck');

		//Mengecek apakah user sudah mendaftar atau belum
		$query = mysqli_query($connect, "SELECT * FROM users WHERE oauth_provider = 'facebook' AND oauth_uid = ".$user_profile['id']);
		$result = mysqli_fetch_array($query);

		if($result == null) {

			//Memasukan data user
			$query2 = mysqli_query($connect, "INSERT INTO users(oauth_provider, oauth_uid, username) VALUES('facebook', {$user_profile['id']}, '{$user_profile['username']}')");
			$query3 = mysqli_query($connect, "SELECT * FROM users WHERE id = ".mysqli_insert_id());
			$result2 = mysqli_fetch_array($query3);
		}
		// Mengeset SESSION
		$_SESSION['id'] = $result2['id'];
		$_SESSION['oauth_uid'] = $result2['oauth_uid'];
		$_SESSION['oauth_provider'] = $result2['oauth_provider'];
		$_SESSION['username'] = $result2['username'];

	}
	  else {
		die("Terjadi Kesalahan");
		}
}
else {

	$login_url = $facebook->getLoginUrl();
	header("Location: ".$login_url);
}
?>