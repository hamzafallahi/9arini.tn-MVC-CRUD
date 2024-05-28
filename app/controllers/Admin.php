<?php

namespace Controller;

/**
 * admin class
 */

use \Model\Auth;//


class Admin extends Controller
{

	public function index()
	{

		if (!Auth::logged_in()) {
			message('please login to view the admin section');
			redirect('login');
		}

		$data['title'] = "Page not found";

		$this->view('admin/404', $data);
	}

	public function dashboard()
	{

		if (!Auth::logged_in()) {
			message('please login to view the admin section');
			redirect('login');
		}

		$data['title'] = "profile";

		$this->view('admin/profile', $data);
	}



	public function profile($id = null)
	{

		if (!Auth::logged_in()) {
			message('please login to view the admin section');
			redirect('login');
		}

		$id = $id ?? Auth::getId();

		$user = new \Model\User();
		$data['row'] = $row = $user->first(['id' => $id]);



		if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {

			$folder = "uploads/images/";
			if (!file_exists($folder)) {
				mkdir($folder, 0777, true);
				file_put_contents($folder . "index.php", "<?php //silence");
				file_put_contents("uploads/index.php", "<?php //silence");
			}

			if ($user->edit_validate($_POST, $id)) {

				$allowed = ['image/jpeg', 'image/png'];

				if (!empty($_FILES['image']['name'])) {

					if ($_FILES['image']['error'] == 0) {

						if (in_array($_FILES['image']['type'], $allowed)) {
							//everything good
							$destination = $folder . time() . $_FILES['image']['name'];
							move_uploaded_file($_FILES['image']['tmp_name'], $destination);


							$_POST['image'] = $destination;
							if (file_exists($row->image)) {
								unlink($row->image);
							}
						} else {
							$user->errors['image'] = "This file type is not allowed";
						}
					} else {
						$user->errors['image'] = "Could not upload image";
					}
				}

				$user->update($id, $_POST);

				//message("Profile saved successfully");
				//redirect('admin/profile/'.$id);
			}

			if (empty($user->errors)) {
				$arr['message'] = "Profile saved successfully";
			} else {
				$arr['message'] = "Please correct these errors";
				$arr['errors'] = $user->errors;
			}

			echo json_encode($arr);

			die;
		}

		$data['title'] = "Profile";

		$data['errors'] = $user->errors;

		$this->view('admin/profile', $data);// loads and sends info($data) to the mentioned pages so $data will be reconised when used
		$this->view('includes/nav', $data);
	}
}
