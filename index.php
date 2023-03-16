<?php


session_start();

$_SESSION['perguntas'][] = "Quanto custa esse item?";
$_SESSION['perguntas'][] = "Posso parcelar?";

$respostas = $_SESSION['respostas'][] = "R$:10,00";
$respostas = $_SESSION['respostas'][] = "SIM";

if (isset($_POST['acao'])) {
	$pergunta = $_POST['pergunta'];
	foreach ($_SESSION['perguntas'] as $key => $value) {
		$testar = preg_match('/'.$pergunta.'/i',$value);
		if($testar){
			$resposta = $_SESSION['respostas'][$key];
		}
	}
}

?>



<form method="POST">
	
<h2>Realize sua pergunta</h2>

<input type="text" name="pergunta" />
<input type="submit" name="acao" value="enviar">

<?php
if (isset($resposta)) {
	echo 'sua pergunta com base na pergunta é:'.$resposta;
}else if(isset($_POST['acao'])){
	echo 'ops.. nosso robo nao etendeu sua pergunta';
}

?>

</form>