<?php

namespace Controller;

/**
 * main controller class
 */

class Controller
{

	public function view($view, $data = [])
	{


		extract($data);

		$filename = "../app/views/" . $view . ".view.php";
		if (file_exists($filename)) {
			require $filename;
		} else {
			echo "could not find view file: " . $filename;
		}
	}
}
/*
Namespace and Class Declaration:
	namespace Controller;: This line declares that the Controller.php file is in the Controller namespace.
	class Controller: Defines the Controller class within the Controller namespace.




View Method:
	public function view($view, $data = []): This method is responsible for loading a view file and passing data to it for rendering.




Parameter Explanation:
	$view: Represents the name of the view file to be loaded. It should be provided without the file extension (e.g., "home" instead of "home.view.php").
	$data: An optional parameter that allows passing data to the view. It's an associative array where keys represent variable names accessible in the view, and values are the actual data to be used.
	View Rendering Process:
	extract($data);: This function extracts variables from the $data array, making them available as individual variables within the method's scope. For example, if $data contains ['title' => 'Welcome'], then $title will be available in the view with the value 'Welcome'.
	$filename = "../app/views/" . $view . ".view.php";: Constructs the path to the view file based on the provided $view parameter. It assumes that view files are located in the app/views/ directory and follow a naming convention where the view file name matches the controller action (e.g., "home.view.php" for the "home" action).
	if (file_exists($filename)) { require $filename; }: Checks if the view file exists based on the constructed path. If the file exists, it is included using require, which will render the HTML content of the view.
	If the view file does not exist, an error message is echoed: "could not find view file: " followed by the filename that was attempted to be loaded.



Purpose:
	The view method encapsulates the logic for loading views, promoting separation of concerns in the MVC (Model-View-Controller) architecture. Controllers handle user requests, process data, and decide which view to render based on the request.
	By passing data to views, controllers facilitate dynamic content generation, allowing views to display information based on the current application state or user input.
	The class is named Controller within the Controller namespace, indicating its role as a central controller for managing views across different parts of the application.


// Example Usage
	$controller = new \Controller\Controller(); // Instantiate the Controller class
	$controller->view('home', ['title' => 'Welcome']); // Load the 'home' view with the title 'Welcome'




Controller.php serves as a fundamental component in the MVC pattern, orchestrating the interaction between models, views, and user actions, ensuring a structured and organized approach to web application development.
*/