<script>
     
  $(function() {
    $('.knob').knob({
        draw: function() {
            if (this.$.data('skin') == 'tron') {
                var a = this.angle(this.cv) // Angle
                    ,
                    sa = this.startAngle // Previous start angle
                    ,
                    sat = this.startAngle // Start angle
                    ,
                    ea // Previous end angle
                    ,
                    eat = sat + a // End angle
                    ,
                    r = true
                this.g.lineWidth = this.lineWidth
                this.g.beginPath()
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                this.g.stroke()
                this.g.lineWidth = 2
                this.g.beginPath()
                this.g.strokeStyle = this.o.fgColor
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
                this.g.stroke()
                return false
            }
        }
    })
    document.getElementById('knob1').value = document.getElementById('knob1').value + '%';
    document.getElementById('knob2').value = document.getElementById('knob2').value + '%';
    document.getElementById('knob3').value = document.getElementById('knob3').value + '%';
    document.getElementById('knob4').value = document.getElementById('knob4').value + '%';
})



var root3 = am5.Root.new("opex_chart");
root3.setThemes([am5themes_Animated.new(root3)]);
var chart3 = root3.container.children.push(
    am5xy.XYChart.new(root3, {
        panX: false,
        panY: false,
        wheelX: "panX",
        wheelY: "zoomX",
        layout: root3.verticalLayout
    })
);
chart3.set(
    "scrollbarX",
    am5.Scrollbar.new(root3, {
        orientation: "horizontal"
    })
);
var data3 = [
    <?php
    foreach ($profit_and_loss_dashboard['opex_arr'] as $key) {
        ?>
        {
    "years": "<?=$key['date']?>",
    "General & Admin":<?= $key['ga'] ?>,
    "Marketing & Sales": <?= $key['ms'] ?>,
    "OPEX Ratio": <?= $key['opex'] ?>
},
        <?php
    }
    ?>
];

var xAxis3 = chart3.xAxes.push(
    am5xy.CategoryAxis.new(root3, {
        categoryField: "years",
        renderer: am5xy.AxisRendererX.new(root3, {}),
        tooltip: am5.Tooltip.new(root3, {})
    })
);

xAxis3.data.setAll(data3);

var yAxis3 = chart3.yAxes.push(
    am5xy.ValueAxis.new(root3, {
        // min:0,
        // max:100000,
        extraMax: 0.1,
        
        renderer: am5xy.AxisRendererY.new(root3, {
        }),
    })
);


var series2 = chart3.series.push(
    am5xy.LineSeries.new(root3, {
        name: "OPEX Ratio",
        xAxis: xAxis3,
        stroke: "#000000",
        yAxis: yAxis3,
        valueYField: "OPEX Ratio",
        categoryXField: "years",
        tooltip: am5.Tooltip.new(root3, {
            pointerOrientation: "horizontal",
            labelText: "{name} in {categoryX}: {valueY} {info}"
        })
    })
);

series2.strokes.template.setAll({
    strokeWidth: 3,
    strokeDasharray: [5],
    templateField: "strokeSettings"
});


series2.data.setAll(data3);

series2.bullets.push(function() {
    return am5.Bullet.new(root3, {
        sprite: am5.Circle.new(root3, {
            strokeWidth: 3,
            stroke: series2.get("stroke"),
            radius: 5,
            fill: "#000000"
        })
    });
});

function chart_func(name, fieldName,bgColor) {
    var series1 = chart3.series.push(
        am5xy.ColumnSeries.new(root3, {
            name: name,
            stacked: true,
            xAxis: xAxis3,
            yAxis: yAxis3,
            valueYField: fieldName,
            categoryXField: "years",
            fill: bgColor,
            tooltip: am5.Tooltip.new(root3, {
                pointerOrientation: "horizontal",
                labelText: "{name} in {categoryX}: {valueY} {info}"
            })
        })
    );

    series1.columns.template.setAll({
        tooltipY: am5.percent(10),
        templateField: "columnSettings"
    });
    series1.data.setAll(data3);
    legend.data.setAll(chart3.series.values);
    series1.appear();
}

