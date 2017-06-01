<?php
/* @var $this MaterialController */
/* @var $model Material */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php /** @var TbActiveForm $form */
	    $form = $this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
			'id' => 'horizontalForm',
			'type' => 'horizontal',
		)
	); ?>

		<fieldset>

			<legend>Crear Material</legend>


			<?php
	            echo $form->textFieldGroup(
	                $model,
	                'descripcion',
	                array(
	                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
	                )
	            ); 
	        ?>
	        
	<div class="form-actions">
			<?php $this->widget(
				'booster.widgets.TbButton',
				array(
					'buttonType' => 'submit',
					'context' => 'primary',
					'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',					
				)
			); ?>
			
		</div>
		</fieldset>
	<?php
	$this->endWidget();
	unset($form);
	?>           
</div><!-- form -->