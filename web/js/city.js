$(document).ready( function () {

    var table = $('#citiesTable').DataTable( {
        'ajax': 'http://localhost/web/index.php?r=city/list',
        columns: [
            { data: 'n'},
            { data: 'g'},
            { data: 'p'},
            { data: 'w'},
        ]
    } );

     var isReady = true;
     var interval = '';

    table.on( 'search.dt', function () {
        $("input[type='search']").keypress(function( event ) {
            if(isReady && table.search().length > 2) {
                console.log(table.search());
                isReady = false;
                interval = setInterval(dataFilter, 2000);;
                
            }
        })
    } );

    function dataFilter() {
        var city = table.search().replace(',', ' ');
        table.ajax.url(`http://localhost/web/index.php?r=city/list&name=${city}`)
            .load();
        clearInterval(interval);
        isReady = true;
    }

} );