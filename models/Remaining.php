<?php
	namespace app\models;
	use Yii;
	use yii\db\ActiveRecord;

	// http://php.net/manual/zh/language.namespaces.rationale.php
	class Remaining extends ActiveRecord{
		public static function tableName()
		{
			return 'tableName';
		}

	}