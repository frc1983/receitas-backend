<?php
/* @var $this ReceitasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Receitases',
);

$this->menu=array(
	array('label'=>'Create Receitas', 'url'=>array('create')),
	array('label'=>'Manage Receitas', 'url'=>array('admin')),
);
?>

<h1>Receitases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
