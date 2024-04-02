/**
 * Charts Apex
 */

'use strict';

(function () {
  let cardColor,
    headingColor,
    labelColor,
    borderColor,
    legendColor;

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
      series1: '#fee802',
      series2: '#3fd0bd',
      series3: '#826bf8',
      series4: '#2b9bf4'
    },
    area: {
      series1: '#29dac7',
      series2: '#60f2ca',
      series3: '#a5f8cd'
    }
  };

  var fd1 = {

    chart: {
      type: 'bar',
      height: 300,
      toolbar: {
        show: false
      }
    },

    grid: {
      xaxis: {
        lines: {
          show: false
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded',
        startingShape: 'rounded',
        borderRadius: 4,
        dataLabels: {
          position: 'top', // top, center, bottom
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
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val;
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: [legendColor]
      }
    },
    colors: [config.colors.primary],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 250
          },

          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '80%',
              endingShape: 'rounded',
              startingShape: 'rounded',
              borderRadius: 4
            }
          },

          dataLabels: {
            enabled: false
          }
        }
      }
    ],
    series: [
      {
        name: 'Pasien',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      }
    ],
    xaxis: {
      categories: [
        'Dokter M',
        'Dokter J',
        'Dokter R',
        'Dokter T',
        'Dokter O',
        'Dokter K',
        'Dokter P',
        'Dokter C',
        'Dokter N',
        'Dokter L',
        'Dokter A',
        'Dokter E',
        'Dokter Q',
        'Dokter G',
        'Dokter D',
        'Dokter F',
        'Dokter B',
        'Dokter S',
        'Dokter I',
        'Dokter H'
      ],
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
      axisBorder: {
        show: false
      },
      labels: {
        show: false,
        style: {
          colors: labelColor,
          fontSize: '13px'
        }
      },
      title: {
        show: false
      }
    },
    fill: {
      opacity: 1
    },

    tooltip: {
      y: {
        formatter: function (val) {
          return val
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fd1"), fd1);
  chart.render();

  var fd2 = {
    chart: {
      type: 'bar',
      height: 300,
      toolbar: {
        show: false
      }
    },

    grid: {
      xaxis: {
        lines: {
          show: false
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded',
        startingShape: 'rounded',
        borderRadius: 4,
        dataLabels: {
          position: 'top', // top, center, bottom
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
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val;
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: [legendColor]
      }
    },
    colors: [config.colors.warning],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 250
          },

          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '80%',
              endingShape: 'rounded',
              startingShape: 'rounded',
              borderRadius: 4
            }
          },

          dataLabels: {
            enabled: false
          }
        }
      }
    ],
    series: [
      {
        name: 'Pasien',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      }
    ],
    xaxis: {
      categories: [
        'Dokter M',
        'Dokter J',
        'Dokter R',
        'Dokter T',
        'Dokter O',
        'Dokter K',
        'Dokter P',
        'Dokter C',
        'Dokter N',
        'Dokter L',
        'Dokter A',
        'Dokter E',
        'Dokter Q',
        'Dokter G',
        'Dokter D',
        'Dokter F',
        'Dokter B',
        'Dokter S',
        'Dokter I',
        'Dokter H'
      ],
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
      axisBorder: {
        show: false
      },
      labels: {
        show: false,
        style: {
          colors: labelColor,
          fontSize: '13px'
        }
      },
      title: {
        show: false
      }
    },
    fill: {
      opacity: 1
    },

    tooltip: {
      y: {
        formatter: function (val) {
          return val
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fd2"), fd2);
  chart.render();

  var fd3 = {

    chart: {
      type: 'bar',
      height: 300,
      toolbar: {
        show: false
      }
    },

    grid: {
      xaxis: {
        lines: {
          show: false
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded',
        startingShape: 'rounded',
        borderRadius: 4,
        dataLabels: {
          position: 'top', // top, center, bottom
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
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val;
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: [legendColor]
      }
    },
    colors: [config.colors.success],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 250
          },

          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '80%',
              endingShape: 'rounded',
              startingShape: 'rounded',
              borderRadius: 4
            }
          },

          dataLabels: {
            enabled: false
          }
        }
      }
    ],
    series: [
      {
        name: 'Pasien',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      }
    ],
    xaxis: {
      categories: [
        'Dokter M',
        'Dokter J',
        'Dokter R',
        'Dokter T',
        'Dokter O',
        'Dokter K',
        'Dokter P',
        'Dokter C',
        'Dokter N',
        'Dokter L',
        'Dokter A',
        'Dokter E',
        'Dokter Q',
        'Dokter G',
        'Dokter D',
        'Dokter F',
        'Dokter B',
        'Dokter S',
        'Dokter I',
        'Dokter H'
      ],
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
      axisBorder: {
        show: false
      },
      labels: {
        show: false,
        style: {
          colors: labelColor,
          fontSize: '13px'
        }
      },
      title: {
        show: false
      }
    },
    fill: {
      opacity: 1
    },

    tooltip: {
      y: {
        formatter: function (val) {
          return val
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fd3"), fd3);
  chart.render();
  var fd4 = {

    chart: {
      type: 'bar',
      height: 300,
      toolbar: {
        show: false
      }
    },

    grid: {
      xaxis: {
        lines: {
          show: false
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded',
        startingShape: 'rounded',
        borderRadius: 4,
        dataLabels: {
          position: 'top', // top, center, bottom
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
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val + 'M';
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: [legendColor]
      }
    },
    colors: [config.colors.primary],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 250
          },

          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '80%',
              endingShape: 'rounded',
              startingShape: 'rounded',
              borderRadius: 4
            }
          },

          dataLabels: {
            enabled: false
          }
        }
      }
    ],
    series: [
      {
        name: 'Pasien',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      }
    ],
    xaxis: {
      categories: [
        'Dokter M',
        'Dokter J',
        'Dokter R',
        'Dokter T',
        'Dokter O',
        'Dokter K',
        'Dokter P',
        'Dokter C',
        'Dokter N',
        'Dokter L',
        'Dokter A',
        'Dokter E',
        'Dokter Q',
        'Dokter G',
        'Dokter D',
        'Dokter F',
        'Dokter B',
        'Dokter S',
        'Dokter I',
        'Dokter H'
      ],
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
      axisBorder: {
        show: false
      },
      labels: {
        show: false,
        style: {
          colors: labelColor,
          fontSize: '13px'
        }
      },
      title: {
        show: false
      }
    },
    fill: {
      opacity: 1
    },

    tooltip: {
      y: {
        formatter: function (val) {
          return val
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fd4"), fd4);
  chart.render();

  var fd5 = {
    chart: {
      type: 'bar',
      height: 300,
      toolbar: {
        show: false
      }
    },

    grid: {
      xaxis: {
        lines: {
          show: false
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded',
        startingShape: 'rounded',
        borderRadius: 4,
        dataLabels: {
          position: 'top', // top, center, bottom
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
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val + 'M';
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: [legendColor]
      }
    },
    colors: [config.colors.warning],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 250
          },

          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '80%',
              endingShape: 'rounded',
              startingShape: 'rounded',
              borderRadius: 4
            }
          },

          dataLabels: {
            enabled: false
          }
        }
      }
    ],
    series: [
      {
        name: 'Pasien',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      }
    ],
    xaxis: {
      categories: [
        'Dokter M',
        'Dokter J',
        'Dokter R',
        'Dokter T',
        'Dokter O',
        'Dokter K',
        'Dokter P',
        'Dokter C',
        'Dokter N',
        'Dokter L',
        'Dokter A',
        'Dokter E',
        'Dokter Q',
        'Dokter G',
        'Dokter D',
        'Dokter F',
        'Dokter B',
        'Dokter S',
        'Dokter I',
        'Dokter H'
      ],
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
      axisBorder: {
        show: false
      },
      labels: {
        show: false,
        style: {
          colors: labelColor,
          fontSize: '13px'
        }
      },
      title: {
        show: false
      }
    },
    fill: {
      opacity: 1
    },

    tooltip: {
      y: {
        formatter: function (val) {
          return val
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fd5"), fd5);
  chart.render();

  var fd6 = {

    chart: {
      type: 'bar',
      height: 300,
      toolbar: {
        show: false
      }
    },

    grid: {
      xaxis: {
        lines: {
          show: false
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded',
        startingShape: 'rounded',
        borderRadius: 4,
        dataLabels: {
          position: 'top', // top, center, bottom
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
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val + 'M';
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: [legendColor]
      }
    },
    colors: [config.colors.success],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 250
          },

          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '80%',
              endingShape: 'rounded',
              startingShape: 'rounded',
              borderRadius: 4
            }
          },

          dataLabels: {
            enabled: false
          }
        }
      }
    ],
    series: [
      {
        name: 'Pasien',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      }
    ],
    xaxis: {
      categories: [
        'Dokter M',
        'Dokter J',
        'Dokter R',
        'Dokter T',
        'Dokter O',
        'Dokter K',
        'Dokter P',
        'Dokter C',
        'Dokter N',
        'Dokter L',
        'Dokter A',
        'Dokter E',
        'Dokter Q',
        'Dokter G',
        'Dokter D',
        'Dokter F',
        'Dokter B',
        'Dokter S',
        'Dokter I',
        'Dokter H'
      ],
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
      axisBorder: {
        show: false
      },
      labels: {
        show: false,
        style: {
          colors: labelColor,
          fontSize: '13px'
        }
      },
      title: {
        show: false
      }
    },
    fill: {
      opacity: 1
    },

    tooltip: {
      y: {
        formatter: function (val) {
          return val
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fd6"), fd6);
  chart.render();


	var fd7 = {

    chart: {
      type: 'bar',
      stacked: true,
      height: 300,
      toolbar: {
        show: false
      }
    },

    grid: {
      xaxis: {
        lines: {
          show: false
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded',
        startingShape: 'rounded',
        borderRadius: 4, 
      }
    },
    legend: {
      show: true,
      position: 'bottom',
      horizontalAlign: 'center',
      labels: {
        colors: legendColor,
        useSeriesColors: false
      }
    },
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val;
      },
      style: {
        fontSize: '12px',
        colors: [legendColor]
      }
    },
    colors: [config.colors.primary,config.colors.warning,config.colors.danger],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 250
          },

          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '80%',
              endingShape: 'rounded',
              startingShape: 'rounded',
              borderRadius: 4
            }
          },

          dataLabels: {
            enabled: false
          }
        }
      }
    ],
    series: [
      {
        name: 'BPJS',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      },{
        name: 'UMUM',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      },
			{
        name: 'ASURANSI',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      }
    ],
    xaxis: {
      categories: [
        'Dokter M',
        'Dokter J',
        'Dokter R',
        'Dokter T',
        'Dokter O',
        'Dokter K',
        'Dokter P',
        'Dokter C',
        'Dokter N',
        'Dokter L',
        'Dokter A',
        'Dokter E',
        'Dokter Q',
        'Dokter G',
        'Dokter D',
        'Dokter F',
        'Dokter B',
        'Dokter S',
        'Dokter I',
        'Dokter H'
      ],
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
      axisBorder: {
        show: false
      },
      labels: {
        show: false,
        style: {
          colors: labelColor,
          fontSize: '13px'
        }
      },
      title: {
        show: false
      }
    },
    fill: {
      opacity: 1
    },

    tooltip: {
      y: {
        formatter: function (val) {
          return val
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fd7"), fd7);
  chart.render();
	var fd8 = {

    chart: {
      type: 'bar',
      stacked: true,
      height: 300,
      toolbar: {
        show: false
      }
    },

    grid: {
      xaxis: {
        lines: {
          show: false
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '80%',
        endingShape: 'rounded',
        startingShape: 'rounded',
        borderRadius: 4, 
      }
    },
    legend: {
      show: true,
      position: 'top',
      horizontalAlign: 'center',
      labels: {
        colors: legendColor,
        useSeriesColors: false
      }
    },
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val;
      },
      style: {
        fontSize: '12px',
        colors: [legendColor]
      }
    },
    colors: [config.colors.primary,config.colors.warning,config.colors.danger],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 250
          },

          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '80%',
              endingShape: 'rounded',
              startingShape: 'rounded',
              borderRadius: 4
            }
          },

          dataLabels: {
            enabled: false
          }
        }
      }
    ],
    series: [
      {
        name: 'BPJS',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      },{
        name: 'UMUM',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      },
			{
        name: 'ASURANSI',
        data: [
          70,
          65,
          60,
          55,
          55,
          55,
          50,
          50,
          45,
          45,
          40,
          40,
          40,
          40,
          35,
          35,
          30,
          30,
          25,
          25
        ]
      }
    ],
    xaxis: {
      categories: [
        'Dokter M',
        'Dokter J',
        'Dokter R',
        'Dokter T',
        'Dokter O',
        'Dokter K',
        'Dokter P',
        'Dokter C',
        'Dokter N',
        'Dokter L',
        'Dokter A',
        'Dokter E',
        'Dokter Q',
        'Dokter G',
        'Dokter D',
        'Dokter F',
        'Dokter B',
        'Dokter S',
        'Dokter I',
        'Dokter H'
      ],
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
      axisBorder: {
        show: false
      },
      labels: {
        show: false,
        style: {
          colors: labelColor,
          fontSize: '13px'
        }
      },
      title: {
        show: false
      }
    },
    fill: {
      opacity: 1
    },

    tooltip: {
      y: {
        formatter: function (val) {
          return val
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fd8"), fd8);
  chart.render();

})();
