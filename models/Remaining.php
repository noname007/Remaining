<?php
	namespace app\models;
// 	use Yii;
	use yii\db\ActiveRecord;
// CREATE TABLE costs(create_at timestamp,detail text not null default"",id_str varchar(40) ,amount int8 not null default '0',id integer primary key autoincrement  default "0",consume_time timestamp)
	// http://php.net/manual/zh/language.namespaces.rationale.php
	class Remaining extends ActiveRecord{
		public static function tableName()
		{
			return 'costs';
		}

	}