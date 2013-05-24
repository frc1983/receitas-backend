<?php
/* @var $this ReceitasController */
/* @var $model Receitas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'receitas-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_categoria'); ?>
		<?php echo $form->dropDownList($model, 'id_categoria', 
		CHtml::listData(Categorias::model()->findAll(), 'id', 'nome')); ?>
		<?php echo $form->error($model,'id_categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rendimento'); ?>
		<?php echo $form->textField($model,'rendimento',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rendimento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'calorias'); ?>
		<?php echo $form->textField($model,'calorias',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'calorias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tempo_preparo'); ?>
		<?php echo $form->textField($model,'tempo_preparo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tempo_preparo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modo_preparo'); ?>
		<?php echo $form->textArea($model,'modo_preparo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'modo_preparo'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeFileField($model, 'image_url'); ?>
	</div>
    
    <div id="image" class="row">
    <?php
    if(is_file(Yii::getPathOfAlias('webroot')."/".$model->image_url)){
            echo CHtml::image("../../../".$model->image_url, "image_url", array("width"=>350));
            ?>
            <br />
            <br />
            <?php echo CHtml::ajaxLink('Apagar Imagem',array('ajaxDeleteImage'),
            array(
                    'update'=>'#image',
                    'data' => array(
                            'id' => $model->id,
                            'image' => $model->image_url,
            )),
            array('confirm'=>'Tem certeza?'));
            ?>
            <?php
    }
    ?>
    </div>
            
    <?php echo $form->hiddenField($model, 'image_url', array(
            'name' => 'Receitas[image_anterior]',
    ));
    ?>
    <div class="ingredientes">
        <?php foreach($model_ingredientes as $model_ingrediente): ?>
        <div class="row">
            <?php echo $form->labelEx($model_ingrediente,'ingrediente'); ?>
            <?php echo $form->textField($model_ingrediente,'ingrediente',array('size'=>60,'maxlength'=>255, 'name'=>'Ingrediente[]')); ?>
            <?php echo $form->error($model_ingrediente,'ingrediente'); ?>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <a href="javascript:;" onclick="addIngrediente();">Add Ingrediente</a>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    function addIngrediente(){
        $('.ingredientes').append(
            '<div class="row">' +
                '<label for="Ingredientes_ingrediente" class="required">' +
                    'Ingrediente <span class="required">*</span>' +
                '</label>' +
                '<input size="60" maxlength="255" name="Ingrediente[]" id="Ingrediente" type="text">' +
            '</div>'
        );
    }
</script>