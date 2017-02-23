<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'formulario',
		'type' => 'horizontal',		
		'enableAjaxValidation' => true,
	)
); ?>
 
	<fieldset>
 
		<legend>Acceso a Mediateca</legend>
		<h3><?php $msg?></h3>
 
		<?php echo $form->textFieldGroup(
			$model,
			'codigo',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				
			)
		); ?>
		
		</fieldset>
 
	<div class="form-actions">
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'label' => 'Submit'
			)
		); ?>
		<?php $this->widget(
			'booster.widgets.TbButton',
			array('buttonType' => 'reset', 'label' => 'Reset')
		); ?>
	</div>
<?php
$this->endWidget();
unset($form);