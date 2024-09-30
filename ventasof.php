<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas contado Asesoria y Mercadeo S.A.</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Andika:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/style.css">    
</html>    

</head>
<body>
<header class="header">
        <a href="index.php">
            <img class="header__logo" src="img/logomarl.png" alt="Logotipo">
        </a>
    </header>


<main>

<!--    <h3 class="header">Ventas totales de oficinas</h3>  -->

        <?php foreach($errores as $error): ?>
            <?php echo $error ?>
        <?php endforeach; ?>
        
    <form class="contenedor" method="POST" action="ventasof.php">
        <div>
           <label for="startDate">Rango de fechas:   </label>
           <br>
           <input class="input-text" type="date" value="<?php echo date("Y-m-d");?>" name="vmes1" />           
           <input class="input-text" type="date" value="<?php echo date("Y-m-d");?>" name="vmes2" />           
           <br>
           <input class="boton " type="submit" value="Enviar" name="buscar">    
        </div>
    </form>
    <div class="contenedor-tabla"> 
    <table align="center" class="content-table letra-bold mytable" width="100%" >
        <thead>
            <tr> 
                <th width="7%" align="left">Codigo</th>
                <th width="35%" align="center">Oficina</th>
                <th width="13%" align="center">Venta</th>
                <th width="13%" align="center">Iva Venta</th>                                                
                <th width="13%" align="center">Total Venta</th>                                                                
            </tr>
        </thead>
    </table>
        </div>
</main>
</body>
</html>

<?php
date_default_timezone_set('America/Guatemala');
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
    $mventa = mysqli_real_escape_string($db, $_POST['vmes1']);
    $mventa2 = mysqli_real_escape_string($db, $_POST['vmes2']);
       
    if(!$mventa){
        $errores[] = "Debe colocar un codigo de cliente";
    }
    
    if(empty($errores)) {
        //$inicio = date("Y-m-d". ' 00:00:00', strtotime( $mventa));
        //$inicior = date("Y-m-d", strtotime( $mventa));
        //$mes = intval(date('m',strtotime($inicio)));
        //$anio = intval(date('o',strtotime($inicio)));
        //$day = date("d", mktime(0,0,0, $mes+1, 0, $anio));
        //$fi =  date('Y-m-d', mktime(0,0,0, $mes, $day, $anio));       
        //$final = date("Y-m-d". ' 23:59:59', strtotime( $fi));
        //$finalr = date("Y-m-d", strtotime( $fi));

        $inicio = date("Y-m-d". ' 00:00:00', strtotime( $mventa));
        $inicior = date("Y-m-d", strtotime( $mventa));
        $final = date("Y-m-d". ' 23:59:59', strtotime( $mventa2));
        $finalr = date("Y-m-d", strtotime( $mventa2));
        $consulta = "SELECT a.tienda,b.nombodega,sum(a.total) AS venta,sum(a.iva) AS iva ,sum(a.total+a.iva) as vtotal
          FROM factura a LEFT JOIN bodega b ON a.Tienda = b.Codbodega 
          WHERE fecha BETWEEN '$inicio' AND '$final' AND anulada <> 'A' and credito = 'N' GROUP BY a.tienda,a.credito";

        $facturas = mysqli_query($db,$consulta);

        $tventa = 0.00;
        $tiva = 0.00;
        $tvtotal = 0.00;
        $dato = array();
        while($res=mysqli_fetch_array($facturas)){
            $mvalor = $res['venta'];
            array_push($dato,$mvalor);
        }
        $tventa = array_sum($dato);
        $cuantos = count($dato)+1;

        $facturas->data_seek(0);
        $dato = array();
        while($res=mysqli_fetch_array($facturas)){
            $mvalor = $res['iva'];
            array_push($dato,$mvalor);
        }
        $tiva = array_sum($dato);
        $facturas->data_seek(0);
        $dato = array();
        while($res=mysqli_fetch_array($facturas)){
            $mvalor = $res['vtotal'];
            array_push($dato,$mvalor);
        }
        $tvtotal = array_sum($dato);
        $facturas->data_seek(0);        

        //array_push($facturas ['saldo'], $saldototal);
        
        }
       
}
?>
<div class="contenedor-tabla">
<table align="center" class="content-table letra-bold" width="100%" >
    <tbody>
    <?php
    $van=1;
     while($res=mysqli_fetch_array($facturas)){ ?>
          <tr>
        <td width="7%"> <?php echo $res['tienda'] ?> </td>
        <td width="35%" align="rigth"> <?php echo $res['nombodega'] ?> </td>
        <td width="13%" align="right"> <?php echo number_format($res['venta'], 2, '.', ','); ?> </td>
        <td width="13%" align="right"> <?php echo number_format($res['iva'], 2, '.', ','); ?> </td>
        <td width="13%" align="right"> <?php echo number_format($res['vtotal'], 2, '.', ','); ?> </td>                                        
        <?php $van++; ?>        
    </tr>
    <?php }
    ?>

    </tbody>

    <?php if($van = $cuantos){ ?>
        <tfoot>
            <tr>
            <th colspan="1" align="left">Total</th>
            <td align="right"><?php echo "     "?></td>
            <td align="right"><?php echo number_format($tventa, 2, '.', ',');?></td>
            <td align="right"><?php echo number_format($tiva, 2, '.', ',');?></td>            
            <td align="right"><?php echo number_format($tvtotal, 2, '.', ',');?></td>            
            <?php $van++; ?>
            </tr>
        </tfoot>
        <?php }
    ?>


    <?php     
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
