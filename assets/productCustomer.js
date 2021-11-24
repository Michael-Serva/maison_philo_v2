/* import Filter from './modules/Filter'; */

import './styles/pagination.css';
import './styles/productCard.css';
import './styles/noUi.css';
/* import scripts */
import './scripts/rangeButton';




/**
 * @property {HTMLElement} pagination
 * @property {HTMLElement} content
 * @property {HTMLElement} sorting
 * @property {HTMLFormElement} form
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
       const aClickListener = e => {
            if (e.target.tagName === 'A') {
                e.preventDefault()
                this.loadUrl(e.target.getAttribute('href'))
            }
        }

        this.sorting.addEventListener('click', aClickListener)
        this.pagination.addEventListener('click',aClickListener)
        this.form.querySelectorAll('input').forEach(input => {
            input.addEventListener('change', this.loadForm.bind(this))
        })
    }
    async loadForm() {
        const data = new FormData(this.form)
        /* creation of a new url / if it does not exist we retrieve the current url */
        const url = new URL(this.form.getAttribute('action') || window.location.href)
        /* Dynamic construction of url parameters */
        const params = new URLSearchParams()
        data.forEach((value, key) => {
            params.append(key, value)
        })
        return this.loadUrl(url.pathname + '?' + params.toString())
    }

    async loadUrl(url) {
        /* we build the url entirely so as not to display json if the user goes back */
        const ajaxUrl = url + '&ajax=1'
        const response = await fetch(ajaxUrl, {
            headers: {
                'X-Requested-with': 'XMLHttpRequest'
            }
        })
        if (response.status >= 200 && response.status < 300) {
            const data = await response.json()
            this.content.innerHTML = data.content
            this.sorting.innerHTML = data.sorting
            this.pagination.innerHTML = data.pagination
            /* To manage the url page */
            history.replaceState({}, '', url)
        } else {
            console.error(response);
        }
    }
};
new Filter(document.querySelector('.js-filter'));