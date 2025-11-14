const toggleMenu = () => {
    document.getElementById('menu-toggle').addEventListener('click', (e) => {
        document.querySelector(".menu-plied").classList.toggle('menu-open')
    })
}

toggleMenu()