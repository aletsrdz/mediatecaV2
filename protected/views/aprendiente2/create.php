<?php
/* @var $this Aprendiente2Controller */
/* @var $model Aprendiente2 */

$this->breadcrumbs=array(
	'Aprendiente2'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Aprendiente2', 'url'=>array('index')),
	array('label'=>'Manage Aprendiente2', 'url'=>array('admin')),
);
?>

<h1>Crear Aprendiente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>