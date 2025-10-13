<?php
require __DIR__ . '/config.php';

/* ------------------ Coleta dados do POST ------------------ */
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

/* ------------------ Validação ------------------ */
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($senha) < 6) {
    echo json_encode(['ok' => false, 'error' => 'Credenciais inválidas']);
    exit;
}

/* ------------------ Busca usuário ------------------ */
$st = $pdo->prepare("SELECT id, nome_completo, email, senha_hash FROM users WHERE email = ? LIMIT 1");
$st->execute([$email]);
$user = $st->fetch();

/* ------------------ Verifica senha ------------------ */
if (!$user || !password_verify($senha, $user['senha_hash'])) {
    echo json_encode(['ok' => false, 'error' => 'E-mail ou senha incorretos']);
    exit;
}

/* ------------------ Inicia sessão ------------------ */
$_SESSION['id'] = $user['id'];
$_SESSION['nome'] = $user['nome_completo'];
$_SESSION['email'] = $user['email'];

echo json_encode(['ok' => true, 'message' => 'Login autorizado', 'redirect' => 'paginainicial.php']);
