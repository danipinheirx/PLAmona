<?php
 session_start();
?>
<html>
<head>
<link rel="stylesheet" href="grafico_css.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <style>
    
   		 #caixinhaLegenda2{
    		background-color:#f05b4f;
    		width: 10px;
   			height: 10px;
    		border: solid 1px black;
    		color: white;
    		border-color: black;
    		float: left;
		}
		#caixinhaLegenda1{
   			 background-color: #557299;
   			 width: 10px;
    		 height: 10px;
    		 border: solid 1px black;
             color: white;
             border-color: black;
             float: left;
		}


        .ct-series-a .ct-line {
            /* Set the colour of this series line */
            stroke: #557299;
            /* Control the thikness of your lines */
            stroke-width: 5px;
            /* Create a dashed line with a pattern */
        }
        .ct-series-a .ct-point {
            /* Colour of your points */
            stroke: #0d2c58;
        }
/*
        .ct-grid {
            stroke: rgba(68, 68, 68,68);
            stroke-width: 1px;
            stroke-dasharray: 2px
        }
*/
        .ct-label {
            fill: rgba(0, 0, 0, .4);
            color: rgba(68, 68, 68,68);
            font-size: .75rem;
        line-height: 1
        }
    </style>
<meta charset = "utf-8">
<title>Graficos</title>
</head>
<?php
    include ("conexao.php");
    
    /*if(isset($_POST['Gerar'])){
        $quantidade1=$_POST['medicoes1'];
        $quantidade2=$_POST['medicoes2'];
    }
    echo $quantidade1;
    echo $quantidade2;*/
    
   
    $formato="mes";
 	if (empty($_SESSION['medicoes1'])){
    $quantidade1=0;
    } else{
    $quantidade1=$_SESSION['medicoes1'];
    }
    if (empty($_SESSION['varQuantidade2'])){
    $quantidade2=0;
    } else{
    $quantidade2=$_SESSION['varQuantidade2'];
    }
    
    
    if(empty($quantidade1)){
        $mes1="";
    } else if ($quantidade1==1){
    	$mes1="Janeiro";
    } else if($quantidade1==2){
 		$mes1="Fevereiro";   	
    } else if($quantidade1==3){
		$mes1="Março";
    } else if($quantidade1==4){
		$mes1="Abril";
    } else if($quantidade1==5){
		$mes1="Maio";
    } else if($quantidade1==6){
		$mes1="Junho";
    } else if($quantidade1==7){
		$mes1="Julho";
    } else if($quantidade1==8){
		$mes1="Agosto";
    } else if($quantidade1==9){
		$mes1="Setembro";
    } else if($quantidade1==10){
		$mes1="Outubro";
    } else if($quantidade1==11){
		$mes1="Novembro";
    } else if($quantidade1==12){
		$mes1="Dezembro";
    }

    
     if(empty($quantidade2)){
        $mes2="";
    } else if($quantidade2==1){
    	$mes2="Janeiro";
    } else if($quantidade2==2){
 		$mes2="Fevereiro";   	
    } else if($quantidade2==3){
		$mes2="Março";
    } else if($quantidade2==4){
		$mes2="Abril";
    } else if($quantidade2==5){
		$mes2="Maio";
    } else if($quantidade2==6){
		$mes2="Junho";
    } else if($quantidade2==7){
		$mes2="Julho";
    } else if($quantidade2==8){
		$mes2="Agosto";
    } else if($quantidade2==9){
		$mes2="Setembro";
    } else if($quantidade2==10){
		$mes2="Outubro";
    } else if($quantidade2==11){
		$mes2="Novembro";
    } else if($quantidade2==12){
		$mes2="Dezembro";
    }
    echo $quantidade1;
    echo $quantidade2;
    
    ?>
    <div align="center">
    <?php
    if(($quantidade1!=0)&&($quantidade2!=0)){    echo "<br><br>Comparação entre os meses de ",$mes1," e ",$mes2,"<br><br>";}
   ?>

    </div>

    
    <div id="caixinhaLegenda1">
    
    </div> 
    
    <?php
    echo "     &nbsp - &nbsp   ", $mes1;
    ?></br>
   
    <div id="caixinhaLegenda2">
    
   	</div> 
   	 <?php
    
    echo "    &nbsp -  &nbsp  ",$mes2;
    ?>
  <br><br>
 
   
    
   

