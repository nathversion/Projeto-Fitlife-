<?php
/* ------------------ começo do bootstrap ------------------ */
require __DIR__ . '/config.php';
/* ------------------ final do bootstrap ------------------ */

/* ------------------ começo: destruir sessão ------------------ */
$_SESSION = [];
if (ini_get('session.use_cookies')) {
  $p = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
}
session_destroy();

echo json_encode(['ok' => true, 'message' => 'Sessão encerrada']);
/* ------------------ final: destruir sessão ------------------ */

session_start();
session_destroy();
header("Location: login.html");
exit();