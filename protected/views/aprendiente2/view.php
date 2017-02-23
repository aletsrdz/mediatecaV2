<?php
/* @var $this Aprendiente2Controller */
/* @var $model Aprendiente2 */

$this->breadcrumbs=array(
	'Aprendiente2s'=>array('index'),
	$model->idaprendiente,
);

$this->menu=array(
	array('label'=>'List Aprendiente2', 'url'=>array('index')),
	array('label'=>'Create Aprendiente2', 'url'=>array('create')),
	array('label'=>'Update Aprendiente2', 'url'=>array('update', 'id'=>$model->idaprendiente)),
	array('label'=>'Delete Aprendiente2', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idaprendiente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Aprendiente2', 'url'=>array('admin')),
);
?>


<h1>Detalle del Aprendiente: <?php echo $model->idaprendiente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idaprendiente',
		'fecharegistro',
		'fechainscripcion',
		'cta_rfc',
		'nombre',
		'categoria',
		'idioma',
		'procedencia',
		'fechanacimiento',
		'sexo',
		'inscripcion',
		'numinscripcion',
	),
)); ?>

<br>
<?php echo CHtml::link('Código de barras - PDF', array('generarCredencial', "nombre"=>$model->nombre, "idioma"=>$model->idioma, "id"=>$model->idaprendiente), array('target'=>'_blank'));?>
</br>