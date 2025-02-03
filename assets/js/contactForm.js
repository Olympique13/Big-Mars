import Cleave from 'cleave.js';
require( 'cleave.js/dist/addons/cleave-phone.fr' );

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
} );

console.log( 'log du contact form' )


