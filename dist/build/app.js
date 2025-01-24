"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _bootstrap_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./bootstrap.js */ "./assets/bootstrap.js");
/* harmony import */ var _styles_app_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./styles/app.css */ "./assets/styles/app.css");

/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */


// View : AfficherArticles
// Ajoute un écouteur d'événement pour intercepter la soumission du formulaire
// document.getElementById( 'search-form' ).addEventListener( 'submit', function ( event ) {
//     event.preventDefault(); // Empêche la soumission normale du formulaire
//     let form = event.target; // Récupère le formulaire soumis
//     let formData = new FormData( form ); // Crée un objet FormData avec les données du formulaire

//     // Envoie une requête fetch avec les données du formulaire
//     fetch( form.action, {
//         method: form.method, // Utilise la méthode du formulaire (GET ou POST)
//         body: formData, // Envoie les données du formulaire
//         headers: {
//             'X-Requested-With': 'XMLHttpRequest' // Indique que la requête est faite en AJAX
//         }
//     } )
//         .then( response => response.json() ) // Convertit la réponse en JSON
//         .then( data => {
//             let articlesContainer = document.getElementById( 'articles-container' ); // Récupère le conteneur des articles
//             articlesContainer.innerHTML = data.content; // Met à jour le contenu du conteneur avec les nouveaux articles
//         } )
//         .catch( error => console.error( 'Error:', error ) ); // Affiche une erreur en cas de problème
// } );

/***/ }),

/***/ "./assets/bootstrap.js":
/*!*****************************!*\
  !*** ./assets/bootstrap.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _symfony_stimulus_bridge__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @symfony/stimulus-bridge */ "./node_modules/@symfony/stimulus-bridge/dist/index.js");


// Initialise Stimulus
var app = (0,_symfony_stimulus_bridge__WEBPACK_IMPORTED_MODULE_0__.startStimulusApp)();

/***/ }),

