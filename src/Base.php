<?php

namespace Peak;

abstract class Base {

	protected static $STRING = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // 原料
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
	 * Move the string pointer by the given offset
	 * @param $str. string. the letter or number
	 * @param $x. int. offset for the pointer
	 * @return string. the changed letter
	 * */
	protected static function offset($str, $x)
	{

		if (!$x) return $str; // 不位移 返回自身

		// 计算位移
		$n = strpos(self::$STRING, $str); // 字符当前位置

		if (!is_int($n)) return $str; // 不存在该字符则返回自身

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