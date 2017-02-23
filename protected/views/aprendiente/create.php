<?php
/* @var $this AprendienteController */
/* @var $model Aprendiente */

$this->breadcrumbs=array(
	'Aprendientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Aprendiente', 'url'=>array('index')),
	array('label'=>'Manage Aprendiente', 'url'=>array('admin')),
);
?>

<h1>Crear Aprendiente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
