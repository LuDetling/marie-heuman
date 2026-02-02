/**
 * ===========================================
 * 3. JS/BLOG-AJAX.JS - JavaScript
 * ===========================================
 */
(function ($) {
    'use strict';

    const Posts = {
        page: 1,
        category: '',
        maxPages: 1,
        isLoading: false,

        init() {
            this.grid = $('#ajax-grid');
            this.pagination = $('#ajax-pagination');
            this.loader = $('#blog-loader');

            this.loadPosts();
            this.bindEvents();
        },

        bindEvents() {
            // Filtres catégories
            $('.filter-btn').on('click', (e) => {
                const $btn = $(e.currentTarget);
                $('.filter-btn').removeClass('active');
                $btn.addClass('active');
                this.category = $btn.data('category');

                this.page = 1;
                this.loadPosts();
            });

            // Pagination
            this.pagination.on('click', '.page-btn', (e) => {
                const newPage = $(e.currentTarget).data('page');
                if (newPage !== this.page) {
                    this.page = newPage;
                    this.loadPosts();
                    $('html, body').animate({ scrollTop: this.grid.offset().top - 100 }, 300);
                }
            });
        },

        loadPosts() {
            if (this.isLoading) return;
            this.isLoading = true;
            this.grid.addClass('loading');
            $.ajax({
                url: ajax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'load_posts',
                    nonce: ajax.nonce,
                    page: this.page,
                    category: this.category,
                    postType: ajax.postType,
                    template: ajax.template,
                    taxonomy: ajax.taxonomy,
                },
                success: (response) => {
                    if (response.success) {
                        this.grid.html(response.data.html);
                        this.maxPages = response.data.max_pages;
                        this.renderPagination();
                    }
                },
                error: (xhr, status, error) => {
                    console.log('=== ERREUR AJAX ===');
                    console.log('Status:', status);
                    console.log('Error:', error);
                    console.log('Response:', xhr.responseText);
                    this.grid.html('<p class="error">Erreur: ' + error + '</p>');
                },
                complete: () => {
                    this.isLoading = false;
                    this.loader.hide();
                    this.grid.removeClass('loading');
                    const articles = document.querySelectorAll('.card-article');
                    if (articles.length === 0) return;
                    function toggleShowHide() {
                        articles.forEach(article => {

                            const showBtn = article.querySelector('.show');
                            const hideBtn = article.querySelector('.hide');
                            showBtn.addEventListener('click', () => {
                                console.log('click');
                                article.classList.add('text-card-visible');
                            });

                            hideBtn.addEventListener('click', () => {
                                article.classList.remove('text-card-visible');
                            });
                        })
                    }
                    toggleShowHide();
                }
            });


        },

        renderPagination() {
            if (this.maxPages <= 1) {
                this.pagination.empty();
                return;
            }

            let html = '';

            // Bouton précédent
            if (this.page > 1) {
                html += `<button class="page-btn prev" data-page="${this.page - 1}">←</button>`;
            }

            // Numéros de pages
            const range = 2;
            const start = Math.max(1, this.page - range);
            const end = Math.min(this.maxPages, this.page + range);

            if (start > 1) {
                html += '<button class="page-btn" data-page="1">1</button>';
                if (start > 2) html += '<span class="dots">...</span>';
            }

            for (let i = start; i <= end; i++) {
                const active = i === this.page ? 'active' : '';
                html += `<button class="page-btn ${active}" data-page="${i}">${i}</button>`;
            }

            if (end < this.maxPages) {
                if (end < this.maxPages - 1) html += '<span class="dots">...</span>';
                html += `<button class="page-btn" data-page="${this.maxPages}">${this.maxPages}</button>`;
            }

            // Bouton suivant
            if (this.page < this.maxPages) {
                html += `<button class="page-btn next" data-page="${this.page + 1}">→</button>`;
            }

            this.pagination.html(html);
        }
    };

    $(document).ready(() => Posts.init());

})(jQuery);