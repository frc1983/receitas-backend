<?php
/* @var $this IngredientesController */
/* @var $model Ingredientes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_receita'); ?>
		<?php echo $form->textField($model,'id_receita'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingrediente'); ?>
		<?php echo $form->textField($model,'ingrediente',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->