<?php

namespace Controller;

if (!defined("ROOT")) die("direct script access denied");

/**
 * home class
 */

use Model\Auth;
use Model\User;



class Home extends Controller
{

	public function index()
	{


		$data['title'] = "Home";
		$user = new User();

		$id = $id ?? Auth::getId();

		//validate
		$data['image'] = $user->first([
			'id' => $id
		]);



		if (isset($_GET['find'])) {
			$class = $_GET['find'];
			$query = "SELECT * FROM courses WHERE class LIKE :class";


			$rows = $user->query($query, ['class' => "%$class%"]);
			//print_r("$query");
			//print_r("         ");
			//print_r($class);
			//print_r("         ");
			//print_r(['class' => $class]);
			//print_r("         ");
			//print_r($rows[]);
			//print_r($_GET['find']);

			//echo '</pre>';
			$data['courses'] = $rows;
			//print_r($data['courses']);
		} else {
			$class = "";
			$query = "SELECT * FROM courses WHERE class LIKE :class";


			$rows = $user->query($query, ['class' => "%$class%"]);
			$data['courses'] = $rows;
		}

		$this->view('home', $data);
	}
}
