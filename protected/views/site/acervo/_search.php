<?php
/* @var $this AcervoController */
/* @var $model Acervo */
/* @var $form CActiveForm */
?>

<div class="wide form">


<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'inlineForm',
		'type' => 'inline',

	)
); ?>
 
	<fieldset>
 
		
 
		<?php echo $form->textFieldGroup(
			$model,
			'material',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>
		
		<?php echo $form->textFieldGroup(
			$model,
			'idioma',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'titulo',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-20',
				),
				'hint' => ''
			)
		); ?>	
		<?php echo $form->textFieldGroup(
			$model,
			'autor_personal',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>	
		
		
<div class="form-actions">
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'label' => 'Buscar'
                
			)
        
		); ?>
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
                'buttonType' => 'reset',
                'label' => 'Limpiar'
                
            )
		); ?>
	</div>
<?php
$this->endWidget();
unset($form);	
?>
</div><!-- search-form -->