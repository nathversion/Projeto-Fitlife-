<?php
session_start();

$idade = $_POST['idade'] ?? '';
$altura = $_POST['altura'] ?? 0;
$peso = $_POST['peso'] ?? 0;
$objetivo = $_POST['objetivo'] ?? '';
$experiencia = $_POST['experiencia'] ?? '';
$classificacao = $_POST['classificacao'] ?? '';
$sentimento = $_POST['sentimento'] ?? '';

if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit();
}

$imc = 0;
if ($altura > 0) {
    $imc = $peso / ($altura * $altura);
}

function exItem($tituloEx, $imgUrl, $musculos, $execucao) {
    $imgHtml = $imgUrl ? "<img src='{$imgUrl}' alt='{$tituloEx}' width='250'>" : "";
    return "
        <li>
            <strong>{$tituloEx}</strong>
            {$imgHtml}
            <p class='exec'><b>O que trabalha:</b> {$musculos}<br><b>Como executar:</b> {$execucao}</p>
        </li>
    ";
}


$treino = ""; 

// ---------- EMAGRECER ----------
if ($objetivo == "emagrecer" && $experiencia == "nuncatreinei") {
    $treino = "
    <section class='card'>
      <h2>Treino para Emagrecimento (Nunca Treinei)</h2>
      <p class='sub'>Foco: criar hábito e melhorar resistência</p>
      <ul>
        ".exItem("Caminhada leve — 20 min", "https://i.imgur.com/4H8JDrW.png",
            "Melhora resistência cardiorrespiratória e queima calórica moderada.",
            "Caminhe com postura ereta, passos regulares, respiração controlada; mantenha intensidade confortável.")
        .exItem("Agachamento com peso corporal — 3x10", "https://i.imgur.com/mEQkoTp.gif",
            "Quadríceps, glúteos e estabilidade do core.",
            "Pés na largura dos ombros, desça com quadril para trás até 90°, mantenha joelhos alinhados aos pés, suba controlando.")
        .exItem("Polichinelos — 3x15", "https://i.imgur.com/yV1dg4G.gif",
            "Cardio, coordenação e gasto calórico.",
            "Faça movimento completo, aterrissando levemente, braços e pernas abrindo e fechando com ritmo confortável.")
        .exItem("Abdominal básico — 3x12", "https://i.imgur.com/05wWGsJ.gif",
            "Reto abdominal e controle do core.",
            "Suba o tronco sem forçar o pescoço; mãos leves atrás da cabeça ou cruzadas sobre o peito; desça controlado.")
        .exItem("Alongamento — 10 min", "https://i.imgur.com/4kFMqoJ.gif",
            "Recuperação muscular e flexibilidade.",
            "Alongue quadríceps, posterior de coxa, panturrilha e lombar mantendo cada posição 20-30s sem dor.")
      ."</ul>
    </section>
    ";
} elseif ($objetivo == "emagrecer" && $experiencia == "iniciante") {
    $treino = "
    <section class='card'>
      <h2>Treino para Emagrecimento (Iniciante)</h2>
      <p class='sub'>Foco: aumentar gasto calórico e firmar músculos</p>
      <ul>
        ".exItem("Caminhada/corrida leve — 25 min", "https://i.imgur.com/4H8JDrW.png",
            "Cardio de média intensidade para queima calórica e condicionamento.",
            "Intercale caminhada com trote leve; mantenha respiração controlada e postura.")
        .exItem("Leg press — 3x12", "https://i.imgur.com/MX33tPn.gif",
            "Quadríceps, glúteos e posterior de coxa.",
            "Posicione os pés na plataforma na largura dos ombros; desça controlado sem travar os joelhos ao estender.")
        .exItem("Cadeira extensora — 3x10", "https://i.imgur.com/qvnBqNp.gif",
            "Isola o quadríceps para fortalecimento.",
            "Ajuste o assento, movimente até extensão completa sem hiperextensão do joelho; controle na descida.")
        .exItem("Abdominais variados — 3x15", "https://i.imgur.com/05wWGsJ.gif",
            "Trabalho geral do core e postura.",
            "Combine crunch, prancha e oblíquos; execute com respiração adequada e sem compensar a lombar.")
        .exItem("Remada baixa — 3x12", "https://i.imgur.com/Or7HBgT.png",
            "Costas (dorsal), bíceps e postura.",
            "Puxe a barra com ombros para trás, concentrando o movimento na escápula; mantenha coluna neutra.")
      ."</ul>
    </section>
    ";
} elseif ($objetivo == "emagrecer" && $experiencia == "intermediario") {
    $treino = "
    <section class='card'>
      <h2>Treino para Emagrecimento (Intermediário)</h2>
      <p class='sub'>Foco: intensificar o treino com pesos e aeróbicos</p>
      <ul>
        ".exItem("Leg press — 3x12", "https://i.imgur.com/MX33tPn.gif",
            "Quadríceps e glúteos com maior carga.",
            "Aumente carga progressiva, mantenha amplitude e controle na descida; não trave joelhos.")
        .exItem("Agachamento no Smith — 4x10", "https://i.imgur.com/fjJepln.gif",
            "Quadríceps, glúteos, estabilidade do core.",
            "Posição dos pés ligeiramente à frente, desça até 90°, empurre com calcanhar mantendo coluna neutra.")
        .exItem("Afundo com halteres — 3x15", "https://i.imgur.com/r65qdjA.gif",
            "Glúteos, quadríceps e equilíbrio.",
            "Passo à frente, desça controlando até joelho traseiro próximo ao chão; empurre com perna da frente.")
        .exItem("Bike — 15 min", "https://i.imgur.com/bZqVmqD.gif",
            "Cardio concentrado em pernas, alta queima calórica.",
            "Mantenha cadência constante, postura ereta, use resistência moderada.")
      ."</ul>
    </section>
    ";
} elseif ($objetivo == "emagrecer" && $experiencia == "avançado") {
    $treino = "
    <section class='card'>
      <h2>Treino para Emagrecimento (Avançado)</h2>
      <p class='sub'>Foco: alta intensidade e definição muscular</p>
      <ul>
        ".exItem("Leg press — 3x12", "https://i.imgur.com/MX33tPn.gif",
            "Quadríceps e glúteos com cargas maiores.",
            "Carga desafiadora mantendo boa técnica; descida controlada e não trave o joelho ao subir.")
        .exItem("Agachamento no Smith — 4x10", "https://i.imgur.com/fjJepln.gif",
            "Força e potência em membros inferiores.",
            "Execute explosão concentricamente e controle excêntrico; mantenha core firme.")
        .exItem("Afundo com halteres — 3x15", "https://i.imgur.com/r65qdjA.gif",
            "Glúteos e equilíbrio com ênfase na perna de apoio.",
            "Use halteres moderados; mantenha joelho alinhado ao pé e tronco ereto.")
        .exItem("Bike — 15 min (série intensa)", "https://i.imgur.com/bZqVmqD.gif",
            "Cardio de alta intensidade para queima de gordura.",
            "Intervalos curtos de alta resistência intercalados com recuperação leve.")
      ."</ul>
    </section>
    ";
}

