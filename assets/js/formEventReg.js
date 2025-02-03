import Cleave from 'cleave.js';
require( 'cleave.js/dist/addons/cleave-phone.fr' );

var cleave = new Cleave( '.input-phone', {
    phone: true,
    phoneRegionCode: 'fr',
} );

var cleaveZipcode = new Cleave( '.input-zipcode', {
    numericOnly: true,
    blocks: [ 5 ],
} );

var cleaveBirthDate = new Cleave( '.input-birthDate', {
    date: true,
    datePattern: [ 'd', 'm', 'Y' ],
    delimiter: '/',
    dateMin: '01/01/1938',
    dateMax: '01/01/2025',
} );