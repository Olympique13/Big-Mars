import Cleave from 'cleave.js';
require( 'cleave.js/dist/addons/cleave-phone.fr' );

import $ from 'jquery';

var cleave = new Cleave( '.input-phone', {
    phone: true,
    phoneRegionCode: 'fr',
} );

var cleaveZipcode = new Cleave( '.input-zipcode', {
    numericOnly: true,
    blocks: [ 5 ],
} )

document.addEventListener( 'DOMContentLoaded', function () {
    var typeElements = document.getElementsByName( 'contact[type]' );
    var companyGroup = document.querySelector( '#company-groups' );

    typeElements.forEach( ( item ) => {
        if ( item.checked ) {
            console.log( item.value );
            if ( item.value === 'Joueur' ) {
                companyGroup.style.display = "none";
            } else if ( item.value === 'Entreprise' ) {
                companyGroup.style.display = "block";
            }
        }
    } )

    typeElements.forEach( function ( item ) {
        item.addEventListener( 'change', function ( e ) {
            console.log( e.target.checked )
            if ( item.value === 'Joueur' ) {
                companyGroup.style.display = "none";
            } else if ( item.value === 'Entreprise' ) {
                companyGroup.style.display = "block";
            }
        } );
    } );


    // Soumission du formulaire de contact en ajax
    $(function(){
        $('#formContact').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    if(response.code === 400) {
                        // error
                        $('#errorContact').css('display', 'block');
                        $('#successContact').css('display', 'none');
                        for (const [field, message] of Object.entries(response.errors)) {
                            const errorElement = $(`<div class="text-red-600 text-sm">${message}</div>`);
                            $(`#formContact [name="contact[${field}]"]`).after(errorElement);
                        }
                    } else {
                        $('#successContact').css('display', 'block');
                        $('#errorContact').css('display', 'none');
                        $('#formContact .text-red-600').remove(); // Remove previous error messages

                    }

                    $('#formContact').trigger("reset");
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });

    window.addEventListener('scroll', function() {
        var robot1 = this.document.getElementById('robotPosture2');
        var robot2 = this.document.getElementById('robotPostureTelephone');
        var robotAssis = this.document.getElementById('robotAssis')

        if(robot1){
            if (window.scrollY > 250 || window.scrollY > 130) {
                robot1.classList.remove('robotPosture2');
                robot1.classList.add('robotPosture2_reverse');
                robot1.classList.add('robotPosture2_reverse');
            }
            else {
                robot1.classList.add('robotPosture2');
                robot1.classList.remove('robotPosture2_reverse');
            }
        }
        if(robot2){
            if (window.scrollY > 2630 || window.scrollY < 1300) {
                robot2.classList.remove('robotPostureTelephone');
                robot2.classList.add('robotPostureTelephone_reverse');
            } else {
                robot2.classList.add('robotPostureTelephone');
                robot2.classList.remove('robotPostureTelephone_reverse');
            }
        }
        if(robotAssis){
            if(window.scrollY > 2035 || window.scrollY < 1215 ){
                robotAssis.classList.remove('robotPosture1');
                robotAssis.classList.add('robotPosture1_reverse');
            } else {
                robotAssis.classList.add('robotPosture1');
                robotAssis.classList.remove('robotPosture1_reverse');
            }
        }
    });

    console.log(window.scrollY);

} );

