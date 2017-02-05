<?php

class HrCubeSummationTest extends TestCase {


	public function testCorrectCreationMatrix(){


		$matrix3d = new \Hr\CubeSummation\Models\Matrix3D(5,6,8);
		$this->assertSame("5x6x8",$matrix3d->getDimentionMatrix());

	}


	public function testCorrectSetValueToBlockMatrix(){


		$matrix3d = new \Hr\CubeSummation\Models\Matrix3D(5,6,8);
		$returnedVal = $matrix3d->setBlock(2,2,2,43);
		$this->assertSame(43,$returnedVal);

	}

	public function testCorrectGetValueFromBlockMatrix(){


		$matrix3d = new \Hr\CubeSummation\Models\Matrix3D(5,6,8);
		$matrix3d->setBlock(2,2,2,43);
		$this->assertSame(43,$matrix3d->getBlock(2,2,2));

	}


	public function testPopulationkMatrix(){


		$matrix3d = new \Hr\CubeSummation\Models\Matrix3D(3,3,2);
		$matrixLoader = new \Hr\CubeSummation\Classes\Matrix3DRandomDataLoader();
		$arrTmp = $matrixLoader->setDimentions($matrix3d->getDimentionMatrix());
		$this->assertSame(['3','3','2'],$arrTmp);
		$matrix3d = $matrixLoader->loadData($matrix3d);
		$this->assertGreaterThan(0,$matrix3d->getBlock(1,1,1));

	}





}