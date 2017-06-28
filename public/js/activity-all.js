(function(){
    $('#table_canvas').perfectScrollbar();
    
    $('#table').DataTable({
        paging: true,
        "columnDefs": [
            {
                "targets": [ 10 ],
                "visible": false            
            }
        ]
    });
})();