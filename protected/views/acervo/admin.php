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
		array('name' => 'clave'),
        array(
            'name'=>'idioma',                                       
            'htmlOptions'=>array('style'=>'width: 30px; text-align: center;'),            
            //'value' => '$data->idioma', 
            'value'=>function($data){
        		if ($data->idioma  == 1){
            		$language = 'Inglés';
        		}
        		else if ($data->idioma == 2){
            		$language = 'Francés';
        		}
        		else if ($data->idioma == 3){
            		$language = 'Italiano';
        		}
        		else if ($data->idioma == 4){
            		$language = 'Alemán';
        		}
        		else if ($data->idioma == 5){
            		$language = 'Portugués';
        		}
        		else if ($data->idioma == 6){
            		$language = 'Chino';
        		}
        		else if ($data->idioma == 7){
            		$language = 'Japonés';
        		}
        		else if ($data->idioma == 8){
            		$language = 'Árabe';
        		}
        		else if ($data->idioma == 9){
            		$language = 'Hebreo';
        		}
        		else if ($data->idioma == 10){
            		$language = 'Griego Moderno';
        		}
        		else if ($data->idioma == 11){
            		$language = 'Polaco';
        		}
        		else if ($data->idioma == 12){
            		$language = 'Coreano';
        		}
        		else if ($data->idioma == 13){
            		$language = 'Sueco';
        		}
        		else if ($data->idioma == 14){
            		$language = 'Catalán';
        		}
        		else if ($data->idioma == 19){
            		$language = 'Náhuatl';
        		}
        		else{
            		$language = 'Indefinido';
        		}
        		return $language;
        	},
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
