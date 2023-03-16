<?php


session_start();

$_SESSION['perguntas'][] = "Quanto custa esse item?";
$_SESSION['perguntas'][] = "Posso parcelar?";

$respostas = $_SESSION['resposta'][] = "R$:10,00";
$respostas = $_SESSION['resposta'][] = "SIM";
if (isset($_POST['acao'])) {
	$pergunta = $_POST['pergunta'];
	foreach ($_SESSION['perguntas'] as $key => $value) {
		$teste = preg_match('/'.$pergunta.'/i',$value);
		if($teste){
			$respostas = $_SESSION['respostas'][$key];
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
	echo 'sua pergunta com base na resposta é:'.$resposta;
}else if(isset($_POST['acao'])){
	echo 'ops.. nosso robo nao etendeu sua pergunta';
}

?>

</form>