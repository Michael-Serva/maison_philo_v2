//https://refreshless.com/nouislider/
// <div id="slider"></div>

// Or the namespace:
import * as noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';

const slider = document.getElementById('price-slider');

if (slider) {
    const range = noUiSlider.create(slider, {
        start: [1000, 1000000],
        connect: true,
        step : 100,
        range: {
            'min': 1000,
            'max': 1000000
        }
    })
    const min = document.getElementById('min')
    const max = document.getElementById('max')
    range.on('slide', function (values, handle) {
        if (handle === 0) {
            min.value = Math.round(values[0])
        }
        if (handle === 1) {
            max.value = Math.round(values[1])
        }
    })
}
