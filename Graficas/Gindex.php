<?php
	session_start();
	if ($_SESSION['tpus'] ==1) {
		header("location: http://servtechweb.com.mx/FrontEnd/");
	} 
	include '../conexion.php';
	// invitado
	$querycont1= mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 1");
	$query1 = mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 1");
    while($datostable = mysqli_fetch_array($query1)){
        $cont = $datostable['count(*)'];
        // print_r($cont)."\r";
    }
   //sUPERVISOR
   $query2 = mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 2");
   while($datostable2 = mysqli_fetch_array($query2)){
       $cont2 = $datostable2['count(*)'];
    //    print_r($cont2)."\r";
   }
   //EJECUTIVO
   $query3 = mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 3");
   while($datostable3 = mysqli_fetch_array($query3)){
       $cont3 = $datostable3['count(*)'];
    //    print_r($cont3)."\r";
   }
     //OPERACIONAL
     $query4 = mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 4");
     while($datostable4 = mysqli_fetch_array($query4)){
         $cont4 = $datostable4['count(*)'];
        //  print_r($cont4)."\r";
     }
   //CLIENTES
   $query5 = mysqli_query($mysqli,"SELECT count(*) FROM usuariolog WHERE usuariolog.idtipousuario = 5");
   while($datostable5 = mysqli_fetch_array($query5)){
       $cont5 = $datostable5['count(*)'];
    //    print_r($cont5)."\r";
   }
  //consultoria
  $query6 = mysqli_query($mysqli,"SELECT count(*) FROM servicio WHERE servicio.idtiposervicio = 1 ");
  while($datostable6 = mysqli_fetch_array($query6)){
	  $cont6 = $datostable6['count(*)'];
   //    print_r($cont5)."\r";
  }