<?php
   
    if($formato=="mes"){
        $sql = "SELECT ROUND(AVG(nivel),2) AS MediaNivel,DATE_FORMAT(data, '%d') as horario FROM medicoes where MONTH(data) = ".$quantidade1." and YEAR(data) = 2017 group by horario order by id;"; 
        $sql2 = "SELECT ROUND(AVG(nivel),2) AS MediaNivel,DATE_FORMAT(data, '%d') as horario FROM medicoes where MONTH(data) = 4 and YEAR(data) = 2017 group by horario order by id;"; 
    }
        

    $query = $_SG['link']->query($sql);
    $vetNivel=array();
    $vetHorario=array();
    while($nivel = $query->fetch()){
		$vetNivel[] = $nivel["MediaNivel"];
        $vetHorario[]= $nivel["horario"];
	}  
 
 
   
    
  $query2 = $_SG['link']->query($sql2);    
    $vetNivel2=array();
    while($nivel2 = $query2->fetch()){
		$vetNivel2[] = $nivel2["MediaNivel"];
	} 

?>

<div class="ct-chart ct-square"></div>
<script type="text/javascript">
var chart = new Chartist.Line('.ct-chart', {
  labels: <?php echo json_encode($vetHorario); ?>,
  series: [
   
    <?php echo json_encode($vetNivel);?>,
     <?php echo json_encode($vetNivel2);?>,
    ]
    
   
}, {
  low: 0,
    
               
});
// Let's put a sequence number aside so we can use it in the event callbacks
var seq = 0,
  delays = 1,
  durations = 300;

// Once the chart is fully created we reset the sequence
chart.on('created', function() {
  seq = 0;
});

// On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
chart.on('draw', function(data) {
  seq++;

  if(data.type === 'line') {
    // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
    data.element.animate({
      opacity: {
        // The delay when we like to start the animation
        begin: seq * delays + 50,
        // Duration of the animation
        dur: durations,
        // The value where the animation should start
        from: 0,
        // The value where it should end
        to: 1
      }
    });
  } else if(data.type === 'label' && data.axis === 'x') {
    data.element.animate({
      y: {
        begin: seq * delays,
        dur: durations,
        from: data.y + 100,
        to: data.y,
        // We can specify an easing function from Chartist.Svg.Easing
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'label' && data.axis === 'y') {
    data.element.animate({
      x: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 100,
        to: data.x,
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'point') {
    data.element.animate({
      x1: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 10,
        to: data.x,
        easing: 'easeOutQuart'
      },
      x2: {
        begin: seq * delays,
        dur: durations,
        from: data.x - 10,
        to: data.x,
        easing: 'easeOutQuart'
      },
      opacity: {
        begin: seq * delays,
        dur: durations,
        from: 0,
        to: 1,
        easing: 'easeOutQuart'
      }
    });
  } else if(data.type === 'grid') {
    // Using data.axis we get x or y which we can use to construct our animation definition objects
    var pos1Animation = {
      begin: seq * delays,
      dur: durations,
      from: data[data.axis.units.pos + '1'] - 30,
      to: data[data.axis.units.pos + '1'],
      easing: 'easeOutQuart'
    };

    var pos2Animation = {
      begin: seq * delays,
      dur: durations,
      from: data[data.axis.units.pos + '2'] - 100,
      to: data[data.axis.units.pos + '2'],
      easing: 'easeOutQuart'
    };

    var animations = {};
    animations[data.axis.units.pos + '1'] = pos1Animation;
    animations[data.axis.units.pos + '2'] = pos2Animation;
    animations['opacity'] = {
      begin: seq * delays,
      dur: durations,
      from: 0,
      to: 1,
      easing: 'easeOutQuart'
    };

    data.element.animate(animations);
  }
});



</script>
 
</body>
</html>
