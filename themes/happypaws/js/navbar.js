/* const menus = Array.from(document.getElementsByClassName('menu'));
console.log(menus);

menus.forEach(menu => {
    Array.from(menu.children).forEach(child => {
        
        child.addEventListener('mouseenter', (e) => {
            let subMenu = e.target.querySelector('.sub-menu');
            if (!subMenu) return;
            subMenu.style.visibility = 'visible';
        });
        
        child.addEventListener('mouseleave', (e) => {
            let subMenu = e.target.querySelector('.sub-menu');
            if (!subMenu) return;
            subMenu.style.visibility = 'hidden';
        });
    })
}); */