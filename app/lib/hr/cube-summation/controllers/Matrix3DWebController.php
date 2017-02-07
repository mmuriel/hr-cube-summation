<?php

namespace Hr\CubeSummation\Controllers;

class Matrix3DWebController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){

		return View::make('/lib/hr/cube-summation/views/hr-index.php');
		//return "HOla mundo";

	}


	public function process(){



		return View::make('/lib/hr/cube-summation/views/hr-index.php',$data);	

	}

}
