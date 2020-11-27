<head>
    <title>eMailer</title>
</head>
<style type="text/css">
p{
    font-size:small;
    color:#FFFFFF;
    font-family: 'Lucida Sans';
}
body{
    background-color:#000000;
}
input{
    font-size:small;
    color:#000000;
    font-family: 'Lucida Sans';
}
h2{
    color:#FFFFFF;
}
</style>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
  
  <table width="75%" height="250" border="1" align="center" background="http://3.bp.blogspot.com/_YmrRm70asRg/S9SWah8WRoI/AAAAAAAAACk/VF9eTjeS8Ec/s1600/wallpapers3dartvialien.jpg">
    <tr>
      <td><div align="center">
          <table width="95%" height="455" border="0">
            <tr>
              <td colspan="4"><div align="center">
                <h2>eMailer</h2>
                </div></td>
            </tr>
            <tr>
              <td height="64"><strong><p>Tu Correo: </p></td>
              <td><strong><p>
                <input name="correo" type="text" id="correo" size="30" value="">
                </p></td>
              <td><p>Tu Nombre: </p>
              
                <input name="nombre" type="text" id="nombre" size="30" value="">
                </p></td>
            </tr>
            <tr>
              <td><strong><p>Asunto: </p></td>
              <td><input name="asunto" type="text" id="asunto" size="30" value=""></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td width="49%" height="32" colspan="2"><div align="center">
                  <p>&nbsp;</p>
                  <p><strong><p>Mensaje</p></p>
                </div></td>
              <td width="51%" colspan="2"><div align="center">
                  <p>&nbsp;</p>
                  <p><strong><p>Correos</p></p>
                </div></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                  <textarea name="mensaje" cols="40" rows="15" id="mensaje"></textarea>
                </div></td>
              <td colspan="2"><div align="center">
                  <textarea name="correos" cols="40" rows="15" id="correos"></textarea>
                </div></td>
            </tr>
          </table>
          <strong></strong></div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center">
    <input type="submit" name="boton" value="Enviar"/>
  </p>
  <p>&nbsp;</p>
</form>

<?php


if(isset($_POST['boton'])){

    $correo=$_POST['correo'];
    $asunto=$_POST['asunto'];
    $nombre=$_POST['nombre'];
    $mensaje=$_POST['mensaje'];
    $mensaje2 = stripslashes($mensaje);
    $correos = nl2br($_POST['correos']);
    $correos2=$_POST['correos'];



//*****Headers****************************
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$headers .= "From: ".$nombre . " <" . $correo . ">\r\n"; 
$headers .= "To: ".$nombre . " <" . $correo . ">\r\n";
$headers .= "X-Priority: 1\r\n"; 
$headers .= "X-MSMail-Priority: High\r\n"; 
$headers .= "X-Mailer: PHP/" . phpversion(); 
//*************************************

$lineas = explode  ( '<br />'  , $correos );

foreach ($lineas as $indice => $valor) {
    $count=$indice+1;
   if($valor!=""){


  if(mail($valor,$asunto,$mensaje2,$headers)){
        echo('<p>'.$count.') '.$valor." Enviado</font><br/>");
   }else{
    
        echo('<p>No se Enviò desde el correo: '.$valor.'<br/>');
        break;
        }
    }
   
}

}

?>
