<?php
/* @var $this ReceitasController */
/* @var $data Receitas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rendimento')); ?>:</b>
	<?php echo CHtml::encode($data->rendimento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calorias')); ?>:</b>
	<?php echo CHtml::encode($data->calorias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempo_preparo')); ?>:</b>
	<?php echo CHtml::encode($data->tempo_preparo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modo_preparo')); ?>:</b>
	<?php echo CHtml::encode($data->modo_preparo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('image_url')); ?>:</b>
	<?php echo CHtml::encode($data->image_url); ?>
	<br />

	*/ ?>

</div>