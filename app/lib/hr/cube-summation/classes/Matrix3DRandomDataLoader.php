<?php

namespace Hr\CubeSummation\Classes;

use Hr\CubeSummation\Models\Matrix3D;
use Misc\CustomLogger;

class Matrix3DRandomDataLoader {

	private $dimX=0,$dimY=0,$dimZ=0;

	public function loadData(Matrix3D $matrix){

		$this->setDimentions($matrix->getDimentionMatrix());

		for ($i=1;$i<=$this->dimX;$i++){

			for ($j=1;$j<=$this->dimY;$j++){

				for ($k=1;$k <= $this->dimZ;$k++){

					$matrix->setBlock($i,$j,$k,rand(1,50));

				}

			}

		}
		return $matrix;

	}


	public function setDimentions($str){

		list($this->dimX,$this->dimY,$this->dimZ) = preg_split("/x/",$str);
		return array($this->dimX,$this->dimY,$this->dimZ);

	}



}