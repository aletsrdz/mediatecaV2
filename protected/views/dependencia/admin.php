<?php
/* @var $this DependenciaController */
/* @var $model Dependencia */

$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Dependencia', 'url'=>array('index')),
	array('label'=>'Create Dependencia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dependencia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Listado de Dependencias</h1>

<?php $this->widget(
    'booster.widgets.TbButton',
    array(
    	'buttonType' =>'link',
        'label' => 'Agregar dependencia',
        'context' => 'primary',        
        'url' => Yii::app()->createUrl("dependencia/create"),        
    )
); echo ' ';
?>


<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dependencia-grid',
	'dataProvider'=>$model->search(),
	'emptyText' => 'NO SE ENCONTRARÓN RESULTADOS',
	'summaryText' => 'Mostrar {start} - {end} de {count}',
	'pager' => array('class' => 'CLinkPager', 'header' => 'Ir a página:', 'nextPageLabel'=>"Siguiente", 'prevPageLabel'=>'Anterior'),		
	'filter'=>$model,
	'columns'=>array(
		'dependencia',
		'nombre',
		'nomabrevia',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'htmlOptions'=>array('style' => 'width: 100px; text-align: center; margin-left: 2px;'),
			'header'=>'Acciones',
		),
	),
)); ?>
