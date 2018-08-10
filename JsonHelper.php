<?php

class JsonHelper
{
	/**
	 * @param $array "A array where value extracted from"
	 * @param $path "Path indicates the path to extract value"
	 * @return mixed "the extracted value, maybe null"
	 */
	public static function extractValue($array, $path)
	{
		foreach (explode('.', $path) as $key) {
			if (is_null($array)) break;
			try {
				$array = $array[$key];
			} catch (Exception $e) {
				$array = null;
			}
		}
		return $array;
	}
}