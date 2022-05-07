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


<?=$model->content?>

<?=$model->content?>