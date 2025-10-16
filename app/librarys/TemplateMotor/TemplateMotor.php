<?php 

	class TemplateMotor
	{

		private $tpl_name;
		private $buffer_tpl;
		private $variables = [];
		
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

				$buffer_extends = file_get_contents("app/views/extends/adminMenuExtends.php"); 

			$this->buffer_tpl = str_replace("@extends(menu)", $buffer_extends, $this->buffer_tpl);
				$buffer_extends = file_get_contents("app/views/extends/MenuExtends.php"); 

			$this->buffer_tpl = str_replace("@extends(menuEmployee)", $buffer_extends, $this->buffer_tpl);

			$this->assing(["APP_NAME" => APP_NAME]);
			$this->assing(["APP_AUTHOR" => APP_AUTHORS]);
			$this->assing(["APP_DESCRIPTION" => APP_DESCRIPTION]);
			$this->assing(["APP_URL" => APP_URL]);
			if(isset($_SESSION['user'])){
				$this->assing(["EMPLOYEE" => $_SESSION['user']['FK_ID_EMPLEADO']]);
				$this->assing(["USER" => $_SESSION['user']['usuario']]);

			}

		}

		public function assing($array_assoc) {
    		foreach ($array_assoc as $name_var_html => $value_var_php) {
				if (is_scalar($value_var_php)) {
					$this->buffer_tpl = str_replace("{{ ".$name_var_html." }}", (string)$value_var_php, $this->buffer_tpl);
				} else {
					$this->variables[$name_var_html] = $value_var_php;
				}
			}
		}


		private function compile(){
        $this->buffer_tpl = preg_replace_callback("/\{\{\s*(.*?)\s*\}\}/", function ($matches) {
            return "<?php echo htmlspecialchars(' . $matches[1] . '); ?>";
        }, $this->buffer_tpl);

        $patterns = [
            "/@foreach\s*\((.*?)\)/" => "<?php foreach($1): ?>",
            "/@endforeach/" => "<?php endforeach; ?>",
            "/@if\s*\((.*?)\)/" => "<?php if($1): ?>",
            "/@elseif\s*\((.*?)\)/" => "<?php elseif($1): ?>",
            "/@else/" => "<?php else: ?>",
            "/@endif/" => "<?php endif; ?>"
        ];

        foreach ($patterns as $pattern => $replacement) {
            $this->buffer_tpl = preg_replace($pattern, $replacement, $this->buffer_tpl);
        }

        foreach ($this->variables as $key => $value) {
            $$key = $value;
        }

        $compiledPath = sys_get_temp_dir() . '/tpl_' . md5($this->tpl_name) . '.php';
        file_put_contents($compiledPath, $this->buffer_tpl);

        return $compiledPath;
    }

		public function printToScreen(){
			 extract($this->variables);
			$compiled = $this->compile();
			include($compiled);
		}
	}


 ?>