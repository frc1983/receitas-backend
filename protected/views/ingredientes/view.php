<?php
/* @var $this IngredientesController */
/* @var $model Ingredientes */

$this->breadcrumbs=array(
	'Ingredientes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ingredientes', 'url'=>array('index')),
	array('label'=>'Create Ingredientes', 'url'=>array('create')),
	array('label'=>'Update Ingredientes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ingredientes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ingredientes', 'url'=>array('admin')),
);
?>

<h1>View Ingredientes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_receita',
		'ingrediente',
	),
)); ?>
