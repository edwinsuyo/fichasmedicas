<?php 

   require '../Smarty/Smarty.class.php';  
   $smarty = new Smarty;  
   $smarty->compile_check = true;
   $smarty->debugging = false;
   #Visualizar la informacion en el TEMPLATE
   $smarty->display('../templates/Login.html');		

?>