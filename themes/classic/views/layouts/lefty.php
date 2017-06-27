<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-4">
		
			<h2></h2>
			<?php        
                $this->widget(
                        'booster.widgets.TbMenu',
                array(
                    'type' => 'list',
                    'items' => array(
                        array(
                            'label' => 'Coordinador', 'visible'=>Yii::app()->user->checkAccess("super"),
                            'itemOptions' => array('class' => 'nav-header')
                        ),
                        array('label' => 'Administradores',                              
							  'url'=> array('/clientes/index'),
                               'visible'=>Yii::app()->user->checkAccess("super")
                             ),
                        array('label' => 'Idiomas',                              
                              'url'=> array('/idioma/admin'),
                               'visible'=>Yii::app()->user->checkAccess("super")
                             ),
                        array('label' => 'Materiales',                              
                              'url'=> array('/material/admin'),
                               'visible'=>Yii::app()->user->checkAccess("super")
                             ),
                        array('label' => 'Dependencias',                              
                              'url'=> array('/dependencia/admin'),
                               'visible'=>Yii::app()->user->checkAccess("super")
                             ),                        
                        '',
                        array(
                            'label' => 'Aprendientes', 'visible'=>Yii::app()->user->checkAccess("asist"),
                            'itemOptions' => array('class' => 'nav-header')
                        ),
                        '',                        
                        array('label' => 'Asistencia', 'url' => '../asistencia/admin',  'visible'=>Yii::app()->user->checkAccess("asist")),
                        array('label' => 'Inscripción', 'url' => '../aprendiente2/create',  'visible'=>Yii::app()->user->checkAccess("asist")),
                        array('label' => 'Consulta', 'url' => '../aprendiente2/admin',  'visible'=>Yii::app()->user->checkAccess("asist")),
                        #array('label' => 'Imprimir Credencial', 'url' => '../aprendiente2/admin',  'visible'=>Yii::app()->user->checkAccess("asist")),
                        '',
                        array(
                            'label' => 'Acervo', 'visible'=>Yii::app()->user->checkAccess("admin"),
                            'itemOptions' => array('class' => 'nav-header')
                        ),
                        array('label' => 'Registrar', 'url' => '../acervo/create',  'visible'=>Yii::app()->user->checkAccess("admin")),
                        array('label' => 'Consulta', 'url' => '../acervo/admin',  'visible'=>Yii::app()->user->checkAccess("admin")),
                        array('label' => 'Etiquetas', 'url' => '../acervo/etiquetas',  'visible'=>Yii::app()->user->checkAccess("admin")),
                    )
                )
            );        
            ?>
		

	</div>
	<div id="content" class="span-24"> <!-- Para cambiar el tamaño del contenido en la pantalla  -->
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
