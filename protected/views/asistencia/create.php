<?php
/* @var $this AsistenciaController */
/* @var $model Asistencia */

$this->breadcrumbs=array(
	'Asistencias'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Asistencia', 'url'=>array('index')),
	array('label'=>'Manage Asistencia', 'url'=>array('admin')),
);
?>




<h1>Registrar Asistencia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>