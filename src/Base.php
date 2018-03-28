<?php

namespace Peak;

abstract class Base {


	protected static $STRING = 'ABCDEFGHIJKLMNOPKRSTUVWXYZ0123456789'; // 原料
	protected static $OFFSET = 0; // 字符偏移



	/**
	 * set the config for class
	 * @param $material string. the material,basic string for encode
	 * @param $offset int offset
	 * */
	static function config ($material, $offset=0)
	{

		if ( strlen($material)) {
			self::$STRING = $material;
		}

		if ( is_int($offset) ) {
			self::$OFFSET = $offset;
		}

	}


	/**
	 * to get the new string by the forward or backward offset
	 * @param $str. string. the string want to encode
	 * @param $offset. ing. offset
	 * @param #encode. boolean. true forward, false backward
	 * */
	/*protected static function set ($str, $offset=0, $encode=true)
	{
		// 计算位移 判断加密或者解密
		$x = $encode ? self::$OFFSET+$offset : self::$OFFSET*-1+$offset ;

		// 执行位移 offset
		return self::offset($str, $x);
	}
*/


	/**
	 * Move the string pointer by the given offset
	 * @param $str. string. the letter or number
	 * @param $x. int. offset for the pointer
	 * @return string.
	 * */
	protected static function offset($str, $x)
	{

		if (!$x) return $str;

		// 计算位移
		$n = strpos(self::$STRING, $str); // 字符当前位置
		if (!is_int($n)) return false;

		$x+= $n;
		$y = strlen(self::$STRING);
		if ( abs($x)>=$y) {
			$x = $x%$y; // 取余数
		}
		if ($x<0) {
			$x+=$y;
		}

		return self::$STRING[$x];

	}


	abstract static function encode($str);
	abstract static function decode($str);


}