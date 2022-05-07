
<?

	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use yii\widgets\Pjax; 
	use yii\widgets\ActiveForm;
	use yii\widgets\ListView;

	
?>
<section class="content">
                	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">新增订单</h3>
            </div>
      </div>
<section class="content" style="letter-spacing:1px;">

	<div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i> 产品列表</h3>
		  <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
		  <div class="input-group input-group-sm">
                <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">搜索产品</button>
                    </span>
              </div>
          <div class="row" >

            <!-- /.col -->

			
			
			
<?php Pjax::begin(); ?>
					<?= ListView::widget([
							'dataProvider' => $dataProvider,
							// 'layout'=>'{items}{pager}',
							'layout' => '{items}<div class="col-lg-12 sum-pager">{pager}</div>',
							'itemView' => '_createitem',//子视图
							'pager' => [
									// 'options' => ['class' => 'hidden'],//关闭分页（默认开启）     /* 分页按钮设置 */   
									// 'maxButtonCount' => 5,//最多显示几个分页按钮    
									'firstPageLabel' => '首页',
									'prevPageLabel' => '上一页',
									'nextPageLabel' => '下一页',
									'lastPageLabel' => '尾页' 
									],
							]);?>
						
<?php Pjax::end(); ?> 
            <!-- /.col -->
          </div>
		  
          <!-- /.row -->
      </div>

        <!-- /.box-body -->
   </div>
   
   
   
   
   
		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">请输入订单信息：</h3>
            </div>
			
            <!-- /.box-header -->
			<div class='content'>
				<div class='col-md-6'>
						<div class="box box-info">
									<div class="box-header with-border">
									<h4 class='box-title'  style='font-size:14px;'>产品信息:</h4>
									</div>
									<!-- /.box-header -->
									<!-- form start -->
									<form class="form-horizontal">
									  <div class="box-body">
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">名称</label>

										  <div class="col-sm-10">
											<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
										  </div>
										</div>										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">单价</label>

										  <div class="col-sm-10">
											<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
										  </div>
										</div>										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">数量</label>

										  <div class="col-sm-10">
											<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
										  </div>
										</div>										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">规格</label>

										  <div class="col-sm-10">
											<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="inputPassword3" class="col-sm-2 control-label">id</label>

										  <div class="col-sm-10">
											<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
										  </div>
										</div>
										<div class="form-group">
										  <div class="col-sm-offset-2 col-sm-10">
											<div class="checkbox">

											</div>
										  </div>
										</div>
									  </div>
									  <!-- /.box-body -->

									  <!-- /.box-footer -->
									</form>
					</div>
				</div>
				<div class='col-md-6'>
						<div class="box box-success">
									<div class="box-header with-border">
										<h4 class='box-title'  style='font-size:14px;'>客户信息:</h4>
									</div>
									<!-- /.box-header -->
									<!-- form start -->
									<form class="form-horizontal">
									  <div class="box-body">
										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">名称</label>

										  <div class="col-sm-10">
											<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
										  </div>
										</div>										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">地址</label>

										  <div class="col-sm-10">
											<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
										  </div>
										</div>										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">移动电话</label>

										  <div class="col-sm-10">
											<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
										  </div>
										</div>										<div class="form-group">
										  <label for="inputEmail3" class="col-sm-2 control-label">电话</label>

										  <div class="col-sm-10">
											<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
										  </div>
										</div>
										
										<div class="form-group">
										  <label for="inputPassword3" class="col-sm-2 control-label">id</label>

										  <div class="col-sm-10">
											<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
										  </div>
										</div>
										<div class="form-group">
										  <div class="col-sm-offset-2 col-sm-10">
											<div class="checkbox">

											</div>
										  </div>
										</div>
									  </div>
									  <!-- /.box-body -->

									  <!-- /.box-footer -->
									</form>
								  </div>
				</div>
				<div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">生成订单</button>
              </div>
			</div>
            <!-- /.box-body -->
       </div>
		<!-- /.box box-info -->
	  

   </section>
   </section>
   	<script>

	  function startRequest(){
		  $('#target').load('1.php');
	  }
	  </script>
	  <input type='button' value='测试异步' onClick="startRequest()">
	  <br>
	  <div id="target"></div>
	  

