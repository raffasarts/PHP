<?php 

$f=100;
$hp=100;
$e=100;
$mp=100;
$x=100;
$i=1;
echo("<br>");
	
		
	
		
		
		//Inteligência
			
			$c=rand(2,10);
			$r=rand($x-$f,$x);
			$e=$e-$c;


		if ($r>($f*0.5)) {
			echo" treinou com sucesso ";
			$ieh=10*($i*$c+($hp/2)+($mp/2))/100;
			$f=round($f-$ieh);
			echo("e ganhou ".round($ieh)." de xp<br>");	
			echo ("falta: " .round($f). " de xp para subir de nivel e possui ".$e." de energia <br><br>");
		}
		else{
			echo "Falhou ao treinar ";
			$ieh=5*($i*$c+$hp)/100;
			$f=$f-$ieh;
			echo("e ganhou ".round($ieh)." de xp<br>");	
			echo ("falta: " .round($f). " de xp para subir de nivel e possui ".$e." de energia<br><br>");
		}
 ?>