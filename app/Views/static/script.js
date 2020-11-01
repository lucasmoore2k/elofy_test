

var table = null;
var tall = null;
var height = null;


function edit(id){
 location.href = 'clients_update.php?action=read&id='+id;
}

function toDelet(id){
 location.href = 'clients_search.php?action=delete&id='+id;
}

function hideTable(){
    table = document.getElementById('table').style.display = 'none'
}

function showTable(){
    table = document.getElementById('table').style.display = 'block'
}


