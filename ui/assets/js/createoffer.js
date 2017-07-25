$(document).ready(init);

function init () {
    $('.button').click(saveOffer)
}

// Retrieve values from HTML form
function setPayload() {
    var description = $('textarea[name="description"]').val();

    return {
       description: description,
       application_id: 1
    }
}

function saveOffer (){
    $.ajax ({
        url:'https://web10-2-norbertzsupun.c9users.io/api/offers/create',
        method: 'POST',
        data: setPayload(),
        success: function (result){
            alert ('Offer with id ' + result + ' was saved');
        },
        error: function (XHR, status, error) {
            alert ('Unable to save offer. Try again.');
        },
        complete: function (XHR, status) {},
    })
}