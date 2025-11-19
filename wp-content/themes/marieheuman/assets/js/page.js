const selectSlide = () => {
    let selectors = document.querySelectorAll(".selector-slide")
    selectors.forEach((button, index) => {
        button.addEventListener('click', () => {
            selectors.forEach((btn, btnIndex) => {
                if (btnIndex === index) {
                    btn.classList.add('active-border-marron-button');
                } else {
                    btn.classList.remove('active-border-marron-button');
                }
            })

            document.getElementById('card-collaboration-' + (index + 1)).classList.add('active-collaboration');
            document.querySelectorAll('.card-collaboration').forEach((service, svcIndex) => {
                if (svcIndex !== index) {
                    service.classList.remove('active-collaboration');
                }
            });

        })
    })


}
selectSlide()