// ---------- GANHAR PESO (HIPERTROFIA) ----------
elseif ($objetivo == "ganharpeso" && $experiencia == "nuncatreinei") {
    $treino = "
    <section class='card'>
      <h2>Treino para Ganho de Massa (Nunca Treinei)</h2>
      <p class='sub'>Foco: adaptação e coordenação motora</p>
      <ul>
        ".exItem("Supino reto — 3x10", "https://i.imgur.com/GLFzzY3.gif",
            "Peito, tríceps e deltóide anterior.",
            "Deite com os pés firmes, pegue a barra na largura dos ombros, desça controlado até o peito e empurre com peito e tríceps.")
        .exItem("Agachamento — 3x12", "https://i.imgur.com/gXcPc6w.gif",
            "Quadríceps, glúteos e core.",
            "Sem carga excessiva; mantenha peito ereto, joelhos alinhados aos pés, desça até 90° e suba controlado.")
        .exItem("Abdominal — 3x15", "https://i.imgur.com/n4ZkHUM.gif",
            "Reto abdominal e controle do core.",
            "Execute com técnica, sem puxar o pescoço, contraindo o abdome ao subir.")
        .exItem("Puxada frente — 3x10", "https://i.imgur.com/CLkZM4e.gif",
            "Dorsal e bíceps para desenvolver costas.",
            "Puxe a barra até a clavícula, escápulas retraídas; evite balançar o corpo.")
        .exItem("Rosca direta — 3x12", "https://i.imgur.com/FM0uXyo.gif",
            "Bíceps braquial.",
            "Cotovelo fixo, suba a barra / halteres controlado e desça lenta e totalmente.")
      ."</ul>
    </section>
    ";
} elseif ($objetivo == "ganharpeso" && $experiencia == "iniciante") {
    $treino = "
    <section class='card'>
      <h2>Treino para Ganho de Massa (Iniciante)</h2>
      <p class='sub'>Foco: aprender técnica e aumentar volume leve</p>
      <ul>
        ".exItem("Agachamento — 3x12", "https://i.imgur.com/gXcPc6w.gif",
            "Quadríceps, glúteos e core.",
            "Mantenha postura, desça controlado e suba empurrando pelos calcanhares.")
        .exItem("Leg press 45° — 3x12", "https://i.imgur.com/LUNklE7.gif",
            "Quadríceps e glúteos com maior segurança para iniciantes.",
            "Pés na plataforma, movimento controlado, não trave joelhos no topo.")
        .exItem("Tríceps com corda — 3x15", "https://i.imgur.com/MKsI8aS.gif",
            "Tríceps (cabeças lateral e medial).",
            "Mantenha cotovelos próximos ao corpo, estenda o braço totalmente e controle na volta.")
        .exItem("Remada curvada — 3x10", "https://i.imgur.com/JZ82j3P.gif",
            "Dorsais, lombar e bíceps.",
            "Coluna neutra, puxe com os cotovelos para trás e sinta contração nas costas.")
        .exItem("Rosca direta — 3x12", "https://i.imgur.com/FM0uXyo.gif",
            "Bíceps; técnica e amplitude.",
            "Controle o movimento e não balance o corpo.")
      ."</ul>
    </section>
    ";
} elseif ($objetivo == "ganharpeso" && $experiencia == "intermediario") {
    $treino = "
    <section class='card'>
      <h2>Treino para Ganho de Massa (Intermediário)</h2>
      <p class='sub'>Foco: aumento progressivo de carga e recuperação</p>
      <ul>
        ".exItem("Supino inclinado — 3x15", "https://i.imgur.com/GLFzzY3.gif",
            "Parte superior do peitoral e deltóide anterior.",
            "Deite em banco inclinado, desça a barra controlado até o peito e empurre com foco no peitoral superior.")
        .exItem("Leg press 45° — 3x12", "https://i.imgur.com/LUNklE7.gif",
            "Quadríceps e glúteos com volume maior.",
            "Aumente carga gradualmente e mantenha controle na execução.")
        .exItem("Tríceps corda — 3x15", "https://i.imgur.com/MKsI8aS.gif",
            "Isolamento de tríceps.",
            "Estenda completamente e contraia no final do movimento.")
        .exItem("Remada curvada — 3x15", "https://i.imgur.com/JZ82j3P.gif",
            "Espessura dorsal e força de puxada.",
            "Puxe com escápulas primeiro, mantenha coluna neutra e contraia as costas no topo.")
        .exItem("Agachamento stiff — 3x15", "https://i.imgur.com/8hW2xwq.gif",
            "Posterior de coxa e glúteos.",
            "Flexione levemente os joelhos, incline o tronco mantendo coluna neutra e sinta alongamento nos isquiotibiais.")
      ."</ul>
    </section>
    ";
} elseif ($objetivo == "ganharpeso" && $experiencia == "avançado") {
    $treino = "
    <section class='card'>
      <h2>Treino para Ganho de Massa (Avançado)</h2>
      <p class='sub'>Foco: hipertrofia máxima e técnica controlada</p>
      <ul>
        ".exItem("Supino inclinado — 3x15", "https://i.imgur.com/GLFzzY3.gif",
            "Peito superior com ênfase em hipertrofia.",
            "Use técnica rígida, amplitude completa e controle excêntrico.")
        .exItem("Leg press 45° — 3x12", "https://i.imgur.com/LUNklE7.gif",
            "Volume intenso para quadríceps e glúteos.",
            "Realize séries progressivas, mantendo execução limpa.")
        .exItem("Tríceps corda — 3x15", "https://i.imgur.com/MKsI8aS.gif",
            "Tríceps com foco em pump e resistência.",
            "Contrai ao final do movimento e desça lentamente.")
        .exItem("Agachamento livre — 3x15", "https://i.imgur.com/l8qlned.gif",
            "Desenvolvimento completo de membros inferiores.",
            "Use técnica, respiração e profundidade controladas; priorize forma sobre carga.")
        .exItem("Rosca martelo — 3x15", "https://i.imgur.com/UhxKkfX.gif",
            "Bíceps braquial e braquiorradial.",
            "Pegada neutra, suba mantendo cotovelos fixos e desça controlado.")
      ."</ul>
    </section>
    ";
}

