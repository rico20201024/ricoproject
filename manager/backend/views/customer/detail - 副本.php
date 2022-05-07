<?
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use yii\widgets\Pjax; 
?>
<section class="content-header">
      <h1>
       客户详细信息：
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 客户列表</a></li>
        <li><a href="#"></a>返回上一页</li>
        <li class="active">Examples</li>
      </ol>
    </section>
	
<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/girl.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?=$customer->name?></h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>电话:</b> <a class="pull-right"><?=$customer->phone?></a>
                </li>
                <li class="list-group-item">
                  <b>移动电话:</b> <a class="pull-right"><?=$customer->telephone?></a>
                </li>
                <li class="list-group-item">
                  <b>地址:</b> <a class="pull-right"><?=$customer->location?></a>
                </li>
                <li class="list-group-item">
                  <b>微信:</b> <a class="pull-right"><?=$customer->phone?></a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>联系Ta</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">关于我们</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li  class="active"><a href="#timeline" data-toggle="tab">订单列表</a></li>
              <li><a href="#activity" data-toggle="tab">产品需求</a></li>
              <li><a href="#settings" data-toggle="tab">添加订单</a></li>
              <li><a href="#four" data-toggle="tab">待开发模块4</a></li>
              <li><a href="#five" data-toggle="tab">待开发模块5</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="activity" deep="7">
                <!-- Post -->
                
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
					<div class="col-md-12 col-sm-6 col-xs-12">
							  <div class="info-box">
								<span class="info-box-icon bg-aqua"><i class="fa fa-files-o"></i></span>

								<ul class="info-box-content" style="padding:0 0 10px 10px;">
								  <li class="info-box-text list-group-item">产品名称：钢铁侠</li>
								  <li class="info-box-text list-group-item">产品单价：1750
											<a href="<?=Url::toRoute(['order/create','id'=>1]);?>" type="button" class="btn btn-default btn-xs pull-right"><i class="glyphicon glyphicon-wrench"></i> 修改单价</a></li>
								  <li class="info-box-text list-group-item">成交金额：548751</li>
								  <li class="info-box-text list-group-item">产品规格：50*50<a href="<?=Url::toRoute(['order/create','id'=>1]);?>" type="button" class="btn btn-default btn-xs pull-right"><i class="glyphicon glyphicon-wrench"></i> 添加规格</a></li>
								  <li class="info-box-text list-group-item">产品库存：5874</li>
								  <li class="info-box-text list-group-item">
											<a href="<?=Url::toRoute(['order/create','id'=>1]);?>" type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> 生成订单</a>
											<a href="<?=Url::toRoute(['order/create','id'=>1]);?>" type="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus"></i> 添加至订单</a>
									</li>
								</ul>
								<!-- /.info-box-content -->
							  </div>
							  <!-- /.info-box -->
					</div>

					
                </div>	
				<!--post clearfix-->
				
				
				
                <!-- /.post -->

                <!-- Post -->
               
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
			  
              <div class="tab-pane active" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
				  <li class="time-label">
                        <span class="bg-green" style='letter-spacing:2px;'>
						<i class="glyphicon glyphicon-chevron-down"></i>
                          <?=date('Y',time())?>年
                        </span>
                  </li>
				  <?foreach($model as $o){
					 echo "123";
					exit;
				  }?>
				  		<li class="time-label" style='letter-spacing:2px;'>
							<span class="bg-red">
							<i class="glyphicon glyphicon-tag"></i>
								<?=date('m-d',$o->createtime)?><?if(date('d',$o->createtime)+1==date('d',time())){echo "昨天";}elseif(date('d',$o->createtime)==date('d',time())){echo "今天";}?>
							</span>
					  </li>
					<!--<li class="time-label" style='letter-spacing:2px;'>
							<span class="bg-red">
							<i class="glyphicon glyphicon-tag"></i>
								<?//=date('m-d',$o->createtime)?>
							</span>
					  </li>-->

					  <!-- /.timeline-label -->
					  <!-- timeline item -->
					  <li>
						<i class="fa fa-envelope bg-blue"></i>

						<div class="timeline-item">
						  <span class="time"><i class="fa fa-clock-o"></i> <?=date('h:i',$o->createtime)?></span>

							<h3 class="timeline-header"><a href="#">订单号：<?=$o->order->expressno?></a> </h3>

						  <div class="timeline-body"   style='letter-spacing:1px;'>
								<p >名称：<font color='green'><?=$o->product->title?></font></p>
								<p>单价：<font color='green'><?=$o->price?>元/件</font></p>
								<p>数量：<font color='green'><?=$o->productnum?></font></p>
								<p>总价：<font color='green'><?=$o->amount?></font></p>
								<p>规格：<font color='green'><?=$o->product->specs?></font></p>
								<p>是否发货：<font color='green'>否</font></p>
								<p>付款状态：<span class='badge <?=($o->status?"bg-green":"bg-red");?>'><?=($o->status?"未付款":"已付款");?></span></p>
								<p>订单负责人：<font color='green'><?=$o->userid?></font></p>
						  </div>
						  <div class="timeline-footer">
							<a href="<?=Url::toRoute(['order/detail','id'=>$o->orderid]);?>" class="btn btn-primary btn-xs">查看订单</a>
							<a href="<?=Url::toRoute(['order/update','id'=>$o->orderid]);?>" class="btn btn-primary btn-xs">编辑订单</a>
						  </div>
						</div>
					  </li>
				  <?//}?>

                  <!-- END timeline item -->

                  <!-- /.timeline-label -->
                  <!-- timeline item -->
			  
                  <!-- timeline item -->
  
                  <!-- /.timeline-label -->
                  <!-- timeline item -->

                  <!-- END timeline item -->

                  <!-- END timeline item -->
                  <!-- timeline time label -->
                </ul>
				<?=
				LinkPager::widget([
					  'pagination' => $pages,
					]);
				?>
              </div>
			  

              <!-- /.tab-pane -->

			 <div class="tab-pane" id="four">
							模块待开发4
			 </div>
			 
			<div class="tab-pane" id="five">
							模块待开发5
			 </div>


              <div class="tab-pane" id="settings">
						<div class="info-box" id='productBox' style='display:none;'>
								<div class="col-md-12">
											  <!-- USERS LIST -->
											  <div class="box box-danger">
												<div class="box-header with-border">
												  <h3 class="box-title">请选择产品：</h3>

												  <div class="box-tools pull-right">
													<span class="label label-danger">8 New Members</span>
													<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
													</button>

												  </div>
												</div>
												<!-- /.box-header -->
												<div class="box-body no-padding">
												  <ul class="users-list clearfix">
												<?foreach($products as $k=>$p){?>
													<li>
													  <img src="../dist/img/user7-128x128.jpg" alt="User Image">
													  <a href='javascript:vod(0);' class="users-list-name" title='<?=$p->id?>' alt=<?=$k?>><?=$p->title?></a>
													  <span class="users-list-date"><?=$p->monovalent?></span>
													  <span class="kuige text-muted"><?=$p->specs?></span>
													  <span class="weight">(<?=$p->weight?>克)</span>
													</li>
												<?}?>
												  </ul>
												  <!-- /.users-list -->
												</div>
												<!-- /.box-body -->
												<div class="box-footer text-center">
												  <a href="javascript:void(0)" class="uppercase">View All Users</a>
												</div>
												<!-- /.box-footer -->
											  </div>
											  <!--/.box -->
											</div>
								<!-- /.info-box-content -->
					 </div>

			  
			<?php

			$form=ActiveForm::begin([
					"id"=>"Classify_update_form",
					//指定文件上传表单，enctype属性一定是要设置的                 
					"options"=>["class"=>"form-horizontal",
								"enctype"=>"multipart/form-data"],                     
					// "action"=>"index.php?r=Classify-manager/update",
					'action'=>'',
					'fieldConfig' => [
						'template' => "{label}\n<div class='controls'>{input}{error}</div>",//添加 {error} 
						'labelOptions' => ['class' => 'control-label'],
						'errorOptions'=>["style"=>"display:inline;color:red"]//错误信息的样式
						],
					]);
					
					
					//文章标题输入框

			echo   $form -> field($orderdetail,'productid',['options'=>['class'=>'control-group',]])
					   -> label('产品名称'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
								['for'=>'typeahead'])     
					   -> textInput(['class'=>'span6 typeahead',
									  'data-provide'=>'typeahead',
									  'data-items'=>'4',
									  'maxlength'=>'32']);
			

			echo   $form -> field($product,'weight',['options'=>['class'=>'control-group',]])
					   -> label('重量'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
								['for'=>'typeahead'])     
					   -> textInput(['class'=>'span6 typeahead',
									  'data-provide'=>'typeahead',
									  'data-items'=>'4',
									  'maxlength'=>'32']);

			echo   $form -> field($orderdetail,'price',['options'=>['class'=>'control-group',]])
					   -> label('单价'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
								['for'=>'typeahead'])     
					   -> textInput(['class'=>'span6 typeahead',
									  'data-provide'=>'typeahead',
									  'data-items'=>'4',
									  'maxlength'=>'32']);

			echo   $form -> field($orderdetail,'productnum',['options'=>['class'=>'control-group',]])
					   -> label('数量'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
								['for'=>'typeahead'])     
					   -> textInput(['class'=>'span6 typeahead',
									  'data-provide'=>'typeahead',
									  'data-items'=>'4',
									  'maxlength'=>'32']);
									  
									  
									  
									 
					
					
			?>
			<div style="padding:10px 0;">
					<?
						echo  Html::submitButton('生成订单', ['class' => 'btn btn-primary', 'name' => 'signup-button']);
					
						?>
					<?//= Html::Button('重置', ['class' => 'btn btn-primary', 'name' => 'res','type'=>'reset']) ?>
				</div>
			
	<?php 

			ActiveForm::end(); 
		?> 
			  
			  <?/*
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">产品名称</label>

                    <div class="col-sm-10">
                      <input type="name" class="form-control" id="inputName"   style='border:none;' placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2  control-label">单价</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control"  disabled="disabled" id="monovalent" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">规格</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="kui" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">重量</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputWeight" placeholder="Skills">
                    </div>
                  </div>
				  
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">数量</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNum" placeholder="Skills">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">提交</button>
                    </div>
                  </div>
                </form>
				*/?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
	
	
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
	var danjia=$('.users-list-date');
	var kuige=$('.kuige');
	var weights=$('.weight');
	
	
	$('.users-list-name').click(function(){
		$("#orderdetail-productid").val($(this).attr("title"));
		// alert(kuige[$(this).attr("alt")].innerHTML);
		$("#product-monovalent").val(danjia[$(this).attr("alt")].innerHTML);
		$("#kui").val(kuige[$(this).attr("alt")].innerHTML);
		$("#product-weight").val(weights[$(this).attr("alt")].innerHTML);
		
	});
	
	
$(document).ready(function(){
	$("#orderdetail-productid").click(function(){
		$("#productBox").fadeToggle("slow");
	});
});
	// alert('1');
	// alert(as.length);
</script>
