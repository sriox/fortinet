(function(){
    $('#table_canvas').perfectScrollbar();
    
    $('#table').DataTable({
        paging: true,
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false            
            },
            {
                "targets": [ 10 ],
                "visible": false            
            }
        ]
    });
})();