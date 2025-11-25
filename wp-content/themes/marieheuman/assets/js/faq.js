document.addEventListener("DOMContentLoaded", () => {

    const buttons = document.querySelectorAll("#faq-categories button");
    const searchInput = document.querySelector("#faq-search");
    const faqItems = document.querySelectorAll(".faq-item");

    const categoryBlocks = document.querySelectorAll(".faq-category-block");
    const categoryTitles = document.querySelectorAll(".faq-category-title");

    let activeCategory = "all";

    function updateCategoryVisibility() {
        categoryBlocks.forEach((block, index) => {
            const items = block.querySelectorAll(".faq-item");
            let visibleCount = 0;

            items.forEach(item => {
                if (item.style.display !== "none") {
                    visibleCount++;
                }
            });

            // Titre et bloc associés
            const title = categoryTitles[index];

            if (visibleCount === 0) {
                title.style.display = "none";
                block.style.display = "none";
            } else {
                title.style.display = "block";
                block.style.display = "block";
            }
        });
    }

    function filterFAQ() {
        const searchValue = searchInput.value.toLowerCase();

        faqItems.forEach(item => {
            const itemCats = item.dataset.category.split(" ");
            const itemText =
                (item.dataset.title + " " + item.dataset.content).toLowerCase();

            const categoryMatch =
                activeCategory === "all" || itemCats.includes(activeCategory);

            const searchMatch = itemText.includes(searchValue);

            item.style.display = (categoryMatch && searchMatch)
                ? "block"
                : "none";
        });

        updateCategoryVisibility();
    }

    // Filtre par catégorie
    buttons.forEach(btn => {
        btn.addEventListener("click", () => {

            activeCategory = btn.dataset.category;

            buttons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");

            filterFAQ();
        });
    });

    // Search en live
    searchInput.addEventListener("input", filterFAQ);

});
