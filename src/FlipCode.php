<?php

namespace Peak;

class FlipCode extends Base {

	/**
	 * encode the string
	 * @param $str int. string you want to encode
	 * @return string. return the encoded string
	 * */
	static function encode ($str)
	{

		$max = strlen($str);
		for ($i=0; $i<$max; $i++) {
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