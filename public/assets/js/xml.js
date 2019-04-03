$(document).on("click",".tab", function () {
    var tabId = $(this).data('tab');
    $('.tab').removeClass('is-active');
    $(this).addClass('is-active'); // or var clickedBtnID = this.id
    $('.content-tab').addClass('is-hidden');
    $('#' + tabId).removeClass('is-hidden');
});

$(document).on('click', '.button', function(){
    var xmlType = $(this).text();
    var xmlButton = $(this);
    xmlButton.addClass('is-loading');
    $('.xml-test').removeClass('is-info');
    $('.xml-test').addClass('is-link');
    $.post('dumps', { xml: xmlType })
        .done(function(data){
            xmlButton.removeClass('is-loading');
            xmlButton.removeClass('is-link');
            xmlButton.addClass('is-info');
            Object.keys(data).forEach((el) =>{
                if(el === 'originalXML')
                    $('#'+ el).text(data[el]);
                else
                    $("#" + el + " .xml-dump").html(data[el]);
            });
            
        });
});