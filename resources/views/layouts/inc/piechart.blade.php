<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var month = <?php echo json_encode($month); ?>;
    var amount = <?php echo json_encode($amount); ?>;
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            //labels: ["Blue", "Red", "Yellow", "Green"],
            labels: month,
            datasets: [{
                //data: [12.21, 15.58, 11.25, 8.32],
                data: amount,
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#F535AA', '#B3446C', 
                '#583759', '#CCCCFF', '#967BB6', '#800080', '#342D7E', '#614051'],
            }],
        },
    });
</script>