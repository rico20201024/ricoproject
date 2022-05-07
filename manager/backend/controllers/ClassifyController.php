<?php
namespace backend\controllers;
use yii\web\Controller;
use common\models\Classify;
use yii\data\Pagination;  //使用小部件
use backend\models\ClassifySearch;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile; 
use backend\models\UploadForm;
use backend\models\Test;

class ClassifyController extends Controller
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
	//找出所有分类parent为1的
	//找出parentid=id的分类
	
	public function actionIndex(){

		// $classifys=$classify->showAllSelectClassify();
		$classify=new Classify;
		// var_dump($classifys);
		//实例化搜索对象
		$searchModel=new ClassifySearch;
		//获取所有文章带搜索的
		$query=Classify::find();
		
		//给search传值
		$dataProvider=$searchModel->search(\yii::$app->request->get());
		
		//问题来自这里totalCount是总数
		// var_dump($classify->getOptions());
			
		return $this->render('index', [
			// 'pagination'=>$pagination,
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}
	
    //添加文章
    public function actionCreate()
    {
        //创建文章模型
		// if($id=\yii::$app->request->get('id')===null){
			$classify = new Classify;
		
		// if($id=\yii::$app->request->get('id')){
			// $Classify=$Classify->find()->where('id=:id',[':id'=>$id])->one();
		// }
        //创建栏目模型，传递分类信息 
        if(isset($_POST['Classify']))
        {
			// var_dump(\yii::$app->request->post());
			// exit;
            // $Classify->attributes=$_POST['Classify'];//安全块赋值
            //执行保存，写入数据库 
			
				if($classify->load(\yii::$app->request->post()) && $classify->save()){

					//数据写入成功，提示保存成功
					\Yii::$app->session->setFlash('info',"新增成功");
				}else{
					\Yii::$app->session->setFlash('info',"新增失败");
				}
		}
		$classifyArr=$classify->getOptions();
        //渲染视图
        return  $this->render('update',['classify'=>$classify,'classifyArr'=>$classifyArr]);
    }
	
	
	//更新
		//更新
	public function actionUpdate(){
		
		$id=\yii::$app->request->get('id');
		 $classify=Classify::find()->where('id=:id',[':id'=>$id])->one();
		 $classifys=Classify::find()->where('parentid=0')->all();
		 
		 $b=[];
		 foreach($classifys as $add){
			 $b[$add->id]=$add->title;
		 }
		 // var_dump($b);

		// var_dump($classifys);
		if(\yii::$app->request->post()){
			// $classify->attributes=$_POST['classify'];
			// $classify->updateclassify($_POST['classify']);
			
			if($classify->updateClassify(\yii::$app->request->post())){
					//数据写入成功，提示保存成功
					\Yii::$app->session->setFlash('info',"修改成功");
					//防止重复提交
					return $this->refresh();
					// return $this->render('adminHtml');
					// return $this->redirect(\Yii::$app->request->getReferrer());
				}else{
					\Yii::$app->session->setFlash('info',"修改失败");
			}
		}
	
		$classifyArr=$classify->getOptions();

		unset($classifyArr[$classify->id]);
		

		
        //渲染视图
        return  $this->render('update',['classify'=>$classify,'classifyArr'=>$b]);
	}
	
	    //文章删除 用于测试
    public function actionDelete()
    {
		$id=\yii::$app->request->get('id');
		$classify=Classify::find()->where('id=:id',[':id'=>$id])->one();
		if($classify){
			$classify->delete();
			\yii::$app->session->setFlash('deleteinfo','删除成功');
			return $this->redirect(\Yii::$app->request->referrer);
		}	
			echo "不存在该用户";
    }


}