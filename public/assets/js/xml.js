$(document).on("click",".tab", function () {
    var tabId = $(this).data('tab');
    $('.tab').removeClass('is-active');
    $(this).addClass('is-active'); // or var clickedBtnID = this.id
    $('.content-tab').addClass('is-hidden');
    $('#' + tabId).removeClass('is-hidden');
});

$(document).on('click', '.button', function(){
    $.post('dumps', { xml: $(this).text() })
        .done(function(data){
            $(".xml-dump").html(data.DOM);
        });
});