(function(){
    //$('#table_canvas').perfectScrollbar();
    
    $('#table').DataTable({
        paging: true,
        "columnDefs": [
            {
                "targets": [ 10 ],
                "visible": false            
            }
        ],
        scrollY: 350,
        scrollX: true,
        pageLength: 50
    });
})();