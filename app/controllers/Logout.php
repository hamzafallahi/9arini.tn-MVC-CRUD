<?php 

namespace Controller;

/**
 * logout class
 */
class Logout extends Controller
{
	
	public function index()
	{

		\Model\Auth::logout();

		redirect('home');
	}
	
}