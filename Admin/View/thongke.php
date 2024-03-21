<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        <?php
        if ($ac == 1) {
            echo 'drawPieChart();';
        } else if ($ac == 2) {
            echo 'drawLineChart();';
        } else if ($ac == 3) {
            echo 'drawBarChart();'; // Change this to draw the appropriate chart for the "least" action
        }
        ?>
    }

    function drawPieChart() {
        var pieData = new google.visualization.DataTable();
        pieData.addColumn('string', 'Tên hàng hóa');
        pieData.addColumn('number', 'Số lượng bán');

        <?php
        $hh = new hanghoa();
        $result = $hh->getThongKe();
        while ($set = $result->fetch()) {
            $tenhh = $set['tenhh'];
            $slb = $set['soluong'];
            echo "pieData.addRow(['$tenhh', $slb]);";
        }
        ?>

        var pieOptions = {
            title: 'Thống kê số lượng bán nhiều nhất',
            width: 1000,
            height: 600,
            backgroundColor: '#f0f0f0',
            pieSliceTextStyle: {
                color: 'black',
                fontSize: 14,
            },
            legend: {
                position: 'right',
                alignment: 'center',
                textStyle: {
                    color: 'black',
                    fontSize: 14,
                },
            },
            pieHole: 0.4,
        };

        var pieChart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
        pieChart.draw(pieData, pieOptions);
    }

    function drawLineChart() {
        var lineData = new google.visualization.DataTable();
        lineData.addColumn('string', 'Tên hàng hóa');
        lineData.addColumn('number', 'Số lượng tồn');

        <?php
        $sltResult = $hh->getSLT();
        while ($set = $sltResult->fetch()) {
            $tenhh = $set['tenhh'];
            $soluongton = $set['soluong'];
            echo "lineData.addRow(['$tenhh', $soluongton]);";
        }
        ?>

        var lineOptions = {
            title: 'Biểu đồ số lượng tồn của các mặt hàng',
            width: 1000,
            height: 600,
            backgroundColor: '#f0f0f0',
            curveType: 'function',
            legend: {
                position: 'right',
                alignment: 'center',
                textStyle: {
                    color: 'black',
                    fontSize: 14,
                },
            },
        };

        var lineChart = new google.visualization.LineChart(document.getElementById('line_chart_div'));
        lineChart.draw(lineData, lineOptions);
    }
    function drawBarChart() {
        var barData = new google.visualization.DataTable();
        barData.addColumn('string', 'Tên hàng hóa');
        barData.addColumn('number', 'Số lượng Min');
        barData.addColumn('number', 'Số lượng Max');

        <?php
        $minResult = $hh->getMin();
        while ($set = $minResult->fetch()) {
            $tenhh = $set['tenhh'];
            $soluongMin = $set['soluong'];
            // Retrieve the actual maximum value using $hh->getMax()
            $soluongMax = 10;
            echo "barData.addRow(['$tenhh', $soluongMin, $soluongMax]);";
        }
        ?>

        var barOptions = {
            title: 'Biểu đồ cột',
            width: 1000,
            height: 600,
            backgroundColor: '#f0f0f0',
            legend: {
                position: 'right',
                alignment: 'center',
                textStyle: {
                    color: 'black',
                    fontSize: 14,
                },
            },
            bars: 'vertical',
            vAxis: {
                title: 'Tên hàng hóa',
                titleTextStyle: {
                    color: 'black',
                    fontSize: 14,
                },
                textStyle: {
                    color: 'black',
                    fontSize: 12,
                }
            },
            hAxis: {
                title: 'Số lượng',
                titleTextStyle: {
                    color: 'black',
                    fontSize: 14,
                },
                textStyle: {
                    color: 'black',
                    fontSize: 12,
                }
            }
        };

        var barChart = new google.visualization.BarChart(document.getElementById('bar_chart_div'));
        barChart.draw(barData, barOptions);
    }


</script>