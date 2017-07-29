$( document ).ready(init);
  function init(){
        getLast3();
    }

function getLast3(){
    $.ajax ({
        url: 'https://web10-2-lazarnicku.c9users.io/api/users/last3',
        method: 'GET',
        data: { 
            
        },
        success: function (result){
            console.log(result);
        },
        error: function (XHR, status, error){
            alert ("Unable to get Top 3 Users.");
        },
        complete: function( XHR, status){}
    })
}