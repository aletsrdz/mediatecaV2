<h1>Listado de Administradores</h1>

<?php echo CHtml::link('Agregar Administradores', array('add'));?>

<!--
<table>
	<tr>
		
		<td><b>Nombre</b></td>
		<td><b>Email</b></td>
		<td><b>Ver</b></td>		
		<td><b>Editar</b></td>		
		<td><b>Borrar</b></td>		
		
	</tr>
	<?php foreach($clientes as $data):?>
	<tr>
		
		<td><?php echo $data->username;?></td>
		<td><?php echo $data->email;?></td>
		<td><?php echo CHtml::link('Ver', array('view', 'id'=>$data->id));?></td>
		<td><?php echo CHtml::link('Editar', array('edit', 'id'=>$data->id));?></td>
		<td><?php echo CHtml::link('Borrar', array('delete', 'id'=>$data->id), array('confirm'=>'Estas seguro que desear borrar'));?></td>
		
	</tr>
	<?php endforeach; ?>
</table>


-->

<?php 
    foreach($clientes as $data):
       $arrayClientes1[] = array("id"=>$data->id,"username"=>$data->username,"email"=>$data->email);
     endforeach; 

$gridDataProvider = new CArrayDataProvider($arrayClientes1);
 
// $gridColumns


$gridColumns = array(
	array('name'=>'username', 'header'=>'Usuario', 'htmlOptions'=>array('style'=>'width: 60px')),	
	array('name'=>'email', 'header'=>'Email'),		
	array(
		'htmlOptions' => array('nowrap'=>'nowrap'),
		'class'=>'booster.widgets.TbButtonColumn',		
		'viewButtonUrl'=>'Yii::app()->createUrl("/clientes/view", array("id"=>$data["id"]))',						
		'updateButtonUrl'=>'Yii::app()->createUrl("/clientes/edit", array("id"=>$data["id"]))',
		'deleteButtonUrl'=>'Yii::app()->createUrl("/clientes/delete", array("id"=>$data["id"]))',
	)
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





