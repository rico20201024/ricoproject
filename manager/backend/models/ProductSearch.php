<?
	namespace backend\models;
	use common\models\Product;
	use yii\data\ActiveDataProvider;
	use yii\base\Model;
	
	class ProductSearch extends Product{
		public function rules(){
			return [
				[['title','stock','monovalent','specs','costs','cid','sales','status','weight','color','create_time','update_time'],'safe'],
			];
		}

		
		  public function scenarios(){
			 return Model::scenarios(); 
		  }
		
		public function search($params){
				//找到所有的文章条数
				$query = Product::find()->orderBy('sales DESC') ;
		

				//如果没有值获得就输出所有条数
				$dataProvider = new ActiveDataProvider([
					'query' => $query,
					 'pagination' => [
							//分页
								'pagesize' =>\yii::$app->params['productsize'],
							],
				]);
				
			
			      // 从参数的数据中加载过滤条件，并验证-数据都合格并且赋值成功
				if (!($this->load($params) && $this->validate())) {
					//不执行下面 直接返回给控制器
					return $dataProvider;
				}
				
				 // 增加过滤条件来调整查询对象
				$query->andFilterWhere(['id' => $this->id]);
				$query->andFilterWhere(['like', 'title', $this->title])
				->andFilterWhere(['like', 'sales', $this->sales])
				->andFilterWhere(['like', 'specs', $this->specs])
				->andFilterWhere(['like', 'costs', $this->costs])
				->andFilterWhere(['like', 'stock', $this->stock])
				->andFilterWhere(['like', 'monovalent', $this->monovalent])
						->andFilterWhere(['cid' => $this->cid]);

				return $dataProvider;
		}
		
	}
?>