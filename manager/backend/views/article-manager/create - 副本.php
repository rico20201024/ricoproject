<!--基于bootstrap使用小物件ActiveForm生成表单-->
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="content">
    <div class="header"><h1 class="page-title">操作面板</h1></div>
<?php
$form=ActiveForm::begin([
        "id"=>"article_create_form",
        //指定文件上传表单，enctype属性一定是要设置的                 
        "options"=>["class"=>"form-horizontal",
                    "enctype"=>"multipart/form-data"],                     
        "action"=>"index.php?r=admin/article-manager/create",
        'fieldConfig' => [
            'template' => "{label}\n<div class='controls'>{input}{error}</div>",//添加 {error} 
            'labelOptions' => ['class' => 'control-label'],
            'errorOptions'=>["style"=>"display:inline;color:red"]//错误信息的样式
            ],
        ]);
?>
    <fieldset>
    <legend>以下<span class="required">*</span>为必填项.</legend>
<?php
//文章标题输入框
echo   $form -> field($article,'title',['options'=>['class'=>'control-group']])
           -> label("文章标题".Html::tag('span','*',['class'=>'required']),
                    ['for'=>'typeahead'])     
           -> textInput(['class'=>'span6 typeahead',
                          'data-provide'=>'typeahead',
                          'data-items'=>'4',
                          'maxlength'=>'32']);

//文章栏目下拉列表框
echo $form -> field($article,'cid',["options"=>["class"=>"control-group"]])
           -> label("文章栏目".Html::tag('span','*',['class'=>'required']),
                    ['for'=>'selectError'])  
           -> dropDownList($categorys->showAllSelectCategory());

//图片文件选择框
echo $form -> field($article,'imgurl',["options"=>["class"=>"control-group"]])
           -> label('文章图片',['for'=>'fileInput'])     
           -> fileInput(['size'=>50,"class"=>"input-file uniform_on"]); 
//文本域输入框
echo $form -> field($article,'content',["options"=>["class"=>"control-group"]])
           -> label("内容".Html::tag('span','*',['class'=>'required']),
                    ['for'=>'textarea2'])     
           -> textarea(["class"=>"cleditor","cols"=>50,"rows"=>3]); 
?> 

    <div class="form-actions">
      <button type="submit" class="btn btn-primary" name="sub">提交</button>
      <button type="reset" class="btn" name="res">重置</button>
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



