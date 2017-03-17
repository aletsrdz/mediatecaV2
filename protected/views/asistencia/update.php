<?php
/* @var $this AsistenciaController */
/* @var $model Asistencia */

$this->breadcrumbs=array(
	'Asistencias'=>array('admin'),
	$model->idaprendiente=>array('view','id'=>$model->idaprendiente, 'entrada'=>$model->horaentrada),
	'Update',
);

$this->menu=array(
	array('label'=>'List Asistencia', 'url'=>array('index')),
	array('label'=>'Create Asistencia', 'url'=>array('create')),
	array('label'=>'View Asistencia', 'url'=>array('view', 'id'=>$model->idaprendiente)),
	array('label'=>'Manage Asistencia', 'url'=>array('admin')),
);
?>

<h1>Registrar Salida <?php echo $model->idaprendiente; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>