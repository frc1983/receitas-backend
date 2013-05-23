<?php
/* @var $this ReceitasController */
/* @var $model Receitas */

$this->breadcrumbs=array(
	'Receitases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Receitas', 'url'=>array('index')),
	array('label'=>'Create Receitas', 'url'=>array('create')),
	array('label'=>'View Receitas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Receitas', 'url'=>array('admin')),
);
?>

<h1>Update Receitas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'model_ingredientes'=>$model_ingredientes)); ?>