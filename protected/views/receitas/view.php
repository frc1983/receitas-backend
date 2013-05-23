<?php
/* @var $this ReceitasController */
/* @var $model Receitas */

$this->breadcrumbs=array(
	'Receitases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Receitas', 'url'=>array('index')),
	array('label'=>'Create Receitas', 'url'=>array('create')),
	array('label'=>'Update Receitas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Receitas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Receitas', 'url'=>array('admin')),
);
?>

<h1>View Receitas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_categoria',
		'nome',
		'rendimento',
		'calorias',
		'tempo_preparo',
		'modo_preparo',
		'image_url',
	),
)); ?>
