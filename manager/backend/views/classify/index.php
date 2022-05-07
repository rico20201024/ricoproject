<?

	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use yii\widgets\Pjax; 
	use yii\widgets\ActiveForm;
	use yii\widgets\ListView;

	
?>
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

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
		<div class="box-header">
				<h3>
					类别管理：
					<small>类别列表</small>
			  </h3>

            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
          </div>
          <!-- /.box -->

				<? Pjax::begin()?> 
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
				  <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
						<div class="row"><div class="col-sm-6">

						</div>
							<div class="col-sm-6">
								<div id="example1_filter" class="dataTables_filter">
								<?$form = ActiveForm::begin([
									'action' => ['index'],
									 'id' => 'search-form',
									 'method' => 'get',
								]);?>

								<?=$form->field($searchModel, 'title', ['inputOptions'=>['value'=>'','class'=>'form-control input-sm']]);?>
							    <div class="form-group" style="margin-top:-10px;">
	
										<?= Html::submitButton('查询!', ['class' => 'btn btn-sm btn-primary']) ?>
										<?for($i=0;$i<45;$i++){echo "&nbsp";}?>
										<?= Html::a('添加类别!', \yii\helpers\Url::toRoute(["classify/create"]), ['class' => 'btn btn-sm btn-primary']) ?>
							</div>
								</div>
								<?ActiveForm::end();?>
								</div>
								
						</div>
					</div>
						<div class="row">
							<div class="col-sm-12">
						<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						<thead>
						<tr role="row">
							<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 197px;">编号</th>
							<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 216px;">类别</th>
							<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 216px;">父级</th>
							<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 169px;">类别描述</th>
							<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123px;">操 作</th></tr>
					</thead>
					<tbody> 
							<?= ListView::widget([
							'dataProvider' => $dataProvider,
							// 'layout'=>'{items}{pager}',
							'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
							'itemView' => '_item',//子视图
							'pager' => [
									// 'options' => ['class' => 'hidden'],//关闭分页（默认开启）     /* 分页按钮设置 */   
									// 'maxButtonCount' => 5,//最多显示几个分页按钮    
									'firstPageLabel' => '首页',
									'prevPageLabel' => '上一页',
									'nextPageLabel' => '下一页',
									'lastPageLabel' => '尾页' 
									],
							]);?>
					</tbody>
							
				  </table>
				 </div>
				 </div>
					<div class="row">
						<div class="col-sm-5">

						<div class="col-sm-7">
							<div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
								<?//= LinkPager::widget(['pagination' => $pagination,'nextPageLabel' => '下一页', 'prevPageLabel' => '上一页', ]) ?>
							</div>
						</div>
						</div>
						</div>
				</div>
			
            <!-- /.box-body -->
          </div>
	<? Pjax::end()?>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
