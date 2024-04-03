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

  // Heat chart data generator
  function generateDataHeat(count, yrange) {
    let i = 0;
    let series = [];
    while (i < count) {
      let x = 'w' + (i + 1).toString();
      let y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

      series.push({
        x: x,
        y: y
      });
      i++;
    }
    return series;
  }

  // Line Area Chart
  // --------------------------------------------------------------------
  const areaChartEl = document.querySelector('#lineAreaChart'),
    areaChartConfig = {
      chart: {
        height: 400,
        type: 'area',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: false,
        curve: 'straight'
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
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
        }
      },
      colors: [chartColors.area.series1],
      series: [
        {
          name: 'tCO2e',
          data: [100, 120, 90, 170, 130, 160, 140, 240, 220, 180, 270, 157]
        }
      ],
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct', 'Nov', 'Dec'],
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
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      fill: {
        opacity: 1,
        type: 'solid'
      },
      tooltip: {
        shared: false
      }
    };
  if (typeof areaChartEl !== undefined && areaChartEl !== null) {
    const areaChart = new ApexCharts(areaChartEl, areaChartConfig);
    areaChart.render();
  }

  const areaChartEl4 = document.querySelector('#lineAreaChart4'),
    areaChartConfig4 = {
      chart: {
        height: '100%',
        type: 'area',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: false,
        curve: 'straight'
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
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
        }
      },
      colors: [chartColors.area.series3],
      series: [
        {
          name: 'tCO2e',
          data: [170, 240, 190, 130, 100, 160, 120, 90, 180, 270, 140, 220]
        }
      ],
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct', 'Nov', 'Dec'],
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
        show: false,
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      fill: {
        opacity: 1,
        type: 'solid'
      },
      tooltip: {
        shared: false
      }
    };
  if (typeof areaChartEl4 !== undefined && areaChartEl4 !== null) {
    const areaChart = new ApexCharts(areaChartEl4, areaChartConfig4);
    areaChart.render();
  }

  // Bar Chart
  // --------------------------------------------------------------------
  const barChartEl = document.querySelector('#scope1'),
    barChartConfig = {
      chart: {
        height: 400,
        type: 'bar',
        stacked: true,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '35%'
          // colors: {
          //   backgroundBarColors: [
          //     chartColors.donut.series1_2,
          //     chartColors.donut.series1_2,
          //     chartColors.donut.series1_2,
          //     chartColors.donut.series1_2,
          //     chartColors.donut.series1_2,
          //     chartColors.donut.series1_2
          //   ],
          //   backgroundBarRadius: 10
          // }
        }
      },
      dataLabels: {
        enabled: false
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
      colors: [chartColors.donut.series1, chartColors.donut.series1_1],
      stroke: {
        show: true,
        colors: ['transparent']
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
        }
      },
      series: [
        {
          name: 'Mobile Combustion',
          data: [0.20, 0.19, 0.30, 0.35, 0.29, 0.4, 0.29, 0.39, 0.29, 0.34, 0.24, 0.31]
        },
        {
          name: 'Fugitive emissions from air-conditioning',
          data: [0.0, 0.0, 0.0, 0.34, 0.0, 0.0, 0.0, 0.34, 0.0, 0.0, 0.0, 0.34]
        }
      ],
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct', 'Nov', 'Dec'],
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
        labels: {
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
  if (typeof barChartEl !== undefined && barChartEl !== null) {
    const barChart = new ApexCharts(barChartEl, barChartConfig);
    barChart.render();
  }
  const employee_jk_w = document.querySelector('#employee_jk_w'),
  employee_jk_wConfig = {
      chart: {
        height: 400,
        type: 'bar',
        stacked: true,
        parentHeightOffset: 0,
        toolbar: {
          show: true
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '35%'
        }
      },
      dataLabels: {
        enabled: true
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
      colors: ['#3474EA','#90B3F3'],
      stroke: {
        show: true,
        colors: ['transparent']
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
        }
      },
      series: [
        {
          name: 'Male',
          data: [17, 7]
        },
        {
          name: 'Female',
          data: [13,9]
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
        labels: {
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

  const barChartEl3 = document.querySelector('#scope3'),
    barChartConfig3 = {
      chart: {
        height: 400,
        type: 'bar',
        stacked: true,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '35%'
          // colors: {
          //   backgroundBarColors: [
          //     chartColors.donut.series3_5,
          //     chartColors.donut.series3_5,
          //     chartColors.donut.series3_5,
          //     chartColors.donut.series3_5,
          //     chartColors.donut.series3_5,
          //     chartColors.donut.series3_5
          //   ],
          //   backgroundBarRadius: 10
          // }
        }
      },
      dataLabels: {
        enabled: false
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
      colors: [
        chartColors.donut.series3,
        chartColors.donut.series3_1,
        chartColors.donut.series3_2,
        chartColors.donut.series3_3
      ],
      stroke: {
        show: true,
        colors: ['transparent']
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
        }
      },
      series: [
        {
          name: 'Purchased goods and services',
          data: [1.06, 0.97, 1.06, 0.92, 0.97, 0.92, 1.02, 1.06, 0.97, 1.06, 1.02, 0.97]
        },
        {
          name: 'Waste generated in operations',
          data: [0.14,0.17,0.17,0.17,0.18,0.18,0.16,0.17,0.18,0.14,0.18,0.17]
        },
        {
          name: 'Business Travel',
          data: [2.95, 0.59, 0.07, 0, 0, 1.19, 0.04, 0, 0, 1.37, 0, 0.12]
        },
        {
          name: 'Employee Commuting',
          data: [0.59, 0.54, 0.59, 0.52, 0.54, 0.52, 0.57, 0.57, 0.54, 0.59, 0.57, 0.54]
        }
      ],
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct', 'Nov', 'Dec'],
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
        labels: {
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
  if (typeof barChartEl3 !== undefined && barChartEl3 !== null) {
    const barChart3 = new ApexCharts(barChartEl3, barChartConfig3);
    barChart3.render();
  }
  const barChartEl4 = document.querySelector('#emission'),
    barChartConfig4 = {
      chart: {
        height: 400,
        type: 'bar',
        stacked: true,
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '35%'
        }
      },
      dataLabels: {
        enabled: false
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
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series1_1,
        chartColors.donut.series2,
        chartColors.donut.series3,
        chartColors.donut.series3_1,
        chartColors.donut.series3_2,
        chartColors.donut.series3_3
      ],
      stroke: {
        show: true,
        colors: ['transparent']
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
        }
      },
      series: [
        {
          name: 'Mobile Combustion',
          data: [0.20, 0.19, 0.30, 0.35, 0.29, 0.4, 0.29, 0.39, 0.29, 0.34, 0.24, 0.31]
        },
        {
          name: 'Fugitive emissions from air-conditioning',
          data: [0.0, 0.0, 0.0, 0.34, 0.0, 0.0, 0.0, 0.34, 0.0, 0.0, 0.0, 0.34]
        },
        {
          name: 'Purchased electricity - location based',
          data: [1.27, 0.92, 0.83, 0.74, 0.75, 1.15, 0.89, 1.02, 0.92, 1.09, 1.18, 0.82]
        },
        {
          name: 'Purchased goods and services',
          data: [1.06, 0.97, 1.06, 0.92, 0.97, 0.92, 1.02, 1.06, 0.97, 1.06, 1.02, 0.97]
        },
        {
          name: 'Waste generated in operations',
          data: [0.14,0.17,0.17,0.17,0.18,0.18,0.16,0.17,0.18,0.14,0.18,0.17]
        },
        {
          name: 'Business Travel',
          data: [2.95, 0.59, 0.07, 0, 0, 1.19, 0.04, 0, 0, 1.37, 0, 0.12]
        },
        {
          name: 'Employee Commuting',
          data: [0.59, 0.54, 0.59, 0.52, 0.54, 0.52, 0.57, 0.57, 0.54, 0.59, 0.57, 0.54]
        }
      ],
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct', 'Nov', 'Dec'],
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
        labels: {
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
  if (typeof barChartEl4 !== undefined && barChartEl4 !== null) {
    const barChart4 = new ApexCharts(barChartEl4, barChartConfig4);
    barChart4.render();
  }

  // Scatter Chart
  // --------------------------------------------------------------------
  const scatterChartEl = document.querySelector('#scatterChart'),
    scatterChartConfig = {
      chart: {
        height: 400,
        type: 'scatter',
        zoom: {
          enabled: true,
          type: 'xy'
        },
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
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
      colors: [config.colors.warning, config.colors.primary, config.colors.success],
      series: [
        {
          name: 'Angular',
          data: [
            [5.4, 170],
            [5.4, 100],
            [5.7, 110],
            [5.9, 150],
            [6.0, 200],
            [6.3, 170],
            [5.7, 140],
            [5.9, 130],
            [7.0, 150],
            [8.0, 120],
            [9.0, 170],
            [10.0, 190],
            [11.0, 220],
            [12.0, 170],
            [13.0, 230]
          ]
        },
        {
          name: 'Vue',
          data: [
            [14.0, 220],
            [15.0, 280],
            [16.0, 230],
            [18.0, 320],
            [17.5, 280],
            [19.0, 250],
            [20.0, 350],
            [20.5, 320],
            [20.0, 320],
            [19.0, 280],
            [17.0, 280],
            [22.0, 300],
            [18.0, 120]
          ]
        },
        {
          name: 'React',
          data: [
            [14.0, 290],
            [13.0, 190],
            [20.0, 220],
            [21.0, 350],
            [21.5, 290],
            [22.0, 220],
            [23.0, 140],
            [19.0, 400],
            [20.0, 200],
            [22.0, 90],
            [20.0, 120]
          ]
        }
      ],
      xaxis: {
        tickAmount: 10,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          formatter: function (val) {
            return parseFloat(val).toFixed(1);
          },
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      yaxis: {
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      }
    };
  if (typeof scatterChartEl !== undefined && scatterChartEl !== null) {
    const scatterChart = new ApexCharts(scatterChartEl, scatterChartConfig);
    scatterChart.render();
  }

  // Line Chart
  // --------------------------------------------------------------------
  const lineChartEl = document.querySelector('#lineChart'),
    lineChartConfig = {
      chart: {
        height: 400,
        type: 'line',
        parentHeightOffset: 0,
        zoom: {
          enabled: false
        },
        toolbar: {
          show: false
        }
      },
      series: [
        {
          data: [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
        }
      ],
      markers: {
        strokeWidth: 7,
        strokeOpacity: 1,
        strokeColors: [cardColor],
        colors: [config.colors.warning]
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      colors: [config.colors.warning],
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
        },
        padding: {
          top: -20
        }
      },
      tooltip: {
        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
          return '<div class="px-3 py-2">' + '<span>' + series[seriesIndex][dataPointIndex] + '%</span>' + '</div>';
        }
      },
      xaxis: {
        categories: [
          '7/12',
          '8/12',
          '9/12',
          '10/12',
          '11/12',
          '12/12',
          '13/12',
          '14/12',
          '15/12',
          '16/12',
          '17/12',
          '18/12',
          '19/12',
          '20/12',
          '21/12'
        ],
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
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      }
    };
  if (typeof lineChartEl !== undefined && lineChartEl !== null) {
    const lineChart = new ApexCharts(lineChartEl, lineChartConfig);
    lineChart.render();
  }
  // Line Chart
  // --------------------------------------------------------------------
  const lineChartEl2 = document.querySelector('#lineChart2'),
    lineChartConfig2 = {
      chart: {
        height: 350,
        type: 'line',
        parentHeightOffset: 0,
        zoom: {
          enabled: false
        },
        toolbar: {
          show: false
        }
      },
      series: [
        {
          data: [41.61, 38.61, 35, 26, 19, 15, 10, 0]
        }
      ],
      markers: {
        strokeWidth: 7,
        strokeOpacity: 1,
        strokeColors: [cardColor],
        colors: [config.colors.warning]
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      colors: [config.colors.warning],
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
        },
        padding: {
          top: -20
        }
      },
      tooltip: {
        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
          return '<div class="px-3 py-2">' + '<span>' + series[seriesIndex][dataPointIndex] + '%</span>' + '</div>';
        }
      },
      xaxis: {
        categories: ['2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030'],
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
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      }
    };
  if (typeof lineChartEl2 !== undefined && lineChartEl2 !== null) {
    const lineChart2 = new ApexCharts(lineChartEl2, lineChartConfig2);
    lineChart2.render();
  }

  // Horizontal Bar Chart
  // --------------------------------------------------------------------
  const horizontalBarChartEl = document.querySelector('#horizontalBarChart'),
    horizontalBarChartConfig = {
      chart: {
        height: 400,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          horizontal: true,
          barHeight: '30%',
          startingShape: 'rounded',
          borderRadius: 8
        }
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: false
          }
        },
        padding: {
          top: -20,
          bottom: -12
        }
      },
      colors: config.colors.info,
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [700, 350, 480, 600, 210, 550, 150]
        }
      ],
      xaxis: {
        categories: ['MON, 11', 'THU, 14', 'FRI, 15', 'MON, 18', 'WED, 20', 'FRI, 21', 'MON, 23'],
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
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      }
    };
  if (typeof horizontalBarChartEl !== undefined && horizontalBarChartEl !== null) {
    const horizontalBarChart = new ApexCharts(horizontalBarChartEl, horizontalBarChartConfig);
    horizontalBarChart.render();
  }

  // Candlestick Chart
  // --------------------------------------------------------------------
  const candlestickEl = document.querySelector('#candleStickChart'),
    candlestickChartConfig = {
      chart: {
        height: 410,
        type: 'candlestick',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      series: [
        {
          data: [
            {
              x: new Date(1538778600000),
              y: [150, 170, 50, 100]
            },
            {
              x: new Date(1538780400000),
              y: [200, 400, 170, 330]
            },
            {
              x: new Date(1538782200000),
              y: [330, 340, 250, 280]
            },
            {
              x: new Date(1538784000000),
              y: [300, 330, 200, 320]
            },
            {
              x: new Date(1538785800000),
              y: [320, 450, 280, 350]
            },
            {
              x: new Date(1538787600000),
              y: [300, 350, 80, 250]
            },
            {
              x: new Date(1538789400000),
              y: [200, 330, 170, 300]
            },
            {
              x: new Date(1538791200000),
              y: [200, 220, 70, 130]
            },
            {
              x: new Date(1538793000000),
              y: [220, 270, 180, 250]
            },
            {
              x: new Date(1538794800000),
              y: [200, 250, 80, 100]
            },
            {
              x: new Date(1538796600000),
              y: [150, 170, 50, 120]
            },
            {
              x: new Date(1538798400000),
              y: [110, 450, 10, 420]
            },
            {
              x: new Date(1538800200000),
              y: [400, 480, 300, 320]
            },
            {
              x: new Date(1538802000000),
              y: [380, 480, 350, 450]
            }
          ]
        }
      ],
      xaxis: {
        type: 'datetime',
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
        tooltip: {
          enabled: true
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      grid: {
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
        },
        padding: {
          top: -20
        }
      },
      plotOptions: {
        candlestick: {
          colors: {
            upward: config.colors.success,
            downward: config.colors.danger
          }
        },
        bar: {
          columnWidth: '40%'
        }
      }
    };
  if (typeof candlestickEl !== undefined && candlestickEl !== null) {
    const candlestickChart = new ApexCharts(candlestickEl, candlestickChartConfig);
    candlestickChart.render();
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
                "color": "#90B3F3"
              },
              {
                "from": 201,
                "to": 400,
                "name": "201-400",
                "color": "#7EA6F1"
              },
              {
                "from": 401,
                "to": 600,
                "name": "401-600",
                "color": "#6B9AEF"
              },
              {
                "from": 601,
                "to": 800,
                "name": "601-800",
                "color": "#598DEE"
              },
              {
                "from": 801,
                "to": 1000,
                "name": "801-1000",
                "color": "#4680EC"
              },
              {
                "from": 1001,
                "to": 1100,
                "name": "1001-1100",
                "color": "#3474EA"
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
                "y": 820
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
          show: false,
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
  // --------------------------------------------------------------------
  const radialBarChartEl = document.querySelector('#radialBarChart'),
    radialBarChartConfig = {
      chart: {
        height: 380,
        type: 'radialBar'
      },
      colors: [chartColors.donut.series1, chartColors.donut.series2, chartColors.donut.series4],
      plotOptions: {
        radialBar: {
          size: 185,
          hollow: {
            size: '40%'
          },
          track: {
            margin: 10,
            background: config.colors_label.secondary
          },
          dataLabels: {
            name: {
              fontSize: '2rem',
              fontFamily: 'Open Sans'
            },
            value: {
              fontSize: '1.2rem',
              color: legendColor,
              fontFamily: 'Open Sans'
            },
            total: {
              show: true,
              fontWeight: 400,
              fontSize: '1.3rem',
              color: headingColor,
              label: 'Comments',
              formatter: function (w) {
                return '80%';
              }
            }
          }
        }
      },
      grid: {
        borderColor: borderColor,
        padding: {
          top: -25,
          bottom: -20
        }
      },
      legend: {
        show: true,
        position: 'bottom',
        labels: {
          colors: legendColor,
          useSeriesColors: false
        }
      },
      stroke: {
        lineCap: 'round'
      },
      series: [80, 50, 35],
      labels: ['Comments', 'Replies', 'Shares']
    };
  if (typeof radialBarChartEl !== undefined && radialBarChartEl !== null) {
    const radialChart = new ApexCharts(radialBarChartEl, radialBarChartConfig);
    radialChart.render();
  }

  // Donut Chart
  // --------------------------------------------------------------------
  const donutChartEl = document.querySelector('#donutChart'),
    donutChartConfig = {
      chart: {
        height: 390,
        type: 'donut'
      },
      labels: ['Scope 1', 'Scope 2', 'Scope 3'],
      series: [10, 28, 62],
      colors: [chartColors.area.series1, chartColors.area.series3, chartColors.area.series4],
      stroke: {
        show: false,
        curve: 'straight'
      },
      dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
          return parseInt(val, 10) + '%';
        }
      },
      legend: {
        show: true,
        position: 'bottom',
        markers: { offsetX: -3 },
        itemMargin: {
          vertical: 3,
          horizontal: 10
        },
        labels: {
          colors: legendColor,
          useSeriesColors: false
        }
      },
      plotOptions: {
        pie: {
          donut: {
            labels: {
              show: true,
              name: {
                fontSize: '2rem',
                fontFamily: 'Open Sans'
              },
              value: {
                fontSize: '1.2rem',
                color: legendColor,
                fontFamily: 'Open Sans',
                formatter: function (val) {
                  return parseInt(val, 10) + ' tCO2e';
                }
              }
            }
          }
        }
      },
      responsive: [
        {
          breakpoint: 992,
          options: {
            chart: {
              height: 380
            },
            legend: {
              position: 'bottom',
              labels: {
                colors: legendColor,
                useSeriesColors: false
              }
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            chart: {
              height: 320
            },
            plotOptions: {
              pie: {
                donut: {
                  labels: {
                    show: true,
                    name: {
                      fontSize: '1.5rem'
                    },
                    value: {
                      fontSize: '1rem'
                    },
                    total: {
                      fontSize: '1.5rem'
                    }
                  }
                }
              }
            },
            legend: {
              position: 'bottom',
              labels: {
                colors: legendColor,
                useSeriesColors: false
              }
            }
          }
        },
        {
          breakpoint: 420,
          options: {
            chart: {
              height: 280
            },
            legend: {
              show: false
            }
          }
        },
        {
          breakpoint: 360,
          options: {
            chart: {
              height: 250
            },
            legend: {
              show: false
            }
          }
        }
      ]
    };
  if (typeof donutChartEl !== undefined && donutChartEl !== null) {
    const donutChart = new ApexCharts(donutChartEl, donutChartConfig);
    donutChart.render();
  }

  // Earning Reports Tabs Function
  function EarningReportsBarChart(arrayData, highlightData, color1, color2) {
    // const basicColor = config.colors_label.primary,
    //   highlightColor = config.colors.primary;

    var colorArr = [];
    if (Array.isArray(highlightData)) {
      for (let i = 0; i < arrayData.length; i++) {
        if (highlightData.includes(i)) {
          console.log('hit');
          colorArr.push(color1);
        } else {
          colorArr.push(color2);
        }
      }
    } else {
      for (let i = 0; i < arrayData.length; i++) {
        if (i === highlightData) {
          colorArr.push(color1);
          // colorArr.push(highlightColor);
        } else {
          // colorArr.push(basicColor);
          // colorArr.push(basicColor);
          colorArr.push(color2);
        }
      }
    }

    const earningReportBarChartOpt = {
      chart: {
        height: 300,
        parentHeightOffset: 0,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '32%',
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
          right: -10
        }
      },
      colors: colorArr,
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
        show: false
      },
      tooltip: {
        enabled: false
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        axisBorder: {
          show: true,
          color: borderColor
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px',
            fontFamily: 'Public Sans'
          }
        }
      },
      yaxis: {
        labels: {
          show:false,
          offsetX: -15,
          formatter: function (val) {
            return '' + parseInt(val / 1);
          },
          style: {
            fontSize: '13px',
            colors: labelColor,
            fontFamily: 'Public Sans'
          },
          min: 0,
          max: 60000,
          tickAmount: 6
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
          // startingShape: 'rounded',
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
        }
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
          show: false
        },
      tooltip: {
        enabled: false
      },
      xaxis: {
        categories: ['<30', '30-50', '>50'],
        axisBorder: {
          show: true,
          color: borderColor
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
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
  var chartJson = 'earning-reports-charts.json';
  // Earning Chart JSON data
  var earningReportsChart = {
    data: [
      {
        id: 1,
        chart_data: [0.20, 0.19, 0.30, 0.35, 0.29, 0.4, 0.29, 0.39, 0.29, 0.34, 0.24, 0.31],
        active_option: 5,
        color1: chartColors.donut.series1,
        color2: chartColors.donut.series1_2
      },
      {
        id: 2,
        chart_data: [0.0, 0.0, 0.0, 0.34, 0.0, 0.0, 0.0, 0.34, 0.0, 0.0, 0.0, 0.34],
        active_option: [3, 7, 11],
        color1: chartColors.donut.series1,
        color2: chartColors.donut.series1_2
      },
      {
        id: 3,
        chart_data: [1.27, 0.92, 0.83, 0.74, 0.75, 1.15, 0.89, 1.02, 0.92, 1.09, 1.18, 0.82],
        active_option: 0,
        color1: chartColors.donut.series2,
        color2: chartColors.donut.series2_2
      },
      {
        id: 4,
        chart_data: [5.3, 3.0, 2.5, 5.5, 4.5, 5.7, 3.0, 4.2, 4.0, 5.2, 3.8, 2.0],
        active_option: 5,
        color1: chartColors.donut.series2,
        color2: chartColors.donut.series2_2
      },
      {
        id: 5,
        chart_data: [1.06, 0.97, 1.06, 0.92, 0.97, 0.92, 1.02, 1.06, 0.97, 1.06, 1.02, 0.97],
        active_option: [0, 2, 7, 9],
        color1: chartColors.donut.series3,
        color2: chartColors.donut.series3_5
      },
      {
        id: 6,
        chart_data:  [0.14,0.17,0.17,0.17,0.18,0.18,0.16,0.17,0.18,0.14,0.18,0.17],
        active_option: [0, 2, 7, 9],
        color1: chartColors.donut.series3,
        color2: chartColors.donut.series3_5
      },
      {
        id: 7,
        chart_data: [2.95, 0.59, 0.07, 0, 0, 1.19, 0.04, 0, 0, 1.37, 0, 0.12],
        active_option: 0,
        color1: chartColors.donut.series3,
        color2: chartColors.donut.series3_5
      },
      {
        id: 8,
        chart_data: [0.59, 0.54, 0.59, 0.52, 0.54, 0.52, 0.57, 0.57, 0.54, 0.59, 0.57, 0.54],
        active_option: [0, 2, 7, 9],
        color1: chartColors.donut.series3,
        color2: chartColors.donut.series3_5
      },
      {
        id: 9,
        chart_data: [3, 2 , 3],
        color1: chartColors.donut.series3,
        color2: chartColors.donut.series3_5
      },
      {
        id: 10,
        chart_data: [13, 10 , 11],
        color1: chartColors.donut.series3,
        color2: chartColors.donut.series3_5
      }
    ]
  };

  // Earning Reports Tabs Orders
  // --------------------------------------------------------------------
  const mobile_combustion = document.querySelector('#mobile_combustion'),
    mobile_combustionConfig = EarningReportsBarChart(
      earningReportsChart['data'][0]['chart_data'],
      earningReportsChart['data'][0]['active_option'],
      earningReportsChart['data'][0]['color1'],
      earningReportsChart['data'][0]['color2']
    );
  if (typeof mobile_combustion !== undefined && mobile_combustion !== null) {
    const earningReportsTabsOrders = new ApexCharts(mobile_combustion, mobile_combustionConfig);
    earningReportsTabsOrders.render();
  }

  const air_conditioning = document.querySelector('#air_conditioning'),
    air_conditioningConfig = EarningReportsBarChart(
      earningReportsChart['data'][1]['chart_data'],
      earningReportsChart['data'][1]['active_option'],
      earningReportsChart['data'][1]['color1'],
      earningReportsChart['data'][1]['color2']
    );
  if (typeof air_conditioning !== undefined && air_conditioning !== null) {
    const earningReportsTabsOrders = new ApexCharts(air_conditioning, air_conditioningConfig);
    earningReportsTabsOrders.render();
  }

  const electricity = document.querySelector('#electricity'),
    electricityConfig = EarningReportsBarChart(
      earningReportsChart['data'][2]['chart_data'],
      earningReportsChart['data'][2]['active_option'],
      earningReportsChart['data'][2]['color1'],
      earningReportsChart['data'][2]['color2']
    );
  if (typeof electricity !== undefined && electricity !== null) {
    const earningReportsTabsOrders = new ApexCharts(electricity, electricityConfig);
    earningReportsTabsOrders.render();
  }

  // const heat = document.querySelector('#heat'),
  //   heatConfig = EarningReportsBarChart(
  //     earningReportsChart['data'][3]['chart_data'],
  //     earningReportsChart['data'][3]['active_option'],
  //     earningReportsChart['data'][3]['color1'],
  //     earningReportsChart['data'][3]['color2']
  //   );
  // if (typeof heat !== undefined && heat !== null) {
  //   const earningReportsTabsOrders = new ApexCharts(heat, heatConfig);
  //   earningReportsTabsOrders.render();
  // }

  const goods_services = document.querySelector('#goods_services'),
    goods_servicesConfig = EarningReportsBarChart(
      earningReportsChart['data'][4]['chart_data'],
      earningReportsChart['data'][4]['active_option'],
      earningReportsChart['data'][4]['color1'],
      earningReportsChart['data'][4]['color2']
    );
  if (typeof goods_services !== undefined && goods_services !== null) {
    const earningReportsTabsOrders = new ApexCharts(goods_services, goods_servicesConfig);
    earningReportsTabsOrders.render();
  }

  const waste = document.querySelector('#waste'),
    wasteConfig = EarningReportsBarChart(
      earningReportsChart['data'][5]['chart_data'],
      earningReportsChart['data'][5]['active_option'],
      earningReportsChart['data'][5]['color1'],
      earningReportsChart['data'][5]['color2']
    );
  if (typeof waste !== undefined && waste !== null) {
    const earningReportsTabsOrders = new ApexCharts(waste, wasteConfig);
    earningReportsTabsOrders.render();
  }

  const business_travel = document.querySelector('#business_travel'),
    business_travelConfig = EarningReportsBarChart(
      earningReportsChart['data'][6]['chart_data'],
      earningReportsChart['data'][6]['active_option'],
      earningReportsChart['data'][6]['color1'],
      earningReportsChart['data'][6]['color2']
    );
  if (typeof business_travel !== undefined && business_travel !== null) {
    const earningReportsTabsOrders = new ApexCharts(business_travel, business_travelConfig);
    earningReportsTabsOrders.render();
  }

  const emplyee = document.querySelector('#employee'),
    emplyeeConfig = EarningReportsBarChart(
      earningReportsChart['data'][7]['chart_data'],
      earningReportsChart['data'][7]['active_option'],
      earningReportsChart['data'][7]['color1'],
      earningReportsChart['data'][7]['color2']
    );
  if (typeof emplyee !== undefined && emplyee !== null) {
    const earningReportsTabsOrders = new ApexCharts(emplyee, emplyeeConfig);
    earningReportsTabsOrders.render();
  }


  //age

  const age_1 = document.querySelector('#age_1'),
    age_1Config = chartAge(
      earningReportsChart['data'][8]['chart_data'],
      earningReportsChart['data'][8]['active_option'],
      earningReportsChart['data'][8]['color1'],
      earningReportsChart['data'][8]['color2']
    );
  if (typeof age_1 !== undefined && age_1 !== null) {
    const earningReportsTabsOrders = new ApexCharts(age_1, age_1Config);
    earningReportsTabsOrders.render();
  }
  const age_2 = document.querySelector('#age_2'),
    age_2Config = chartAge(
      earningReportsChart['data'][9]['chart_data'],
      earningReportsChart['data'][9]['active_option'],
      earningReportsChart['data'][9]['color1'],
      earningReportsChart['data'][9]['color2']
    );
  if (typeof age_2 !== undefined && age_2 !== null) {
    const earningReportsTabsOrders = new ApexCharts(age_2, age_2Config);
    earningReportsTabsOrders.render();
  }
})();
