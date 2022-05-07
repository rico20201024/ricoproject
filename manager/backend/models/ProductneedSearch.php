<?
	namespace backend\models;
	use common\models\Productneed;
	use yii\data\ActiveDataProvider;
	use yii\base\Model;
	
	class ProductneedSearch extends Productneed{
		public function rules(){
			return [
				['id','safe'],
			];
		}
		
		public function attributeLabels(){
			return[
				'id'=>'标题',
			];
		}
		
		  public function scenarios(){
			 return Model::scenarios(); 
		  }
		
		public function search($id){
				//找到所有的文章条数
				// $query = Order::find()->orderBy('status ASC');
				$query = Productneed::find()->orderBy('createtime DESC');					//按日期
				
				
				$dataProvider = new ActiveDataProvider([
					'query' => $query,
					 'pagination' => [
							//分页
								'pagesize' =>\yii::$app->params['productneedsize'],
							],
				]);
				
				 //增加自定义查询   
				$query->join('INNER JOIN', 'ds_product', 'ds_productneed.productid = ds_product.id');
				$query->join('INNER JOIN', 'ds_customer', 'ds_productneed.customerid = ds_customer.id');
				
				$query->andFilterWhere(['ds_customer.id'=>$id]);
				
				return $dataProvider;
				
		}
		
	}
?>