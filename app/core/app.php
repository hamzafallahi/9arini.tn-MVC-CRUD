<?php


class App
{
	protected $controller = '_404';
	protected $method = 'index';
	public static $page = 'home';

	function __construct()
	{
		$arr = $this->getURL();

		$filename = "../app/controllers/" . ucfirst($arr[0]) . ".php";
		if (file_exists($filename)) {
			require $filename;
			$this->controller 	= $arr[0];
			//self::$page 	= $arr[0];
			unset($arr[0]);
		} else {
			require "../app/controllers/" . $this->controller . ".php";
		}

		$mycontroller = new ("Controller\\" . $this->controller)();
		$mymethod = $arr[1] ?? $this->method;
		$mymethod = str_replace("-", "_", $mymethod);

		if (!empty($arr[1])) {
			if (method_exists($mycontroller, strtolower($mymethod))) {
				$this->method = strtolower($mymethod);
				unset($arr[1]);
			}
		}

		$arr = array_values($arr);
		call_user_func_array([$mycontroller, $this->method], $arr);
	}

	private function getURL()
	{
		$url = $_GET['url'] ?? 'home';
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$arr = explode("/", $url);
		return $arr;
	}
}
/*1 Class Declaration:
class App: Defines the App class, which serves as the main application handler.

2 Properties:
$controller: Initialized with the default controller name "_404". This property holds the name of the controller to be invoked.
$method: Initialized with the default method name "index". This property holds the name of the method to be called within the controller.
public static $page: Initialized with the default page name "home". This static property can be accessed globally and is used to determine the active page in the application.




3 Constructor (__construct):
The constructor initializes the class and performs essential setup tasks when an instance of App is created.
It calls the getURL method to parse the URL and extract controller and method information from it.
				parse URL:
				$arr = $this->getURL();: Calls the getURL method to parse the URL and extract relevant information such as the controller name, method name, and any additional parameters. The parsed data is stored in the $arr array.
				Include Controller File:
				Constructs the file path for the controller based on the first segment of the URL ($arr[0]), assuming the controllers are stored in the "../app/controllers/" directory.
				Checks if the controller file exists using file_exists($filename).
				If the controller file exists, it is included using require $filename;.
				Sets the current controller name ($this->controller) to the value extracted from the URL ($arr[0]).
				Removes the first element from the $arr array using unset($arr[0]).
				Instantiate Controller:
				Instantiates the controller object based on the controller name and namespace ("Controller\\" . $this->controller).
				Example: If the URL indicates the controller "Home" ($this->controller = "Home"), it instantiates the "Controller\Home" class.
				Determine Method:
				Sets the default method name ($this->method) to the second segment of the URL ($arr[1]) or defaults to "index" if no method name is provided.
				Replaces any hyphens "-" in the method name with underscores "_" using str_replace("-", "_", $mymethod) for compatibility with PHP method naming conventions.
				Check Method Existence:
				Checks if the specified method exists within the instantiated controller object.
				If a method name is provided in the URL ($arr[1] is not empty) and the method exists in the controller, it updates the method name to be called ($this->method) and removes the method name from the URL parameters (unset($arr[1])).
				Clean Up URL Parameters:
				Removes any processed elements from the $arr array to prepare it for passing additional parameters to the controller method.
				array_values($arr) re-indexes the array to ensure proper parameter passing.
				Call Controller Method:
				Calls the controller method using call_user_func_array([$mycontroller, $this->method], $arr). This dynamically invokes the specified method within the controller object, passing any remaining URL parameters as arguments.





				




4 URL Parsing (getURL method):
	getURL retrieves the URL parameters using $_GET['url'] or defaults to "home" if no URL parameter is provided.
	It sanitizes the URL using FILTER_SANITIZE_URL to remove any potentially dangerous characters.
	The URL is then split into an array using explode("/", $url) to separate the controller, method, and any additional parameters.

5 Controller and Method Resolution:
	The constructor checks if a controller file exists based on the URL's first segment (controller name).
	If the controller file exists, it is included using require and instantiated as an object.
	The method name to be called is determined based on the second segment of the URL (method name). If no method name is provided, it defaults to "index".
	The constructor then checks if the method exists in the controller object. If it does, the method is set to be called; otherwise, it defaults to "index".

6 URL Cleanup and Execution:
	Any URL segments used for controller and method resolution are removed from the URL parameters array ($arr) using unset.
	The call_user_func_array function is used to dynamically call the specified method within the controller object, passing any remaining URL parameters as arguments.

7 Namespace Handling:
	The controller namespace is prepended to the controller name when instantiating the controller object ("Controller\\" . $this->controller), assuming that controllers are organized within a namespace named "Controller".
Usage Example:
	This App class acts as the entry point of the application, routing requests to the appropriate controller and method based on the URL structure.
	Example URL: http://example.com/controller/method/param1/param2
	controller: Name of the controller class to be invoked.
	method: Name of the method within the controller to be called.
	param1, param2: Additional parameters passed to the controller method.
	App.php implements a basic routing mechanism for MVC-based PHP applications, allowing for dynamic handling of requests and execution of controller methods based on the URL structure.
*/