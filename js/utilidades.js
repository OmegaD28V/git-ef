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
                    if(r.length > 0){
                        console.log(r.length);
                        $.each(r, function(i, v){
                            if (localStorage.getItem('dark') === '1') {
                                $('.ul-results').append('<li class="results"><a class="a-results oscuro" href="index.php?action=producto&idpro=' + r[i].idpro + '">' + r[i].nombre + '</a></li>');
                                // console.log(r[i]);
                            }else{
                                $('.ul-results').append('<li class="results"><a class="a-results" href="index.php?action=producto&idpro=' + r[i].idpro + '">' + r[i].nombre + '</a></li>');
                                // console.log(r[i]);
                            }
                        })
                    }else{
                        $('.ul-results').append('<li class="results"><span class="noresults">Sin resultados</span></li>');
                        console.log();
                    }
                }
            })
            strSearchLast = strSearch;
        }else{
            
        }
        
    }

}

inputSearch.on('keyup', buscar)