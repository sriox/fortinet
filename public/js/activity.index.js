(function(){

    

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
        fnDrawCallback: function(){
            $('#preloader').hide();
            $('#table_canvas').show();
        },
        initComplete: function(){
            this.api().columns([0, 4, 5, 7]).every(function(index){
                var column = this;
                // $('<br />').appendTo(column.header());
                var select = $('<select id="filter_' + index + '"><option value="">Show All</option></select>')
                .appendTo($(column.footer()).empty())
                // .appendTo($(column.header()))
                .on('change', function(e){
                    console.log($(this).parent());
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    column.search(val ? '^'+val+'$':'', true, false).draw();
                    excelUtil.setFilter($(column.header()).text(), $(e.target).val());
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