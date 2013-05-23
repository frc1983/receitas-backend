<?php
/* @var $this IngredientesController */
/* @var $model Ingredientes */

$this->breadcrumbs=array(
	'Ingredientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ingredientes', 'url'=>array('index')),
	array('label'=>'Create Ingredientes', 'url'=>array('create')),
	array('label'=>'View Ingredientes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ingredientes', 'url'=>array('admin')),
);
?>

<h1>Update Ingredientes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>