chart3.set("cursor", am5xy.XYCursor.new(root3, {}));

var legend = chart3.children.push(
    am5.Legend.new(root3, {
        centerX: am5.p50,
        x: am5.p50
    })
);
chart_func("General & Admin", "General & Admin","#078fd7")
chart_func("Marketing & Sales", "Marketing & Sales","#4fb3e9")
chart3.appear(1000, 100);





var root4 = am5.Root.new("earning_chart");
root4.setThemes([am5themes_Animated.new(root4)]);
var chart4 = root4.container.children.push(
    am5xy.XYChart.new(root4, {
        panX: false,
        panY: false,
        wheelX: "panX",
        wheelY: "zoomX",
        layout: root4.verticalLayout
    })
);
chart4.set(
    "scrollbarX",
    am5.Scrollbar.new(root4, {
        orientation: "horizontal"
    })
);
var data4 = [
    <?php
    foreach ($profit_and_loss_dashboard['ebit_arr'] as $key) {
        ?>
        {
    "years": "<?= $key['date'] ?>",
    "EBIT Actual":<?= $key['ebit_actual'] ?>,
    "EBIT Target": <?= $key['ebit_target'] ?>
},
        <?php
    }
    ?>
];

var xAxis4 = chart4.xAxes.push(
    am5xy.CategoryAxis.new(root4, {
        categoryField: "years",
        renderer: am5xy.AxisRendererX.new(root4, {}),
        tooltip: am5.Tooltip.new(root4, {})
    })
);

xAxis4.data.setAll(data4);
var yAxis4 = chart4.yAxes.push(
    am5xy.ValueAxis.new(root4, {
        // min:0,
        // max:100000,
        extraMax: 0.1,
        renderer: am5xy.AxisRendererY.new(root4, {})
    })
);

var series5 = chart4.series.push(
    am5xy.LineSeries.new(root4, {
        name: "EBIT Actual",
        xAxis: xAxis4,
        stroke: "#8a817c",
        yAxis: yAxis4,
        valueYField: "EBIT Actual",
        categoryXField: "years",
        tooltip: am5.Tooltip.new(root4, {
            pointerOrientation: "horizontal",
            labelText: "{name} in {categoryX}: {valueY} {info}"
        })
    })
);
series5.strokes.template.setAll({
    strokeWidth: 3,
    strokeDasharray: [10, 5, 2,5],
    templateField: "strokeSettings"
});
series5.data.setAll(data4);


var series6 = chart4.series.push(
    am5xy.LineSeries.new(root4, {
        name: "EBIT Target",
        xAxis: xAxis4,
        stroke: "#078fd7",
        yAxis: yAxis4,
        valueYField: "EBIT Target",
        categoryXField: "years",
        tooltip: am5.Tooltip.new(root4, {
            pointerOrientation: "horizontal",
            labelText: "{name} in {categoryX}: {valueY} {info}"
        })
    })
);
series6.strokes.template.setAll({
    strokeWidth: 3,
    templateField: "strokeSettings"
});
series6.data.setAll(data4);
series6.bullets.push(function() {
    return am5.Bullet.new(root4, {
        sprite: am5.Circle.new(root4, {
            strokeWidth: 3,
            stroke: series6.get("stroke"),
            radius: 5,
            fill: "#ffffff"
        })
    });
});

chart4.set("cursor", am5xy.XYCursor.new(root4, {}));
var legend5 = chart4.children.push(
    am5.Legend.new(root4, {
        centerX: am5.p50,
        x: am5.p50
    })
);
legend5.data.setAll(chart4.series.values);

