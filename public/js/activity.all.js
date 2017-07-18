(function(){
    

    
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
        pageLength: 50,
        bProcessing: true,
        // fnPreDrawCallback: function(){
        //     console.log('fnPreDrawCallback');
        //     $('#table_canvas').hide();
        // },
        fnDrawCallback: function(){
            $('#preloader').hide();
            $('#table_canvas').show();
        },
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
                    var val = $(d).text();
                    if(column.search() === '^'+d+'$'){
                        select.append($('<option value="' + val + '" selected>' + val + '</option>'));
                    }else{
                        select.append($('<option value="' + val + '">' + val + '</option>'));
                    }
                    
                });
            });
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        }
    });
})();