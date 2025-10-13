// ----------------- MENU LATERAL -----------------
const linksMenu = document.querySelectorAll("nav ul li a");
const paginas = document.querySelectorAll(".pagina");

linksMenu.forEach(link => {
  link.addEventListener("click", (e) => {
    e.preventDefault(); 
    paginas.forEach(pagina => pagina.classList.remove("ativa"));
    const id = link.getAttribute("data-pagina");
    document.getElementById(id).classList.add("ativa");
  });
});

// ----------------- CÁLCULO DE IMC -----------------
const pesoInput = document.getElementById('peso');
const alturaInput = document.getElementById('altura');
const resultadoSpan = document.getElementById('resultado');
const classificacaoSpan = document.getElementById('classificacao');

function calcularIMC() {
  const peso = parseFloat(pesoInput.value);
  const altura = parseFloat(alturaInput.value);

  if (peso > 0 && altura > 0) { 
    const imc = peso / (altura * altura);
    resultadoSpan.textContent = imc.toFixed(2);

    let classificacao = "";
    if (imc < 18.5) classificacao = "Abaixo do Peso";
    else if (imc < 24.9) classificacao = "Peso Ideal";
    else if (imc < 29.9) classificacao = "Sobrepeso";
    else if (imc < 34.9) classificacao = "Obesidade Grau I";
    else if (imc < 39.9) classificacao = "Obesidade Grau II";
    else classificacao = "Obesidade Grau III (mórbida)";

    classificacaoSpan.textContent = classificacao;
    document.getElementById("imcHidden").value = imc.toFixed(2);
    document.getElementById("classificacaoHidden").value = classificacao;

  } else {
    resultadoSpan.textContent = "0";
    classificacaoSpan.textContent = "-";
    document.getElementById("imcHidden").value = "";
    document.getElementById("classificacaoHidden").value = "";
  }
}

// sempre que digitar nos campos
pesoInput.addEventListener('input', calcularIMC);
alturaInput.addEventListener('input', () => {
  // formata automaticamente 168 -> 1.68
  let valor = alturaInput.value.replace(/\D/g,'');
  if(valor.length >= 2){
    valor = valor.slice(0, -2) + '.' + valor.slice(-2);
  }
  alturaInput.value = valor;

  calcularIMC(); // recalcula o IMC
});
