document.addEventListener( "DOMContentLoaded", function () {
    const btEventReg = document.getElementById( 'btEventReg' );
    const eventReg = document.getElementById( 'eventReg' );
    const eventContent = document.getElementById( 'eventContent' );

    if ( btEventReg && eventReg && eventContent ) {
        btEventReg.addEventListener( "click", function () {
            eventReg.style.display = "flex";
            eventReg.style.flexDirection = "column";
            eventReg.style.alignItems = "center";
            eventContent.style.display = "none";
        } )
    }
} );

console.log( 'eventReg log' );