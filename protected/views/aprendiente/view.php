<?php
/* @var $this AprendienteController */
/* @var $model Aprendiente */

$this->breadcrumbs=array(
	'Aprendientes'=>array('index'),
	$model->idaprendiente,
);

$this->menu=array(
	array('label'=>'List Aprendiente', 'url'=>array('index')),
	array('label'=>'Create Aprendiente', 'url'=>array('create')),
	array('label'=>'Update Aprendiente', 'url'=>array('update', 'id'=>$model->idaprendiente)),
	array('label'=>'Delete Aprendiente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idaprendiente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Aprendiente', 'url'=>array('admin')),
);
?>

<h1>Detalle Aprendiente #<?php echo $model->idaprendiente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idaprendiente',
		'nombre',
		'apaterno',
		'amaterno',
		'rfc',
		'numcuenta',
		'email',
		'sexo',
		'calle',
		'colonia',
		'municipio',
		'estado',
		'fechanacimiento',
		'telefono',
		'categoria',
		'dependencia',
		'subdependencia',
		'observaciones',
		'codiogopostal',
	),
)); ?>

<br>
<?php
	/*
	$this->widget(
        'booster.widgets.TbButton',
        array(
            'label' => 'Imprimir PDF',
            'context' => 'danger',
			'url'=> 'generarCredencial',
        )
	); echo ' ';
	*/
?>
<br>	
	<?php echo CHtml::link('Crear PDF',array('generarCredencial',
                                         'nombre'=>$model->nombre, 'numcuenta'=>$model->numcuenta, 'id'=>$model->idaprendiente), array('target'=>'_blank')); ?>
</br>	
	<?php echo CHtml::link('Código de barras - PDF', array('generarCredencial', "nombre"=>$model->nombre, "numcuenta"=>$model->numcuenta, "id"=>$model->idaprendiente), array('target'=>'_blank'));?>
	
<br>
<?php // echo CHtml::link('PDF',"credencial", array("submit"=>array('../protected/extensions/fpdf/ex.php', 'nombre'=>$model->nombre, "numcuenta"=>$model->numcuenta), 'confirm' => 'deseas generar la credencial?'), array('target'=>'_blank')); ?>
</br>