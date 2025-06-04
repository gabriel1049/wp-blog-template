async function carregarProdutos() {
  const response = await fetch(`${window.location.origin}/wp-content/themes/blog-goat/produtos.json`);
  let produtos = await response.json();

  // Embaralha os produtos aleatoriamente
  produtos = produtos
    .map(p => ({ ...p, sort: Math.random() }))
    .sort((a, b) => a.sort - b.sort)
    .map(p => {
      delete p.sort;
      return p;
    });

  const container = document.getElementById('carousel-container');
  container.innerHTML = '';

  produtos.forEach(produto => {
    const div = document.createElement('div');
    div.classList.add('product');
    div.innerHTML = `
      <img src="${produto.imagem}" alt="${produto.nome}">
      <div class="text_product">
        <h3>${produto.nome}</h3>
        <p>${produto.categoria}</p>
        <p class="price">${produto.preco}</p>
        <a href="${produto.url}" target="_blank"><button>Acessar</button></a>
      </div>
    `;
    container.appendChild(div);
  });

  iniciarAnimacaoScroll();
}

// Animação de entrada ao aparecer na tela
function iniciarAnimacaoScroll() {
  const produtos = document.querySelectorAll('.product');

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate');
      }
    });
  }, {
    threshold: 0.2
  });

  produtos.forEach(produto => observer.observe(produto));
}

// Auto-scroll horizontal infinito
function iniciarScrollHorizontalAutomatico() {
  const container = document.getElementById('carousel-container');
  const scrollStep = 1; // pixels por passo
  const delay = 20; // ms entre passos
  const resetDelay = 2000; // pausa ao final

  setInterval(() => {
    const maxScroll = container.scrollWidth - container.clientWidth;
    const atEnd = container.scrollLeft >= maxScroll - 2;

    if (atEnd) {
      setTimeout(() => {
        container.scrollTo({ left: 0, behavior: 'smooth' });
      }, resetDelay);
    } else {
      container.scrollBy({ left: scrollStep, behavior: 'smooth' });
    }
  }, delay);
}

// Execução principal
carregarProdutos().then(() => {
  iniciarScrollHorizontalAutomatico();
});
