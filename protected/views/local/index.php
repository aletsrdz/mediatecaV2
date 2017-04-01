<?php
/* @var $this LocalController */


//echo "Estas autenticado como: ".Yii::app()->user->name;

?>

<!--<h1>Congratulations! You have successfully created LOCAL application.</h1>-->

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'horizontalForm',
		'type' => 'horizontal',
	)
); ?>
 
	<fieldset>
 
		<legend>Buscador</legend>
 
		<?php echo $form->textFieldGroup(
			$model,
			'busquedaEn',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ' Estoy en SITE/INDEX Escribe palabras claves para hacer una busqueda en los catálogos de Mediateca.'
			)
		); ?>
		
		<?php echo $form->dropDownListGroup(
			$model,
			'items',
			array(
				'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
				),
	   			'widgetOptions' => array(                    
	   				'data' => array('Titulo', 'Autor', 'Tema', 'Todos los campos'),
					'htmlOptions' => array('multiple' => true),
                    
				)
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
                'label' => 'Reset'
                
            )
		); ?>
	</div>
<?php
$this->endWidget();
unset($form);	
