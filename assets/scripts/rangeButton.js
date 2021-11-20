//https://refreshless.com/nouislider/
// <div id="slider"></div>

import noUiSlider from 'nouislider';

const slider = document.getElementById('price-Slider');

if (slider) {
    noUiSlider.create(slider, {
        start: [20, 80],
        connect: true,
        range: {
            'min': 0,
            'max': 100
        }
    });
}
