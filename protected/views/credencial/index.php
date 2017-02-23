<?php
/* @var $this LocalController */
echo "Estas autenticado como ".Yii::app()->user->name;

?>

<h1>Imprimir Credencial</h1>
  
  <br>
  <br>
  <br>
  <br>
   
 <?php echo CHtml::link('Código de barras - PDF', array('../protected/extensions/fpdf/ex.php'), array('target'=>'_blank'));?>
    

<?php #echo "<img src='../../images/espera.gif'>";?>