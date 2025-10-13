/* ------------------ começo da seleção de elementos ------------------ */
const form = document.getElementById('loginForm'); // formulário de cadastro
const emailInput = document.getElementById('email'); // email
const senhaInput = document.getElementById('senha'); // senha
const confirmarSenhaInput = document.getElementById('confirmarSenha'); // confirmar senha
const nomeCompletoInput = document.getElementById('nomeCompleto'); // nome completo
const dataNascimentoInput = document.getElementById('dataNascimento'); // data nasc
const cpfInput = document.getElementById('cpf'); // cpf
const telefoneCelularInput = document.getElementById('telefoneCelular'); // tel celular
const telefoneFixoInput = document.getElementById('telefoneFixo'); // tel fixo (opcional)
const ruaInput = document.getElementById('rua'); // rua
const cidadeInput = document.getElementById('cidade'); // cidade
const estadoInput = document.getElementById('estado'); // estado (UF)
const cepInput = document.getElementById('cep'); // cep
const bairroInput = document.getElementById('bairro'); // bairro
const errorMsg = document.getElementById('errorMsg'); // mensagem global
const mensagemSenha = document.getElementById('mensagemSenha'); // dica de senha
const darkModeToggle = document.getElementById('darkModeToggle'); // botão dark mode
const nomeMaternoInput = document.getElementById('nomeMaterno'); // nome materno
const sexoSelect = document.getElementById('sexo'); // sexo (select)
/* ------------------ final da seleção de elementos ------------------ */


/* ------------------ começo dos helpers de erro ------------------ */
function mostrarErroPorCampo(campo, mensagem) { // cria/atualiza span de erro no campo
  let erroSpan = campo.parentElement.querySelector('.field-error');
  if (!erroSpan) {
    erroSpan = document.createElement('span');
    erroSpan.classList.add('field-error');
    campo.parentElement.appendChild(erroSpan);
  }
  erroSpan.textContent = mensagem; // define texto
  erroSpan.style.color = '#ff6b6b'; // cor vermelha clara
}

function limparErrosDeCampos() { // remove todos os spans .field-error
  form.querySelectorAll('.field-error').forEach(span => span.remove());
}

function limparErroGlobal() { // limpa e esconde mensagem global
  errorMsg.textContent = '';
  errorMsg.style.color = '';
  errorMsg.style.display = 'none';
}
/* ------------------ final dos helpers de erro ------------------ */


