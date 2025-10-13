<?php
require __DIR__ . '/config.php';

/* ------------------ Coleta dados do POST ------------------ */
$nome_completo = trim($_POST['nome_completo'] ?? '');
$data_nascimento = trim($_POST['data_nascimento'] ?? '');
$sexo = trim($_POST['sexo'] ?? '');
$nome_materno = trim($_POST['nome_materno'] ?? '');
$cpf = trim($_POST['cpf'] ?? '');
$email = trim($_POST['email'] ?? '');
$telefone_celular = trim($_POST['telefone_celular'] ?? '');
$telefone_fixo = trim($_POST['telefone_fixo'] ?? '');
$cep = trim($_POST['cep'] ?? '');
$rua = trim($_POST['rua'] ?? '');
$bairro = trim($_POST['bairro'] ?? '');
$cidade = trim($_POST['cidade'] ?? '');
$estado = strtoupper(trim($_POST['estado'] ?? ''));
$senha = $_POST['senha'] ?? '';
$confirmar_senha = $_POST['confirmar_senha'] ?? '';

/* ------------------ Validações mínimas ------------------ */
$erros = [];

if ($nome_completo === '') $erros[] = 'Nome completo obrigatório';
if ($data_nascimento === '') $erros[] = 'Data de nascimento obrigatória';
if (!in_array($sexo, ['masculino','feminino','outro'])) $erros[] = 'Sexo inválido';
if ($nome_materno === '') $erros[] = 'Nome materno obrigatório';
if ($cpf === '') $erros[] = 'CPF obrigatório';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erros[] = 'E-mail inválido';
if ($telefone_celular === '') $erros[] = 'Telefone celular obrigatório';
if ($cep === '') $erros[] = 'CEP obrigatório';
if ($rua === '') $erros[] = 'Rua obrigatória';
if ($bairro === '') $erros[] = 'Bairro obrigatório';
if ($cidade === '') $erros[] = 'Cidade obrigatória';
if (strlen($estado) !== 2) $erros[] = 'Estado (UF) deve ter 2 letras';
if (strlen($senha) < 6) $erros[] = 'Senha deve ter ao menos 6 caracteres';
if ($senha !== $confirmar_senha) $erros[] = 'Senhas não conferem';

if ($erros) {
    echo json_encode(['ok' => false, 'errors' => $erros]);
    exit;
}

/* ------------------ Checa duplicidade ------------------ */
$st = $pdo->prepare("SELECT id FROM users WHERE email = ? OR cpf = ? LIMIT 1");
$st->execute([$email, $cpf]);
if ($st->fetch()) {
    echo json_encode(['ok' => false, 'errors' => ['E-mail ou CPF já cadastrado']]);
    exit;
}

/* ------------------ Inserir usuário ------------------ */
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$st = $pdo->prepare("
    INSERT INTO users
    (nome_completo,data_nascimento,sexo,nome_materno,cpf,email,telefone_celular,telefone_fixo,cep,rua,bairro,cidade,estado,senha_hash)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)
");
$st->execute([
    $nome_completo, $data_nascimento, $sexo, $nome_materno, $cpf, $email,
    $telefone_celular, $telefone_fixo ?: null, $cep, $rua, $bairro, $cidade, $estado, $senha_hash
]);

echo json_encode(['ok' => true, 'message' => 'Cadastro concluído']);