// ---------- DEFINIR CORPO ----------
elseif ($objetivo == "definircorpo" && $experiencia == "nuncatreinei") {
    $treino = "
    <section class='card'>
      <h2>Treino para Definição (Nunca Treinei)</h2>
      <p class='sub'>Foco: resistência + firmeza</p>
      <ul>
        ".exItem("Caminhada leve — 20 min", "https://i.imgur.com/8fAUwnU.gif",
            "Cardio leve para começar a reduzir gordura.",
            "Postura ereta, respiração estável; caminhe em ritmo constante.")
        .exItem("Flexão de braço — 3x12", "https://i.imgur.com/vVliyZU.gif",
            "Peito, tríceps e core estabilizador.",
            "Mãos alinhadas aos ombros, corpo em linha reta; desça controlado e suba com peito.")
        .exItem("Agachamento — 3x10", "https://i.imgur.com/gXcPc6w.gif",
            "Pernas e glúteos com ênfase em resistência.",
            "Execute com profundidade confortável e técnica limpa.")
        .exItem("Abdominal reto — 3x15", "https://i.imgur.com/dccp3mf.gif",
            "Core e estabilidade postural.",
            "Contraia o abdome ao subir e respire normalmente; não force o pescoço.")
        .exItem("Prancha — 3x30s", "https://i.imgur.com/2t7h97m.gif",
            "Estabilidade do core e endurance.",
            "Corpo em linha reta, glúteos e core ativados; respire de forma controlada.")
      ."</ul>
    </section>
    ";
} elseif ($objetivo == "definircorpo" && $experiencia == "iniciante") {
    $treino = "
    <section class='card'>
      <h2>Treino para Definição (Iniciante)</h2>
      <p class='sub'>Foco: reduzir gordura e realçar músculos</p>
      <ul>
        ".exItem("Caminhada — 40 min", "https://i.imgur.com/8fAUwnU.gif",
            "Cardio de longa duração, queima de gordura.",
            "Mantenha ritmo constante e hidratação; aumente inclinação se possível.")
        .exItem("Agachamento — 3x12", "https://i.imgur.com/gXcPc6w.gif",
            "Pernas e glúteos para definição.",
            "Priorize amplitude, mantenha core ativo e coluna neutra.")
        .exItem("Leg press 45° — 3x10", "https://i.imgur.com/LUNklE7.gif",
            "Definição de quadríceps com carga controlada.",
            "Pés na plataforma, execução controlada na descida e subida.")
        .exItem("Supino reto — 3x15", "https://i.imgur.com/aCHSvco.png",
            "Peito com ênfase em resistência muscular.",
            "Use cargas que permitam execução limpa até a repetição final.")
        .exItem("Abdominal — 3x15", "https://i.imgur.com/dccp3mf.gif",
            "Core e definição abdominal.",
            "Combine variações e mantenha respiração controlada.")
      ."</ul>
    </section>
    ";
} elseif ($objetivo == "definircorpo" && $experiencia == "intermediario") {
    $treino = "
    <section class='card'>
      <h2>Treino para Definição (Intermediário)</h2>
      <p class='sub'>Foco: intensidade moderada e constância</p>
      <ul>
        ".exItem("Agachamento livre — 3x15", "https://i.imgur.com/l8qlned.gif",
            "Pernas, glúteos e core para definição e resistência.",
            "Séries mais longas com técnica afinada; respire e mantenha controle.")
        .exItem("Tríceps corda — 3x12", "https://i.imgur.com/MKsI8aS.gif",
            "Tríceps para definição do braço.",
            "Mantenha cotovelos fixos e execute com amplitude completa.")
        .exItem("Leg press 45° — 3x10", "https://i.imgur.com/LUNklE7.gif",
            "Quadríceps definido e poderoso.",
            "Controle e amplitude, séries intensas com pausas curtas.")
        .exItem("Supino reto — 3x15", "https://i.imgur.com/aCHSvco.png",
            "Peitoral com foco em resistência e definição.",
            "Mantenha técnica e respiração controlada durante cada série.")
        .exItem("Puxada frente — 3x15", "https://i.imgur.com/CLkZM4e.gif",
            "Costas definidas e postura.",
            "Puxe ate a clavícula, retraia escápulas e controle retorno.")
      ."</ul>
    </section>
    ";
} elseif ($objetivo == "definircorpo" && $experiencia == "avançado") {
    $treino = "
    <section class='card'>
      <h2>Treino para Definição (Avançado)</h2>
      <p class='sub'>Foco: alta definição muscular com baixo percentual de gordura</p>
      <ul>
        ".exItem("Agachamento livre — 3x15", "https://i.imgur.com/l8qlned.gif",
            "Pernas completas e glúteos com alta intensidade.",
            "Séries intensas, técnica impecável e foco em amplitude controlada.")
        .exItem("Tríceps corda — 3x12", "https://i.imgur.com/MKsI8aS.gif",
            "Definição do tríceps.",
            "Pausas curtas e execução controlada para manter tempo sob tensão.")
        .exItem("Leg press 45° — 3x10", "https://i.imgur.com/LUNklE7.gif",
            "Quadríceps definidos com carga e volume.",
            "Use intensidade, mantenha postura e amplitude.")
        .exItem("Supino reto — 3x15", "https://i.imgur.com/aCHSvco.png",
            "Peitoral para definição e estética.",
            "Foco em técnica e controle em todas as repetições.")
        .exItem("Abdominal — 3x15", "https://i.imgur.com/dccp3mf.gif",
            "Core para definição e estabilidade.",
            "Varie os exercícios e mantenha contração máxima no final da repetição.")
        .exItem("Puxada frente — 3x15", "https://i.imgur.com/CLkZM4e.gif",
            "Costas definidas e postura.",
            "Técnica e controle no retorno.")
        .exItem("Prancha — 1 min", "https://i.imgur.com/2t7h97m.gif",
            "Resistência do core e estabilidade geral.",
            "Corpo alinhado, respiração controlada e core ativado.")
        .exItem("Desenvolvimento — 3x15", "https://i.imgur.com/2n1sy8i.gif",
            "Ombros (deltoides) para definição.",
            "Empurre controlando o movimento e não arqueie a lombar.")
        .exItem("Stiff — 3x15", "https://i.imgur.com/8hW2xwq.gif",
            "Posterior de coxa e glúteos para definição.",
            "Incline o tronco com coluna neutra e sinta alongamento antes de subir.")
      ."</ul>
    </section>
    ";
} else {
    if (!$treino) {
        $treino = "<section class='card'><p class='alert'>Por favor, selecione o objetivo e o nível de experiência no formulário.</p></section>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Seu Treino - FitLife</title>
    <link rel="stylesheet" href="conexao.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
  <div class="layout">
    <header class="top">
      <img src="https://i.imgur.com/LqAnARU.png" alt="logo" class="logo">
      <div class="user">
        <h1>🌟 Uau, <?php echo htmlspecialchars($_SESSION['nome']); ?> — seu treino está pronto!</h1>
        <p id="titulo">Cada repetição é um passo para a melhor versão de você mesmo. A FitLife está com você nessa jornada — bora transformar esforço em resultado!</p>
      </div>
    </header>

    <main class="main">
      <section class="info">
        <p><b>Idade:</b> <?= htmlspecialchars($idade) ?> anos</p>
        <p><b>Peso:</b> <?= htmlspecialchars($peso) ?> kg</p>
        <p><b>Altura:</b> <?= htmlspecialchars($altura) ?> m</p>
        <p><b>IMC:</b> <?= number_format($imc, 2) ?></p>
        <p><b>Objetivo:</b> <?= htmlspecialchars($objetivo) ?></p>
        <p><b>Como eu me sinto em relação ao meu corpo:</b> <?= htmlspecialchars(string:$sentimento) ?> </p>
        <hr>
      </section>

      <?= $treino ?>

    </main>

    <footer class="footer">
      <p>Boa sorte! ✨ Lembre-se: aqueça antes, respeite seus limites e consulte um profissional quando necessário.</p>
    </footer>
  </div>
</body>
</html>
