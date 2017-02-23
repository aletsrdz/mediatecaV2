<h1>Crear Clientes</h1>

<?php  
$form=$this->beginWidget('CActiveForm');?>
<table>
	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'USERNAME');?></td>
	<td><?php echo $form -> textField($model, 'username');?></td>
	<td><?php echo $form -> error($model, 'username');?></td>
	</div>
	</tr>
	
	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'PASSWORD');?></td>
	<td><?php echo $form -> textField($model, 'password');?></td>
	<td><?php echo $form -> error($model, 'pass');?></td>
	</div>
	</tr>
	
	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'NOMBRE');?></td>
	<td><?php echo $form -> textField($model, 'nombre');?></td>
	<td><?php echo $form -> error($model, 'nombre');?></td>
	</div>
	</tr>

	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'APELLIDO PATERNO');?></td>
	<td><?php echo $form -> textField($model, 'apaterno');?></td>
	<td><?php echo $form -> error($model, 'apaterno');?></td>
	</div>
	</tr>

	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'APELLIDO MATERNO');?></td>
	<td><?php echo $form -> textField($model, 'amaterno');?></td>
	<td><?php echo $form -> error($model, 'amaterno');?></td>
	</div>
	</tr>

	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'EMAIL');?></td>
	<td><?php echo $form -> textField($model, 'email');?></td>
	<td><?php echo $form -> error($model, 'email');?></td>
	</div>
	</tr>

	<tr>
	<div>
	<td><?php echo $form -> labelEx($model, 'TIPO');?></td>
	<td><?php echo $form -> textField($model, 'tipo');?></td>
	<td><?php echo $form -> error($model, 'tipo');?></td>
	</div>
	</tr>

	<tr>	
	<td><?php echo CHtml::submitButton('Crear');?></td>
	</tr>
</table>

<?php
$this->endWidget();
?>