/* ------------------ começo da validação + envio ao PHP ------------------ */
form.addEventListener('submit', async function (event) {
  event.preventDefault(); // impede envio padrão

  limparErrosDeCampos(); // limpa erros por campo
  limparErroGlobal(); // limpa msg global

  let temErro = false; // flag de erro global

  // ------------------ começo: coletar valores ------------------
  const email = emailInput.value.trim();
  const senha = senhaInput.value;
  const confirmarSenha = confirmarSenhaInput.value;
  const nomeCompleto = nomeCompletoInput.value.trim();
  const dataNascimento = dataNascimentoInput.value;
  const cpf = cpfInput.value.trim();
  const telefoneCelular = telefoneCelularInput.value.trim();
  const telefoneFixo = telefoneFixoInput.value.trim();
  const rua = ruaInput.value.trim();
  const cidade = cidadeInput.value.trim();
  const estado = estadoInput.value.trim();
  const cep = cepInput.value.trim();
  const bairro = bairroInput.value.trim();
  const nomeMaterno = nomeMaternoInput.value.trim();
  const sexo = sexoSelect.value;
  // ------------------ final: coletar valores ------------------

  // ------------------ começo: validações ------------------
  if (nomeCompleto === '') { mostrarErroPorCampo(nomeCompletoInput, 'Nome completo é obrigatório.'); temErro = true; }
  if (dataNascimento === '') { mostrarErroPorCampo(dataNascimentoInput, 'Data de nascimento é obrigatória.'); temErro = true; }
  if (!sexo) { mostrarErroPorCampo(sexoSelect, 'Selecione o sexo.'); temErro = true; }
  if (nomeMaterno === '') { mostrarErroPorCampo(nomeMaternoInput, 'Nome materno é obrigatório.'); temErro = true; }

  if (cpf === '') {
    mostrarErroPorCampo(cpfInput, 'CPF é obrigatório.'); temErro = true;
  } else if (!/^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(cpf)) { // formato 000.000.000-00
    mostrarErroPorCampo(cpfInput, 'CPF inválido. Use o formato xxx.xxx.xxx-xx.'); temErro = true;
  }

  if (email === '' || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    mostrarErroPorCampo(emailInput, 'Informe um e-mail válido.'); temErro = true;
  }

  if (telefoneCelular === '') { mostrarErroPorCampo(telefoneCelularInput, 'Telefone celular é obrigatório.'); temErro = true; }
  if (telefoneFixo && telefoneFixo.replace(/\D/g, '').length < 10) { mostrarErroPorCampo(telefoneFixoInput, 'Telefone fixo inválido.'); temErro = true; }

  if (cep === '') {
    mostrarErroPorCampo(cepInput, 'CEP é obrigatório.'); temErro = true;
  } else if (cep.replace(/\D/g, '').length !== 8) {
    mostrarErroPorCampo(cepInput, 'CEP inválido. Deve conter 8 dígitos.'); temErro = true;
  }

  if (rua === '') { mostrarErroPorCampo(ruaInput, 'Rua é obrigatória.'); temErro = true; }
  if (bairro === '') { mostrarErroPorCampo(bairroInput, 'Bairro é obrigatório.'); temErro = true; }
  if (cidade === '') { mostrarErroPorCampo(cidadeInput, 'Cidade é obrigatória.'); temErro = true; }
  if (estado === '' || estado.length !== 2) { mostrarErroPorCampo(estadoInput, 'Estado (UF) deve ter 2 letras.'); temErro = true; }

  if (senha.length < 6) { mostrarErroPorCampo(senhaInput, 'A senha deve ter pelo menos 6 caracteres.'); temErro = true; }
  if (senha !== confirmarSenha) { mostrarErroPorCampo(confirmarSenhaInput, 'As senhas não coincidem.'); temErro = true; }
  // ------------------ final: validações ------------------

  if (temErro) { // se houve qualquer erro, exibe global e para
    errorMsg.textContent = 'Por favor, corrija os campos destacados.';
    errorMsg.style.color = '#ff6b6b';
    errorMsg.style.display = 'block';
    mensagemSenha.textContent = '';
    return;
  }

  // ------------------ começo: montar e enviar para o PHP ------------------
  const formData = new FormData();
  formData.append('nome_completo', nomeCompleto);
  formData.append('data_nascimento', dataNascimento);
  formData.append('sexo', sexo);
  formData.append('nome_materno', nomeMaterno);
  formData.append('cpf', cpf);
  formData.append('email', email);
  formData.append('telefone_celular', telefoneCelular);
  formData.append('telefone_fixo', telefoneFixo);
  formData.append('cep', cep);
  formData.append('rua', rua);
  formData.append('bairro', bairro);
  formData.append('cidade', cidade);
  formData.append('estado', estado);
  formData.append('senha', senha);
  formData.append('confirmar_senha', confirmarSenha);

  try {
    const resp = await fetch('api/register.php', { method: 'POST', body: formData }); // chama backend
    const json = await resp.json(); // lê resposta JSON

    if (!json.ok) { // se backend retornou erros
      errorMsg.textContent = (json.errors || ['Erro ao cadastrar']).join(' | ');
      errorMsg.style.color = '#ff6b6b';
      errorMsg.style.display = 'block';
      return;
    }

    errorMsg.textContent = 'Cadastro realizado com sucesso!';
    errorMsg.style.color = 'lightgreen';
    errorMsg.style.display = 'block';
    mensagemSenha.textContent = '';
    setTimeout(() => window.location.href = 'login.html', 900); // vai para login
  } catch (e) {
    errorMsg.textContent = 'Falha ao conectar com o servidor.';
    errorMsg.style.color = '#ff6b6b';
    errorMsg.style.display = 'block';
  }
  // ------------------ final: montar e enviar para o PHP ------------------
});
/* ------------------ final da validação + envio ao PHP ------------------ */


/* ------------------ começo do auto-preenchimento de CEP (ViaCEP) ------------------ */
cepInput.addEventListener('blur', function () {
  const cep = cepInput.value.replace(/\D/g, ''); // mantém só dígitos

  if (cep.length === 8) {
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
      .then(response => response.json())
      .then(data => {
        if (data.erro) {
          mostrarErroPorCampo(cepInput, 'CEP não encontrado.');
        } else {
          ruaInput.value = data.logradouro || '';
          bairroInput.value = data.bairro || '';
          cidadeInput.value = data.localidade || '';
          estadoInput.value = data.uf || '';
        }
      })
      .catch(() => {
        mostrarErroPorCampo(cepInput, 'Erro ao buscar o CEP.');
      });
  } else if (cep.length > 0) {
    mostrarErroPorCampo(cepInput, 'CEP inválido. Deve conter 8 dígitos.');
  }
});
/* ------------------ final do auto-preenchimento de CEP (ViaCEP) ------------------ */


/* ------------------ começo da lógica de dark mode ------------------ */
darkModeToggle.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode'); // alterna tema no body
  document.getElementById('header').classList.toggle('dark-mode'); // alterna no header
  document.querySelector('.login-container').classList.toggle('dark-mode'); // alterna container
});
/* ------------------ final da lógica de dark mode ------------------ */
