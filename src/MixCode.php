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

		$max = strlen($str);
		for ($i=0; $i<$max; $i++) {

			// 将输入字符分拆成小块 分别调用encode处理

			$n = strpos(self::$STRING, $str[$i]); // 字符当前位置
			$n = $max-$n;
			$str[$i] = self::offset(self::$STRING[$n], self::$OFFSET);
		}

		return $str;
	}
	


	static function decode ($str)
	{
		$max = strlen($str);
		for ($i=0; $i<$max; $i++) {
			$n = strpos(self::$STRING, $str[$i]); // 字符当前位置
			$n = $max-$n;
			$str[$i] = self::offset(self::$STRING[$n], self::$OFFSET*-1);
		}

		return $str;
	}


}