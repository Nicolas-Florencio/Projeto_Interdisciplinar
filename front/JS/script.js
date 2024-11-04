const botao = document.getElementById('toggleBarra');
const sidebar = document.getElementById('barraLateral');

botao.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    document.querySelector('main').classList.toggle('sidebar-open');
});
