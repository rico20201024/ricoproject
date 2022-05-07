<?

	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use yii\widgets\Pjax; 
	use yii\widgets\ActiveForm;
	use yii\widgets\ListView;

	
?>
<?php

$form=ActiveForm::begin([
        "id"=>"article_update_form",
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

<?
	if(\yii::$app->session->hasFlash('info')){
		\yii::$app->session->getFlash('info');
	}
?>
	<?php
	//文章标题输入框
	echo   $form -> field($a,'title',['options'=>['class'=>'control-group']])
			   -> label("文章标题".Html::tag('span','*',['class'=>'required']),
						['for'=>'typeahead'])     
			   -> textInput(['class'=>'span6 typeahead',
							  'data-provide'=>'typeahead',
							  'data-items'=>'4',
							  'maxlength'=>'32']);
		echo   $form -> field($a,'content',['options'=>['class'=>'control-group']])
			   -> label("内容".Html::tag('span','*',['class'=>'required']),
						['for'=>'typeahead'])     
			   -> textInput(['class'=>'span6 typeahead',
							  'data-provide'=>'typeahead',
							  'data-items'=>'4',
							  'maxlength'=>'32']);

	 ?>
	 
	 
	 
	 
	 
	 
				<div class="form-group">
					<?= Html::submitButton('按钮', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
				</div>				  
<?ActiveForm::end();?>






