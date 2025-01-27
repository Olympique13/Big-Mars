import Cleave from 'cleave.js';
require( 'cleave.js/dist/addons/cleave-phone.fr' );
var cleave = new Cleave( '.input-phone', {
    phone: true,
    phoneRegionCode: 'fr',
} )