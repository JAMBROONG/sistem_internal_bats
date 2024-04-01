<script>
    var timeFormat = 'DD/MM/YYYY';
var config = {
  type: 'line',
  height: "100%",
  data: {
    datasets: [{
        label: "Average Vendor Payment Error Rate",
        data: [{
          x: "04/01/2021",
          y: 177
        }, {
          x: "10/01/2021",
          y: 175
        }, {
          x: "04/01/2022",
          y: 178
        }, {
          x: "10/01/2022",
          y: 178
        }],
        fill: false,
        borderColor: 'red'
      },
      {
        label: "Vendor Payment Error Rate",
        data: [{
          x: "01/04/2021",
          y: 175
        }, {
          x: "01/10/2021",
          y: 175
        }, {
          x: "01/04/2022",
          y: 178
        }, {
          x: "01/04/2022",
          y: 178
        }, {
          x: "01/10/2022",
          y: 178
        }],
        fill: false,
        borderColor: 'blue'
      }
    ]
  },
  options: {
    responsive: true,
    scales: {
      xAxes: [{
        type: "time",
        time: {
          format: timeFormat,
          tooltipFormat: 'll'
        },
        scaleLabel: {
          display: true,
          labelString: 'Date'
        }
      }],
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'value'
        }
      }]
    }
  }
};

window.onload = function() {
  var ctx = document.getElementById("canvas")
    .getContext("2d");
  window.myLine = new Chart(ctx, config);
};


// Cash Conversion Cycle in Days - Last 3 Years
let chartConfigCCC = {
  type: 'mixed',
  backgroundColor: '#fff',
  legend: {
    margin: 'auto auto 10px auto',
    backgroundColor: 'none',
    borderWidth: '0px',
    layout: 'float',
    marker: {
      type: 'match',
      shadow: false,
      showLine: true,
    },
  },
  plot: {
    dataDragging: true,
    hoverState: {
      visible: false,
    },
    "animation": {
      "effect": "ANIMATION_FADE_IN",
      "method": "ANIMATION_LINEAR",
      "sequence": "ANIMATION_BY_NODE",
      "speed": 1000
    }
  },
  plotarea: {
    margin: '30px 60px 90px 60px',
  },
  scaleX: {
    values: [<?php
            foreach($kpi_dashboard['cc_mtm'] as $key) {
                 echo "'".$key['date']."', ";
            }?>
    ],
    guide: {
      visible: false,
    },
    item: {
        fontSize: '10px',
        offsetY: '10px',
        
    },
    itemsOverlap: true,
    lineColor: '#999',
    lineWidth: '1px',
    maxItems: 9999,
    tick: {
      lineColor: '#999',
      lineWidth: '1px',
      placement: 'inner',
    },
  },
  scaleY: {
    guide: {
      alpha: 1,
      lineColor: '#999',
      lineStyle: 'solid',
    },
    lineColor: '#999',
    lineWidth: '1px',
    tick: {
      lineColor: '#999',
      lineWidth: '1px',
    },
  },
  scaleY2: {
    format: '%v',
    guide: {
      visible: false,
    },
    lineColor: '#999',
    lineWidth: '1px',
    thousandsSeparator: ',',
    tick: {
      lineColor: '#999',
      lineWidth: '1px',
    },
  },
  series: [{
      type: 'bar',
      text: 'DSO',
      values: [<?php
            foreach($kpi_dashboard['cc_mtm'] as $key) {
                echo round( $key['dso']) .
                ', ';
            }?>],
      tooltip: {
        text: '%node-value',
        decimals: 1,
      },
      valueBox: {
        text: '%v ',
        fontColor: '#fff',
        placement: 'top-in',
      },
      backgroundColor: '#f35b04',
      barWidth: '50%',
      dataDraggingMinValue: 10,
      legendMarker: {
        borderWidth: '0px',
        shadow: false,
      },
      scales: 'scale-x,scale-y',
      stack: 1,
      stacked: true,
    },
    {
      type: 'bar',
      text: 'DIO',
      values: [<?php
            foreach($kpi_dashboard['cc_mtm'] as $key) {
                echo round( $key['dio']) .
                ', ';
            }?>],
      tooltip: {
        text: '%node-value',
        decimals: 1,
      },
      backgroundColor: '#7678ED',
      barWidth: '50%',
      dataDraggingMinValue: 10,
      legendMarker: {
        borderWidth: '0px',
        shadow: false,
      },
      valueBox: {
        text: '%v',
        fontColor: '#fff',
        placement: 'top-in',
      },
      scales: 'scale-x,scale-y',
      stack: 1,
      stacked: true,
    },
    {
      type: 'bar',
      text: 'DPO',
      values: [<?php
            foreach($kpi_dashboard['cc_mtm'] as $key) {
                echo round( $key['dpo']) .
                ', ';
            }?>],
      tooltip: {
        text: '%node-value',
        decimals: 1,
      },
      valueBox: {
        text: '%v',
        fontColor: '#fff',
        placement: 'top-in',
      },
      backgroundColor: '#3D348B',
      barWidth: '50%',
      dataDraggingMinValue: 10,
      legendMarker: {
        borderWidth: '0px',
        shadow: false,
      },
      scales: 'scale-x,scale-y',
      stack: 1,
      stacked: true,
    },
    {
      type: 'line',
      text: 'CCC',
      values: [<?php
            foreach($kpi_dashboard['cc_mtm'] as $key) {
                echo round( $key['ccc']) .
                ', ';
            }?>],
      tooltip: {
        text: '%node-value',
        thousandsSeparator: ',',
      },
      lineColor: '#F7B801',
      lineWidth: '2px',
      marker: {
        type: 'square',
        backgroundColor: '#F7B801',
        borderWidth: '0px',
        shadow: false,
        size: '5px',
      },
      scales: 'scale-x,scale-y-2',
      shadow: false,
    },
  ],
};

zingchart.render({
  id: 'chart_conversion',
  data: chartConfigCCC,
  height: '100%',
  width: '100%',
});
</script>