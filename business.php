<?php

function get_db()
{
    $mongo = new MongoClient(
        "mongodb://localhost:27017/",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
            'db' => 'wai',
        ]);

    $db = $mongo->wai;

    return $db;
}

function get_galery()
{
    $db = get_db();
    return $db->galery->find();
}

function get_user($id)
{
    $db = get_db();
    return $db->users->findOne(['_id' => new MongoId($id)]);
}

function get_users()
{
    $db = get_db();
    return $db->users->find();
}

function get_photo($id)
{
    $db = get_db();
    return $db->galery->findOne(['_id' => new MongoId($id)]);
}

function get_photos($title)
{
	if (!empty($title)) {
		$db = get_db();
		$query = array('title' => array('$regex' => new MongoRegex("/^$title/i")));
		return $db->galery->find($query);
	}
	$empty = [];
	return $empty;
}

function save_photo_disk($directory, $tmp_name, $name) {
	return move_uploaded_file($tmp_name, $directory.$name);
}

function save_photo_db($id, $photo)
{
    $db = get_db();
	if ($id == null) {
        $db->galery->insert($photo);
    } else {
        $db->galery->update(['_id' => new MongoId($id)],  ['$set' => $photo] );
    }
    return true;

}

//TWORZENIE MINIATURKI
function createMiniature ($directory, $filename) {
	$image = $directory.$filename;
	$typ = mime_content_type($image);
	if ($typ == "image/png") $img = imagecreatefrompng($image);
	else $img = imagecreatefromjpeg($image);
	$width  = imagesx($img);
	$height = imagesy($img);
	$widthMiniature = 200;
	$heightMiniature = 125;
	$miniature = imagecreatetruecolor($widthMiniature, $heightMiniature);
	imagecopyresampled($miniature, $img, 0, 0, 0, 0, $widthMiniature, $heightMiniature, $width, $height);
	if ($typ == "image/png") imagepng($miniature, $directory."miniature-".$filename, 0); 
	else imagejpeg($miniature, $directory."miniature-".$filename, 100);
	imagedestroy($miniature);
	imagedestroy($img);
	return true;
}


//ZNAK WODNY
function createWatermark ($directory, $filename, $text) {

	//$text = iconv("iso-8859-2", "utf-8", $text);
	//$text = iconv("utf-8", "iso-8859-2", $text);
	

	$image = $directory.$filename;
	$typ = mime_content_type($image);
	if ($typ == "image/png") $img = imagecreatefrompng($image);
	else $img = imagecreatefromjpeg($image);
	$width  = imagesx($img);
	$height = imagesy($img);



	//IMAGETTFTEXT
	$fontSize = 0;
	$font = './arial.ttf';

	do {
		$fontSize++;
		$textBox = imagettfbbox($fontSize, 0, $font, $text);
		$widthText = abs($textBox[4]);
		$heightText = abs($textBox[5]);
		$margin = $heightText / 4;
	} while ( ((int)($heightText + (2 * $margin))) < $height && $widthText < $width  );
	$fontSize--;
	$textBox = imagettfbbox($fontSize, 0, $font, $text);
	$widthText = abs($textBox[4]);
	$heightText = abs($textBox[5]);
	$margin = $heightText / 4;

	$watermark = imagecreatetruecolor($widthText, ((int)($heightText + (2 * $margin)))  );
	$background = imagecolorallocate($watermark, 0, 0, 0);
	imagefill($watermark, 0, 0, $background);
	imagecolortransparent ($watermark, $background);
	$textcolor = imagecolorallocate($watermark, 200, 200, 200);
	imagettftext($watermark, $fontSize, 0, 0, $fontSize + $margin, $textcolor, $font, $text);
	$widthWatermark  = imagesx($watermark);
	$heightWatermark = imagesy($watermark);

	imagecopymerge($img, $watermark, ($width - $widthWatermark)/2, ($height - $heightWatermark)/2, 0, 0, $width, $height, 50);

	if ($typ == "image/png") imagepng($img, $directory."watermark-".$filename, 0); 
	else imagejpeg($img, $directory."watermark-".$filename, 100);

	imagedestroy($img);
	imagedestroy($watermark);
	
	//IMAGESTRING
	/* IMAGESTRING
	$imgText = imagecreatetruecolor(imagefontwidth(5)*mb_strlen($text), imagefontheight(5));
	$widthImgText  = imagesx($imgText);
	$heightImgText = imagesy($imgText);

	$textcolor = imagecolorallocate($imgText, 200, 200, 200);
	imagestring($imgText, 5, 0, 0, $text, $textcolor);

	if (($width/$widthImgText) > ($height/$heightImgText)) $ratio = $height/$heightImgText;
	else $ratio = $width/$widthImgText;
	$widthWatermark = $widthImgText * $ratio;
	$heightWatermark = $heightImgText * $ratio;

	$watermark = imagecreatetruecolor($widthWatermark, $heightWatermark);
	imagecopyresampled($watermark, $imgText, 0, 0, 0, 0, $widthWatermark, $heightWatermark, $widthImgText, $heightImgText);
	$background = imagecolorallocate($watermark, 0, 0, 0);
	imagecolortransparent ($watermark, $background);

	imagecopymerge($img, $watermark, ($width - $widthWatermark)/2, ($height - $heightWatermark)/2, 0, 0, $width, $height, 50);

	if ($typ == "image/png") imagepng($img, $directory."watermark-".$filename, 0); 
	else imagejpeg($img, $directory."watermark-".$filename, 100);
	
	imagedestroy($img);
	imagedestroy($imgText);
	imagedestroy($watermark);
	*/
	return true;
}

function delete_photo_db($id)
{
    $db = get_db();
    $db->galery->remove(['_id' => new MongoId($id)]);
	return true;
}

function delete_photo_disk($directory, $filename) {
	unlink($directory.$filename);
	unlink($directory."watermark-".$filename);
	unlink($directory."miniature-".$filename);
	return true;
}

function check_user($login, $password)
{
	$db = get_db();
	$user = $db->users->findOne(['login' => $login]);
	if (password_verify($password, $user['password'])) return $user['_id'];
	return false;
} 

function login_free($login)
{
	$db = get_db();
	$user = $db->users->findOne(['login' => $login]);
	if (isset($user)) return false;
	return true;
} 

function email_free($email)
{
	$db = get_db();
	$user = $db->users->findOne(['email' => $email]);
	if (isset($user)) return false;
	return true;
} 

function add_user($user){
    $db = get_db();
    $db->users->insert($user);
    return true;
}

function get_logged_user()
{
	if(isset($_SESSION['selected'])) $selected  = $_SESSION['selected'];
	else $selected = [];
	if (isset($_SESSION['user_id'])) {
		$logged_user = get_user($_SESSION['user_id']);
		$user = [
			'is_logged' => true,
			'id' => $logged_user['_id'], 
			'login' => $logged_user['login'],
			'selected' => $selected
		];

	}
	else {
		$user = [
			'is_logged' => false,
			'selected' => $selected
		];
	}
	return $user;
}

function save_selected($selected) {
	$db = get_db();
	$user = get_logged_user();

	if ($user['is_logged']) {
		$id = $user['id'];
		$save = [
			'selected' => $selected
		];
		$db->users->update(['_id' => new MongoId($id)], ['$set' => $save] );
		$_SESSION['selected']=$selected;
	}
	else $_SESSION['selected']=$selected;
    return true;
}


function new_session() {
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}
	session_destroy();
	session_start();
	session_regenerate_id(true);
}




