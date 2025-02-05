import $ from 'jquery';

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

document.addEventListener( "DOMContentLoaded", function () {
    
    $(function(){
        $('#formEventReg').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    if(response.code === 400) {
                        // error
                        $('#errorEvent').css('display', 'block');
                        $('#successEvent').css('display', 'none');
                        $('#formEventReg .text-red-600').remove();
                        for (const [field, message] of Object.entries(response.errors)) {
                            const errorElement = $(`<div class="text-red-600 text-sm">${message}</div>`);
                            $(`#formEventReg [name="event_reg[${field}]"]`).after(errorElement);
                        }
                    } else {
                        $('#successEvent').css('display', 'block');
                        $('#errorEvent').css('display', 'none');
                        $('#formEventReg .text-red-600').remove();
                    }

                    $('#formEventReg').trigger("reset");
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });


} );

console.log( 'eventReg log' );