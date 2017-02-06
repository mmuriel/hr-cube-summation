<?php

namespace Hr\CubeSummation\Classes;

use Hr\CubeSummation\Models\Matrix3D;
use Misc\CustomLogger;

class Matrix3DAdderByBlocks {

	private $blocks = array();

	public function addingByBlocks(Matrix3D $matrix,$x1,$y1,$z1,$x2,$y2,$z2){

		$sum = 0;
		
		for ($i=$x1;$i<=$x2;$i++){

			for ($j=$y1;$j<=$y2;$j++){

				for ($k=$z1;$k<=$z2;$k++){

					$sum = $sum + $matrix->getBlock(($i+1),($j+1),($k+1));				

				}

			}

		}
		return $sum;

	}


	private function defineBlocks (Matrix3D $matrix,$x1,$y1,$z1,$x2,$y2,$z2){

		$blocksCoordinates = array();

		for ($i=$x1;$i<=$x2;$i++){

			for ($j=$y1;$j<=$y2;$j++){

				for ($k=$z1;$k<=$z2;$k++){

					array_push($blocksCoordinates,array($i,$j,$k));					

				}

			}

		}
		return $blocksCoordinates;


	}


}
