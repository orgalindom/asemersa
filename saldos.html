<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo de clientes Asesoria y Mercadeo S.A.</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Andika:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/style.css">    
</head>
<body>
<header class="header">
        <a href="index.php">
            <img class="header__logo" src="img/logomarl.png" alt="Logotipo">
        </a>
    </header>

<main>
    <h3 class="header">Saldo de Clientes</h3>

        <?php foreach($errores as $error): ?>
            <?php echo $error ?>
        <?php endforeach; ?>
        
    <form class="contenedor" method="POST" action="saldos.php">
        <div>
           <label>Codigo cliente</label>
           <input class="input-text " type="text" placeholder="Codigo cliente " name="codcliente">  
           <input class="boton " type="submit" value="Enviar" name="buscar">    
        </div>
    </form>

</main>
</body>
</html>

<?php

require 'includes/database.php';

$errores = [];

if(isset($_POST['buscar'])) {
    //echo "<pre>";
    //var_dump($_POST);
    //echo "</pre>";

    if(!$db) {
        echo "no hay conexion exitosa";
        exit;
    }else{
        //echo "si entre";
    }

    $resultado="";
    echo $resultado;
    $mcliente = mysqli_real_escape_string($db, $_POST['codcliente']);

    if(!$mcliente){
        $errores[] = "Debe colocar un codigo de cliente";
    }
    
    if(empty($errores)) {
        $query = "Select nom1cliente,status from clientes where codcliente = '$mcliente' ";
        $resultado = mysqli_query($db,$query);
        $ncliente = mysqli_fetch_assoc($resultado);
        echo "<div style ='font:2rem Andika,tahoma,sans-serif;color:#fff';> <center> ".$ncliente['nom1cliente'];
        if($ncliente['status']=="M"){
            echo "<div style ='font:3rem tahoma,sans-serif;color:#fff;font-weight: bold';> <center> CLIENTE MOROSO"."<p> <font color=black size='2rem'> </p>";            
        }else{
            echo "<br> <div style ='font:2rem tahoma,sans-serif;color:#cf010b';> <center> "."<p> <font color=black size='2rem'> </p>";                        
        }
        $consulta = "SELECT serie,cast(fnumero as char) factura,date_format(ffecha,'%d/%m/%Y') as fecha,fvalor,fiva,(fvalor+fiva) Monto,
        (fabonosa+fabonosm+valortempsup+fabonosai+fabonosmi+ivatempsup) as Abono, (fabonosa+fabonosm+ValorTempSup) AS AbonoValor,
        (fabonosai+fabonosmi+IvaTempSup) AS AbonoIva,(fvalor+fiva)-(fabonosa+fabonosm+valortempsup+fabonosai+fabonosmi+ivatempsup) as saldo FROM Cargos WHERE CodCliente= '$mcliente' AND
        fabonosa+fabonosm+fabonosmi+fabonosai+ValorTempSup+IvaTempSup < fvalor+fiva ";
        
        $facturas = mysqli_query($db,$consulta);
        $saldototal = 0.00;
        $saldos = array();
        while($res=mysqli_fetch_array($facturas)){
            $valor = $res['saldo'];
            array_push($saldos,$valor);
        }
        $saldototal = array_sum($saldos);
        $cuantos = count($saldos)+1;
        $facturas = mysqli_query($db,$consulta);
        //array_push($facturas ['saldo'], $saldototal);
       
        }
       
}
?>
<div class="contenedor-tabla">
<?php
if($ncliente['status']!="M"){
 $colortable = '<table align="center" class="content-table letra-bold mytable" width="100%">';
 $pie = '<tfoot class="tfoot">';

}else{
    $colortable = '<table align="center" class="content-tablem letra-bold mytable" width="100%">';    
    $pie = '<tfoot class="tfootm">';

}

echo $colortable;
?>
        <thead>
            <tr> 
                <th width="11.8%" align="center">SERIE</th>
                <th width="11.8%" align="center">FACTURA</th>
                <th width="11.8%" align="center">FECHA</th>
                <th width="11.8%" align="center">MONTO FAC </th>
                <th width="11.8%" align="center">ABONOS</th>                                                
                <th width="11.8%" align="center">SALDO</th>                                                                
            </tr>
        </thead>
</table>

<table align="center" class="content-table letra-bold" width="100%">
    <tbody>
    <?php
    $van=1;
     while($res=mysqli_fetch_array($facturas)){ ?>
          <tr>
        <td width="12.5%" align="center"> <?php echo $res['serie'] ?> </td>
        <td width="12.5%" align="center"> <?php echo $res['factura'] ?> </td>
        <td width="12.5%" align="center"> <?php echo $res['fecha'] ?> </td>
        <td width="12.5%" align="right"> <?php echo number_format($res['Monto'], 2, '.', ',');?> </td>
        <td width="12.5%" align="right"> <?php echo number_format($res['Abono'], 2, '.', ','); ?> </td>
        <td width="12.5%" align="right"> <?php echo  number_format($res['saldo'], 2, '.', ','); ?> </td>                                        
        <?php $van++; ?>
    </tr>
    <?php }
    ?>
     
    </tbody>
    <?php if($van = $cuantos){ ?>
        <tfoot>
            <tr>
            <th colspan="5">Saldo total a la fecha</th>
            <td align="right"><?php echo  number_format($saldototal, 2, '.', ',');?></td>
            <?php $van++; ?>
            </tr>
        </tfoot>
    <?php }
        if($facturas->num_rows==0) { ?>
            <tr>
                <td> <center> </td>
                <td> <center> NO hay saldo </td>
                <td> <center> </td>                
            </tr>
<?php }
?>
   
</table>
</div>
<?php

