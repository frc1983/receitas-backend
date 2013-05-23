<?php
/* @var $this IngredientesController */
/* @var $model Ingredientes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ingredientes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_receita'); ?>
		<?php echo $form->dropDownList($model, 'id_receita', 
		CHtml::listData(Receitas::model()->findAll(), 'id', 'nome')); ?>
		<?php echo $form->error($model,'id_receita'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingrediente'); ?>
		<?php echo $form->textField($model,'ingrediente',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ingrediente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->