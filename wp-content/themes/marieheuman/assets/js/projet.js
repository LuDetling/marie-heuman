let avantApresButtons = document.querySelectorAll('.avant-apres-button')

avantApresButtons.forEach((button, index) => {
    button.addEventListener('click', () => {

        avantApresButtons.forEach((btn, btnIndex) => {
            if (btnIndex === index) {
                btn.classList.add('active-filter');
            } else {
                btn.classList.remove('active-filter');
            }
        });

        document.getElementById('content-avant-apres-' + (index)).classList.add('active-avant-apres');
        document.querySelectorAll('.content-avant-apres').forEach((service, svcIndex) => {
            if (svcIndex !== index) {
                service.classList.remove('active-avant-apres');
            }
        });

    })
});