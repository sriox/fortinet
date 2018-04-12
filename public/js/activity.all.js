(function(){
    
    // function processData(rawData){
    //     // if(typeof rawData == 'object'){
    //         var data = [];

    //         for(var key in rawData){
    //             var item = rawData[key];
    //             if(!isNaN(key)){
    //                 var row = {};
    //                 for(var cel in item){
    //                     row[cel] = $(item[cel]).text();
    //                 }
    //                 data.push(row);
    //             }
    //         }
    //         var byUser = {};
    //         var byCountry = {};
    //         var byTechnology = {};

    //         data.forEach(function(element) {
    //             byUser[element[0]] = byUser[element[0]] || {};
    //             byUser[element[0]].time = byUser[element[0]].time || 0;
    //             byUser[element[0]].time += parseFloat(element[12]);

    //             byCountry[element[5]] = byCountry[element[5]] || {};
    //             byCountry[element[5]].time = byCountry[element[5]].time || 0;
    //             byCountry[element[5]].time += parseFloat(element[12]);

    //             byTechnology[element[7]] = byTechnology[element[7]] || {};
    //             byTechnology[element[7]].time = byTechnology[element[7]].time || 0;
    //             byTechnology[element[7]].time += parseFloat(element[12]);
    //         }, this);

    //         console.log(byUser);
    //         console.log(byCountry);
    //         console.log(byTechnology);
    // }
    
    var table = $('#table').DataTable({
        paging: true,
        "columnDefs": [
            {
                "targets": [ 11 ],
                "visible": false            
            }
        ],
        scrollY: 700,
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

            this.api().columns([0, 1, 5, 6, 7, 9]).every(function(index) {
                var column = this;
                var name = $(column.header()).text();
                var select = $('<select class="table-filter" name="' + name + '"><option value="">Show All</option></select>')
                // .appendTo($(column.footer()).empty())
                .appendTo($(column.header()).append($('<br/>')))
                .on('change', function(){
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    column.search(val ? '^'+val+'$':'', true, false).draw();
                    var filtersData = {};
                    $('.table-filter').each(function(el){
                        if(!!$(this).val()){
                            filtersData[$(this).attr('name')] = $(this).val();
                        }
                    });
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
        },
        // dom: 'Bfrtip',
        // buttons: [
        //     'csv'
        // ]
    });

    table.buttons().container().insertBefore('#table_filter');
})();