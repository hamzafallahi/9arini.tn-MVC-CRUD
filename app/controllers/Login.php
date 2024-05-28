<?php

namespace Controller;

/**
 * login class
 */

use Model\Auth;
use Model\User;

class Login extends Controller
{

	public function index()
	{

		$data['errors'] = [];

		$data['title'] = "Login";
		$user = new User();

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			//validate
			$row = $user->first([
				'email' => $_POST['email']
			]);//first 

			if ($row) {



				$hashedPassword = $user->generateBcryptHash($_POST['password'], $row->salt, 12);


				if ($row->password === $hashedPassword) {

					//get user role name
					$query = "select role from roles where id = :id ";
					$id = $row->role;

					$role = $user->query($query, ['id' => $id]);
					if ($role) {
						$row->role_name = $role[0]->role;
					} else {
						$row->role_name = '';
					}
					echo '<pre>';
					//print_r("$query");
					print_r("         ");
					//print_r($id);
					print_r("         ");
					//print_r(['id' => $id]);
					print_r("         ");
					print_r($role);
					//print_r($_GET['find']);

					echo '</pre>';
					//authenticate
					Auth::authenticate($row);
					//$this->view('home', $row);

					redirect('home');
				}
			}

			$data['errors']['email'] = "Wrong email or password";
		}

		$this->view('login', $data);
	}
}
