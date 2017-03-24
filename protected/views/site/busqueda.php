<h1>Aquí mostraré los resultados de la busqueda</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'acervo-grid',
	#'dataProvider'=>$model->search(),
	'dataProvider'=>$dataProvider,
	#'filter'=>$model,
	'columns'=>array(
		#'idacervo',
		#'material',
		#'isbn',
		#'issn',
		array(
            'name'=>'idioma',
            'header'=>'Idioma',
            'value' => '$data->idiomas->nombre',                 
            'htmlOptions'=>array('style'=>'width: 30px; text-align: center;'),            
        ),   
		'clave',		
		'titulo',
		'autor_personal',
		'autor_corporativo',
		'edicion',
		/*
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
		
		array(
			'class'=>'CButtonColumn',
		),
		*/
	),
)); ?>



