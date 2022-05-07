<?
	
	function getUser(){
		$user=Common\models\User::find()->where('id=:id',[':id'=>\yii::$app->user->id])->one();
		return $user;
	}
	
	function getTenStr($str,$len=15){
		
		if(strlen($str)>$len){
			return mb_substr($str, 0, $len, 'utf-8').'.....';

		}
		return $str;
	}
	
?>