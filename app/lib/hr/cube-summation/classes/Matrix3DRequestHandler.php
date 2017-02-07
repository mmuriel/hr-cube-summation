<?php
namespace Hr\CubeSummation\Classes;

use Hr\CubeSummation\Models\TestCase;

class Matrix3DRequestHandler{
	
	private $instrucciones, $qtyTestCases;
	private $resultadosTestCases = array();


	public function __construct($instrucciones){

		$this->instrucciones = $instrucciones;

	}

	public function processInstruction(){

		$tcActual = 0;
		$nActual = 0;
		$arrOps = array();
		for ($i=0;$i<count($this->instrucciones);$i++){

			if ($i==0){

				$this->qtyTestCases = trim($this->instrucciones[0]);

			}
			else {

				if (preg_match("/^([0-9]{1,2})/",$this->instrucciones[$i])){

					//Inicia un nuevo TEST CASE
					if ($tcActual == 0){

						$tcActual = 1;
						$tmpArrNActual = preg_split("/\ /",$this->instrucciones[$i]);
						$nActual = trim($tmpArrNActual[0]);

					}
					else {

						/*

							Procesa el TestCase

						*/
						$tc = new TestCase($nActual,$arrOps);
						array_push($this->resultadosTestCases,$tc->processTestCase());


						/*

							Define los datos para el siguiente TestCase

						*/
						$tcActual++;
						$tmpArrNActual = preg_split("/\ /",$this->instrucciones[$i]);
						$nActual = trim($tmpArrNActual[0]);
						$arrOps = array();

					}

				}
				else {

					//Es una instrucción
					array_push($arrOps,$this->instrucciones[$i]);

				}

			}

		}

		//Procesa el ultimo TC que no alcanza a ser procesado en el ciclo FOR
		$tc = new TestCase($nActual,$arrOps);
		array_push($this->resultadosTestCases,$tc->processTestCase());

		
		return $this->resultadosTestCases;
	}

}