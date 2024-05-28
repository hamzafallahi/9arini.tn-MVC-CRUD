<?php

/*function csrf()
{
	$code = md5(time());
	$_SESSION['csrf_code'] = $code;
	echo "<input class='js-csrf_code' name='csrf_code' type='hidden' value='$code' />";
}*/

/*function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}
*/
function get_date($date)
{
	return date("jS M, Y", strtotime($date));
}

function set_value($key, $default = '')
{

	if (!empty($_POST[$key])) {
		return $_POST[$key];
	} else
	if (!empty($default)) {
		return $default;
	}

	return '';
}
function set_radio($name, $value, $default = false)
{
	// Check if the form was submitted and the value matches
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST[$name]) && $_POST[$name] == $value) {
		return 'checked';
	}
	// If no match, return default (false by default)
	return $default ? 'checked' : '';
}

function get_image($file)
{

	if (file_exists($file)) {
		return ROOT . "/" . $file;
	}

	return ROOT . "/assets/images/no_image.jpg";
}

/*function get_video($file)
{

	if (file_exists($file)) {
		return ROOT . "/" . $file;
	}

	return ROOT . "/assets/images/no_video.jpg";
}*/

function set_select($key, $value, $default = '')
{

	if (!empty($_POST[$key])) {
		if ($value == $_POST[$key]) {
			return ' selected ';
		}
	} else
	if (!empty($default)) {
		if ($value == $default) {
			return ' selected ';
		}
	}

	return '';
}

function set_checked($key, $value, $default = '')
{

	if (!empty($_POST[$key])) {
		if ($value == $_POST[$key]) {
			return ' checked ';
		}
	} else
	if (!empty($default)) {
		if ($value == $default) {
			return ' checked ';
		}
	}

	return '';
}

function redirect($link)
{
	header("Location: " . ROOT . "/" . $link);
	die;
}

function message($msg = '', $erase = false)
{

	if (!empty($msg)) {
		$_SESSION['message'] = $msg;
	} else {

		if (!empty($_SESSION['message'])) {
			$msg = $_SESSION['message'];
			if ($erase) {
				unset($_SESSION['message']);
			}
			return $msg;
		}
	}

	return false;
}

function esc($str)
{
	return nl2br(htmlspecialchars($str));
}

function str_to_url($url)
{

	$url = str_replace("'", "", $url);
	$url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
	$url = trim($url, "-");
	$url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
	$url = strtolower($url);
	$url = preg_replace('~[^-a-z0-9_]+~', '', $url);

	return $url;
}



/*function generate_slug($str)
{
	$str = str_replace("'", "", $str);
	$str = preg_replace("/[^a-zA-Z0-9\-]+/", "-", $str);
	$str = trim($str, "-");
	$str = strtolower($str);

	return $str;
}*/
