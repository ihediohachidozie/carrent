

<script>
    $(function() {
        var dateObj = <?php echo json_encode($booked_days); ?>;
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
</script>

<script>
    $(function() {
        var dateObj = <?php echo json_encode($booked_days); ?>;
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
</script>