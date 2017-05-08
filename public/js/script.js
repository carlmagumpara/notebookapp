$(document).ready(function(){
    $('.note-item').click(function(){
        var id = $(this).attr('id');
        $('.note-body-'+id).slideToggle();
    });
});