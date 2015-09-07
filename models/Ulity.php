<?php
namespace app\models;
class Ulity{
	static  function  is_selected($flag,$now){
		if(isset($_GET[$flag])){
			return $now == $_GET[$flag]?' selected':' ';
		}else{
			return $now == $day?' selected ':' ';
		}
	}
}