<?php
/* @var $this AprendienteController */
/* @var $model Aprendiente */
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
 
		
 
		<?php 
            echo $form->textFieldGroup(
                $model,
                'nombre',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                   
                )
            ); 		
            echo $form->textFieldGroup(
                $model,
                'apaterno',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 		        
            echo $form->textFieldGroup(
                $model,
                'amaterno',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 

            echo $form->textFieldGroup(
                $model,
                'rfc',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 				

			echo $form->textFieldGroup(
                $model,
                'numcuenta',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 	
			
            echo $form->textFieldGroup(
                $model,
                'email',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 	
						
			echo $form->radioButtonListGroup(
			$model,
			'sexo',
				array(
					'widgetOptions' => array(
						'data' => array(
							'Masculino','Femenino',
						)
					)
				)
			);
			
			echo $form->textFieldGroup(
                $model,
                'calle',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 	
        
            echo $form->textFieldGroup(
                $model,
                'colonia',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 	
			
			 echo $form->textFieldGroup(
                $model,
                'municipio',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 	
            echo $form->textFieldGroup(
                $model,
                'estado',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 

			echo $form->datePickerGroup(
                $model,
                'fechanacimiento',
                
                array(                    
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),  
					'widgetOptions'=>array(	
						'options' => array(
								'language' => 'es',
								'format' => 'yyyy-mm-dd',
								'viewformat' => 'yyyy-mm-dd',
						),
					),
                    'hint' => 'Ingresa la fecha de nacimiento',
                    'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
                )
            ); 		

            echo $form->textFieldGroup(
                $model,
                'telefono',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 	 			
				
            echo $form->dropDownListGroup(
                $model,
                'categoria',
                array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
	   			'widgetOptions' => array(
					'data' => CHtml::listData(Categoria::model()->findAll(),"idcategoria" ,"SelectCategoria"),
	   				//'data' => array('Estudiante', 'Académico', 'Administrativo', 'Tesista', 'Trabajador de confianza', 'otro'),
					'htmlOptions' => array(
						'empy'=>'Seleccione Categoria',
						//'multiple' => true
					),
				)
			)
            ); 
          
        
			echo $form->dropDownListGroup(
					$model,
					'dependencia',
					array(
						'wrapperHtmlOptions' => array('class' => 'col-sm-8'), 
						'widgetOptions' => array(  
							'data' => CHtml::listData(Dependencia::model()->findAll(),"dependencia" ,"SelectDependencia"),
							 #'data'=> $model->getMenuDependencia(),                         
							 'htmlOptions' => array(
									'empty'=>'Seleccione Dependencia',
									'ajax'=>array
										(
											'url'=>$this->createUrl("subdepByDep"),
											'type'=>"POST",                                    
											'update'=>"#Aprendiente_subdependencia"
										),
										
							 )  
						
						)
							 
					)
					
			);
                          
            /*        
            echo $form->dropDownListGroup(
                $model,
                'subdependencia',
               array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-8'), 
                    'widgetOptions' => array(
                    //'data' => $model ->getMenuSubdependencia($model->dependencia),
                    //  'data' => $model ->getNumeroDependencia(),
                        'htmlOptions' => array(
                        "empty"=>"Seleccione Subdependencia",
                        )
                    ),
                )
            ); 	        
			*/
			echo $form->textAreaGroup(
                $model,
                'observaciones',
                array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-5',
                    ),
                    'widgetOptions' => array(
                        'htmlOptions' => array('rows' => 5),
                    )
                )
            ); 	                                                 
            
            echo $form->textFieldGroup(
                $model,
                'codiogopostal',
                array(
                    'wrapperHtmlOptions' => array('class' => 'col-sm-5'),                    
                )
            ); 	
			
			//$this->endWidget(); // endWidget
        ?>
   
	<div class="form-actions">
		<?php $this->widget(
			'booster.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'context' => 'primary',
				'label' => 'Enviar'
			)
		); ?>
		<?php $this->widget(
			'booster.widgets.TbButton',
			array('buttonType' => 'reset', 'label' => 'Limpiar')
		); ?>
	</div>
	</fieldset>
<?php
$this->endWidget();
unset($form);
?>