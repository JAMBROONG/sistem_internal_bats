<script >



ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
var chartDiv1 = {
    type: "bar",
    plotarea: {
        adjustLayout: true
    },
    plot: {
        valueBox: {
            text: 'Rp.%v',
            short: 'true',
            fontSize: '10',
            color: '#606060',
            backgroundColor: '#ffffff',
            decimals: 0,
            // tambahkan properti scaleFactor dan set nilainya menjadi 1000000
        },
        animation: {
            
      effect: 4,
      method: 0,
      sequence: 1
        },
        cursor: 'hand',
    },
    scaleX: {
        label: {
            text: "",
            
        },
        labels: [ <?php
            foreach($cash_management['cash_end_of_month'] as $key) {
                 echo "'".$key['spt_date'].
                "', ";
            }?>
        ],
        
        item:{
            fontSize: 10
        }
        
    },
    scaleY: {
        format: 'Rp.%v',
        multiplier: true,
        item:{
            fontSize: 10
        }
    },
    series: [{
        values: [ <?php
            foreach($cash_management['cash_end_of_month'] as $key) {
                echo $key['value'] .
                ', '; // Bagi dengan 1 juta dan tambahkan operator modulus
            }?>
        ],
        
        tooltip: {
          visible: true,
          text: " Rp. %v",
        multiplier: true,
          offsetY: -20,
          borderRadius: 5,
          backgroundColor: "#ffffff",
          borderWidth: 1,
          borderColor: "#cccccc",
          fontColor: "#333333",
          fontSize: "10px",
          padding: "10px",
          decimals: 0,
          // tambahkan properti scaleFactor dan set nilainya menjadi 1000000
        },
        'background-color': "#2498D6",
    }]
};


zingchart.render({
    id: 'chartDiv1',
    data: chartDiv1,
    height: "220px"
});



ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
var myConfig2 = {
    type: "bar",
    stacked: true,
    plotarea: {
        adjustLayout: true
    },
    scaleX: {
        label: {
            text: ""
        },
        labels: [" "]
    },
    plot: {
        valueBox: {
            text: "%stack-total",
            backgroundColor: 'white',
            padding: '3px',
            borderRadius: 60,
            rules: [{
                rule: '%stack-top == 0',
                visible: 0
            }]
        }
    },
    series: [{
            values: [<?= (!empty($data_tambahan['Not due'])) ? $data_tambahan['Not due']  : 0 ?>],
            'background-color': "#400030",
            stack: 1
        }, {
            values: [<?= (!empty($data_tambahan['< 30 days'] )) ? $data_tambahan['< 30 days'] : 0?>],
            'background-color': "#6b275a",
            stack: 2
        },
        {
            values: [<?= (!empty($data_tambahan['< 60 days'] )) ? $data_tambahan['< 60 days']  : 0?>],
            'background-color': "#ba3d5d",
            stack: 3
        },
        {
            values: [<?= (!empty($data_tambahan['< 90 days'] )) ? $data_tambahan['< 90 days'] : 0?>],
            'background-color': "#e16b5f",
            stack: 4
        },
        {
            values: [<?= (!empty($data_tambahan['> 90 days'] )) ? $data_tambahan['> 90 days']  : 0?>],
            'background-color': "#fe9085",
            stack: 5
        }
    ]
};

zingchart.render({
    id: 'myChart2',
    data: myConfig2,
    height: "220px"
});





ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
let chartConfig = {
  type: 'line',
  plot: {
    tooltip: {
      visible: false
    },
    cursor: 'hand'
  },
  scaleX: {
    markers: [],
    offsetEnd: '75px',
    labels: [
        <?php
            foreach($cash_management['inventory'] as $key) {
                 echo "'".$key['date']."', ";
            }?>
    ]
  },
  scaleY: {
    
        format: 'Rp.%v',
        multiplier: true,
        item:{
            fontSize: 10
        }
  },
  crosshairX: {},
  series: [
    {
      text: 'Inventory (Rp.)',
      values: [<?php
            foreach($cash_management['inventory'] as $key) {
                echo round( $key['value']) .
                ', ';
            }?>
      ]
    }
  ]
};


