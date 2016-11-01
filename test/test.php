<?php
	include 'conexion.php';
	class Prueba extends PHPUnit_Framework_TestCase
	{
		public function testPruebaUsuario(){
			$conexion = new conexion();
			$correo = 'yancini1515@hotmail.com';
			$contra = 'gina';
			$this->assertEquals('Ginnette', $conexion->verificarUsuario($correo,$contra));
		}

		/*public function testPruebaServicio(){
			$servicio = 1;
			$this->assertEquals(1, buscarServicio($servicio));
		}*/
	}
?>