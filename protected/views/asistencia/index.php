<?php
/* @var $this LocalController */
echo "Estas autenticado como".Yii::app()->user->name;
$baseUrl = Yii::app()->baseUrl; 
#echo $baseUrl."</br>";
$cs = Yii::app()->getClientScript();        
$cs->registerScriptFile($baseUrl.'/js/alertaBarras.js');

?>



<h1>ASISTENCIA</h1>


 
   Escanear código de barras:
  <input type="text" name="valor" id="codigo" value=""/>
  <br/>
<!--<button id="boton">Obtener Hora de Servidor</button>-->
<div id="lblHoraServidor"></div>

<?php //echo"<img src='../../images/espera.gif'>";?>


