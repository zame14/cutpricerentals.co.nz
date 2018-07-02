jQuery(function($) {
    $('.datepicker_pickup').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        startDate: new Date()
    });

    $('.datepicker_return').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '+1d'
    });
});