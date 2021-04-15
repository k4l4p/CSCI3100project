$(document).ready(function(e) {
    $('.close').click(function(){
        var $target = $(this).parents('li');
        $target.hide('slow', function(){ $target.remove(); });
    })
});