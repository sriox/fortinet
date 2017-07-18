(function(){
    //$('#table_canvas').perfectScrollbar();
    
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
        ],
        scrollY: 350,
        scrollX: true,
        pageLength: 50,
        initComplete: function(){
            this.api().columns([0, 1, 4, 5, 7]).every(function(){
                var column = this;
                var select = $('<select><option value="">Show All</option></select>')
                .appendTo($(column.footer()).empty())
                .on('change', function(){
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    column.search(val ? '^'+val+'$':'', true, false).draw();
                });
                column.data().unique().sort().each(function(d, j){
                    console.log(d, j);
                    var val = $(d).text();
                    if(column.search() === '^'+d+'$'){
                        select.append($('<option value="' + val + '" selected>' + val + '</option>'));
                    }else{
                        select.append($('<option value="' + val + '">' + val + '</option>'));
                    }
                });
            });
        }
    });
})();