chart4.appear(1000, 100);


ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
let chartConfigopex = {
  "type": "hbar",
  "plot": {
    "stacked": true,
    "stackType": "100%",
    "valueBox": {
      "text": '%v %',
      "fontColor": '#fff',
      "fontSize": '14px',
      "placement": 'middle',
      "visible": true,
    },
  },
  "scaleY": {
    "guide": {
      "visible": false,
    },
    "lineColor": 'transparent',
    "tick": {
      "visible": false,
    },
    "visible": false,
  },
  "scaleX": {
    "guide": {
      "visible": false,
    },
    "lineColor": 'transparent',
    "tick": {
      "visible": false,
    },
    "visible": false,
  },
  "series": [
    {
      "values": [<?= round($profit_and_loss_dashboard['chartOpex']['ms'])?>],
      "text": "Marketing & Sales",
      "backgroundColor": "#088FD7",
    },
    {
      "values": [<?= round($profit_and_loss_dashboard['chartOpex']['ga'])?>],
      "text": "General & Admin",
      "backgroundColor": "#4FB3E9",
    },
  ],
  "legend": {
    backgroundColor: '#FFFFFF',
    borderColor: '#FFFFFF',
    borderRadius: '4px',
    layout: 'float',
    margin: 'auto auto 10% auto',
  }
};

zingchart.render({
  id: 'chart_montOpex',
  data:chartConfigopex ,
  width: '100%',
  height: '100%',
});

ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
let chartsalesArr = {
  type: 'bar3d',
  '3dAspect': {
    depth: 10,
    true3d: 0,
    yAngle: 10,
  },
  backgroundColor: '#fff',

  legend: {
    backgroundColor: 'none',
    borderColor: 'none',
    item: {
      fontColor: '#333',
    },
    layout: 'float',
    shadow: false,
    width: '90%',
    x: '37%',
    y: '10%',
  },
  plotarea: {
    alpha: 0.3,
    backgroundColor: '#fff',
    margin: '95px 35px 50px 70px',
  },
  scaleX: {
    values: [
        <?php
        foreach ($profit_and_loss_dashboard['sales_arr'] as $key) {
            echo "'".$key['date']."', ";
        }
        ?>
    ],
    alpha: 0.5,
    backgroundColor: '#fff',
    borderColor: '#333',
    borderWidth: '1px',
    guide: {
      visible: false,
    },
    item: {
      fontColor: '#333',
      fontSize: '11px',
    },
    tick: {
      alpha: 0.2,
      lineColor: '#333',
    },
  },
  scaleY: {
    alpha: 0.5,
    backgroundColor: '#fff',
    borderColor: '#333',
    borderWidth: '1px',
    format: 'Rp. %v',
    multiplier: true,
    guide: {
      alpha: 0.2,
      lineColor: '#333',
      lineStyle: 'solid',
    },
    item: {
      fontColor: '#333',
      paddingRight: '6px',
    },
    tick: {
      alpha: 0.2,
      lineColor: '#333',
    },
  },
  series: [
    {
      text: 'Net Sales',
      values: [<?php
        foreach ($profit_and_loss_dashboard['sales_arr'] as $key) {
            echo $key['ns'] . ', ';
        }
        ?>],
      tooltip: {
        text: 'Rp.%v',
        backgroundColor: '#03A9F4',
        borderColor: 'none',
        borderRadius: '5px',
        fontSize: '12px',
        padding: '6px 12px',
        shadow: false,
      },
      backgroundColor: '#03A9F4 #4FC3F7',
      borderColor: '#03A9F4',
      legendMarker: {
        borderColor: '#03A9F4',
      },
    },
    {
      text: 'COGS',
      values: [<?php
        foreach ($profit_and_loss_dashboard['sales_arr'] as $key) {
            echo $key['cogs'] . ', ';
        }
        ?>],
      tooltip: {
        text: 'Rp.%v',
        backgroundColor: '#673AB7',
        borderColor: 'none',
        borderRadius: '5px',
        fontSize: '12px',
        padding: '6px 12px',
        shadow: false,
      },
      backgroundColor: '#673AB7 #9575CD',
      borderColor: '#673AB7',
      legendMarker: {
        borderColor: '#673AB7',
      },
    },
  ],
};

zingchart.render({
  id: 'chartCOGS',
  data: chartsalesArr,
  height: '100%',
  width: '100%',
  defaults: {
    fontFamily: 'sans-serif',
  },
});
</script>