

<?
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use yii\widgets\Pjax; 
	use yii\widgets\ActiveForm;
	use yii\widgets\ListView;
	use yii\helpers\Url;
?>

<?//无刷新获取数据?>
<?php Pjax::begin(); ?>
<section class="content">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">产品管理：</h3>
			  <a href='#' style='float:right;' class="btn btn-info">添加新产品</a>
            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
          </div>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">热销产品：</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
					<tr>
					  <th>编号</th>
					  <th>名称</th>
					  <th>单价</th>
					  <th>型号</th>
					  <th>销量</th>
					</tr>
					
					<tr>
					  <td>2</td>
					  <td>1</td>
					  <td>30元/顿</td>
					  <td><span class="label label-success">3d</span></td>
					  <td>（每日）/300个</td>
					</tr>

				</tbody>
			  </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
	  <div class="box">
            <div class="box-header">123
				<div class="box-tools">
					<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
					<?php $form = ActiveForm::begin([
							'action' => ['text'],
							 'method' => 'get',
							  'id' => 'cateadd-form',
							  'options' => ['class' => 'form-horizontal'],
						]); ?>
											
						<?= $form->field($productSearch, 'title',[
							 'options'=>['class'=>'','name'=>'table_search ', 'placeholder'=>"Search",
							 'template' => "{input}\n<div class=\"col-lg-8\">{input}</div>",
							 ],
							  'inputOptions' => ['placeholder' => '文章搜索','class' => 'form-control pull-right'],
							  
						])->label(false) ?>

										<div class="input-group-btn">
					<span class="input-group-btn">
						<?= Html::submitButton('查询!', ['class' => 'btn btn-default']) ?>
					</span>
                  </div>
				  
					<?ActiveForm::end()?>
                </div>
              </div>
            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
          </div>
		  
      <div class="row">

          <!-- /.box -->
          <!-- /.box -->

	<!-- /.col -->

	</div>
	
<?= ListView::widget([ 
			'dataProvider' => $dataProvider,//数据提供器 
			'itemView' => '_pitem',//指定item视图（该视图文件与当前视图在同一个目录下)
			// 'viewParams' => [],
				//传参数给每一个item 
			'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',//整个ListView布局
			// 'itemOptions' => [//针对渲染的单个item 
				// 'tag' => 'div',     'class' => 'col-lg-3'
			// ],   /*   'options' => [//针对整个ListView     'tag' => 'div',     'class' => 'col-lg-3'   ],   */
			'pager' => [  
					//'options' => ['class' => 'hidden'],//关闭分页（默认开启）
					/* 分页按钮设置 */ 
					'maxButtonCount' => 5,//最多显示几个分页按钮 
					'firstPageLabel' => '首页',
					'prevPageLabel' => '上一页',
					'nextPageLabel' => '下一页', 
					'lastPageLabel' => '尾页',
				] 
			]);?> 



      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Reason</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

<?php Pjax::end(); ?>