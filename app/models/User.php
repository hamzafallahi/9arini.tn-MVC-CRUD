<?php

namespace Model;

/**
 * users model
 */
class User extends Model
{

	public $errors = [];
	protected $table = "users";
	//public $salt = "";
	//public $hash = "";
	protected $allowedColumns = [

		'email',
		'firstname',
		'lastname',
		'password',
		'role',
		'date',
		'image',
		'about',
		'university',

		'country',
		'address',
		'phone',
		'slug',
		'facebook_link',
		'instagram_link',
		'twitter_link',
		'linkedin_link',
		'salt',

	];


	public function generateSalt($length)
	{
		$charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$salt = '';
		$charset_length = strlen($charset);
		for ($i = 0; $i < $length; $i++) {
			$salt .= $charset[rand(0, $charset_length - 1)];
		}
		return $salt;
	}

	public function generateBcryptHash($password, $salt, $cost)
	{
		$hash = '*';

		// Check if the cost is within a valid range
		if ($cost < 4 || $cost > 31) {
			return $hash;
		}

		// Format the cost to ensure it has two digits
		$cost = sprintf('%02d', $cost);

		// Construct the bcrypt hash string
		$hash = '$2y$' . $cost . '$' . $salt;

		// Perform the bcrypt hashing with the specified cost
		$hash .= crypt($password, $hash);

		return $hash;
	}
	public function validate($data)
	{
		$this->errors = [];

		if (empty($data['firstname'])) {
			$this->errors['firstname'] = "A first name is required";
		} else
		if (!preg_match("/^[a-zA-Z]+$/", trim($data['firstname']))) {
			$this->errors['firstname'] = "first name can only have letters without spaces";
		}


		if (empty($data['lastname'])) {
			$this->errors['lastname'] = "A last name is required";
		} else
		if (!preg_match("/^[a-zA-Z]+$/", trim($data['lastname']))) {
			$this->errors['lastname'] = "last name can only have letters without spaces";
		}


		/*if (empty($data['phone'])) {
			$this->errors['phone'] = "The phone is required";
		} else
		if (!preg_match("/^(09|\+2609)[0-9]{8}$/", trim($data['phone']))) {
			$this->errors['phone'] = "Phone number not valid";
		}*/

		if (empty($data['role'])) {
			$this->errors['role'] = "Please select a role";
		} else {
			$allowed_roles = [1, 2];
			if (!in_array($data['role'], $allowed_roles)) {
				$this->errors['role'] = "Invalid role selected";
			}
		}


		//check email
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Email is not valid";
		} else
		if ($this->where(['email' => $data['email']])) {
			$this->errors['email'] = "That email already exists";
		}

		if (empty($data['password'])) {
			$this->errors['password'] = "A password is required";
		}

		if ($data['password'] !== $data['retype_password']) {
			$this->errors['password'] = "Passwords do not match";
		}

		if (empty($data['terms'])) {
			$this->errors['terms'] = "Please accept the terms and conditions";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}


	public function edit_validate($data, $id)
	{
		$this->errors = [];

		if (empty($data['firstname'])) {
			$this->errors['firstname'] = "A first name is required";
		} else
		if (!preg_match("/^[a-zA-Z]+$/", trim($data['firstname']))) {
			$this->errors['firstname'] = "first name can only have letters without spaces";
		}


		if (empty($data['lastname'])) {
			$this->errors['lastname'] = "A last name is required";
		} else
		if (!preg_match("/^[a-zA-Z]+$/", trim($data['lastname']))) {
			$this->errors['lastname'] = "last name can only have letters without spaces";
		}

		//check email
		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Email is not valid";
		} else
		if ($results = $this->where(['email' => $data['email']])) {
			foreach ($results as $result) {
				if ($id != $result->id)
					$this->errors['email'] = "That email already exists";
			}
		}

		if (!empty($data['phone'])) {
			if (!preg_match("/^(216|\+216|)[0-9]{8}$/", trim($data['phone']))) {
				$this->errors['phone'] = "Phone number not valid";
			}
		}

		if (!empty($data['facebook_link'])) {
			if (!filter_var($data['facebook_link'], FILTER_VALIDATE_URL)) {
				$this->errors['facebook_link'] = "Facebook link is not valid";
			}
		}

		if (!empty($data['twitter_link'])) {
			if (!filter_var($data['twitter_link'], FILTER_VALIDATE_URL)) {
				$this->errors['twitter_link'] = "Twitter link is not valid";
			}
		}

		if (!empty($data['instagram_link'])) {
			if (!filter_var($data['instagram_link'], FILTER_VALIDATE_URL)) {
				$this->errors['instagram_link'] = "Instagram link is not valid";
			}
		}

		if (!empty($data['linkedin_link'])) {
			if (!filter_var($data['linkedin_link'], FILTER_VALIDATE_URL)) {
				$this->errors['linkedin_link'] = "Linkedin link is not valid";
			}
		}


		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function get_role($data)
	{

		if (!empty($data[0]->email) && !empty($data[0]->role)) {

			foreach ($data as $key => $row) {

				$query = "select role from roles where id = :id limit 1";
				$res = $this->query($query, ['id' => $row->role]);

				if ($res) {
					$data[$key]->role_name = $res[0]->role;
				}
			}
		}

		return $data;
	}
}
