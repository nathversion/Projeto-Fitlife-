<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple Sidebar Menu</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link href="paginainicial.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Comic+Relief:wght@400;700&family=Manrope:wght@200..800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Comic+Relief:wght@400;700&family=Manrope:wght@200..800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=BBH+Sans+Hegarty&family=Cal+Sans&family=Comic+Relief:wght@400;700&family=Manrope:wght@200..800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=BBH+Sans+Hegarty&family=Cal+Sans&family=Comic+Relief:wght@400;700&family=Manrope:wght@200..800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
	<?php
session_start();

// Se não estiver logado, volta pro login
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit();
}
?>
<div class="login"> 

<h1>Bem-vindo de volta, <?php echo $_SESSION['nome']; ?> </h1>
<p>Disciplina vence a motivação. Continue firme!</p>
<div class="sair"> 
<a href="login.html"> Sair <i class="fa-regular fa-frown"></i></a>
</div>
</div>




</div>


	<nav>
		<ul>
			<li class="logo">
				<img alt="" src="https://i.imgur.com/jueICQT.png">
			</li>
			<li>
				<a href="#" data-pagina="inicio"><i class="fa fa-home"></i> Inicio</a>
			</li>
			<li>
				<a href="#" data-pagina="Treinos"><i class="fa fa-book"></i> Treinos</a>
			</li>


			<li>
				<a href="#" data-pagina="dietas"><i class="fa fa-users"></i> Dietas</a>
			</li>
			<li>
				<a href="#" data-pagina="videos"><i class="fa fa-picture-o"></i> Videos</a>
			</li>
			<li>
				<a href="#" data-pagina="contato"><i class="fa fa-phone"></i> Contato</a>
			</li>
		</ul>
	</nav>

	<main> 
		<section id="inicio" class="pagina ativa">
		<h2> Olá, seja bem vindo de volta ao Fitlife!</h2>
<Div class="primeira">
	<img src="https://i.imgur.com/ndwbbhB.png" width="950" height="195">
	</Div>
		</section>

		<section id="Treinos" class="pagina">
			<div class="form-container">

<div class="titulo1">
<h2><i class="fa fa-smile-o"></i>   Conte nos um pouco sobre você! </h2>




</div>
<form action="conexao.php" method="POST"> <div class="perguntas">
	<label>Qual sua idade?</label> <input type="number" name="idade">
	<label>Qual sua altura? </label> 
	<input type="number" name="altura" id="altura" step="0.01">
	<label>Qual seu peso?</label> <input type="number" name="peso" id="peso" step="0.1">
	<div class="imc"> <p> <i class="fas fa-scale-balanced icone-imc"></i> 
	 IMC: <span id="resultado">0</span></p> <p>
		 Sua Classificação:
		<span id="classificacao">-</span> </p>
		
		<input type="hidden" name="classificacao" id="classificacaoHidden">

	</div> </div> <div class="caixabox"> 

	<label>Qual seu objetivo na academia? </label> <select name="objetivo">
			<option value="">--Selecione--</option>
			 <option value="emagrecer">Emagrecer</option>
			<option value="ganharpeso">Ganhar peso</option>
			 <option value="definircorpo">Definir corpo</option> 
			
			</select>
			<label>Como você se sente em relação ao seu corpo hoje?</label>
			<select name="sentimento"> <option value="">--Selecione--</option>
			<option value="insatisfeito">Insatisfeito(a), quero mudar bastante</option>
			<option value="mediano">Mais ou menos, quero melhorar algumas partes</option>
			<option value="satisfeito">Satisfeito(a), só quero manter</option> </select>
			<label> Nivel de experiência: </label> <select name="experiencia"> 
				<option value="">--Selecione--</option> 
				<option value="nuncatreinei">Nunca treinei</option> <option value="iniciante">Iniciante (menos de 6 meses)</option> 
				<option value="intermediario">Intermediário (6 meses – 2 anos) </option>
				<option value="avançado">Avançado (mais de 2 anos)</option> </select>
	 

	 <button>Gerar treino</button>
		 </div>
</form>
		</section>

		<section id="dietas" class="pagina">
  <div class="dieta-container">
    <h2>Monte aqui sua dieta:</h2>
    <p>Escolha seu objetivo, e receba um plano completo com refeições adaptadas para você.</p>
    <button id="btnDieta" onclick="location.href='dieta/index.html'">Montar Dieta</button>
  </div>

  <img src="https://i.imgur.com/WdjNX1Q.png">

  <div class="dicadieta">
<h2>Dicas para melhor funcionamento da sua dieta</h2>
<p>Beba bastante água 💧</p>
<p> Mantém o corpo hidratado e ajuda na saciedade.</p>
<p> Não pule refeições para manter o metabolismo ativo.</p>
<p>Inclua proteína em todas as refeições 🍗🥚</p>
<p>Controle o tamanho das porções 🍽️</p>
<p> Comer menos não significa passar fome; </p>
<p>Anote peso, medidas ou fotos para se motivar e ajustar a dieta.</p>


  </div>
</section>

		<section id="videos" class="pagina">
		   vídeos aqui 
		 

		</section>

		<section id="contato" class="pagina">
		   contato aqui
		</section>
	</main>

	<script src="paginainicial.js"></script>
</body>
</html>
