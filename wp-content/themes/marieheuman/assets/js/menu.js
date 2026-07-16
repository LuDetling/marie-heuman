const toggleMenu = () => {
    const button = document.getElementById('menu-toggle');

    // ASTUCE : On cible les éléments via des IDs ou des classes fixes pour ne pas perdre la sélection !
    const container = document.getElementById('main-header'); // Remplace par l'ID réel de ton header
    const headerButton = document.querySelector('.header-white-button');
    const footer = document.querySelector('footer');

    // 1. Les cycles de classes
    const classes = ['header-marron', 'header-rose', 'header-floral', 'header-desert'];
    const classesButton = ['header-white-button', 'marron-desert-button', 'marron-rose-button', 'marron-coperwood-button'];
    const classesFooter = ['footer-blue', 'footer-desert', 'footer-marron', 'footer-marron-bis'];

    // 2. On récupère l'index sauvegardé, sinon on commence à 0 (marron)
    // On utilise parseInt car localStorage stocke tout sous forme de chaîne de caractères (string)
    let currentIndex = parseInt(localStorage.getItem('themeIndex')) || 0;

    // 3. FONCTION DE MISE À JOUR (Pour appliquer les classes)
    const applyThemeClasses = (oldIndex, newIndex) => {
        // On retire les anciennes classes si elles existent
        if (oldIndex !== undefined) {
            container.classList.remove(classes[oldIndex]);
            headerButton.classList.remove(classesButton[oldIndex]);
            footer.classList.remove(classesFooter[oldIndex]);
        }
        // On ajoute les nouvelles classes
        container.classList.add(classes[newIndex]);
        headerButton.classList.add(classesButton[newIndex]);
        footer.classList.add(classesFooter[newIndex]);
    };

    // 4. INITIALISATION : On applique le thème sauvegardé dès le chargement de la page
    applyThemeClasses(undefined, currentIndex);

    // 5. L'ÉVÉNEMENT CLIC
    button.addEventListener('click', () => {
        const oldIndex = currentIndex;

        // On passe à l'index suivant
        currentIndex = (currentIndex + 1) % classes.length;

        // On applique le changement visuel
        applyThemeClasses(oldIndex, currentIndex);

        // On sauvegarde le nouvel index dans le localStorage
        localStorage.setItem('themeIndex', currentIndex);
    });
}

// On lance la fonction une fois que le DOM est prêt
document.addEventListener('DOMContentLoaded', toggleMenu);


const toggleResponsiveMenu = () => {
    const button = document.querySelector('.responsive-menu button');
    const liens = document.querySelector('.liens');

    button.addEventListener('click', () => {
        liens.classList.toggle('show-liens');
    })

}

document.addEventListener('DOMContentLoaded', toggleResponsiveMenu);
