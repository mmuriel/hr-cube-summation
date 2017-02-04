<?php

namespace Hr\CubeSummation\Models;

class Matrix3D extends \Eloquent{
	
	private $matrix = [];

	public function setBlock ($xc,$yc,$zc,$value){

		$matrix[$xc][$yc][$zc] = $value; 

	}

	public function getBlock ($xc,$yc,$zc,$value){

		return $matrix[$xc][$yc][$zc]; 

	}
}