zingchart.render({
    id: 'myChartInventory',
    data: chartConfig,
    height: "250px"
});



var root2 = am5.Root.new("chartdiv3");
root2.setThemes([
    am5themes_Animated.new(root2)
]);

var chart2 = root2.container.children.push(am5radar.RadarChart.new(root2, {
    panX: false,
    panY: false,
    startAngle: 160,
    endAngle: 380
}));


// Create axis and its renderer
// https://www.amcharts.com/docs/v5/charts/radar-chart2/gauge-charts/#Axes
var axisRenderer2 = am5radar.AxisRendererCircular.new(root2, {
    innerRadius: -30
});

axisRenderer2.grid.template.setAll({
    stroke: root2.interfaceColors.get("background"),
    visible: true,
    strokeOpacity: 0.8
});

var xAxis2 = chart2.xAxes.push(am5xy.ValueAxis.new(root2, {
    maxDeviation: 0,
    min: 0,
    max: 365,
    strictMinMax: true,
    renderer: axisRenderer2
}));


// Add clock hand
// https://www.amcharts.com/docs/v5/charts/radar-chart2/gauge-charts/#Clock_hands
var axisDataItem2 = xAxis2.makeDataItem({});

var clockHand2 = am5radar.ClockHand.new(root2, {
    pinRadius: am5.percent(20),
    radius: am5.percent(100),
    bottomWidth: 20
})

var bullet2 = axisDataItem2.set("bullet", am5xy.AxisBullet.new(root2, {
    sprite: clockHand2
}));

xAxis2.createAxisRange(axisDataItem2);

var label2 = chart2.radarContainer.children.push(am5.Label.new(root2, {
    fill: am5.color(0xffffff),
    centerX: am5.percent(50),
    textAlign: "center",
    centerY: am5.percent(50),
    fontSize: "1em",
}));

axisDataItem2.set("value", <?=round($cash_management['days_payable_outstanding'])?>);
bullet2.get("sprite").on("rotation", function() {
    var value2 = axisDataItem2.get("value");
    var text2 = Math.round(axisDataItem2.get("value")).toString();
    var fill2 = am5.color(0x000000);
    xAxis2.axisRanges.each(function(axisRange2) {
        if (value2 >= axisRange2.get("value") && value2 <= axisRange2.get("endValue")) {
            fill2 = axisRange2.get("axisFill").get("fill");
        }
    })

    label2.set("text", Math.round(value2).toString());

    clockHand2.pin.animate({
        key: "fill",
        to: fill2,
        duration: 500,
        easing: am5.ease.out(am5.ease.cubic)
    })
    clockHand2.hand.animate({
        key: "fill",
        to: fill2,
        duration: 500,
        easing: am5.ease.out(am5.ease.cubic)
    })
});

chart2.bulletsContainer.set("mask", undefined);


var bandsData2 = [{
    title: "",
    color: "#e16b5f",
    lowScore: 0,
    highScore: 365 / 3
}, {
    title: "",
    color: "#ba3d5d",
    lowScore:  365 / 3,
    highScore:  ( 365 / 3) * 2
}, {
    title: "",
    color: "#6b275a",
    lowScore: ( 365 / 3) * 2,
    highScore: 365
}];

am5.array.each(bandsData2, function(data) {
    var axisRange2 = xAxis2.createAxisRange(xAxis2.makeDataItem({}));

    axisRange2.setAll({
        value: data.lowScore,
        endValue: data.highScore
    });

    axisRange2.get("axisFill").setAll({
        visible: true,
        fill: am5.color(data.color),
        fillOpacity: 0.8
    });

    axisRange2.get("label").setAll({
        text: data.title,
        inside: true,
        radius: 15,
        fontSize: "0.9em",
        fill: root2.interfaceColors.get("background")
    });
});


