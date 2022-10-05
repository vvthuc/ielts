
var WGSCRIPT = {};
WGSCRIPT.initSave = function(){
    $(document).on('click', '.widget-control-save', function(event) {
        event.preventDefault();
        var saveID   = $( this ).attr( 'id' );
        var ID       = saveID.replace( /-savewidget/, '' );
        var numberID = ID + '-the_random_number';
        var randNum  = $( '#'+numberID ).val();
        var textTab  = ID + '-wp_editor_' + randNum + '-html';
        $( '#'+textTab ).trigger( 'click' );
    });
}
$(function() {
    WGSCRIPT.initSave();
});