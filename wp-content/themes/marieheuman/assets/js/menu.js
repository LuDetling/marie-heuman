const toggleMenu = () => {
    const button = document.getElementById('menu-toggle');
    const container = document.querySelector('.header-marron'); // Note : si la classe change, querySelector('.header-marron') risque de ne plus fonctionner au second clic. Mieux vaut cibler via un ID ou une classe fixe.
    const headerButton = document.querySelector('.header-white-button');

    // 1. On définit le cycle des classes dans l'ordre
    const classes = ['header-marron', 'header-rose', 'header-floral', 'header-desert'];
    const classesButton = ['header-white-button', 'marron-desert-button', 'marron-rose-button', 'marron-coperwood-button'];
    let currentIndex = 0; // On commence à marron (index 0)

    button.addEventListener('click', (e) => {
        // 2. On supprime la classe actuelle
        container.classList.remove(classes[currentIndex]);
        headerButton.classList.remove(classesButton[currentIndex]);

        // 3. On passe à l'index suivant (le % permet de revenir à 0 une fois arrivé au bout)
        currentIndex = (currentIndex + 1) % classes.length;

        // 4. On ajoute la nouvelle classe
        container.classList.add(classes[currentIndex]);
        headerButton.classList.add(classesButton[currentIndex]);
    });
}

toggleMenu();