// Make stuff animate on load
chart2.appear(1000, 100);

var rootInventory = am5.Root.new("chartInventory");
rootInventory.setThemes([
    am5themes_Animated.new(rootInventory)
]);

var chartInventory = rootInventory.container.children.push(am5radar.RadarChart.new(rootInventory, {
    panX: false,
    panY: false,
    startAngle: 160,
    endAngle: 380
}));


// Create axis and its renderer
// https://www.amcharts.com/docs/v5/charts/radar-chartInventory/gauge-charts/#Axes
var axisRendererInventory = am5radar.AxisRendererCircular.new(rootInventory, {
    innerRadius: -30
});

axisRendererInventory.grid.template.setAll({
    stroke: rootInventory.interfaceColors.get("background"),
    visible: true,
    strokeOpacity: 0.8
});

var xAxisInventory = chartInventory.xAxes.push(am5xy.ValueAxis.new(rootInventory, {
    maxDeviation: 0,
    min: 0,
    max: 365,
    strictMinMax: true,
    renderer: axisRendererInventory
}));


// Add clock hand
// https://www.amcharts.com/docs/v5/charts/radar-chartInventory/gauge-charts/#Clock_hands
var axisDataItemInventory = xAxisInventory.makeDataItem({});

var clockHandInventory = am5radar.ClockHand.new(rootInventory, {
    pinRadius: am5.percent(20),
    radius: am5.percent(100),
    bottomWidth: 20
})

var bulletInventory = axisDataItemInventory.set("bullet", am5xy.AxisBullet.new(rootInventory, {
    sprite: clockHandInventory
}));

xAxisInventory.createAxisRange(axisDataItemInventory);

var labelInventory = chartInventory.radarContainer.children.push(am5.Label.new(rootInventory, {
    fill: am5.color(0xffffff),
    centerX: am5.percent(50),
    textAlign: "center",
    centerY: am5.percent(50),
    fontSize: "1em",
}));

axisDataItemInventory.set("value", <?=round($cash_management['days_inventory_outstanding'])?>);
bulletInventory.get("sprite").on("rotation", function() {
    var value2 = axisDataItemInventory.get("value");
    var text2 = Math.round(axisDataItemInventory.get("value")).toString();
    var fill2 = am5.color(0x000000);
    xAxisInventory.axisRanges.each(function(axisRange2) {
        if (value2 >= axisRange2.get("value") && value2 <= axisRange2.get("endValue")) {
            fill2 = axisRange2.get("axisFill").get("fill");
        }
    })

    labelInventory.set("text", Math.round(value2).toString());

    clockHandInventory.pin.animate({
        key: "fill",
        to: fill2,
        duration: 500,
        easing: am5.ease.out(am5.ease.cubic)
    })
    clockHandInventory.hand.animate({
        key: "fill",
        to: fill2,
        duration: 500,
        easing: am5.ease.out(am5.ease.cubic)
    })
});

chartInventory.bulletsContainer.set("mask", undefined);


var bandsData2 = [{
    title: "",
    color: "#00a6ff",
    lowScore: 0,
    highScore: 365 / 3
}, {
    title: "",
    color: "#088fd7",
    lowScore:  365 / 3,
    highScore:  ( 365 / 3) * 2
}, {
    title: "",
    color: "#002a40",
    lowScore: ( 365 / 3) * 2,
    highScore: 365
}];

am5.array.each(bandsData2, function(data) {
    var axisRangeInventory = xAxisInventory.createAxisRange(xAxisInventory.makeDataItem({}));

    axisRangeInventory.setAll({
        value: data.lowScore,
        endValue: data.highScore
    });

    axisRangeInventory.get("axisFill").setAll({
        visible: true,
        fill: am5.color(data.color),
        fillOpacity: 0.8
    });

    axisRangeInventory.get("label").setAll({
        text: data.title,
        inside: true,
        radius: 15,
        fontSize: "0.9em",
        fill: rootInventory.interfaceColors.get("background")
    });
});


