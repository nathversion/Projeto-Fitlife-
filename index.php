<?php
/* ------------------ começo do bootstrap ------------------ */
require __DIR__ . '/api/config.php';
/* ------------------ final do bootstrap ------------------ */

/* ------------------ começo: gate de autenticação ------------------ */
if (empty($_SESSION['user_id'])) {
  header('Location: /fit/login.html'); /* volta para o login se não estiver logado */
  exit;
}
/* ------------------ final: gate de autenticação ------------------ */
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Área Logada - FitLife</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
  <!-- ------------------ começo do conteúdo protegido ------------------ -->
  <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Usuário'); ?>!</h1>

  <button id="btnSair">Sair</button>

  <script>
  // ------------------ começo do logout via fetch ------------------
  document.getElementById('btnSair').addEventListener('click', async () => {
    const r = await fetch('api/logout.php', { method: 'POST' }); // chama endpoint de logout
    const j = await r.json();                                     // lê resposta JSON
    if (j.ok) location.href = 'login.html';                       // volta ao login
  });
  // ------------------ final do logout via fetch ------------------
  </script>
  <!-- ------------------ final do conteúdo protegido ------------------ -->
</body>
</html>
