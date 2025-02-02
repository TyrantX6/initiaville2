/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.scss';



// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

import 'jquery';
import 'bootstrap';


// code JavaScript pour surveiller les changements de fichiers dans les uploads.

let input = document.getElementById('project_pictureFile');

input.addEventListener('change', function () {
    let label = document.querySelector('.custom-file-label');
    label.innerHTML = this.value;
});