// Make stuff animate on load
chartInventory.appear(1000, 100);



var root = am5.Root.new("chartdiv2");


root.setThemes([
    am5themes_Animated.new(root)
]);

var chart = root.container.children.push(am5radar.RadarChart.new(root, {
    panX: false,
    panY: false,
    startAngle: 160,
    endAngle: 380
}));


// Create axis and its renderer
// https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Axes
var axisRenderer = am5radar.AxisRendererCircular.new(root, {
    innerRadius: -30
});

axisRenderer.grid.template.setAll({
    stroke: root.interfaceColors.get("background"),
    visible: true,
    strokeOpacity: 0.8
});

var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
    maxDeviation: 0,
    min: 0,
    max:  365,
    strictMinMax: true,
    renderer: axisRenderer
}));


// Add clock hand
// https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Clock_hands
var axisDataItem = xAxis.makeDataItem({});

var clockHand = am5radar.ClockHand.new(root, {
    pinRadius: am5.percent(20),
    radius: am5.percent(100),
    bottomWidth: 20
})

var bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(root, {
    sprite: clockHand
}));

xAxis.createAxisRange(axisDataItem);

var label = chart.radarContainer.children.push(am5.Label.new(root, {
    fill: am5.color(0xffffff),
    centerX: am5.percent(50),
    textAlign: "center",
    centerY: am5.percent(50),
    fontSize: "1em"
}));

axisDataItem.set("value",  <?=round($cash_management['days_sales_outstanding'])?>);
bullet.get("sprite").on("rotation", function() {
    var value = axisDataItem.get("value");
    var text = Math.round(axisDataItem.get("value")).toString();
    var fill = am5.color(0x000000);
    xAxis.axisRanges.each(function(axisRange) {
        if (value >= axisRange.get("value") && value <= axisRange.get("endValue")) {
            fill = axisRange.get("axisFill").get("fill");
        }
    })

    label.set("text", Math.round(value).toString());

    clockHand.pin.animate({
        key: "fill",
        to: fill,
        duration: 500,
        easing: am5.ease.out(am5.ease.cubic)
    })
    clockHand.hand.animate({
        key: "fill",
        to: fill,
        duration: 500,
        easing: am5.ease.out(am5.ease.cubic)
    })
});

chart.bulletsContainer.set("mask", undefined);


var bandsData = [{
    title: "",
    color: "#cee573",
    lowScore: 0,
    highScore: 365/3
}, {
    title: "",
    color: "#a8be40",
    lowScore:365/3,
    highScore: (365/3)*2
}, {
    title: "",
    color: "#648405",
    lowScore: (365/3)*2,
    highScore: 365
}];

am5.array.each(bandsData, function(data) {
    var axisRange = xAxis.createAxisRange(xAxis.makeDataItem({}));

    axisRange.setAll({
        value: data.lowScore,
        endValue: data.highScore
    });

    axisRange.get("axisFill").setAll({
        visible: true,
        fill: am5.color(data.color),
        fillOpacity: 0.8
    });

    axisRange.get("label").setAll({
        text: data.title,
        inside: true,
        radius: 15,
        fontSize: "0.9em",
        fill: root.interfaceColors.get("background")
    });
});


