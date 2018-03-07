<?php
require_once 'business.php';


function galery(&$model)
{


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		save_selected($_POST['select']);
		return 'redirect:galery';
		
	}

    $model['galery'] = get_galery();
	$model['user'] = get_logged_user();
    return 'galery_view';
}

function galery_selected(&$model)
{


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$user = get_logged_user();
		$selected = array_diff($user['selected'], $_POST['disselect']);
		save_selected($selected);
		return 'redirect:galery_selected';
	}

    $model['galery'] = get_galery();
	$model['user'] = get_logged_user();
    return 'galery_selected_view';
}


function new_photo(&$model)
{
	$photo = [
		'_id' => null,
		'image' => null,
		'title' => null,
		'watermark' => null,
		'author' => null,
		'private' => null
	];


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		define("MAXSIZE_MEGABYTE", 1, true);
		define("BYTES_IN_MEGABYTE", 1048576, true);
		define("MAXSIZE_BYTE", MAXSIZE_MEGABYTE*BYTES_IN_MEGABYTE, true);
		define("FOLDER", "images", true);
		define("DIRECTORY", $_SERVER['DOCUMENT_ROOT'].'/'.FOLDER.'/', true);

		if (!empty($_POST['title']) &&
			!empty($_POST['author']) &&
			is_uploaded_file($_FILES['image']['tmp_name'])  ) {
				if ($_FILES['image']['size'] <= MAXSIZE_BYTE) {
					if ($_FILES['image']['type']=="image/jpeg" || $_FILES['image']['type']=="image/png") {
						$user = get_logged_user();
						$photo = [
							'image' => round(microtime(true)*10000).$_FILES['image']['name'],
							'title' => $_POST['title'],
							'watermark' => $_POST['watermark'],
							'author' => $_POST['author'],
							'private' => (empty($_POST['private']) ? "false" : $_POST['private']),
							'sender' => (($user['is_logged']) ? $user['login'] : null)
						];
						if (save_photo_disk(DIRECTORY, $_FILES['image']['tmp_name'], $photo['image'])) {
							save_photo_db(null, $photo);
							createMiniature (DIRECTORY, $photo['image']);
							createWatermark (DIRECTORY, $photo['image'], $photo['watermark']);
							return 'redirect:new_photo?up=1';
						}
						else return 'redirect:new_photo?up=2';
					}
					else {
						return 'redirect:new_photo?up=3';
					}
				}
				else {
					return 'redirect:new_photo?up=4';
				}
		}
		else {
			switch ($_FILES['image']['error']) {
			case 1:
			case 2:
				return 'redirect:new_photo?up=4';
				break;
			default: 
				return 'redirect:new_photo?up=2';
				break;
			}
		}
	}
	$model['user'] = get_logged_user();
    return 'new_photo_view';
}


function edit(&$model)
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


		$id = $_GET['id'];
		if (!empty($_POST['title']) &&
			!empty($_POST['author']) &&
			!empty($_POST['private'])) {
				$photo = [
					'title' => $_POST['title'],
					'author' => $_POST['author'],
					'private' => $_POST['private']
				];

				if (save_photo_db($id, $photo)) return 'redirect:' . $_SERVER['HTTP_REFERER'] . '&ed=1';
				else return 'redirect:' . $_SERVER['HTTP_REFERER'] . '&ed=2';
								
			
		}
		else return 'redirect:edit?ed=3';

    } elseif (!empty($_GET['id'])) {
        $photo = get_photo($_GET['id']);
    }

    $model['photo'] = $photo;
	$model['user'] = get_logged_user();
    return 'edit_view';

}


function delete(&$model)
{
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			define("FOLDER", "images", true);
			define("DIRECTORY", $_SERVER['DOCUMENT_ROOT'].'/'.FOLDER.'/', true);

            
			$photo = get_photo($id);
			delete_photo_disk(DIRECTORY, $photo['image']);
			delete_photo_db($id);
            return 'redirect:galery';

        } else {
			$model['photo'] = get_photo($id);
			$model['user'] = get_logged_user();
			return 'delete_view';

        }
    }

    return 'redirect:galery';
}

function login(&$model) {

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		if (!empty($_POST['login']) &&
			!empty($_POST['password'])) {
				$id = check_user((string)$_POST['login'], (string)$_POST['password']);
				if ($id != false) {
					new_session();
					$_SESSION['user_id'] = $id;
					return 'redirect:login?login=1';
				}
				else return 'redirect:login?login=4';
		}
		else return 'redirect:login?login=5';
    } 
	$model['user'] = get_logged_user();
    return 'login_view';
}

function logout(&$model) {
	new_session();
    return 'redirect:login?login=2';
}

function register(&$model) {

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (!empty($_POST['login']) &&
			!empty($_POST['password']) &&
			!empty($_POST['passwordRepeat']) &&
			!empty($_POST['email'])) {
				if(login_free($_POST['login']) &&
				email_free($_POST['email'])) {
					if($_POST['password'] === $_POST['passwordRepeat']) {	
						$user = [
							'login' => $_POST['login'],
							'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
							'email' => $_POST['email']
						];
						add_user($user);
						return 'redirect:login?login=3';
					}
					else return 'redirect:register?register=4';				
				}
				else return 'redirect:register?register=3';
		}
		else return 'redirect:register?register=2';

    } 
	$model['user'] = get_logged_user();
    return 'register_view';

}

function search(&$model) {

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type']!="ajax") {
		save_selected($_POST['select']);
		return 'redirect:search';
	}

	$model['user'] = get_logged_user();
	return 'search_view';
}

function query(&$model) {
	$query = $_POST['search'];
    $model['galery'] = get_photos($query);
	$model['user'] = get_logged_user();
	return 'fragments/photos_view';
}

function home(&$model) {
	$model['user'] = get_logged_user();
	return 'home_view';
}

function serie(&$model) {
	$model['user'] = get_logged_user();
	return 'serie_view';
}

function moje_modele(&$model) {
	$model['user'] = get_logged_user();
	return 'moje_modele_view';
}
