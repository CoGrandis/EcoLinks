<?php 

	class TemplateMotor
	{

		private $tpl_name;
		private $buffer_tpl;
		
		function __construct($tpl_name)
		{
			$this->tpl_name = $tpl_name;
			$this->load();
		}


		private function load(){
			$this->buffer_tpl = file_get_contents("app/views/".$this->tpl_name.".php"); 

				$buffer_extends = file_get_contents("app/views/extends/footerExtends.php"); 

			$this->buffer_tpl = str_replace("@extends(footer)", $buffer_extends, $this->buffer_tpl);

				$buffer_extends = file_get_contents("app/views/extends/headExtends.php"); 

			$this->buffer_tpl = str_replace("@extends(head)", $buffer_extends, $this->buffer_tpl);

			$this->assing(["APP_NAME" => APP_NAME]);
			$this->assing(["APP_AUTHOR" => APP_AUTHORS]);
			$this->assing(["APP_DESCRIPTION" => APP_DESCRIPTION]);

		}

		public function assing($array_assoc){

			foreach ($array_assoc as $name_var_html => $value_var_php) {
				$this->buffer_tpl = str_replace("{{ ".$name_var_html." }}", $value_var_php, $this->buffer_tpl);			}

			
		}


		public function printToScreen(){
			echo $this->buffer_tpl;
		}
	}


 ?>