// Make stuff animate on load
chart.appear(1000, 100); 

ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
var myConfig = {
    type: "bar",
    plotarea: {
        adjustLayout: true
    },
    plot: {
        valueBox: {
            text: '%v',
            short: 'true',
            fontSize: '10px',
            color: '#606060',
            backgroundColor: '#ffffff',
            decimals: 1,
            padding:'3px'
            // tambahkan properti scaleFactor dan set nilainya menjadi 1000000
        },
    animation: {
      effect: 4,
      method: 0,
      sequence: 1
    },
        cursor: 'hand',
    },
    scaleX: {
        label: {
            text: ""
        },
        labels: [
            <?php
            foreach($cash_management['a_turnover'] as $key) {
                echo "'".$key['date']."', ";
            }?>]
    },
    scaleY: {
        label: {
            text: ""
        },
    },
    series: [{
            values: [
            <?php
            foreach($cash_management['a_turnover'] as $key) {
                echo $key['value_ar'].",";}?>
                ],
            'background-color': "#cee573",
        },
        {
            values: [
            <?php
            foreach($cash_management['a_turnover'] as $key) {
                echo $key['value_ap'].",";}?>
                ],
            'background-color': "#648405",
        }
    ]
};

zingchart.render({
    id: 'myChart',
    data: myConfig,
    height: "220px"
});


var chartquickratioyear = {
    type: "bar",
    plotarea: {
        adjustLayout: true
    },
    plot: {
        valueBox: {
            text: '%v',
            short: 'true',
            fontSize: '10',
            color: '#606060',
            backgroundColor: '#ffffff',
            decimals: 1,
        },
        animation: {
            
      effect: 4,
      method: 0,
      sequence: 1
        },
        cursor: 'hand',
    },
    scaleX: {
        label: {
            text: "",
        },
        labels: [ <?php
            foreach($cash_management['quick_aset_arr'] as $key) {
                 echo "'".$key['tahun']. "', ";
            }?>
        ],
        
        item:{
            fontSize: 10
        }
        
    },
    scaleY: {
        format: '%v',
        multiplier: true,
        item:{
            fontSize: 10
        }
    },
    series: [{
        values: [ <?php
            foreach($cash_management['quick_aset_arr'] as $key) {
                echo $key['value'] .', ';
            }?>
        ],
        
        tooltip: {
          visible: true,
          text: "%v",
        multiplier: true,
          offsetY: -20,
          borderRadius: 5,
          backgroundColor: "#ffffff",
          borderWidth: 1,
          borderColor: "#cccccc",
          fontColor: "#333333",
          fontSize: "10px",
          padding: "10px",
        },
        'background-color': "#3E54AC",
    }]
};


zingchart.render({
    id: 'chartquickratioyear',
    data: chartquickratioyear,
    height: "220px"
});

var chartcurrentratioyear = {
    type: "bar",
    plotarea: {
        adjustLayout: true
    },
    plot: {
        valueBox: {
            text: '%v',
            short: 'true',
            fontSize: '10',
            color: '#606060',
            backgroundColor: '#ffffff',
            decimals:  1
            // tambahkan properti scaleFactor dan set nilainya menjadi 1000000
        },
        animation: {
            
      effect: 4,
      method: 0,
      sequence: 1
        },
        cursor: 'hand',
    },
    scaleX: {
        label: {
            text: "",
            
        },
        labels: [ <?php
            foreach($cash_management['current_aset_arr'] as $key) {
                 echo "'".$key['tahun']."', ";
            }?>
        ],
        item:{
            fontSize: 10
        }
        
    },
    scaleY: {
        format: '%v',
        multiplier: true,
        item:{
            fontSize: 10
        }
    },
    series: [{
        values: [ <?php
            foreach($cash_management['current_aset_arr'] as $key) {
                echo $key['value'] .
                ', '; // Bagi dengan 1 juta dan tambahkan operator modulus
            }?>
        ],
        
        tooltip: {
          visible: true,
          text: "%v",
            multiplier: true,
          offsetY: -20,
          borderRadius: 5,
          backgroundColor: "#ffffff",
          borderWidth: 1,
          borderColor: "#cccccc",
          fontColor: "#333333",
          fontSize: "10px",
          padding: "10px",
        },
        'background-color': "#EB455F",
    }]
};


zingchart.render({
    id: 'chartcurrentratioyear',
    data: chartcurrentratioyear,
    height: "220px"
});
</script>