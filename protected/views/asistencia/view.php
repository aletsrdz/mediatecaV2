<?php
/* @var $this AsistenciaController */
/* @var $model Asistencia */

$this->breadcrumbs=array(
	'Asistencias'=>array('admin'),
	$model->idaprendiente,
);

$this->menu=array(
	array('label'=>'List Asistencia', 'url'=>array('index')),
	array('label'=>'Create Asistencia', 'url'=>array('create')),
	array('label'=>'Update Asistencia', 'url'=>array('update', 'id'=>$model->idaprendiente)),
	array('label'=>'Delete Asistencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idaprendiente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Asistencia', 'url'=>array('admin')),
);
?>
<?php
	foreach (Yii::app()->user->getFlashes()  as $key => $message) 
	{
		echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	}
?>

<h1>Detalle del aprendiente #<?php echo $model->idaprendiente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idaprendiente',
		'horaentrada',
		'horasalida',
		#'estatus',
	),
)); ?>

<br>

<?php 
	/*
	 $this->widget(
    'booster.widgets.TbButton',
    array(
    	'buttonType' =>'link',
        'label' => 'Registrar salida',
        'context' => 'primary',
        #'url' => 'array(generarCredencial, "nombre"=>$model->nombre, "idioma"=>$model->idioma, "id"=>$model->idaprendiente),',
        'url' => Yii::app()->createUrl('asistencia/update', array("id"=>$model->idaprendiente, "entrada"=>$model->horaentrada)),    

    )
); echo ' ';
*/
?>
