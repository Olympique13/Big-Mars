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
                        for (const [field, message] of Object.entries(response.errors)) {
                            const errorElement = $(`<div class="text-red-600 text-sm">${message}</div>`);
                            $(`#formContact [name="contact[${field}]"]`).after(errorElement);
                        }
                    } else {
                        $('#successContact').css('display', 'block');
                        $('#formContact').trigger("reset");
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
} );

