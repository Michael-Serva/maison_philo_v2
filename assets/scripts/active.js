// function setActive() {
//     aObj = document.getElementById('navbarSupportedContent').getElementsByTagName('a');
//     liObj = document.getElementById('navbarSupportedContent').getElementsByTagName('li');
//     for (i = 0; i < aObj.length; i++) {
//         if (document.location.href.indexOf(aObj[i].href) >= 0) {
//             liObj[i].classList.add('active');
//         }
//     }
// }
// window.onload = setActive;

function setActive() {
    var aObj = document.getElementById('navbarSupportedContent').getElementsByTagName('a');
    for (var i = 0; i < aObj.length; i++) {
        if (document.location.href == aObj[i].href) {
            aObj[i].classList.add('actived');
        }
    }
}
window.onload = setActive;