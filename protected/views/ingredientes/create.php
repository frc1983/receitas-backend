<?php
/* @var $this IngredientesController */
/* @var $model Ingredientes */

$this->breadcrumbs=array(
	'Ingredientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ingredientes', 'url'=>array('index')),
	array('label'=>'Manage Ingredientes', 'url'=>array('admin')),
);
?>

<h1>Create Ingredientes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>