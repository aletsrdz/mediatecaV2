<?php
/* @var $this AcervoController */
/* @var $model Acervo */
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
 
		<legend>Copiar Acervo</legend>
 	
		<?php
			$Criteria = new CDbCriteria();
			$Criteria -> order = "idmaterial ASC";
			echo $form->dropDownListGroup(
                $model,
                'material',
                array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
	   			'widgetOptions' => array(
				
					'data' => CHtml::listData(Material::model()->findAll($Criteria),"idmaterial" ,"SelectMaterial"),	   				
					'htmlOptions' => array(
						'empty'=>'Seleccione Material',
						//'multiple' => true
					),
				)
			)
            ); 
         ?> 		
		<?php echo $form->textFieldGroup(
			$model,
			'isbn',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'issn',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>		

		<?php
			$Criteria = new CDbCriteria();
			$Criteria -> order = "ididioma ASC";
			echo $form->dropDownListGroup(
                $model,
                'idioma',
                array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
	   			'widgetOptions' => array(
				
					'data' => CHtml::listData(Idioma::model()->findAll($Criteria),"ididioma" ,"SelectIdioma"),	   				
					'htmlOptions' => array(
						'empty'=>'Seleccione Idioma',
						//'multiple' => true
					),
				)
			)
            ); 
        ?>    

		<?php echo $form->textFieldGroup(
			$model,
			'clave',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textAreaGroup(
			$model,
			'titulo',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('rows' => 5),
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

		<?php echo $form->textFieldGroup(
			$model,
			'autor_corporativo',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'edicion',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>		

		<?php echo $form->textFieldGroup(
			$model,
			'pie_imp',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'descripcion_fisica',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'serie',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'nota',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>


		<?php echo $form->textFieldGroup(
			$model,
			'descripcion_area',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'fondo',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textAreaGroup(
			$model,
			'resumen',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('rows' => 5),
				),
				'hint' => 'Escribe el resumen que identifica al acervo'
			)
		); ?>


		<?php echo $form->textFieldGroup(
			$model,
			'acento',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php echo $form->textFieldGroup(
			$model,
			'referencia',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>		

		<?php echo $form->textFieldGroup(
			$model,
			'dificultad',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'hint' => ''
			)
		); ?>

		<?php
			$Criteria = new CDbCriteria();
			$Criteria -> order = "apaterno ASC";
			echo $form->dropDownListGroup(
                $model,
                'cata',
                array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
	   			'widgetOptions' => array(
				
					'data' => CHtml::listData(Clientes::model()->findAll($Criteria),"id" ,"SelectClientes"),	   				
					'htmlOptions' => array(
						'empty'=>'Seleccione un catalogador',
						//'multiple' => true
					),
				)
			)
            ); 
         ?>

		<?php 
			echo $form->datePickerGroup(
                $model,
                'fechaingreso',
                
                array(                    
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),  
					'widgetOptions'=>array(	
						'options' => array(
								'language' => 'es',
								'format' => 'yyyy-mm-dd',
								'viewformat' => 'yyyy-mm-dd',
						),
					),
                    'hint' => 'Ingresa la fecha de ingreso',
                    'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
                )
            );

		 ?>

		 <?php
		echo $form->radioButtonListGroup(
			$model,
			'cons',
				array(
					'widgetOptions' => array(
						'data' => array(
							'N','S',
						),
					'hint' => ''	
					)
				)
			);
		 ?>


	</fieldset>
 
	<div class="form-actions">
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'label' => 'Copiar'
			)
		); ?>
		<?php $this->widget(
			'booster.widgets.TbButton',
			array('buttonType' => 'reset', 'label' => 'Limpiar')
		); ?>
	</div>
<?php
$this->endWidget();
unset($formcopiar);

?>



</div><!-- form -->