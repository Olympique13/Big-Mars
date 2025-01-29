document.addEventListener( 'DOMContentLoaded', function () {
    var typeElements = document.getElementsByName( 'contact[type]' );
    var companyGroup = document.querySelector( '#company-group' );
    var talentGroup = document.querySelector( '#talent-group' );

    typeElements.forEach( ( item ) => {
        if ( item.checked ) {
            console.log( item.value );
            if ( item.value === 'Talent' ) {
                talentGroup.style.display = "block";
                companyGroup.style.display = "none";
            } else if ( item.value === 'Entreprise' ) {
                companyGroup.style.display = "block";
                talentGroup.style.display = "none";
            }
        }
    } )

    typeElements.forEach( function ( item ) {
        item.addEventListener( 'change', function ( e ) {
            console.log( e.target.checked )
            if ( item.value === 'Talent' ) {
                talentGroup.style.display = "block";
                companyGroup.style.display = "none";
            } else if ( item.value === 'Entreprise' ) {
                companyGroup.style.display = "block";
                talentGroup.style.display = "none";
            }
        } );
    } );
} );


