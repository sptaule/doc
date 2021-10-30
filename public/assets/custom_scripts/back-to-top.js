const back2Top = document.querySelector('#back2Top');
window.addEventListener('scroll', () => {
    window.scrollY >= 300 ? back2Top.classList.remove('hidden') : back2Top.classList.add('hidden');
    back2Top.addEventListener('click', (e) => {
        e.preventDefault();
        window.scroll({ top:0, left:0, behavior: 'smooth'});
    });
});