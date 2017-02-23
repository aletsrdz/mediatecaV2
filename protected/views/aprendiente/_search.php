<?php
/* @var $this AprendienteController */
/* @var $model Aprendiente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idaprendiente'); ?>
		<?php echo $form->textField($model,'idaprendiente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apaterno'); ?>
		<?php echo $form->textField($model,'apaterno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amaterno'); ?>
		<?php echo $form->textField($model,'amaterno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rfc'); ?>
		<?php echo $form->textField($model,'rfc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numcuenta'); ?>
		<?php echo $form->textField($model,'numcuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sexo'); ?>
		<?php echo $form->textField($model,'sexo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calle'); ?>
		<?php echo $form->textField($model,'calle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'colonia'); ?>
		<?php echo $form->textField($model,'colonia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'municipio'); ?>
		<?php echo $form->textField($model,'municipio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechanacimiento'); ?>
		<?php echo $form->textField($model,'fechanacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'categoria'); ?>
		<?php echo $form->textField($model,'categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dependencia'); ?>
		<?php echo $form->textField($model,'dependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subdependencia'); ?>
		<?php echo $form->textField($model,'subdependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codiogopostal'); ?>
		<?php echo $form->textField($model,'codiogopostal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->