//Asesoria
$query7 = mysqli_query($mysqli,"SELECT count(*) FROM servicio WHERE servicio.idtiposervicio = 2");
while($datostable7 = mysqli_fetch_array($query7)){
	$cont7 = $datostable7['count(*)'];
 //    print_r($cont5)."\r";
}
//Desarrollo
$query8 = mysqli_query($mysqli,"SELECT count(*) FROM servicio WHERE servicio.idtiposervicio = 3");
while($datostable8 = mysqli_fetch_array($query8)){
	$cont8 = $datostable8['count(*)'];
 //    print_r($cont5)."\r";
}
//Capacitacion
$query9= mysqli_query($mysqli,"SELECT count(*) FROM servicio WHERE servicio.idtiposervicio = 4");
while($datostable9 = mysqli_fetch_array($query9)){
	$cont9 = $datostable9['count(*)'];
 //    print_r($cont5)."\r";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend │ ServTech</title>
	<link rel="icon" href="../img/lg1/ico-vent3.ico"/>
	<script type="text/javascript" src="jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="dist/Chart.bundle.min.js"></script>
     <!-- font-awasome -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css"> 
	<script type="text/javascript">
	$(document).ready(function(){
		var datos = {
			type: "pie",
			data : {
				datasets :[{
					data : [
						<?php print_r($cont)."\r"; ?>,
						<?php print_r($cont2)."\r"; ?>,
						<?php print_r($cont3)."\r"; ?>,
						<?php print_r($cont4)."\r"; ?>,
						<?php print_r($cont5)."\r"; ?>
					],
					backgroundColor: [
						"#003f5c",
						"#58508d",
						"#bc5090",
						"#ff6361",
						"#ffa600"
						
					],
				}],
				labels : [
					"Invitado",
					"Supervisor",
					"Ejecutivo",
					"Operacional",
					"Clientes",
				
				]
			},
			options : {
				responsive : true,
			}
		};
		var canvas = document.getElementById('chart').getContext('2d');
		window.pie = new Chart(canvas, datos);
	});
    </script>
    
    <!-- Segunda grafica -->

    <script type="text/javascript">
	$(document).ready(function(){
		
		var datos2 = {
			labels : ["Enero", "Febrero", "Marzo", "Abril", "Mayo"],
			datasets : [{
				label : "datos 1",
                backgroundColor : "rgba(220,220,220,0.5)",
				data : [4, 12, 9, 7, 5]
			},
			{

				label : "datos 2",
                backgroundColor : "rgba(151,187,205,0.5)",
				data : [10,7,-5,6,5]
			},
			{
				label : "datos 3",
                backgroundColor : "rgba(151,100,205,0.5)",
				data : [9,6,15,6,17]
			}
			]
		};
		var canvas2 = document.getElementById('chart2').getContext('2d');
		window.bar = new Chart(canvas2, {
			type : "bar",
			data : datos2,
			options : {
				elements : {
					rectangle : {
						borderWidth : 1,
						borderColor : "rgb(0,255,0)",
						borderSkipped : 'bottom'
					}
				},
				responsive : true,
				title : {
					display : true,
					text : "Prueba de grafico de barras"
				}
			}
		});
		setInterval(function(){
			var newData2 = [
				[getRandom(),getRandom(),getRandom(),getRandom()*-1,getRandom()],
				[getRandom(),getRandom(),getRandom(),getRandom(),getRandom()],
				[getRandom(),getRandom(),getRandom(),getRandom(),getRandom()],				
			];

			$.each(datos2.datasets, function(i, dataset){
				dataset.data = newData2[i];
			});
			window.bar.update();
		}, 5000);
		function getRandom(){
			return Math.round(Math.random() * 100);
		}


    });
    // Segunda parte 
    $(document).ready(function(){
		var datos3 = {
			type: "pie",
			data : {
				datasets :[{
					data : [
						<?php print_r($cont6)."\r"; ?>,
						<?php print_r($cont7)."\r"; ?>,
						<?php print_r($cont8)."\r"; ?>,
						<?php print_r($cont9)."\r"; ?>,
					
					],
					backgroundColor: [
						"#05C7F2",
						"#F2E85C",
						"#F28379",
						"#5CF2E3",
						
					],
				}],
				labels : [
					"Consultoria",
					"Asesoria",
					"Desarrollo",
					"Capacitación",
				
				]
			},
			options : {
				responsive : true,
			}
		};
		var canvas3 = document.getElementById('chart3').getContext('2d');
		window.pie = new Chart(canvas3, datos3);
	});
    </script>
    
    <!-- Segunda grafica -->

    <script type="text/javascript">
	$(document).ready(function(){
		
		var datos4 = {
			labels : ["Enero", "Febrero", "Marzo", "Abril", "Mayo"],
			datasets : [{
				label : "datos 1",
                backgroundColor : "rgba(255, 80, 47, .5)",
				data : [4, 12, 9, 7, 5]
			},
			{

				label : "datos 2",
                backgroundColor : "rgba(91, 209, 215, .5)",
				data : [10,7,-5,6,5]
			},
			{
				label : "datos 3",
                backgroundColor : "rgba(0, 77, 97, .5)",
				data : [9,6,15,6,17]
			}
			]
		};
		var canvas4 = document.getElementById('chart4').getContext('2d');
		window.bar = new Chart(canvas4, {
			type : "bar",
			data : datos4,
			options : {
				elements : {
					rectangle : {
						borderWidth : 1,
						borderColor : "rgb(0,255,0)",
						borderSkipped : 'bottom'
					}
				},
				responsive : true,
				title : {
					display : true,
					text : "Prueba de grafico de barras"
				}
			}
		});
		setInterval(function(){
			var newData4 = [
				[getRandom(),getRandom(),getRandom(),getRandom()*-1,getRandom()],
				[getRandom(),getRandom(),getRandom(),getRandom(),getRandom()],
				[getRandom(),getRandom(),getRandom(),getRandom(),getRandom()],				
			];

			$.each(datos2.datasets, function(i, dataset){
				dataset.data = newData4[i];
			});
			window.bar.update();
		}, 5000);
		function getRandom(){
			return Math.round(Math.random() * 100);
		}


    });
	</script>
</head>
<body>
<?php
 $page = 'graficas';
include ('../header1.php');
 ?>
    <div class="content">
        <section class="grafica1">
			<div class="contenedor-graf">
					<h1>Tipos de usuarios</h1>
                <div id="canvas-container" style="width:90%; ">
                    <canvas id="chart" width="500" height="350"></canvas>
                </div>
            </div>
            
            <div class="contenedor-graf2">
                <div id="canvas-container2" style="width:90%;">
                    <canvas id="chart2" width="500" height="350"></canvas>
                </div>
            </div>
		</section>
		<hr class="bg-g">
		<!-- segunda parte (graficas) -->
		
        <section class="grafica3">
			<div class="contenedor-graf3">
					<h1>Tipos de servicios</h1>
                <div id="canvas-container3" style="width:90%; ">
                    <canvas id="chart3" width="500" height="350"></canvas>
                </div>
            </div>
            
            <div class="contenedor-graf4">
                <div id="canvas-container4" style="width:90%;">
                    <canvas id="chart4" width="500" height="350"></canvas>
                </div>
            </div>
        </section>
     
    </div>
 

    
</body>
</html>