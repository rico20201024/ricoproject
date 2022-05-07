<?php
namespace backend\controllers;
use yii\web\Controller;
use common\models\Productneed;



class ProductneedController extends Controller
{
  //actions的作用主要是共用功能相同的方法
  public function actions()
  {
	  return [
			'test' => [
				'class' => 'app\common\TestAction',
				'param1' => 'hello',
				'param2' => 'world',
				'param3' => '!!!',
			],
			'ueditor'=>[
					'class' => 'app\common\widgets\ueditor\UeditorAction',
					'config'=>[
						//上传图片配置
						'imageUrlPrefix' => "", /* 图片访问路径前缀 */
						"imagePathFormat" => "/manager/backend/web/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}",//上传保存路径

					]
			],

			// 'test' => [
				// 'class' => 'app\common\widgets\upload\TestAction',
				// 'param1' => 'hello',
				// 'param2' => 'world',
				// 'param3' => '!!!',
			// ],
		];
	} 	


	//ajax修改
	public function actionUpdateprice($id,$price){
		// $arr=[
			// 'price'=>$price,
			// 'id'=>$id,
		// ];
		//更新
		$productneed=Productneed::findOne($id);
		$productneed->exclusiveprice=trim($price);
		$productneed->save();
		
		$productt=Productneed::find()->where('id=:id',[':id'=>$id])->asArray()->one();
		
		$json_obj = json_encode($productt);
		echo $json_obj;
	}




}