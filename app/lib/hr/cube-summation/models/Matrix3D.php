<?php

namespace Hr\CubeSummation\Models;

use Misc\CustomLogger;

class Matrix3D extends \Eloquent{
	

	/*

		Note: This matrix won't work as regular php arrays, the first element index will be 1 (not 0)

	*/
	private $matrix = [];


	//It creates ans populates the 3D Matrix, by default is is a 2x2x2 matrix
	public function __construct($lenghtX=2,$lenghtY=2,$lenghtZ=2){

		for ($i=0;$i<$lenghtX;$i++){

			$tmpArrY = null;
			$tmpArrY = [];

			for ($j=0;$j<$lenghtY;$j++){

				$tmpArrZ = null;
				$tmpArrZ = [];

				for ($k=0;$k<$lenghtZ;$k++){

					//It populates with zeros the Z dimention array
					array_push($tmpArrZ,0);

				}
				//It add the new Z dimention array to the Y dimention array
				array_push($tmpArrY,$tmpArrZ);

			}
			//It add the new Y dimention array to the X dimention.
			array_push($this->matrix,$tmpArrY);
		}
	}

	public function setBlock ($xc,$yc,$zc,$value){

		$this->matrix[($xc - 1)][($yc - 1)][($zc - 1)] = $value;
		return $this->matrix[($xc - 1)][($yc - 1)][($zc - 1)];

	}

	public function getBlock ($xc,$yc,$zc){

		return $this->matrix[($xc - 1)][($yc - 1)][($zc - 1)]; 

	}

	public function getDimentionMatrix(){

		return count($this->matrix)."x".count($this->matrix[0])."x".count($this->matrix[0][0]);

	}

	public function getMatrix(){

		return $this->matrix;
	}
}