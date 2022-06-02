
$(function() {
    //var dateObj = <?php echo json_encode($booked_days); ?>;
    //var dateObj = ['2022-05-20'];
    $("#from").datepicker({

        beforeShowDay: function(date) {
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [dateObj.indexOf(string) == -1]
        },
        minDate: 0,
        changeYear: true,
        changeMonth: true,
        yearRange: "-100:+30",
    });
});

$(function() {
    //var dateObj = <?php echo json_encode($booked_days); ?>;
    //var dateObj = ['2022-05-20'];
    $("#to").datepicker({

        beforeShowDay: function(date) {
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [dateObj.indexOf(string) == -1]
        },
        minDate: 0,
        changeYear: true,
        changeMonth: true,
        yearRange: "-100:+30",
    });
});
