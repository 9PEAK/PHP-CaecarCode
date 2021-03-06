<?php

namespace Peak;

class FlipCode extends Base {

	protected static $STRING ; // 原料
	protected static $OFFSET ; // 字符偏移


	/**
	 * encode the string
	 * @param $str int. string you want to encode
	 * @return string. return the encoded string
	 * */
	static function encode ($str)
	{
		$total = strlen(self::$STRING);
		$max = strlen($str);
		for ($i=0; $i<$max; $i++) {
			$n = strpos(self::$STRING, $str[$i]); // 字符当前位置
			if ( $n===false ) continue;
			$n = $total-$n-1;
			$str[$i] = self::offset(self::$STRING[$n], self::$OFFSET);
		}
		return $str;
	}



	static function decode ($str)
	{
		return self::encode($str);
/*
		$total = strlen(self::$STRING);
		$max = strlen($str);
		for ($i=0; $i<$max; $i++) {
			$n = strpos(self::$STRING, $str[$i]); // 字符当前位置
			if ( $n===false )continue;
			$n = $total-$n-1;
			$str[$i] = self::offset(self::$STRING[$n], self::$OFFSET);
		}

		return $str;
		*/
	}


}
