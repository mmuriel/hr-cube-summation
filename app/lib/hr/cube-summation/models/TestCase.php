<?php

namespace Hr\CubeSummation\Models;
use \Hr\CubeSummation\Models\Matrix3D;
use \Hr\CubeSummation\Classes\Matrix3DAdderByBlocks;

class TestCase extends \Eloquent{


	private $matrix3d,$n;
	private $ops = array();
	private $qResults = array();
	
	public function __construct($n,$ops){

		$this->ops = $ops;
		$this->n = $n;
		$this->matrix3d = new Matrix3D($n,$n,$n);
		

	}

	public function processTestCase(){

		foreach ($this->ops as $op){

			if (preg_match("/^UPDATE/",$op)){

				$qData = preg_replace("/^UPDATE\ /","",$op);
				$this->updateOp($qData);

			}
			elseif (preg_match("/^QUERY/",$op)){

				$qData = preg_replace("/^QUERY\ /","",$op);
				$tmpRes = $this->addBlocksOp($qData);
				array_push($this->qResults,$tmpRes);

			}

		}

		//print_r($this->qResults);
		return $this->qResults;

	}

	private function updateOp($str){

		$arrTmp = preg_split("/\ /",$str);
		return $this->matrix3d->setBlock($arrTmp[0],$arrTmp[1],$arrTmp[2],$arrTmp[3]);

	}


	private function addBlocksOp($str){

		//echo "\n".$str."\n";
		$arrTmp = preg_split("/\ /",$str);
		//print_r($arrTmp);
		$adder = new Matrix3DAdderByBlocks();
		//echo "Line: ".__LINE__."\n";
		return $adder->addingByBlocks($this->matrix3d,$arrTmp[0],$arrTmp[1],$arrTmp[2],$arrTmp[3],$arrTmp[4],$arrTmp[5]);


	}
	

}