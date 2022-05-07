
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
		<div class='col-md-12' style='padding:20px;'>
			   <?/*

			$form=ActiveForm::begin([
					"id"=>"",
							 'method' => 'get',
					//指定文件上传表单，enctype属性一定是要设置的                 
					"options"=>["class"=>"form-horizontal",
								"enctype"=>"multipart/form-data"],                     
					// "action"=>"index.php?r=Classify-manager/update",
					'action'=>'product',
					'fieldConfig' => [
						'template' => "\n<div class='input-group pull-left input-group-sm'>{input}</div>",//添加 {error} 
						'labelOptions' => ['class' => 'col-sm-2 control-label','for'=>'inputEmail3',],
						'errorOptions'=>["style"=>"display:inline;color:red"]//错误信息的样式
						],
					]);
					
					
					
						echo   $form -> field($searchModel,'title',['options'=>['class'=>'control-group']])
								   -> label('编号'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'data-items'=>'4',
												  'placeholder'=>'请输入产品名称',
												  'maxlength'=>'32']);
			*/?>
				<span>
					<button type="submit" class="btn btn-primary pull-left">产品搜索</button>
				</span>
  <?
    // ActiveForm::end(); 
?> 
</div>
          <div class="row" id="productbox" >

            <!-- /.col -->

			
			
				<? //Pjax::begin()?> 
			
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
									
	<? //Pjax::end()?>
            <!-- /.col -->
          </div>
		  
          <!-- /.row -->
      </div>

        <!-- /.box-body -->
   </div>
   
   
   
			   <?

			$form=ActiveForm::begin([
					"id"=>"Classify_update_form",
							 'method' => 'post',
					//指定文件上传表单，enctype属性一定是要设置的                 
					"options"=>["class"=>"form-horizontal",
								"enctype"=>"multipart/form-data"],                     
					// "action"=>"index.php?r=Classify-manager/update",
					'action'=>'',
					'fieldConfig' => [
						'template' => "<div class='form-group'>{label}\n<div class='col-sm-8'>{input}</div></div>",//添加 {error} 
						'labelOptions' => ['class' => 'col-sm-4 control-label','for'=>'inputEmail3',],
						'errorOptions'=>["style"=>"display:inline;color:red"]//错误信息的样式
						],
					]);
			?>
   
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
									
					<div class='box-body'>								


						<?
						echo   $form -> field($product,'id',['options'=>['class'=>'control-group']])
								   -> label('产品编号'.Html::tag('span','<font class="test" color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'data-items'=>'4',
												  'placeholder'=>'产品编号',
												  'maxlength'=>'32']);
						echo   $form -> field($product,'title',['options'=>['class'=>'control-group']])
								   -> label('名称'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'data-items'=>'4',
												  'placeholder'=>'产品名称',
												  'maxlength'=>'32']);
						echo   $form -> field($product,'monovalent',['options'=>['class'=>'control-group']])
								   -> label('原价'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'data-items'=>'4',
												  'placeholder'=>'产品原价',
												  'maxlength'=>'32']);
						echo   $form -> field($product,'monovalent',['options'=>['class'=>'control-group']])
								   -> label('报价'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'data-items'=>'4',
												  'placeholder'=>'报价',
												  'maxlength'=>'32']);
						echo   $form -> field($product,'weight',['options'=>['class'=>'control-group']])
								   -> label('重量'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'data-items'=>'4',
												  'placeholder'=>'产品重量',
												  'maxlength'=>'32']);
						?>


					</div>
					</div>
				</div>
				<div class='col-md-6'>
						<div class="box box-success">
									<div class="box-header with-border">
										<h4 class='box-title'  style='font-size:14px;'>客户信息:</h4>
									</div>
									<div class='box-body'>	
									<!-- /.box-header -->
									<!-- form start -->
									<?
									echo   $form -> field($customer,'id',['options'=>['class'=>'control-group']])
											   -> label('编号'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
														['for'=>'typeahead'])     
											   -> textInput(['class'=>'form-control',
															  'data-provide'=>'typeahead',
															  'data-items'=>'4',
															  'placeholder'=>'名称',
															  'maxlength'=>'32']);
									echo   $form -> field($customer,'name',['options'=>['class'=>'control-group']])
											   -> label('姓名'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
														['for'=>'typeahead'])     
											   -> textInput(['class'=>'form-control',
															  'data-provide'=>'typeahead',
															  'data-items'=>'4',
															  'placeholder'=>'名称',
															  'maxlength'=>'32']);
									echo   $form -> field($customer,'location',['options'=>['class'=>'control-group']])
											   -> label('地址'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
														['for'=>'typeahead'])     
											   -> textInput(['class'=>'form-control',
															  'data-provide'=>'typeahead',
															  'data-items'=>'4',
															  'placeholder'=>'名称',
															  'maxlength'=>'32']);
									echo   $form -> field($customer,'telephone',['options'=>['class'=>'control-group']])
											   -> label('手机号'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
														['for'=>'typeahead'])     
											   -> textInput(['class'=>'form-control',
															  'data-provide'=>'typeahead',
															  'data-items'=>'4',
															  'placeholder'=>'名称',
															  'maxlength'=>'32']);
									echo   $form -> field($customer,'phone',['options'=>['class'=>'control-group']])
											   -> label('固话'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
														['for'=>'typeahead'])     
											   -> textInput(['class'=>'form-control',
															  'data-provide'=>'typeahead',
															  'data-items'=>'4',
															  'placeholder'=>'固话',
															  'maxlength'=>'32']);
									?>
								  </div>
								  </div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary pull-right">生成订单</button>
              </div>
			</div>
            <!-- /.box-body -->
       </div>
		<!-- /.box box-info -->
	   <?
    ActiveForm::end(); 
