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
         title: { text: 'Tickets por Departamento'},
         xAxis: { categories: ['Tickets por departamento']},
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

    { name: 'Dirección General', data: [

    <?php
      $sql="SELECT COUNT(*) as cantidad  FROM cliente as c INNER JOIN departamento as d ON c.idDepartamento=d.idDepartamento INNER JOIN ticket as t ON t.idCliente=c.idCliente WHERE c.idDepartamento=1;";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]}, 

    { name: 'Administración y Recursos Humanos', data: [

    <?php
      $sql="SELECT COUNT(*) as cantidad  FROM cliente as c INNER JOIN departamento as d ON c.idDepartamento=d.idDepartamento INNER JOIN ticket as t ON t.idCliente=c.idCliente WHERE c.idDepartamento=2;";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},

    { name: 'Producción', data: [

     <?php
      $sql = "SELECT COUNT(*) as cantidad  FROM cliente as c INNER JOIN departamento as d ON c.idDepartamento=d.idDepartamento INNER JOIN ticket as t ON t.idCliente=c.idCliente WHERE c.idDepartamento=3;";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},

    { name: 'Finanzas y Contabilidad', data: [

     <?php
      $sql = "SELECT COUNT(*) as cantidad  FROM cliente as c INNER JOIN departamento as d ON c.idDepartamento=d.idDepartamento INNER JOIN ticket as t ON t.idCliente=c.idCliente WHERE c.idDepartamento=4;";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},

    { name: 'Publicidad y Mercadotecnia', data: [

     <?php
      $sql = "SELECT COUNT(*) as cantidad  FROM cliente as c INNER JOIN departamento as d ON c.idDepartamento=d.idDepartamento INNER JOIN ticket as t ON t.idCliente=c.idCliente WHERE c.idDepartamento=5;";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},

    { name: 'Infromática', data: [

     <?php
      $sql = "SELECT COUNT(*) as cantidad  FROM cliente as c INNER JOIN departamento as d ON c.idDepartamento=d.idDepartamento INNER JOIN ticket as t ON t.idCliente=c.idCliente WHERE c.idDepartamento=6;";

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},

    { name: 'Atención al Cliente', data: [

     <?php
      $sql = "SELECT COUNT(*) as cantidad  FROM cliente as c INNER JOIN departamento as d ON c.idDepartamento=d.idDepartamento INNER JOIN ticket as t ON t.idCliente=c.idCliente WHERE c.idDepartamento=7;";

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
  Clientes por departamento
  SELECT c.nombreCompleto, c.idCliente, c.idDepartamento FROM cliente as c INNER JOIN departamento as d ON c.idDepartamento=d.idDepartamento WHERE c.idDepartamento=6;   
  **************1,2,3,4,5,6,7***************
  
  Tickets por departamento
  SELECT t.idTicket, t.asunto, c.nombreCompleto, c.idCliente, c.idDepartamento FROM cliente as c INNER JOIN departamento as d ON c.idDepartamento=d.idDepartamento INNER JOIN ticket as t ON t.idCliente=c.idCliente WHERE c.idDepartamento=1; 
  **************1,2,3,4,5,6,7***************

  total de tickes
  SELECT COUNT(*) as cantidad FROM ticket;
   
-->
