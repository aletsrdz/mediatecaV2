<?php
/* @var $this Aprendiente2Controller */
/* @var $model Aprendiente2 */

$this->breadcrumbs=array(
	'Aprendiente'=>array('index'),
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

<?php 
$idioma = CHtml::encode($model->idioma);
$Criteria = new CDbCriteria();
$Criteria->select = "ididioma";
#$Criteria->condition("ididioma=".$idioma);
$Criteria->condition = "ididioma=$idioma";
$languaje = idioma::model()->findAll($Criteria);

echo $languaje->nombre;
$this->widget('zii.widgets.CDetailView', array(
	#'data'=>$model,
	'data'=>array(
				'idaprendiente'=>CHtml::encode($model->idaprendiente),
				'fecharegistro'=>CHtml::encode($model->fecharegistro),
				'fechainscripcion'=>CHtml::encode($model->fechainscripcion),
				'cta_rfc'=>CHtml::encode($model->cta_rfc), 
				'nombre'=>CHtml::encode($model->nombre),
				'categoria'=>CHtml::encode($model->categoria), 
				'idioma'=>CHtml::encode($model->idioma),
				#'idioma'=>CHtml::listData(Idioma::model()->find($Criteria),"ididioma" ,"nombre"),
				'procedencia'=>CHtml::encode($model->procedencia),
				'fechanacimiento'=>CHtml::encode($model->fechanacimiento),
				'sexo'=>CHtml::encode($model->sexo),
				'inscripcion'=>CHtml::encode($model->inscripcion),
				'numinscripcion'=>CHtml::encode($model->numinscripcion)
			),	
				
	
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
)); 
$idioma = CHtml::encode($model->idioma);
 echo 'El idioma es: '.$idioma."</br>";
 echo 'La Categoria es: '.CHtml::encode($model->categoria)."</br>";
 $array = (array)$model;
 var_dump($array);
 $aprendiente = array();
/*foreach($array as  $idaprendiente => $record) { //Este es un ciclo para recuperar el resultado de la consulta, se recupera el dato de idAprendiente
	$aprendiente[] = $record->idaprendiente;
}
*/

Yii::app()->end();
?>

<br>
<?php echo CHtml::link('Código de barras - PDF', array('generarCredencial', "nombre"=>$model->nombre, "idioma"=>$model->idioma, "id"=>$model->idaprendiente), array('target'=>'_blank'));?>
</br>