<?php

namespace Peak;

class MixCode extends Base {

	private static $NODE = [
//		'node index' => 'class name'
	];


	/**
	 * extends the parent config function
	 * @param3 $node. array. use the key=>val type, key is the string node index, val is the class name which algorithm u wanna use
	 * */
	static function config ($material, $offset=0, $node=[])
	{
		parent::config($material, $offset);
		if ( is_array($node)) {
			self::$NODE = $node;
		}
	}


	/**
	 * set the class from node
	 * */
	private static function set_class ($index)
	{
		return @self::$NODE[$index];
	}
/*
	private static function str_to_arr ($str) {
		$arr = [];
		$max = strlen($str);
		for ($i=0; $i<$max; $i++) {
			$arr[$i] = $str[$i];
		}
		return $str;
	}*/


	/**
	 * encode the string
	 * @param $str int. string you want to encode
	 * @return string. return the encoded string
	 * */
	static function encode ($str)
	{
		$str = str_split($str);

		$cls = null;
		foreach ( $str as $k=>&$v) {
			$cls = self::set_class($k) ?: $cls;
			$v = $cls::encode($v);
		}
		return join('',$str);

	}
	


	static function decode ($str)
	{
		$str = str_split($str);

		$cls = null;
		foreach ( $str as $k=>&$v) {
			$cls = self::set_class($k) ?: $cls;
			$v = $cls::decode($v);
		}
		return join('',$str);
	}


}