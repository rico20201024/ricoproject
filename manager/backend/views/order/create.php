
<?

	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use yii\widgets\Pjax; 
	use yii\widgets\ActiveForm;
	use yii\widgets\ListView;
	use yii\helpers\Url;
	
?>

<section class="content">
                	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">新增订单</h3>

			  <a href='javascript:;void(0)' onclick="javascript:history.back()"; style='margin-left:10px;' class='pull-right'>返回上一页</a>
			  <a href='<?=Url::toRoute(['order/index'])?>' class='pull-right'  >返回订单列表</a>	
            </div>
      </div>
<div id='ccc'>
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
   
		<div class="box" id='orderform'>
            <div class="box-header with-border">
              <h3 class="box-title">请输入订单信息：</h3>
            </div>
			
            <!-- /.box-header -->
			<div class='content'>
				<div class='col-md-6'>
						<div class="box box-info">
									<div class="box-header with-border">
									<h4 class='box-title'  style='font-size:14px;'>产品信息:</h4>
									<span style="color:#259238;">该产品当前库存：<i class='stock'>N</i> 个</span>

									</div>
									<!-- /.box-header -->
									
					<div class='box-body'>						
						<?
						echo   $form -> field($orderdetail,'productid',['options'=>['class'=>'control-group']])
								   -> label('产品编号'.Html::tag('span','<font class="test" color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'data-items'=>'4',
												  'readonly'=>'readonly',
												  'placeholder'=>'产品编号',
												  'maxlength'=>'32']);
						echo   $form -> field($product,'title',['options'=>['class'=>'control-group']])
								   -> label('名称'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'data-items'=>'4',
												  'readonly'=>'readonly',
												  'placeholder'=>'产品名称',
												  'maxlength'=>'32']);
						echo   $form -> field($product,'monovalent',['options'=>['class'=>'control-group']])
								   -> label('原价'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'readonly'=>'readonly',
												  'data-items'=>'4',
												  'placeholder'=>'产品原价',
												  'maxlength'=>'32']);
						echo   $form -> field($orderdetail,'price',['options'=>['class'=>'control-group']])
								   -> label('报价'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'data-items'=>'4',
												  'placeholder'=>'报价',
												  'maxlength'=>'32']);
						echo   $form -> field($orderdetail,'productnum',['options'=>['class'=>'control-group']])
								   -> label('数量'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'data-items'=>'4',
												  'placeholder'=>'数量',
												  'maxlength'=>'32']);
						echo   $form -> field($product,'weight',['options'=>['class'=>'control-group']])
								   -> label('重量'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
											['for'=>'typeahead'])     
								   -> textInput(['class'=>'form-control',
												  'data-provide'=>'typeahead',
												  'readonly'=>'readonly',
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
										<h4 class='box-title'  style='font-size:14px;'>客户信息:										</h4>
									<span class='che' style='color:#259238;'>
									<?if(empty($readonly)){echo "如果该客户不存在，则创建新客户";}?>
									</span>
									<span class='aaa'>
									</span>
									</div>
									<div class='box-body   <?if(isset($readonly)){echo $readonly;}?>'   id='customerbox'>	
									<?if(empty($readonly)){?>
									<!-- /.box-header -->
									<!-- form start -->
									<?
									echo   $form -> field($customer,'name',['options'=>['class'=>'control-group']])
											   -> label('姓名'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
														['for'=>'typeahead'])     
											   -> textInput(['class'=>'form-control',
															  'data-provide'=>'typeahead',
															  'data-items'=>'4',
															  'placeholder'=>'搜索客户或者新建',
															  'maxlength'=>'32']);
									echo   $form -> field($customer,'id',['options'=>['class'=>'control-group']])
											   -> label('编号'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
														['for'=>'typeahead'])     
											   -> textInput(['class'=>'form-control',
															  'data-provide'=>'typeahead',
															  'data-items'=>'4',
															  'readonly'=>'readonly',
															  'placeholder'=>'编号自动生成',
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
															  'placeholder'=>'手机号',
															  'maxlength'=>'32']);
									echo   $form -> field($customer,'phone',['options'=>['class'=>'control-group']])
											   -> label('固话'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
														['for'=>'typeahead'])     
											   -> textInput(['class'=>'form-control',
															  'data-provide'=>'typeahead',
															  'data-items'=>'4',
															  'placeholder'=>'固话',
															  'maxlength'=>'32']);
									echo   $form -> field($customer,'sex',['options'=>['class'=>'control-group']])
											   -> label('性别'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
														['for'=>'typeahead'])     
											   -> textInput(['class'=>'form-control',
															  'data-provide'=>'typeahead',
															  'data-items'=>'4',
															  'placeholder'=>'性别',
															  'maxlength'=>'32']);
									?>
									<?}else{?>
											<div style='line-height:39px;color:#818680;'>
												<p><i class="glyphicon glyphicon-user"></i>名称：<span style='color:#028a00;'><?=$customer->name?> <span class="label label-warning">VIP</span></span></p>
												<p><i class="fa fa-fw fa-yc"></i>编号：<span style='color:#028a00;'><?=$customer->id?></span></p>
												<p><i class="fa fa-fw fa-home"></i>地址：<span style='color:#028a00;'><?=$customer->location?></span></p>
												<p><i class="glyphicon glyphicon-phone"></i>手机：<span style='color:#028a00;'><?=$customer->telephone?></span></p>
												<p><i class="fa fa-fw fa-phone"></i>固话：<span style='color:#028a00;'><?=$customer->phone?></span></p>
												<p><i class="fa fa-fw fa-user"></i>性别：<span style='color:#028a00;'><?=($customer->sex?"男":"女");?></span></p>
											</div>
									<?}?>
								  </div>
								  </div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary pull-right"><?=(isset($_GET['id'])?"修改订单":"生成订单");?></button>

              </div>
			</div>
            <!-- /.box-body -->
       </div>
		<!-- /.box box-info -->
	   <?
    ActiveForm::end(); 
?> 

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
		
		var vvv,mmm;
		
		var arr=new Array();
		
		products.click(function(){
					// $("#orderform").fadeIn(2000);
					// arr.push($(this).find('h4').text());
					
					// ttt=$(this).find('h4').text();
					// mmm=$(this).find('.monovalent').text();
					iii=$(this).find('.id').text();
					// $("#product-monovalent").val($(this).find('.monovalent').text());
					// $("#product-weight").val($(this).find('.weight').text());
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
			/*	$.ajax({
						url:"../ajaxs/4.php",
						data:{title:ttt},
						success:function(result){
							$('#product-title').val(result);
						}
				});
				$.ajax({
						url:"../ajaxs/5.php",
						data:{monovalent:mmm},
						success:function(result){
							$('#product-monovalent').val(result);
						}
				});*/
				$.ajax({
						url:"index.php?r=order/products",
						data:{id:iii},
						// type:'post',
						dataType:'json',
						beforeSend: function (XMLHttpRequest) {
							//发送请求前可修改 XMLHttpRequest 对象的函数
							$('#orderdetail-productid').val("loading...");
							$('#product-title').val("loading...");
							$('#product-monovalent').val("loading...");
							$('#product-weight').val("loading...");
							$('.stock').text('loading...');
						},
						success:function(result){
							$('#orderdetail-productid').val(result.id);
							$('#product-title').val(result.title);
							$('#product-monovalent').val(result.monovalent);
							$('#product-weight').val(result.weight);
							$('.stock').text(result.stock);
						/*	var names='';
							for(var i=0;i<result.length;i++){
								names+='('+result[i].username+')';
							}*/
							$('#ccc').text(result);
								// document.write(console.log(result));
							 
								// document.write(result);
							// document.write(result);
							// $('.box-title').text(result);
						}, 
						error: function (jqXHR, textStatus, errorThrown) {
								/*弹出jqXHR对象的信息*/
								alert(jqXHR.responseText);
								alert(jqXHR.status);
								alert(jqXHR.readyState);
								alert(jqXHR.statusText);
								/*弹出其他两个参数的信息*/
								alert(textStatus);
								alert(errorThrown);
						},
				});


				
		});

	$('#customer-name').keyup(function(){
		$('#customer-location').val('');
		$('#customer-phone').val('');
		$('#customer-id').val('');
		$('#customer-telephone').val('');
		$('#customer-sex').val('');
		txt=$(this).val();
		$.post("index.php?r=order/customer",{suggest:txt},function(result){
			$(".aaa").html(result);
		});
		// alert(txt);
	});
	
	$('#customer-name').keydown(function(){
		$('.che').text('你可能想搜的是：');
		$('#customerbox').find('input').not("#customer-id").attr("readonly",false);
		// alert(txt);
	});
	

	$('.readonly').find('input').attr('readonly','readonly');
	$(".aaa").click(function(){
		// var ttt=$('#customer-id').val();
			var cust_name=trim($(this).children('a').text());
			$('#customerbox').find('input').not("#customer-name").attr("readonly","readonly");
		// $('#customer-id').val(cust_name);

				$.ajax({
						url:"index.php?r=order/cust",
						data:{name:cust_name},
						// type:'post',
						dataType:'json',			//返回的格式为：json格式
						beforeSend: function (XMLHttpRequest) {
							//发送请求前可修改 XMLHttpRequest 对象的函数
							$('#product-name').val("loading...");
						},
						success:function(result){
							if(result.sex==0){
								result.sex='男';
							}else{
								result.sex='女';
							}
							$('#customer-name').val(result.name);
							$('#customer-location').val(result.location);
							$('#customer-phone').val(result.phone);
							$('#customer-id').val(result.id);
							$('#customer-sex').val(result.sex);
							$('#customer-telephone').val(result.telephone);
							
						}, 
						error: function (jqXHR, textStatus, errorThrown) {
								/*弹出jqXHR对象的信息*/
								alert(jqXHR.responseText);
								alert(jqXHR.status);
								alert(jqXHR.readyState);
								alert(jqXHR.statusText);
								/*弹出其他两个参数的信息*/
								alert(textStatus);
								alert(errorThrown);
						},

				});
		// alert($(this).children('a').text());
		// alert($(this).children('a').text());
	});
	// $(".ddd").click(function(){
		// alert(this);
	// });



	
	
	
	
	  function startRequest(){
		  $('#target').load('1.php');
	  }
	 
	 
	 //裁剪字符串长度
	  function trim(str) {

		  return str.replace(/(^\s+)|(\s+$)/g, "");
	}
	
	

	  </script>

	  
