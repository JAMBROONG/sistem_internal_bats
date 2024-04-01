/**
 * Charts Apex
 */

'use strict';

(function () {
  let cardColor, headingColor, labelColor, borderColor, legendColor;

  if (isDarkStyle) {
    cardColor = config.colors_dark.cardColor;
    headingColor = config.colors_dark.headingColor;
    labelColor = config.colors_dark.textMuted;
    legendColor = config.colors_dark.bodyColor;
    borderColor = config.colors_dark.borderColor;
  } else {
    cardColor = config.colors.cardColor;
    headingColor = config.colors.headingColor;
    labelColor = config.colors.textMuted;
    legendColor = config.colors.bodyColor;
    borderColor = config.colors.borderColor;
  }

  // Color constant
  const chartColors = {
    column: {
      series1: '#826af9',
      series2: '#d2b0ff',
      bg: '#f8d3ff'
    },
    donut: {
      series1: '#43766C',
      series1_1: '#71aea2',
      series1_2: '#c2dcd7',

      series2: '#B19470',
      series2_1: '#c7b298',
      series2_2: '#ddd1c1',

      series3: '#76453B',
      series3_1: '#99594d',
      series3_2: '#b27366',
      series3_3: '#d4b1aa',
      series3_4: '#c39288',
      series3_5: '#f6efee',

      series4: '#adbb24',
      series4_1: '#adbb24',
      series4_2: '#e9f0af',

      color1: '#43766C',
      color2: '#71aea2',
      color3: '#b19470'
    },
    area: {
      series1: '#43766C',
      series2: '#F8FAE5',
      series3: '#B19470',
      series4: '#76453B'
    }
  };

  const employee_jk_w = document.querySelector('#employee_jk_w'),
  employee_jk_wConfig = {
      chart: {
        height: 300,
        type: 'bar',
        stacked: true,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '90%'
        }
      },
      dataLabels: {
        // enabled: false
      },
      legend: {
        show: true,
        position: 'top',
        horizontalAlign: 'start',
        labels: {
          colors: legendColor,
          useSeriesColors: false
        }
      },
      colors: ['#083C5A','#159cea'],
      stroke: {
        show: false,
        colors: ['transparent']
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: false
          },
        },
        yaxis: {
          lines: {
            show: false
          },
        }
      },
      series: [
        {
          name: 'Male',
          data: [13, 1]
        },
        {
          name: 'Female',
          data: [7,1]
        }
      ],
      xaxis: {
        categories: ['Islam', 'Kristen'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: false,
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      fill: {
        opacity: 1
      }
    };
  if (typeof employee_jk_w !== undefined && employee_jk_w !== null) {
    const employee_jk_w_render = new ApexCharts(employee_jk_w, employee_jk_wConfig);
    employee_jk_w_render.render();
  }
  const employee_twj = document.querySelector('#employee_twj'),
  employee_twjConfig = {
      chart: {
        height: 300,
        type: 'bar',
        stacked: true,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '90%'
        }
      },
      dataLabels: {
        // enabled: false
      },
      legend: {
        show: true,
        position: 'top',
        horizontalAlign: 'start',
        labels: {
          colors: legendColor,
          useSeriesColors: false
        }
      },
      colors: ['#FCC72C','#fdde81'],
      stroke: {
        show: false,
        colors: ['transparent']
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: false
          },
        },
        yaxis: {
          lines: {
            show: false
          },
        }
      },
      series: [
        {
          name: 'Male',
          data: [4,0,4,2,0]
        },
        {
          name: 'Female',
          data: [1,1,2,0,1]
        }
      ],
      xaxis: {
        categories: ['Jawa Barat', 'Sulawesi S.','DKI Jakarta','Banten','Jawa Timur'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: false,
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        },
      },
      fill: {
        opacity: 1
      }
    };
  if (typeof employee_twj !== undefined && employee_twj !== null) {
    const employee_twj_render = new ApexCharts(employee_twj, employee_twjConfig);
    employee_twj_render.render();
  }
  const employee_swj = document.querySelector('#employee_swj'),
  employee_swjConfig = {
      chart: {
        height: 300,
        type: 'bar',
        stacked: true,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '90%'
        }
      },
      dataLabels: {
        // enabled: false
      },
      legend: {
        show: true,
        position: 'top',
        horizontalAlign: 'start',
        labels: {
          colors: legendColor,
          useSeriesColors: false
        }
      },
      colors: ['#FCC72C','#fdde81'],
      stroke: {
        show: false,
        colors: ['transparent']
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: false
          },
        },
        yaxis: {
          lines: {
            show: false
          },
        }
      },
      series: [
        {
          name: 'Male',
          data: [4]
        },
        {
          name: 'Female',
          data: [3]
        }

      ],
      xaxis: {
        categories: ['DKI Jakarta'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: false,
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        },
      },
      fill: {
        opacity: 1
      }
    };
  if (typeof employee_swj !== undefined && employee_swj !== null) {
    const employee_swj_render = new ApexCharts(employee_swj, employee_swjConfig);
    employee_swj_render.render();
  }
  const employee_penuh = document.querySelector('#employee_penuh'),
  employee_penuhConfig = {
      chart: {
        height: 300,
        type: 'bar',
        stacked: true,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '90%'
        }
      },
      dataLabels: {
        // enabled: false
      },
      legend: {
        show: true,
        position: 'top',
        horizontalAlign: 'start',
        labels: {
          colors: legendColor,
          useSeriesColors: false
        }
      },
      colors: ['#4CB648','#a6dba4'],
      stroke: {
        show: false,
        colors: ['transparent']
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: false
          },
        },
        yaxis: {
          lines: {
            show: false
          },
        }
      },
      series: [
        {
          name: 'Male',
          data: [4, 0, 8, 2, 0]
        },
        {
          name: 'Female',
          data: [1, 1, 5, 0, 1]
        }

      ],
      xaxis: {
        categories: ['Jawa Barat', 'Sulawesi S.','DKI Jakarta','Banten','Jawa Timur'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: false,
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        },
      },
      fill: {
        opacity: 1
      }
    };
  if (typeof employee_penuh !== undefined && employee_penuh !== null) {
    const employee_penuh_render = new ApexCharts(employee_penuh, employee_penuhConfig);
    employee_penuh_render.render();
  }

  // Heat map chart
  // --------------------------------------------------------------------
  const heatMapEl = document.querySelector('#heatMapChart'),
    heatMapChartConfig = {
      chart: {
        height: 350,
        type: 'heatmap',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        heatmap: {
          enableShades: false,

          colorScale: {
            ranges: [
              {
                "from": 0,
                "to": 200,
                "name": "0-200",
                "color": "#8acef5"
              },
              {
                "from": 201,
                "to": 400,
                "name": "201-400",
                "color": "#9bd5f6"
              },
              {
                "from": 401,
                "to": 600,
                "name": "401-600",
                "color": "#58b8f0"
              },
              {
                "from": 601,
                "to": 800,
                "name": "601-800",
                "color": "#159cea"
              },
              {
                "from": 801,
                "to": 1000,
                "name": "801-1000",
                "color": "#0f70a7"
              },
              {
                "from": 1001,
                "to": 1100,
                "name": "1001-1100",
                "color": "#094364"
              }
            ]

          }
        }
      },
      dataLabels: {
        enabled: false
      },
      grid: {
        show: false
      },
      legend: {
        show: true,
        position: 'top',
        horizontalAlign: 'start',
        labels: {
          colors: legendColor,
          useSeriesColors: false
        },
        markers: {
          offsetY: 0,
          offsetX: -3
        },
        itemMargin: {
          vertical: 3,
          horizontal: 10
        }
      },
      stroke: {
        curve: 'smooth',
        width: 4,
        lineCap: 'round',
        colors: [cardColor]
      },
      series: [
        {
          name: 'MALE',
          data: [
            {
                "x": "DKI Jakarta",
                "y": 870
            },
            {
                "x": "Jawa Barat",
                "y": 936
            },
            {
                "x": "Jawa Timur",
                "y": 0
            },
            {
                "x": "Sulawesi Selatan",
                "y": 0
            },
            {
                "x": "Banten",
                "y": 468
            }
        ]
        },
        {
          name: 'FEMALE',
          data:[
            {
                "x": "DKI Jakarta",
                "y": 1092
            },
            {
                "x": "Jawa Barat",
                "y": 468
            },
            {
                "x": "Jawa Timur",
                "y": 468
            },
            {
                "x": "Sulawesi Selatan",
                "y": 40
            },
            {
                "x": "Banten",
                "y": 0
            }
        ]

        }
      ],
      xaxis: {
        labels: {
          rotate: -90,
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      tooltip: {
        enabledOnSeries: undefined,
        y: {
          formatter: function (val) {
            return val + " hours"
          }
        }
      },
      yaxis: {
        labels: {
          rotate: -90,
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      }
    };
  if (typeof heatMapEl !== undefined && heatMapEl !== null) {
    const heatMapChart = new ApexCharts(heatMapEl, heatMapChartConfig);
    heatMapChart.render();
  }
  // Radial Bar Chart
  function chartAge(arrayData, highlightData, color1, color2) {
    const earningReportBarChartOpt = {
      chart: {
        height: 250,
        // width: '100%',
        parentHeightOffset: 0,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '90%',
          startingShape: 'rounded',
          borderRadius: 7,
          distributed: true,
          dataLabels: {
            position: 'top'
          }
        }
      },
      grid: {
        show: false,
        padding: {
          top: 0,
          bottom: 0,
          left: -10,
          // right: -10
        },
      },
      colors: ['#083C5A','#4CB648','#FCC72C'],
      dataLabels: {
        enabled: true,
        formatter: function (val) {
          return val;
        },
        offsetY: -25,
        style: {
          fontSize: '15px',
          colors: [legendColor],
          fontWeight: '600',
          fontFamily: 'Public Sans'
        }
      },
      series: [
        {
          data: arrayData
        }
      ],
        legend: {
          show: false,
          labels:{
            colors: legendColor
          }
        },
      tooltip: {
        enabled: false
      },
      xaxis: {
        categories: ['<30', '30-50', '>50'],
        axisBorder: {
          show: false,
          color: borderColor
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: legendColor,
            fontSize: '13px',
            fontFamily: 'Public Sans'
          }
        }
      },
      yaxis: {
        labels: {
          show: false,
          offsetX: -15,
          formatter: function (val) {
            return '' + parseInt(val / 1);
          },
          style: {
            fontSize: '13px',
            colors: labelColor,
            fontFamily: 'Public Sans'
          },
          // tickAmount: 6
        },
        axisBorder: {
          show : false
        }
      },
      responsive: [
        {
          breakpoint: 1441,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '41%'
              }
            }
          }
        },
        {
          breakpoint: 590,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '61%',
                borderRadius: 5
              }
            },
            yaxis: {
              labels: {
                show: false
              }
            },
            grid: {
              padding: {
                right: 0,
                left: -20
              }
            },
            dataLabels: {
              style: {
                fontSize: '12px',
                fontWeight: '400'
              }
            }
          }
        }
      ]
    };
    return earningReportBarChartOpt;
  }

  const barChartEl = document.querySelector('#chart_male'),
    barChartConfig = {
      chart: {
        height: 100,
        type: 'bar',
        stacked: true,
        stackType: '100%',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          horizontal: true,
          dataLabels: {
            total: {
              enabled: true,
              offsetX: 0,
              style: {
                fontSize: '13px',
                fontWeight: 900
              }
            }
          }
        },
      },
      dataLabels: {
        enabled: true
      },
      legend: {
        show: true,
        horizontalAlign: 'left',
        labels: {
          colors: legendColor
      },
          fontSize: '13px',
          fontFamily: 'Public Sans'
      },
      colors: ['#083C5A','#4CB648','#FCC72C'],
      series: [
        {
          name: '< 30',
          data: [11]
        },
        {
          name: '30 - 50',
          data: [3]
        },
        {
          name: '> 50',
          data: [0]
        }
      ],
      tooltip: {
        y: {
          formatter: function (val) {
            return val + ' people'
          }
        }
      },
      grid: {
        padding: {
          top: -30,
          bottom: 0,
          left: -15,
          right: -10
        },
        xaxis: {
          lines: {
            show: false
          },
        },
        yaxis: {
          lines: {
            show: false
          },
        }
      },
      xaxis: {
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        crosshairs: {
          show: false
        },
        categories: [''],

        labels: {
          show: false,
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        axisBorder: {
          show: false
        },
        labels: {
          show: false,
        }
      },
      fill: {
        opacity: 1
      }
    };
  if (typeof barChartEl !== undefined && barChartEl !== null) {
    const barChart = new ApexCharts(barChartEl, barChartConfig);
    barChart.render();
  }
  const chart_female = document.querySelector('#chart_female'),
    chart_female_config = {
      chart: {
        height: 100,
        type: 'bar',
        stacked: true,
        stackType: '100%',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          horizontal: true,
          dataLabels: {
            total: {
              enabled: true,
              offsetX: 0,
              style: {
                fontSize: '13px',
                fontWeight: 900
              }
            }
          }
        },
      },
      dataLabels: {
        enabled: true
      },
      legend: {
        show: true,
        horizontalAlign: 'left',
        labels: {
          colors: legendColor
      },
          fontSize: '13px',
          fontFamily: 'Public Sans'
      },
      colors: ['#083C5A','#4CB648','#FCC72C'],
      series: [
        {
          name: '< 30',
          data: [8]
        },
        {
          name: '30 - 50',
          data: [0]
        },
        {
          name: '> 50',
          data: [0]
        }
      ],
      tooltip: {
        y: {
          formatter: function (val) {
            return val + ' people'
          }
        }
      },
      grid: {
        padding: {
          top: -30,
          bottom: 0,
          left: -15,
          right: -10
        },
        xaxis: {
          lines: {
            show: false
          },
        },
        yaxis: {
          lines: {
            show: false
          },
        }
      },
      xaxis: {
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        crosshairs: {
          show: false
        },
        categories: [''],

        labels: {
          show: false,
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        axisBorder: {
          show: false
        },
        labels: {
          show: false,
        }
      },
      fill: {
        opacity: 1
      }
    };
  if (typeof chart_female !== undefined && chart_female !== null) {
    const barChart = new ApexCharts(chart_female, chart_female_config);
    barChart.render();
  }

  var earningReportsChart = {
    data: [
      {
        id: 1,
        chart_data: [0, 2 , 0],
        color1: chartColors.donut.series3,
        color2: chartColors.donut.series3_5
      },
      {
        id: 2,
        chart_data: [19, 1 , 0],
        color1: chartColors.donut.series3,
        color2: chartColors.donut.series3_5
      },
      {
        id: 3,
        chart_data: [13, 10 , 11],
        color1: chartColors.donut.series3,
        color2: chartColors.donut.series3_5
      }
    ]
  };
  const age_1 = document.querySelector('#age_1'),
    age_1Config = chartAge(
      earningReportsChart['data'][0]['chart_data'],
      earningReportsChart['data'][0]['active_option'],
      earningReportsChart['data'][0]['color1'],
      earningReportsChart['data'][0]['color2']
    );
  if (typeof age_1 !== undefined && age_1 !== null) {
    const earningReportsTabsOrders = new ApexCharts(age_1, age_1Config);
    earningReportsTabsOrders.render();
  }
  const age_2 = document.querySelector('#age_2'),
    age_2Config = chartAge(
      earningReportsChart['data'][1]['chart_data'],
      earningReportsChart['data'][1]['active_option'],
      earningReportsChart['data'][1]['color1'],
      earningReportsChart['data'][1]['color2']
    );
  if (typeof age_2 !== undefined && age_2 !== null) {
    const earningReportsTabsOrders = new ApexCharts(age_2, age_2Config);
    earningReportsTabsOrders.render();
  }


  var options = {
    series: [{
    name: 'In',
    data: [4, 0]
  }, {
    name: 'Out',
    data: [12, 1]
  }],
    chart: {
    type: 'bar',
    height: 250,
    toolbar:{
      show: false
    }
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '55%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: true,
  },
  xaxis: {
    axisTicks: {
      show: false
    },
    categories: ['< 30', '30-50'],

    axisBorder: {
      show: false
    },
  },
  yaxis: {
    axisTicks: {
      show: false
    },
    labels: {
      show: false
    },
    axisBorder: {
      show: false
    }
  },
  legend: {
    show: true,
    position: 'top',
    horizontalAlign: 'start',
    labels: {
      colors: legendColor,
      useSeriesColors: false
    }
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return  val + " people"
      }
    }
  },

  grid: {
    xaxis: {
      lines: {
        show: false
      },
    },
    yaxis: {
      lines: {
        show: false
      },
    }
  },
  colors: ['#4CB648','#a6dba4'],
  };

  var chart = new ApexCharts(document.querySelector("#inage30"), options);
  chart.render();

  var options2 = {
    series: [{
    name: 'Male',
    data: [4, 2]
  }, {
    name: 'Female',
    data: [6, 3]
  }],
    chart: {
    type: 'bar',
    height: 250,
    toolbar:{
      show: false
    }
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '55%',
      endingShape: 'rounded'
    },
  },
  dataLabels: {
    enabled: true,
  },
  xaxis: {
    axisTicks: {
      show: false
    },
    categories: ['Male', 'Female'],

    axisBorder: {
      show: false
    },
  },
  yaxis: {
    axisTicks: {
      show: false
    },
    labels: {
      show: false
    },
    axisBorder: {
      show: false
    }
  },
  legend: {
    show: true,
    position: 'top',
    horizontalAlign: 'start',
    labels: {
      colors: legendColor,
      useSeriesColors: false
    }
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return  val + " people"
      }
    }
  },

  grid: {
    xaxis: {
      lines: {
        show: false
      },
    },
    yaxis: {
      lines: {
        show: false
      },
    }
  },
  colors: ['#4CB648','#a6dba4'],
  };

  var chart = new ApexCharts(document.querySelector("#outage30"), options2);
  chart.render();

})();
