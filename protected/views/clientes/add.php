<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'horizontalForm',
		'type' => 'horizontal',
	)
); ?>

<fieldset>
 
		<legend>Crear Administradores</legend>
 
		<?php echo $form->textFieldGroup(
			$model,
			'username',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'password',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'nombre',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'apaterno',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>		

		<?php echo $form->textFieldGroup(
			$model,
			'amaterno',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>		

		<?php echo $form->textFieldGroup(
			$model,
			'email',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->dropDownListGroup(
			$model,
			'tipo',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'data' => array('Escoge el tipo de administrador ...', 'super' => 'Super', 'admin' => 'Administrador', 'asist' => 'Asistente'),
					'htmlOptions' => array(),
				)
			)
		); ?>
</fieldset>

<div class="form-actions">
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'label' => 'Crear'
			)
		); ?>
		<?php $this->widget(
			'booster.widgets.TbButton',
			array('buttonType' => 'reset', 'label' => 'Limpiar')
		); ?>
	</div>
<?php
$this->endWidget();
unset($form);		
