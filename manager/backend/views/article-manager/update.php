<!--基于bootstrap使用小物件ActiveForm生成表单-->
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

use yii\widgets\Pjax; 

$id=\yii::$app->request->get('id');
?>
<div class="content">
    <div class="header"><h2 class="page-title"><?=($id?'修改':'新增')?>文章</h2></div>
	
<script>
window.setTimeout(function(){
    $('[data-dismiss="alert"]').alert('close');
},2000);
</script>
<?
	if(\yii::$app->session->hasFlash('info')){
		\yii::$app->session->getFlash('info');
	}
?>
					<div class="form-group" >
					<a href="javascript:;" onclick="javascript :history.back(-1);" class='btn btn-primary'>返回上一页</a>
					<a href="<?=\yii\helpers\Url::toRoute(["article-manager/admin"])?>" class='btn btn-primary'>返回列表页</a>
					<?//= Html::a('返回列表首页!', \yii\helpers\Url::toRoute(["article-manager/admin"]), ['class' => 'btn btn-sm btn-primary']) ?>
				</div>				
<?php

$form=ActiveForm::begin([
        "id"=>"product",
        //指定文件上传表单，enctype属性一定是要设置的                 
        "options"=>["class"=>"form-horizontal",
                    "enctype"=>"multipart/form-data"],                     
        // "action"=>"index.php?r=article-manager/update",
		'action'=>'',
        'fieldConfig' => [
            'template' => "{label}\n<div class='controls'>{input}{error}</div>",//添加 {error} 
            'labelOptions' => ['class' => 'control-label'],
            'errorOptions'=>["style"=>"display:inline;color:red"]//错误信息的样式
            ],
        ]);
?>
    <fieldset>
    <legend style='font-size:18px;'>以下<span class="required"> <font color='red'>*</font></span>为必填项.</legend>
<?php
//文章标题输入框
echo   $form -> field($article,'title',['options'=>['class'=>'control-group']])
           -> label("文章标题".Html::tag('span','<font color="red">*</font>',['class'=>'required']),
                    ['for'=>'typeahead'])     
           -> textInput(['class'=>'span6 typeahead',
                          'data-provide'=>'typeahead',
                          'data-items'=>'4',
                          'maxlength'=>'32']);

echo   $form -> field($article,'tags',['options'=>['class'=>'control-group']])
           -> label("标签(使用,分隔开)".Html::tag('span','<font color="red">*</font>',['class'=>'required']),
                    ['for'=>'typeahead'])     
           -> textInput(['class'=>'span6 typeahead',
                          'data-provide'=>'typeahead',
                          'data-items'=>'4',
                          'maxlength'=>'32']);

//文章栏目下拉列表框
echo $form -> field($article,'cid',["options"=>["class"=>"control-group"]])
           -> label("文章栏目".Html::tag('span','<font color="red">*</font>',['class'=>'required']),
                    ['for'=>'selectError'])  
           -> dropDownList($categorys->showAllSelectCategory());

//图片文件选择框
echo $form -> field($model,'imageurl',["options"=>["class"=>"control-group"]])
           -> label('文章图片',['for'=>'fileInput'])     
           -> fileInput(['size'=>30,"class"=>"input-file uniform_on"]); 
 echo $form->field($article,'recommend',
						[
							'labelOptions'=>[
								// 'label'=>'nick',
								// 'class'=>'checkbox-inline'
							],
							'template'=>"<div class='col-lg-6'>{label}\n{input}\n{hint}</div>",
							  // 'template' => "\n<div class=\"col-lg-3\">{label}{input}</div>\n<div class=\"col-lg-8\">{error}</div>", 
						])
						->radioList(['1'=>'是','0'=>'否'])->label('是否推荐：');
						
 echo $form->field($article,'status',
						[
							'labelOptions'=>[
								// 'label'=>'nick',
								// 'class'=>'checkbox-inline'
							],
							'template'=>"<div class='col-lg-6'>{label}\n{input}\n{hint}</div>",
							  // 'template' => "\n<div class=\"col-lg-3\">{label}{input}</div>\n<div class=\"col-lg-8\">{error}</div>", 
						])
						->radioList(['1'=>'是','0'=>'否'])->label('状态：');

 echo $form->field($article,'hits',
						[
							'labelOptions'=>[
								// 'label'=>'nick',
								// 'class'=>'checkbox-inline'
							],
							'template'=>"<div class='col-lg-6'>{label}\n{input}\n{hint}</div>",
							  // 'template' => "\n<div class=\"col-lg-3\">{label}{input}</div>\n<div class=\"col-lg-8\">{error}</div>", 
						])->radioList(['1'=>'是','0'=>'否'])->label('是否置顶：');
//文本域输入框
// echo $form -> field($article,'content',["options"=>["class"=>"control-group"]])
           // -> label("内容".Html::tag('span','*',['class'=>'required']),
                    // ['for'=>'textarea2'])     
           // -> textarea(["class"=>"cleditor","cols"=>50,"rows"=>3]); 
		   echo  $form->field($article, 'content')->widget('app\common\widgets\ueditor\Ueditor',[
			'options'=>[
				'initialFrameWidth' => 'auto',
            'initialFrameHeight' => 250,//高度
			]
])
?> 
				<div class="form-group">
					
					<?
						echo  Html::submitButton($id?'更新':'发布', ['class' => 'btn btn-primary', 'name' => 'signup-button']);
					
						?>
					<?//= Html::Button('重置', ['class' => 'btn btn-primary', 'name' => 'res','type'=>'reset']) ?>
				</div>	

 <?php 
//foreach ($article->getErrors('title') as $error)
//{
//    echo $error;
//}
//print_r($form->errorSummary($article));
    ActiveForm::end(); 
?>             
    </fieldset>
<?php 
if(\Yii::$app->session->hasFlash('actionInfo'))
    echo "<div class='flash-success' id='flash-success'><b>"
        ."<img border='0' src='"
       .\Yii::$app->request->baseUrl."/icons/info.png' width='16px' height='16px'>提示："
       .\Yii::$app->session->getFlash('actionInfo')
       ."</b><span style='float:right;margin-top:-11px'><a href='javascript:void(0)' onclick=\"$('#flash-success').slideToggle();\"><img border='0' src='"
       .\Yii::$app->request->baseUrl."/icons/cancel.png'></a></span></div>"
       ;
?>
</div>
<!--
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<form method="post" action="" style="min-height: 800px !important;" >
    <p>
        <textarea id="editor1" name="editor1" style="min-height: 100%;">&lt;p&gt;Initial value.&lt;/p&gt;</textarea>
        <script type="text/javascript">
            CKEDITOR.replace( 'editor1');
        </script>
    </p>
    <p>
        <input type="submit" />
    </p>
</form>-->

