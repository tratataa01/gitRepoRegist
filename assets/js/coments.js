$(document).ready(function () {

    $('.answerButton').click(function () {
        var comentid = $(this).attr('data-id');
        console.log(comentid);
        $("#comentid").val(comentid);
    })
})
