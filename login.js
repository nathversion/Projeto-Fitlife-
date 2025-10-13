document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const senhaInput = document.getElementById('senha');
    const errorMsg = document.getElementById('errorMsg');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const email = emailInput.value.trim();
        const senha = senhaInput.value;

        if (!email.includes('@') || !email.includes('.')) {
            errorMsg.textContent = 'Insira um e-mail válido.';
            errorMsg.style.display = 'block';
            return;
        }

        if (senha.length < 6) {
            errorMsg.textContent = 'Senha deve ter ao menos 6 caracteres.';
            errorMsg.style.display = 'block';
            return;
        }

        const fd = new FormData();
        fd.append('email', email);
        fd.append('senha', senha);

        try {
            const res = await fetch('api/login.php', { method: 'POST', body: fd });
            const json = await res.json();

            if (!json.ok) {
                errorMsg.textContent = json.error || 'Erro no login';
                errorMsg.style.display = 'block';
                return;
            }

            // Redireciona para paginainicial.php
            window.location.href = json.redirect || 'paginainicial.php';
        } catch {
            errorMsg.textContent = 'Falha ao conectar com o servidor.';
            errorMsg.style.display = 'block';
        }
    });
});
