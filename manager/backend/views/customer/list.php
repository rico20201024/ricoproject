<?
use yii\grid\GridView;

use yii\widgets\Pjax; 
use yii\helpers\Html;
use yii\helpers\Url;
?>

<section class="content">
                <script>
window.setTimeout(function(){
    $('[data-dismiss="alert"]').alert('close');
},2000);
</script>

<?
	if(\yii::$app->session->hasFlash('deleteinfo')){?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">
				&times;
			</a>
		<strong>
			<?echo \yii::$app->session->getFlash('deleteinfo');?>
		</strong>
		</div>
<?	}?>
<?//无刷新获取数据?>
<?php Pjax::begin(); ?>
<section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
		<h3>
			客户管理：
			<small>客户列表</small>
      </h3>

            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
          </div>
          <!-- /.box -->

				<div id="p0" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000"> 
				     

          <div class="box">
            <div class="box-header">
			  <a href="<?=Url::toRoute(['customer/create'])?>" style="float:right;" class="btn btn-info">添加客户</a>
            </div>
            <!-- /.box-header -->
  <?=GridView::widget([
    'dataProvider' => $dataProvider,
    //每列都有搜索框 控制器传过来$searchModel = new ArticleSearch(); 
    'filterModel' => $cstomerSearch,
    'layout'=> '{items}<div class="text-right tooltip-demo">{pager}</div>',
     'pager'=>[
               //'options'=>['class'=>'hidden']//关闭自带分页
               'firstPageLabel'=>"首页",
                'prevPageLabel'=>'上一页',
                'nextPageLabel'=>'下一页',
                 'lastPageLabel'=>'尾页',
      ],
    'columns' => [
			['class' => 'yii\grid\SerialColumn'], // 连续编号
			//['class' => 'yii\grid\SerialColumn'],//序列号从1开始
			// 数据提供者中所含数据所定义的简单的列
			// 使用的是模型的列的数据
			// 'title',
			// 'id',
			'name',
			// 'sex',
			[
				'attribute'=>'sex',
				'value'=>function($model){
					return ($model->sex==0?'女':'男');
				},
				'filter' =>[0=>'女',1=>'男',],     //筛选的数据
				'contentOptions' => [
                        'width'=>'90px',
                    ],
			],
			'location',
			'phone',
			'telephone',
			
			
						//操作的buttions
			[
				'class' => 'yii\grid\ActionColumn',
				'header'=>'操作',
				'template' => '{detail} {update} {delete}',
				'buttons' => [
					'detail' => function ($url, $model, $key) {
								return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => '详细']); 
					},
				],
			],
		],
		
		
]);?>
        </div>
       
      </div>
      </div>
      <!-- /.row -->
    </section>
	


