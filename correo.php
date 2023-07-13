<?php

$paracorreo  ="kajero1068390997@gmail.com";
$titulo      ="Recordatorio de cita";
$mensaje     ="El paciente tiene cita en los proximos 5 dias";
$tucorreo    ="From: ddiltec97@gmail.com";
if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
  echo"correo enviado";
}else 
{
  echo "Error";
}
?>
