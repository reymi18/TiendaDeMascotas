<?php
	include 'conexion.php';
	class Prueba extends PHPUnit_Framework_TestCase
	{

		public function testPruebaServicio(){
			$servicio = 'Peinado';
			$salida = buscarServicio($servicio);
			$this->assertEquals(2, $salida);
		}

		public function testPruebaCita(){
			$fecha = '21/10/2016';
			$hora = 8;
			$idUsuario = 1;
			$salida = buscarIdCita($fecha,$hora,$idUsuario);
			$this->assertEquals(5, $salida);
		}
	}
?>