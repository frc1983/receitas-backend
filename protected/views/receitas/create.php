<?php
/* @var $this ReceitasController */
/* @var $model Receitas */

$this->breadcrumbs=array(
	'Receitases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Receitas', 'url'=>array('index')),
	array('label'=>'Manage Receitas', 'url'=>array('admin')),
);
?>

<h1>Create Receitas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'model_ingredientes'=>$model_ingredientes)); ?>