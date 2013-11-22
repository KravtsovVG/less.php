<?php


class Less_Tree_Anonymous extends Less_Tree{
	public $value;
	public $quote;

	public function __construct($value, $index = null, $currentFileInfo = null, $mapLines = null ){
		$this->value = is_string($value) ? $value : $value->value;
		$this->index = $index;
		$this->mapLines = $mapLines;
		$this->currentFileInfo = $currentFileInfo;
	}

	public function compile($env){
		return $this;
	}

	function compare($x){
		if( !Less_Parser::is_method( $x, 'toCSS' ) ){
			return -1;
		}

		$left = $this->toCSS();
		$right = $x->toCSS();

		if( $left === $right ){
			return 0;
		}

		return $left < $right ? -1 : 1;
	}

	public function genCSS( $env, &$strs ){
		self::OutputAdd( $strs, $this->value, $this->currentFileInfo, $this->index, $this->mapLines );
	}

	public function toCSS($env){
		return $this->value;
	}

}
