<?php

class Matrix3DWebController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){

		return View::make('hr-index');
		//return "HOla mundo";

	}


	public function process(){

		$data=array();
		if (Input::has('msg') && Input::has('msgType')){
			$data['msg'] = Input::get('msg');
			$data['msgType'] = Input::get('msgType');
		}

		if (Input::has('textinput') && Input::get('textinput') != ''){

			$data['textinput'] = Input::get('textinput');
			$data['textinput'] = trim($data['textinput']);

		}


		//echo $data['textinput'];
		$instructions = preg_split("/\n/",$data['textinput']);
		$resquestHandler = new Hr\CubeSummation\Classes\Matrix3DRequestHandler($instructions);
		/* It populates Matrix */
		$data['res'] = $resquestHandler->processInstruction();

		return View::make('hr-index',$data);	

	}

}
