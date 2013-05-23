<?php
/* @var $this IngredientesController */
/* @var $data Ingredientes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_receita')); ?>:</b>
	<?php echo CHtml::encode($data->id_receita); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingrediente')); ?>:</b>
	<?php echo CHtml::encode($data->ingrediente); ?>
	<br />


</div>