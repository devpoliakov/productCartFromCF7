$(document).ready(function(){
    $('input[value="with print"]').click(function(){
        $('.filehider .file_container').show();
    });
    $('input[value="without print"]').click(function(){
        $('.filehider .file_container').hide();
    });
});