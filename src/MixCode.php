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
	 * encode the string
	 * @param $str int. string you want to encode
	 * @return string. return the encoded string
	 * */
	static function encode ($str)
	{
		$str = str_split($str);

		$cls = null;
		foreach ( $str as $k=>&$v) {
			$cls = @self::$NODE[$k] ?: $cls;
			$v = $cls::encode($v);
		}
		return join('',$str);

	}
	


	static function decode ($str)
	{
		$str = str_split($str);

		$cls = null;
		foreach ( $str as $k=>&$v) {
			$cls = @self::$NODE[$k] ?: $cls;
			$v = $cls::decode($v);
		}
		return join('',$str);
	}


}