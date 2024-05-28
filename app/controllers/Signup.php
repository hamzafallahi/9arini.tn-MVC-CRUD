<?php

namespace Controller;

/**
 * signup class
 */
class Signup extends Controller
{



	public function index()
	{

		$data['errors'] = [];

		$user = new \Model\User();

		if ($_SERVER['REQUEST_METHOD'] == "POST") {

			if ($user->validate($_POST)) {
				$_POST['date'] = date("Y-m-d H:i:s");
				//$_POST['role'] = 1;
				$role = set_value('role');
				if (!empty($role)) {
					$_POST['role'] = (int)$role;
				}
				$cost = 12;
				$salt = $user->generateSalt(16);
				$hashed_password = $user->generateBcryptHash($_POST['password'], $salt, $cost);
				$_POST['password'] = $hashed_password;
				$_POST['salt'] = $salt;
				$user->insert($_POST);

				message("Your profile was successfuly created. Please login");
				redirect('login');
			}
		}

		$data['errors'] = $user->errors;
		$data['title'] = "Signup";

		$this->view('signup', $data);
	}
}
