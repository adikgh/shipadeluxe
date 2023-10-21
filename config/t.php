<?php

class t {

	public function __construct() {}

	public static function w($l, $lang) {
		$sql = mysqli_fetch_array(db::query("select * from `word` where name = '$l' and lang = '$lang'"));
		return $sql['txt'];
	}

}