const inputSearch = $('#search');
var strSearch = "";
var strSearchLast = "";
var formSearch = new FormData();
var regexSearch = '/^[a-zA-Z0-9._- ]+$/';

const buscar = () => {
    strSearch = $('#search').val();
    
    if (strSearch == "") {
        // console.log('Nada que buscar');
        $('.results').remove();
    } else {
        if (strSearchLast != strSearch) {
            $('.results').remove();
            $('.ul-results').remove();
            console.log('Buscando...' + strSearch);
            formSearch.append("strSearch", strSearch);
            $('#buscando').before('<ul class="ul-results"></ul>');
            $.ajax({
                url: 'ajax/ajax.php', 
                method: "post", 
                data: formSearch, 
                cache: false, 
                contentType: false, 
                processData: false, 
                dataType: "json", 
                success: function (r) {
                    $.each(r, function(i, v){
                        $('.ul-results').append('<li class="results"><a href="index.php?action=producto&idpro=' + r[i].idpro + '">' + r[i].nombre + '</a></li>');
                        // console.log(r[i].nombre);
                    })
                }
            })
            strSearchLast = strSearch;
        }else{
            
        }
        
    }

}

inputSearch.on('keyup', buscar)