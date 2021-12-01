/**
 * For hide or show alert in index account page
 */
const alertCom = document.querySelector('#alertCom');
const comments = document.querySelectorAll('.comments');
const alertHide = document.querySelector('#alert');
if (comments) {
    for (let i = 0; i < comments.length; i++) {

        comments[i].addEventListener('click', function name(params) {
            alertCom.style.display = null;
        })
    }
    alertCom.addEventListener('click', function name(params) {
        alertCom.style.display = 'none';
    })
}
if (alertHide) {
    alertHide.addEventListener('click', function name(params) {
        alertHide.style.display = 'none';
    })
}