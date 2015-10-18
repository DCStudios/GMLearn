<?php

	class Builder {
		private $methods = array();

		public function bind( $name, $function ) {
			$this -> methods[$name] = \Closure::bind( $function, $this, get_class() );
		}

		function __call( $method, $args ) {
			if( is_callable( $this->methods[$method] ) ) {
				return call_user_func_array( $this->methods[$method], $args );
			}
		}
	}

	$builder = new Builder();

?>