?> 
<p>在以下输入框中输入名字:</p>
第一个名称:
<input type="text" class='jb'/>
<p>匹配项: <span class='infos'></span></p>
   </section>
   </section>
   
   <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
 
   	<script>
	
	
	$("input").keyup(function(){
		txt=$(".jb").val();
		$.post("../ajaxs/2.php",{suggest:txt},function(result){
			$(".infos").html(result);
		});
	});
	
	
	//编号表单键盘事件
	/*$('#product-id').keyup(function(){
			
			txtid=$("#product-id").val();
			txttitle=$("#product-title").val();
			txtmonovalent=$("#product-monovalent").val();
			txtweight=$("#product-weight").val();
			
			
			$.post("../ajaxs/3.php",{tid:txtid,ttitle:txttitle,tmonovalent:txtmonovalent,tweight:txtweight},function(result){
				$(".test").html(result);
			});
			
	});*/

	/*
		想法
		点击的时候把产品数据放到一个文件夹中
		然后使用ajax读取出来放回div中
	*/
	/*
		想法2
		使用ajax
		点击商品的时候 把商品往数据库里添加
		然后列出来 表单一旦生成就去删除临时表的的数据
	*/
		var products=$('#productbox div.col-sm-4');
		// $('#productbox p').css("display","none");
		
		$('#product-id').attr("readonly","readonly");
		$("#product-title").attr("readonly","readonly");
		$("#product-monovalent").attr("readonly","readonly");
		$("#product-weight").attr("readonly","readonly");
		var vvv,mmm;
		
		var arr=new Array();
		
		products.click(function(){
					
					
					ttt=$(this).find('h4').text();
					mmm=$(this).find('.monovalent').text();
					$("#product-id").val($(this).find('.id').text());
					$("#product-monovalent").val($(this).find('.monovalent').text());
					$("#product-weight").val($(this).find('.weight').text());
					// txtid=$("#product-id").val();
					// txttitle=$("#product-title").val();
					// txtmonovalent=$("#product-monovalent").val();
					// txtweight=$("#product-weight").val();
					
					// $.post("../ajaxs/2.php",{suggest:txt},function(result){
						// $(".infos").html(result);
					// });
					
					// $.get("1.php",{ id:$(this).attr('alt'), town:"Ducktown" },function(data,status){
						// alert("数据: " + data + "\n状态: " + status);
						// $('#product-id').val(data);
					// });
				// $.ajax({url:"1.php",success:function(result){
					// $('#product-title').val(result);
				// }});
			// $(this).load('1.php',{name:1},function(responseTxt,statusTxt,xhr){
					// if(statusTxt=="success")
					  // alert("外部内容加载成功!");
					// if(statusTxt=="error")
					  // alert("Error: "+xhr.status+": "+xhr.statusText);
				  // })
			// $('#product-title').val(($(this).children('div .text-center').children("h4").text()));
				$.ajax({
						url:"../ajaxs/4.php",
						data:{title:ttt,monovalent:mmm},
						success:function(result){
							$('#product-title').val(result);
						}
				});
				
			
		});


	  function startRequest(){
		  $('#target').load('1.php');
	  }
	  </script>
	  <input type='button' value='测试异步' onClick="startRequest()">
	  <br>
	  <div id="target"></div>
	  
