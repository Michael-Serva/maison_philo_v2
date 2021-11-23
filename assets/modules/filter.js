/**
 * @property {HTMLElement} pagination
 * @property {HTMLElement} content
 * @property {HTMLElement} sorting
 * @property {HTMLElement} form
 */
export default class Filter {
    /**
     * 
     * @param {HTMLElement|null} element 
     */
    constructor(element) {
  /*       if (element === null) {
            return
        } */
        this.pagination = document.querySelector('.js-filter-pagination');
        this.content = document.querySelector('.js-filter-content');
        this.sorting = document.querySelector('.js-filter-sorting');
        this.form = document.querySelector('.js-filter-form');
        this.bindEvents();
    }

    /**
     * add behaviors to different elements
     */
    bindEvents() {
        this.sorting.querySelectorAll('a').forEach(a => {
            a.addEventListener('click', e => {
                e.preventDefault()
                this.loadUrl(a.getAttribute('href'))   
            })
        })
    }
    async loadUrl(url) {
        const response = await fetch(url, {
            headers: {
                'X-Requested-with': 'XMLHttpRequest'
            }
        })
        if (response.status >= 200 && response.status < 300) {
            const data = await response.json()
            this.content.innerHTML = data.content
            this.sorting.innerHTML = data.sorting
        } else {
            console.error(response);
        }
    }
};
