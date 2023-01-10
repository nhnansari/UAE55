
$.ajaxSetup({
    beforeSend: function(xhr) {
        xhr.setRequestHeader('X-CSRF-TOKEN',  $('meta[name="csrf-token"]').attr('content'));
    }
});

function addFavorite($id){
    let url="/favorites/add/"+$id
    var jqxhr = $.post( url, function(res) {
        alert( res.message );
    })
    .fail(function(res) {
        alert( res );
    })
}
function removeFavorite($id){
    let url="/favorites/remove/"+$id
    var jqxhr = $.post( url, function(res) {
    alert( res.message );
    })
    .fail(function(res) {
        alert( res );
    })
}

function markSold($id){
    let url="/ad/mark_sold/"+$id
    var jqxhr = $.post( url, function(res) {
         alert( res );
         window.location = window.location
    })
    .fail(function(res) {

        alert( res.responseText );
    })
}
function deleteAd($id){
    let url="/ad/delete/"+$id
    var jqxhr = $.post( url, function(res) {
        alert( res.message );
    })
    .fail(function(res) {
        alert( res );
    })
}
function placeBid($id){
    let price = $("#bid_price").val()
    if(price>0){
        let url="/bid/place/"+$id
        var jqxhr = $.post( url,{price:price}, function(res) {
             alert( res.message );
             window.location = window.location
        })
        .fail(function(res) {

            alert( res.responseText );
        })
    }
    else{
        alert("Please enter the price.")
    }

}

$(document).ready(function()
{
    var a = $(".prevent");
    a.click(function(e)
    {
        e.preventDefault();

    });
});
