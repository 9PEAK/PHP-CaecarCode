<?php

namespace Peak;

class CaecarCode extends Base {



	/**
	 * encode the string
	 * @param $str int. string you want to encode
	 * @return string. return the encoded string
	 * */
	static function encode ($str)
	{

		$max = strlen($str);
		for ($i=0; $i<$max; $i++) {
			$str[$i] = self::offset($str[$i], self::$OFFSET);
		}

		return $str;
	}
	


	static function decode ($str)
	{
		$max = strlen($str);
		for ($i=0; $i<$max; $i++) {
			$str[$i] = self::offset($str[$i], self::$OFFSET*-1);
		}

		return $str;
	}




}