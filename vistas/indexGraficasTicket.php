<?php

include "../modelos/clsConexion.php";

$obj=new clsConexion();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Gráficas</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
    
         $('#grafico').highcharts({ 
         chart: { type: 'column'},
         title: { text: 'Control de Tickets'},
         xAxis: { categories: ['Tickets']},
         yAxis: { title: { text: 'Cantidad total de tickes' }},
         series: [


    { name: 'Cantidad total de Tickets', data: [

     <?php
      $sql = "SELECT COUNT(*) as cantidad FROM ticket;";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},

    { name: 'Tickets de Hardware', data: [

    <?php
      $sql="SELECT COUNT(*) as cantidad FROM cliente as c INNER JOIN ticket as t ON c.idCliente=t.idCliente INNER JOIN diagnostico as d on t.idTicket=d.idTicket INNER JOIN categoria as cat on cat.idCategoria=d.idCategoria WHERE cat.tipo='Hardware' AND d.estadoDiagnostico='Cerrado';";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]}, 

    { name: 'Tickets de Software', data: [

    <?php
      $sql="SELECT COUNT(*) as cantidad FROM cliente as c INNER JOIN ticket as t ON c.idCliente=t.idCliente INNER JOIN diagnostico as d on t.idTicket=d.idTicket INNER JOIN categoria as cat on cat.idCategoria=d.idCategoria WHERE cat.tipo='Software' AND d.estadoDiagnostico='Cerrado';";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},

    { name: 'Tickets cerrados', data: [

     <?php
      $sql = "SELECT COUNT(*) as cantidad FROM cliente as c INNER JOIN ticket as t ON c.idCliente=t.idCliente INNER JOIN diagnostico as d on t.idTicket=d.idTicket INNER JOIN categoria as cat on cat.idCategoria=d.idCategoria WHERE t.estado!=0 and d.estadoDiagnostico='Cerrado';";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},

    { name: 'Tickets pendientes', data: [

     <?php
      $sql = "SELECT COUNT(*) as cantidad FROM cliente as c INNER JOIN ticket as t ON c.idCliente=t.idCliente INNER JOIN diagnostico as d on t.idTicket=d.idTicket INNER JOIN categoria as cat on cat.idCategoria=d.idCategoria WHERE t.estado!=0 and d.estadoDiagnostico!='Cerrado';";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]}
         ]
       });    
     });  



        </script>
    </head>
    <body>

<script src="../Highcharts-4.1.5/js/highcharts.js"></script>
<script src="../Highcharts-4.1.5/js/modules/exporting.js"></script>
<script src="../Highcharts-4.1.5/js/modules/funnel.js"></script>

<div id="grafico" style="width:80%; height:600px; margin: 0 auto; margin-top: 30px;"></div>

    </body>
</html>

<!--
SELECT c.nombreCompleto, t.asunto, d.solucion, cat.tipo FROM cliente as c
INNER JOIN ticket as t
ON c.idCliente=t.idCliente
INNER JOIN diagnostico as d
on t.idTicket=d.idTicket
INNER JOIN categoria as cat
on cat.idCategoria=d.idCategoria
WHERE cat.tipo='Hardware'

SELECT c.nombreCompleto, t.asunto, d.solucion, cat.tipo FROM cliente as c
INNER JOIN ticket as t
ON c.idCliente=t.idCliente
INNER JOIN diagnostico as d
on t.idTicket=d.idTicket
INNER JOIN categoria as cat
on cat.idCategoria=d.idCategoria
WHERE cat.tipo='Software'

SELECT COUNT(*) as cantidad FROM cliente as c
INNER JOIN ticket as t
ON c.idCliente=t.idCliente
INNER JOIN diagnostico as d
on t.idTicket=d.idTicket
INNER JOIN categoria as cat
on cat.idCategoria=d.idCategoria
WHERE t.estado!=0 and d.estadoDiagnostico='Cerrado';

total de tickes Hardware
SELECT COUNT(*) as cantidad FROM cliente as c INNER JOIN ticket as t ON c.idCliente=t.idCliente INNER JOIN diagnostico as d on t.idTicket=d.idTicket INNER JOIN categoria as cat on cat.idCategoria=d.idCategoria WHERE cat.tipo='Hardware';

total de tickes Software
SELECT COUNT(*) as cantidad FROM cliente as c INNER JOIN ticket as t ON c.idCliente=t.idCliente INNER JOIN diagnostico as d on t.idTicket=d.idTicket INNER JOIN categoria as cat on cat.idCategoria=d.idCategoria WHERE cat.tipo='Software';

total de tickes
SELECT COUNT(*) as cantidad FROM cliente as c INNER JOIN ticket as t ON c.idCliente=t.idCliente INNER JOIN diagnostico as d on t.idTicket=d.idTicket INNER JOIN categoria as cat on cat.idCategoria=d.idCategoria WHERE t.estado!=0 and d.estadoDiagnostico='Cerrado';
-->
