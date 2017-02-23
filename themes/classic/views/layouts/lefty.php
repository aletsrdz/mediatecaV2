<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-6">
		
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
                        '',
                        array(
                            'label' => 'Acceso', 'visible'=>Yii::app()->user->checkAccess("asist"),
                            'itemOptions' => array('class' => 'nav-header')
                        ),
                        '',                        
                        array('label' => 'Asistencia', 'url' => '../asistencia/index',  'visible'=>Yii::app()->user->checkAccess("asist")),
                        array('label' => 'Inscripción', 'url' => '../aprendiente2/create',  'visible'=>Yii::app()->user->checkAccess("asist")),
                        array('label' => 'ReInscripción', 'url' => '../credencial/index',  'visible'=>Yii::app()->user->checkAccess("asist")),
                        array('label' => 'Imprimir Credencial', 'url' => '../aprendiente2/admin',  'visible'=>Yii::app()->user->checkAccess("asist")),
                        '',
                        array(
                            'label' => 'Acervo', 'visible'=>Yii::app()->user->checkAccess("admin"),
                            'itemOptions' => array('class' => 'nav-header')
                        ),
                        array('label' => 'Registrar', 'url' => '../acervo/index',  'visible'=>Yii::app()->user->checkAccess("admin")),
                        array('label' => 'Busqueda', 'url' => '../acervo/index',  'visible'=>Yii::app()->user->checkAccess("admin")),
                    )
                )
            );        
            ?>
		

	</div>
	<div id="content" class="span-21">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
