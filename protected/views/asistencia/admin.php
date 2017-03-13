<?php
/* @var $this AsistenciaController */
/* @var $model Asistencia */

$this->breadcrumbs=array(
	'Asistencias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Asistencia', 'url'=>array('index')),
	array('label'=>'Create Asistencia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#asistencia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	foreach (Yii::app()->user->getFlashes()  as $key => $message) 
	{
		echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	}
?>

<h1>Administrador de  Asistencias</h1>

<!--Poner Botones para crear una nueva entrada y nueva salida -->
<?php $this->widget(
    'booster.widgets.TbButton',
    array(
    	'buttonType' =>'link',
        'label' => 'Registrar Asistencia',
        'context' => 'primary',        
        'url' => Yii::app()->createUrl('asistencia/create'),
        'htmlOptions' => array(      
        	#'onclick' => 'js:bootbox.alert("Generar credencial!")',        	
        )	

    )
); echo ' ';
?>

<br></br>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'asistencia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            'name'=>'idaprendiente',
            'header'=>'No.',
            'htmlOptions'=>array('style'=>'width: 5px; text-align: center;'),            
        ),
        array(
            'name'=>'horaentrada',
            'header'=>'Hora de Entrada',
            'htmlOptions'=>array('style'=>'width: 5px; text-align: center;'),            
        ),
        array(
            'name'=>'horasalida',
            'header'=>'Hora de Salida',
            'htmlOptions'=>array('style'=>'width: 5px; text-align: center;'),            
        ),

		#'horaentrada',
		#'horasalida',
		#'estatus',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
