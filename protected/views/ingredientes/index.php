<?php
/* @var $this IngredientesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ingredientes',
);

$this->menu=array(
	array('label'=>'Create Ingredientes', 'url'=>array('create')),
	array('label'=>'Manage Ingredientes', 'url'=>array('admin')),
);
?>

<h1>Ingredientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
