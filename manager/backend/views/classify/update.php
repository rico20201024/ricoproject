<!--基于bootstrap使用小物件ActiveForm生成表单-->
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

use yii\widgets\Pjax; 

$id=\yii::$app->request->get('id');
?>
<div class="content">
    <div class="header"><h3 class="page-title"><?=($id?'修改':'新增')?>文章</h3></div>
	
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
					<a href="<?=\yii\helpers\Url::toRoute(["classify/index"])?>" class='btn btn-primary'>返回列表页</a>
					<?//= Html::a('返回列表首页!', \yii\helpers\Url::toRoute(["Classify-manager/admin"]), ['class' => 'btn btn-sm btn-primary']) ?>
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
?>
    <fieldset>
    <legend style='font-size:18px;'>以下<span class="required"> <font color='red'>*</font></span>为必填项.</legend>
<?php


//文章栏目下拉列表框
echo $form -> field($classify,'parentid',["options"=>["class"=>"control-group"]])
           -> label("类别选项（不选默认为顶级）".Html::tag('span','<font color="red">*</font>',['class'=>'required']),
                    ['for'=>'selectError'])  
           -> dropDownList($classifyArr);

//文章标题输入框

echo   $form -> field($classify,'title',['options'=>['class'=>'control-group']])
           -> label('类别名称'.Html::tag('span','<font color="red">*</font>',['class'=>'required']),
                    ['for'=>'typeahead'])     
           -> textInput(['class'=>'span6 typeahead',
                          'data-provide'=>'typeahead',
                          'data-items'=>'4',
                          'maxlength'=>'32']);
						  
echo   $form -> field($classify,'description',['options'=>['class'=>'control-group']])
           -> label("类别描述".Html::tag('span','<font color="red">*</font>',['class'=>'required']),
                    ['for'=>'typeahead'])     
           -> textarea(['class'=>'span6 typeahead',
                          'data-provide'=>'typeahead',
                          'data-items'=>'4',
						  'rows'=>10,
                          'maxlength'=>'200']);


?> 
				<div class="form-group">
					<?
						echo  Html::submitButton($id?'更新':'添加', ['class' => 'btn btn-primary', 'name' => 'signup-button']);
					
						?>
					<?//= Html::Button('重置', ['class' => 'btn btn-primary', 'name' => 'res','type'=>'reset']) ?>
				</div>	

 <?php 
//foreach ($Classify->getErrors('title') as $error)
//{
//    echo $error;
//}
//print_r($form->errorSummary($Classify));
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
