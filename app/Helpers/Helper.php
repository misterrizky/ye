<?php

namespace App\Helpers;

class Helper{
    public static function IDGenerator($model,$column, $prefix){
        $preff = $prefix;
		$value = '';
		$row = $model::orderBy('id','DESC')->get()->count();
		$nomor = sprintf("%03s", $row) + 1;
		$value = $preff.$nomor;
		return $value;
    }
}