/***/ "./assets/styles/app.css":
/*!*******************************!*\
  !*** ./assets/styles/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_symfony_stimulus-bridge_dist_index_js"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7OztBQUF3QjtBQUN4QjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDMEI7O0FBRTFCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7OztBQzlCNEQ7O0FBRTVEO0FBQ0EsSUFBTUMsR0FBRyxHQUFHRCwwRUFBZ0IsQ0FBQyxDQUFDOzs7Ozs7Ozs7OztBQ0g5QiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9hcHAuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2Jvb3RzdHJhcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2FwcC5jc3M/NmJlNiJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgJy4vYm9vdHN0cmFwLmpzJztcclxuLypcclxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxyXG4gKlxyXG4gKiBUaGlzIGZpbGUgd2lsbCBiZSBpbmNsdWRlZCBvbnRvIHRoZSBwYWdlIHZpYSB0aGUgaW1wb3J0bWFwKCkgVHdpZyBmdW5jdGlvbixcclxuICogd2hpY2ggc2hvdWxkIGFscmVhZHkgYmUgaW4geW91ciBiYXNlLmh0bWwudHdpZy5cclxuICovXHJcbmltcG9ydCAnLi9zdHlsZXMvYXBwLmNzcyc7XHJcblxyXG4vLyBWaWV3IDogQWZmaWNoZXJBcnRpY2xlc1xyXG4vLyBBam91dGUgdW4gw6ljb3V0ZXVyIGQnw6l2w6luZW1lbnQgcG91ciBpbnRlcmNlcHRlciBsYSBzb3VtaXNzaW9uIGR1IGZvcm11bGFpcmVcclxuLy8gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoICdzZWFyY2gtZm9ybScgKS5hZGRFdmVudExpc3RlbmVyKCAnc3VibWl0JywgZnVuY3Rpb24gKCBldmVudCApIHtcclxuLy8gICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7IC8vIEVtcMOqY2hlIGxhIHNvdW1pc3Npb24gbm9ybWFsZSBkdSBmb3JtdWxhaXJlXHJcbi8vICAgICBsZXQgZm9ybSA9IGV2ZW50LnRhcmdldDsgLy8gUsOpY3Vww6hyZSBsZSBmb3JtdWxhaXJlIHNvdW1pc1xyXG4vLyAgICAgbGV0IGZvcm1EYXRhID0gbmV3IEZvcm1EYXRhKCBmb3JtICk7IC8vIENyw6llIHVuIG9iamV0IEZvcm1EYXRhIGF2ZWMgbGVzIGRvbm7DqWVzIGR1IGZvcm11bGFpcmVcclxuXHJcbi8vICAgICAvLyBFbnZvaWUgdW5lIHJlcXXDqnRlIGZldGNoIGF2ZWMgbGVzIGRvbm7DqWVzIGR1IGZvcm11bGFpcmVcclxuLy8gICAgIGZldGNoKCBmb3JtLmFjdGlvbiwge1xyXG4vLyAgICAgICAgIG1ldGhvZDogZm9ybS5tZXRob2QsIC8vIFV0aWxpc2UgbGEgbcOpdGhvZGUgZHUgZm9ybXVsYWlyZSAoR0VUIG91IFBPU1QpXHJcbi8vICAgICAgICAgYm9keTogZm9ybURhdGEsIC8vIEVudm9pZSBsZXMgZG9ubsOpZXMgZHUgZm9ybXVsYWlyZVxyXG4vLyAgICAgICAgIGhlYWRlcnM6IHtcclxuLy8gICAgICAgICAgICAgJ1gtUmVxdWVzdGVkLVdpdGgnOiAnWE1MSHR0cFJlcXVlc3QnIC8vIEluZGlxdWUgcXVlIGxhIHJlcXXDqnRlIGVzdCBmYWl0ZSBlbiBBSkFYXHJcbi8vICAgICAgICAgfVxyXG4vLyAgICAgfSApXHJcbi8vICAgICAgICAgLnRoZW4oIHJlc3BvbnNlID0+IHJlc3BvbnNlLmpzb24oKSApIC8vIENvbnZlcnRpdCBsYSByw6lwb25zZSBlbiBKU09OXHJcbi8vICAgICAgICAgLnRoZW4oIGRhdGEgPT4ge1xyXG4vLyAgICAgICAgICAgICBsZXQgYXJ0aWNsZXNDb250YWluZXIgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCggJ2FydGljbGVzLWNvbnRhaW5lcicgKTsgLy8gUsOpY3Vww6hyZSBsZSBjb250ZW5ldXIgZGVzIGFydGljbGVzXHJcbi8vICAgICAgICAgICAgIGFydGljbGVzQ29udGFpbmVyLmlubmVySFRNTCA9IGRhdGEuY29udGVudDsgLy8gTWV0IMOgIGpvdXIgbGUgY29udGVudSBkdSBjb250ZW5ldXIgYXZlYyBsZXMgbm91dmVhdXggYXJ0aWNsZXNcclxuLy8gICAgICAgICB9IClcclxuLy8gICAgICAgICAuY2F0Y2goIGVycm9yID0+IGNvbnNvbGUuZXJyb3IoICdFcnJvcjonLCBlcnJvciApICk7IC8vIEFmZmljaGUgdW5lIGVycmV1ciBlbiBjYXMgZGUgcHJvYmzDqG1lXHJcbi8vIH0gKTsiLCJpbXBvcnQgeyBzdGFydFN0aW11bHVzQXBwIH0gZnJvbSAnQHN5bWZvbnkvc3RpbXVsdXMtYnJpZGdlJztcclxuXHJcbi8vIEluaXRpYWxpc2UgU3RpbXVsdXNcclxuY29uc3QgYXBwID0gc3RhcnRTdGltdWx1c0FwcCgpO1xyXG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsic3RhcnRTdGltdWx1c0FwcCIsImFwcCJdLCJzb3VyY2VSb290IjoiIn0=