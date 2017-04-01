<?php
/* @var $this AcervoController */
/* @var $model Acervo */
/*
$this->breadcrumbs=array(
	'Acervos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Acervo', 'url'=>array('index')),
	array('label'=>'Create Acervo', 'url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "

$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#acervo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1></h1>

<p>
Opcionalmente puede ingresar un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo debe realizarse la comparación.
</p>

<?php echo CHtml::link('','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:block;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
	

	
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'acervo-grid',
	'dataProvider'=>$model->search(),
	'emptyText' => 'NO SE ENCONTRARÓN RESULTADOS',
	'summaryText' => 'Mostrar {start} - {end} de {count}',
	'pager' => array('class' => 'CLinkPager', 'header' => 'Ir a página:', 'nextPageLabel'=>"Siguiente", 'prevPageLabel'=>'Anterior'),	
	#'filter'=>$model,
	'columns'=>array(
		'idacervo',
		array('name' => 'material',
			  'value' => '$data->materiales->descripcion', 
		),
		array('name' => 'isbn',
			'htmlOptions'=>array('style'=>'width: 80px; text-align: center;'),
		),
		#array('name' => 'issn',
		#),	
        array(
            'name'=>'idioma',            
            'value' => '$data->idioma',                 
            'htmlOptions'=>array('style'=>'width: 30px; text-align: center;'),            
        ),
		#'clave',		
		array('name' => 'titulo',
		),			
		array('name' => 'autor_personal',
		),	
		
		#'autor_corporativo',
		/*
		'edicion',
		'pie_imp',
		'descripcion_fisica',
		'serie',
		'nota',
		'descripcion_area',
		'fondo',
		'resumen',
		'acento',
		'referencia',
		'dificultad',
		'cata',
		'fechaingreso',
		'cons',
		*/
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style' => 'width: 100px; text-align: center; margin-left: 2px;'),
			'header'=>'Acciones',
		),
		
	),
)); 
	

?>
