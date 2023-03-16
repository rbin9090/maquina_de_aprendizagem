<?php


session_start();

$_SESSION['perguntas'][] = "Quanto custa esse item?";
$_SESSION['perguntas'][] = "Posso parcelar?";
$_SESSION['perguntas'][] = "aceita pix?";
$_SESSION['perguntas'][] = "Qual cnpj dessa empresa?";

$respostas = $_SESSION['respostas'][] = "R$:10,00";
$respostas = $_SESSION['respostas'][] = "SIM";
$respostas = $_SESSION['respostas'][] = "desde qu sua chave esteja funcionando!";
$respostas = $_SESSION['respostas'][] = "089-754-568-210-1!";

if (isset($_POST['acao'])) {
	$pergunta = $_POST['pergunta'];
	foreach ($_SESSION['perguntas'] as $key => $value) {
		$testar = preg_match('/'.$pergunta.'/i',$value);
		if($testar){
			$resposta = $_SESSION['respostas'][$key];
		}
	}
}else if(
	isset($_POST['cadastrar_resposta'])){
	$_SESSION['perguntas'][] = $_POST['pergunta'];
	$_SESSION['respostas'][] = $_POST['resposta'];
	echo("<script>alert('obrigado voçê me ajudou aprender um pouco mais!')</script>");
}

?>



<form method="POST">
	
<h2>Realize sua pergunta</h2>

<input type="text" name="pergunta" />
<input type="submit" name="acao" value="enviar">

<?php
if (isset($resposta)) {
	echo $resposta;
}else if(isset($_POST['acao'])){
	echo 'ops.. nosso robo nao etendeu sua pergunta';
	$criarresposta = true;
}

?>

</form>


<?php


if (isset($criarresposta) && isset($_POST['acao'])) {
	// code...
?>
<form method="POST">
	<h2>Tem alguma idéia da resposta, para ajudar o robô aprender mais?</h2>
	<input type="text" name="resposta" />
	<input type="hidden" name="pergunta" value="<?php echo $_POST['pergunta'] ?>">
	<input type="submit" name="cadastrar_resposta" />
</form>
<?php

}

?>