/* import Filter from './modules/Filter'; */

import './styles/pagination.css';
import './styles/productCard.css';
import './styles/noUi.css';
import './styles/spinner.css';
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
        if (this.pagination) {

            this.sorting.addEventListener('click', aClickListener)
            this.pagination.addEventListener('click', aClickListener)
            this.form.querySelectorAll('input').forEach(input => {
                input.addEventListener('change', this.loadForm.bind(this))
            })
        }
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
        this.showLoader();//we display the spinner as long as the page is not fully loaded
        const params = new URLSearchParams(url.split('?')[1] || '')
        params.set('ajax', 1)

        const response = await fetch(url.split('?')[0] + '?' + params.toString(), {
            headers: {
                'X-Requested-with': 'XMLHttpRequest'
            }
        })
        if (response.status >= 200 && response.status < 300) {
            const data = await response.json()
            this.content.innerHTML = data.content
            this.sorting.innerHTML = data.sorting
            this.pagination.innerHTML = data.pagination
            params.delete('ajax')
            /* To manage the url page */
            history.replaceState({}, '', url.split('?')[0] + '?' + params.toString())
        } else {
            console.error(response);
        }
        this.hideLoader();//we hide the spinner at the full display of the page
    }
    /**
     * show the spinner
     */
    showLoader() {
        this.form.classList.add('is-loading');
        const loader = this.form.querySelector('.js-loading');
        if (loader === null) {
            return
        }
        loader.setAttribute('aria-hidden', 'false') //for the field to be read by an automatic reader for the hearing impaired
        loader.style.display = null;//show spinner

    }
    /**
     * Hide the spinner
     */
    hideLoader() {
        this.form.classList.remove('is-loading');
        const loader = this.form.querySelector('.js-loading');
        if (loader === null) {
            return
        }
        loader.setAttribute('aria-hidden', 'true') //for the field to be NOT read by an automatic reader for the hearing impaired
        loader.style.display = 'none';//hide spinner
    }
};
new Filter(document.querySelector('.js-filter'));