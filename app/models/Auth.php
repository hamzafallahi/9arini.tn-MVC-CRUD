<?php

namespace Model;

if(!defined("ROOT")) die ("direct script access denied");

/**
 * authentication class
 */

class Auth
{
	
	public static function authenticate($row)
	{
		if(is_object($row)){
			$_SESSION['USER_DATA'] = $row;
		}
	}

	public static function logout()
	{
		if(!empty($_SESSION['USER_DATA'])){
			unset($_SESSION['USER_DATA']);

			//session_unset();
			//session_regenerate_id();
		}
	}


	public static function logged_in()
	{
		if(!empty($_SESSION['USER_DATA']))
		{
			return true;
		}

		return false;
	}

	public static function is_admin()
	{
		if(!empty($_SESSION['USER_DATA']))
		{

			if(!empty($_SESSION['USER_DATA']->role_name))
			{
				if(strtolower($_SESSION['USER_DATA']->role_name) == 'admin'){
					return true;
				}
			}
		}

		return false;
	}

	public static function __callStatic($funcname,$args)
	{

		$key = str_replace("get", "", strtolower($funcname));
		if(!empty($_SESSION['USER_DATA']->$key))
		{
			return $_SESSION['USER_DATA']->$key;
		}

		return '';
	}

	
}