<h1>Editar Clientes</h1>

<?php  
$form=$this->beginWidget('CActiveForm');?>

<table>
	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'NOMBRE');?></td>
	<td><?php echo $form -> textField($model, 'username');?></td>
	<td><?php echo $form -> error($model, 'nombre');?></td>
	</div>
	</tr>
	
	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'APELLIDO PATERNO');?>
	<td><?php echo $form -> textField($model, 'apaterno');?>
	<td><?php echo $form -> error($model, 'apaterno');?>
	</div>
	</tr>
	
	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'APELLIDO MATERNO');?>
	<td><?php echo $form -> textField($model, 'amaterno');?>
	<td><?php echo $form -> error($model, 'apaterno');?>
	</div>
	</tr>

	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'PASSWORD');?>
	<td><?php echo $form -> textField($model, 'password');?>
	<td><?php echo $form -> error($model, 'pass');?>
	</div>
	</tr>

	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'EMAIL');?>
	<td><?php echo $form -> textField($model, 'email');?>
	<td><?php echo $form -> error($model, 'email');?>
	</div>
	</tr>

	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'TIPO');?>
	<td><?php echo $form -> textField($model, 'tipo');?>
	<td><?php echo $form -> error($model, 'tipo');?>
	</div>
	</tr>
	
	<tr>
	<td><?php echo CHtml::submitButton('Editar');?><td>
	</tr>
</table>
<?php
$this->endWidget();
?>
<?php echo CHtml::link('Atrás', array('index'));?>

<?php
/*
$this->widget(
    'booster.widgets.TbEditableField',
    array(
        'type' => 'text',
        'model' => $model,
        'attribute' => 'name', // $model->name will be editable
        'url' => $endpoint, //url for submit data
    )
);
*/
?>




