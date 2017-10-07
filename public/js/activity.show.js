(function(){
    $('.datepicker').datepicker({
        'dateFormat': dateFormat
    });

    $('.btnedit').on('click', function(e){
        e.preventDefault();
        var obj = $(e.target).parent();
        
        edit({
            id: obj.data('id'),
            date: obj.data('date'),
            description: obj.data('description'),
            time: obj.data('time')
        });

        markWork(obj.parent().parent());
        
    });

    var edit = (data) => {
        $('#hdnwork').val(data.id);
        $('#txtdate').val(data.date);
        $('#txtdescription').val(data.description);
        $('#txttime').val(data.time);
        $('#btnsubmit').val('Edit Work');
    };

    var markWork = (row) => {
        $('.row-editing').removeClass('row-editing');
        $(row).addClass('row-editing');
    };
})();