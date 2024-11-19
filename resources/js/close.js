document.addEventListener('click', function(event) {
    const menuToggle = document.getElementById('toogle');
    const menu = document.querySelector('.list');
    
    if (menuToggle.checked) {
        const isClickInsideMenu = menu.contains(event.target) || menuToggle.contains(event.target);

        if (!isClickInsideMenu) {
            menuToggle.checked = false;
        }
    }
});
