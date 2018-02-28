<?php 

// $f=100;
// $hp=100;
// $e=100;
// $mp=100;
// $x=100;
// $i=1;
// echo("<br>");
	
		
	
		
		
// 		//Inteligência
			
// 			$c=rand(2,10);
// 			$r=rand($x-$f,$x);
// 			$e=$e-$c;


// 		if ($r>($f*0.5)) {
// 			echo" treinou com sucesso ";
// 			$ieh=10*($i*$c+($hp/2)+($mp/2))/100;
// 			$f=round($f-$ieh);
// 			echo("e ganhou ".round($ieh)." de xp<br>");	
// 			echo ("falta: " .round($f). " de xp para subir de nivel e possui ".$e." de energia <br><br>");
// 		}
// 		else{
// 			echo "Falhou ao treinar ";
// 			$ieh=5*($i*$c+$hp)/100;
// 			$f=$f-$ieh;
// 			echo("e ganhou ".round($ieh)." de xp<br>");	
// 			echo ("falta: " .round($f). " de xp para subir de nivel e possui ".$e." de energia<br><br>");
// 		}
//nivel PEB
// $p=100;
// $nv=1;
// while ($nv<=100) {
// 	echo "Nivel: $nv | pontos ".round($p)."<br>";
// 	$p=$p*0.15+$p;
// 	$nv++;
// }

$nv=0;
$p=100;
$mp=100;
$hp=100;
$cons=100;
$hm=100;
$e=100;
while ($nv<=100) {
	echo "Você tem o nivel <b>".round($nv)."</b>, <b>".round($mp)."</b> de MP e <b>".round($hp)."</b> de HP e <b>".round($e)."</b> de energia<br>";
	$nv++;
	$hp=$hp*0.01+($cons/2)+$hp;
	$mp=$mp*0.01+($hm/2)+$mp;
	$e=$e*0.01+($cons/2)+$e;


}
 ?>