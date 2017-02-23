<h1>Detalle de la Tarea</h1>

<!--<b>Nombre</b> <?php #echo $model->username;?><br>
<b>Apellido Paterno</b> <?php #echo $model->apaterno;?><br>
<b>Apellido Materno</b>  <?php #echo $model->amaterno;?><br>
<b>Password</b>  <?php #echo $model->password;?><br>
<b>Email</b> <?php #echo $model->email;?><br>
<b>Tipo</b> <?php #echo $model->tipo;?><br>

-->

<?php 
    
    $arraydetalle[] = array("id"=>$model->id, "username"=>$model->username, "password"=>$model->password, "nombre"=>$model->nombre, "apaterno"=>$model->apaterno, "amaterno"=>$model->amaterno, "email"=>$model->email, "tipo"=>$model->tipo);
	
	
?>

	
<?php     

$gridDataProvider = new CArrayDataProvider($arraydetalle);
$gridColumns = array(
	array('name'=>'username', 'header'=>'Usuario', 'htmlOptions'=>array('style'=>'width: 60px')),	
	array('name'=>'password', 'header'=>'Password'),		
	array('name'=>'nombre', 'header'=>'Nombre'),		
	array('name'=>'apaterno', 'header'=>'Apellido Paterno'),		
	array('name'=>'amaterno', 'header'=>'Apellido Materno'),			
	array('name'=>'email', 'header'=>'Email'),
	array('name'=>'tipo', 'header'=>'Tipo')
);

$this->widget(
    'booster.widgets.TbGridView',
    array(
        'type' => 'striped',
        'dataProvider' => $gridDataProvider,
        'template' => "{items}",
        'columns' => $gridColumns,		
    )
);


?>

<?php echo CHtml::link('Atrás', array('index'));?>


