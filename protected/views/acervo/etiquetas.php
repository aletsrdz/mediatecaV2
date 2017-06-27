

<h1>Imprimir Etiquetas </h1>

<?php $this->widget(
    'booster.widgets.TbButton',
    array(
    	'buttonType' =>'link',
        'label' => 'Imprimir Etiquetas',
        'context' => 'primary',
        #'url' => 'array(generarCredencial, "nombre"=>$model->nombre, "idioma"=>$model->idioma, "id"=>$model->idaprendiente),',
        'url' => Yii::app()->createUrl('acervo/generarEtiquetas'),        
        'htmlOptions' => array(        	
        	'target' => '_blank',
        	'onclick' => 'js:bootbox.alert("Se ha generado las etiquetas!")',          	
        )	

    )
); echo ' ';
?>