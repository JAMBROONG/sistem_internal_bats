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

  var fu1 = {
    series: [
      {
        name: 'Total Pasien',
        data: [
          50,
          42,
          43,
          55,
          57,
          44,
          45

        ]
      }
    ],
    chart: {
      type: 'bar',
      height: 350,
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
    colors: [
      config.colors.primary, config.colors.success, config.colors.warning
    ],
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
    xaxis: {
      categories: [
        'unit 1',
        'unit 2',
        'unit 3',
        'unit 4',
        'unit 5',
        'unit 6',
        'unit 7'
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
          return val + " pasien"
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fu1"), fu1);
  chart.render();
  var fu2 = {
    series: [
      {
        name: 'Unit 1',
        data: [
          44,
          55,
          57,
          56,
          61,
          58,
          63
        ]
      }, {
        name: 'Unit 2',
        data: [
          76,
          85,
          101,
          98,
          87,
          105,
          91
        ]
      }, {
        name: 'Unit 3',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'Unit 4',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'Unit 5',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'Unit 6',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'Unit 7',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }
    ],
    chart: {
      type: 'bar',
      stacked: true,
      height: 350,
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
          position: 'center', // top, center, bottom
        }
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'left',
      labels: {
        colors: legendColor,
        useSeriesColors: false
      }
    },
    dataLabels: {
      enabled: false,
      show: false,
      formatter: function (val) {
        return val;
      },
      style: {
        fontSize: '12px',
        colors: ["#000"]
      }
    },
    // colors: [   config.colors.primary, config.colors.success,
    // config.colors.warning ],
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
    xaxis: {
      categories: [
        '2018',
        '2019',
        '2020',
        '2021',
        '2022',
        '2023',
        '2024'
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
          return val + " pasien"
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fu2"), fu2);
  chart.render();
  var fu3 = {
    series: [
      {
        name: 'UMUM',
        data: [
          44,
          55,
          57,
          56,
          61,
          58,
          63
        ]
      }, {
        name: 'BPJS',
        data: [
          76,
          85,
          101,
          98,
          87,
          105,
          91
        ]
      }, {
        name: 'ASURANSI',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }
    ],
    chart: {
      type: 'bar',
      stacked: true,
      height: 350,
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
          position: 'center', // top, center, bottom
        }
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'left',
      labels: {
        colors: legendColor,
        useSeriesColors: false
      }
    },
    dataLabels: {
      enabled: false,
      show: false,
      formatter: function (val) {
        return val;
      },
      style: {
        fontSize: '12px',
        colors: ["#000"]
      }
    },
    // colors: [   config.colors.primary, config.colors.success,
    // config.colors.warning ],
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
    xaxis: {
      categories: [
        'Unit 1',
        'Unit 2',
        'Unit 3',
        'Unit 4',
        'Unit 5',
        'Unit 6',
        'Unit 7'
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
          return val + " pasien"
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fu3"), fu3);
  chart.render();

  var fu4 = {
    series: [
			{
				"name": "Unit 1",
				"data": [28, 30, 33, 37, 32, 34, 36]
			},
			{
				"name": "Unit 2",
				"data": [12, 11, 14, 19, 17, 13, 15]
			},
			{
				"name": "Unit 3",
				"data": [38, 40, 41, 42, 43, 44, 45]
			},
			{
				"name": "Unit 4",
				"data": [20, 21, 22, 23, 24, 25, 26]
			},
			{
				"name": "Unit 5",
				"data": [46, 47, 48, 49, 50, 51, 52]
			},
			{
				"name": "Unit 6",
				"data": [27, 28, 29, 31, 32, 33, 35]
			}
		]
		
		,
    chart: {
      height: 350,
      type: 'line',
      dropShadow: {
        enabled: true,
        color: '#000',
        top: 18,
        left: 7,
        blur: 10,
        opacity: 0.2
      },
      toolbar: {
        show: false
      }
    }, 
    dataLabels: {
      enabled: true
    },
    stroke: {
      curve: 'smooth'
    }, 
    grid: {
      borderColor: '#e7e7e7',
      row: {
        colors: [
          '#f3f3f3', 'transparent'
        ], // takes an array which will be repeated on columns
        opacity: 0.5
      }
    },
    markers: {
      size: 1
    },
    xaxis: {
      categories: [
        '2018',
        '2019',
        '2020',
        '2021',
        '2022',
        '2023',
        '2024'
      ], 
      axisBorder: {
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
      title: {
        text: 'Temperature'
      },
			show:false,
      axisBorder: {
        show: false
      },
    },
    legend: {
      position: 'top',
      horizontalAlign: 'left',
      floating: true,  
			
      labels: {
        colors: legendColor,
        useSeriesColors: false
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
  };

  var chart = new ApexCharts(document.querySelector("#fu4"), fu4);
  chart.render();

	  


	var fu5 = {
    series: [
      {
        name: 'KLS TRF 1',
        data: [
          44,
          55,
          57,
          56,
          61,
          58,
          63
        ]
      }, {
        name: 'KLS TRF 2',
        data: [
          76,
          85,
          101,
          98,
          87,
          105,
          91
        ]
      }, {
        name: 'KLS TRF 3',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'KLS TRF 4',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'KLS TRF 5',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'KLS TRF 6',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'KLS TRF 7',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }
    ],
    chart: {
      type: 'bar',
      stacked: true,
      height: 350,
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
          position: 'center', // top, center, bottom
        }
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'left',
      labels: {
        colors: legendColor,
        useSeriesColors: false
      }
    },
    dataLabels: {
      enabled: false,
      show: false,
      formatter: function (val) {
        return val;
      },
      style: {
        fontSize: '12px',
        colors: ["#000"]
      }
    },
    // colors: [   config.colors.primary, config.colors.success,
    // config.colors.warning ],
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
    xaxis: {
      categories: [
        'Unit 1',
        'Unit 2',
        'Unit 3',
        'Unit 4',
        'Unit 5',
        'Unit 6',
        'Unit 7'
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
          return val + " pasien"
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fu5"), fu5);
  chart.render();
	var fu8 = {
    series: [
      {
        name: 'Total Pasien',
        data: [
          50,
          42,
          43,
          55,
          57,
          44,
          45

        ]
      }
    ],
    chart: {
      type: 'bar',
      height: 350,
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
        return val + "M";
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: [legendColor]
      }
    },
    colors: [
      config.colors.primary
    ],
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
    xaxis: {
      categories: [
        'unit 1',
        'unit 2',
        'unit 3',
        'unit 4',
        'unit 5',
        'unit 6',
        'unit 7'
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
          return val + " M"
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fu8"), fu8);
  chart.render();




	var fu9 = {
    series: [
      {
        name: 'Unit 1',
        data: [
          44,
          55,
          57,
          56,
          61,
          58,
          63
        ]
      }, {
        name: 'Unit 2',
        data: [
          76,
          85,
          101,
          98,
          87,
          105,
          91
        ]
      }, {
        name: 'Unit 3',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'Unit 4',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'Unit 5',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'Unit 6',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }, {
        name: 'Unit 7',
        data: [
          35,
          41,
          36,
          26,
          45,
          48,
          52
        ]
      }
    ],
    chart: {
      type: 'bar',
      stacked: true,
      height: 350,
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
          position: 'center', // top, center, bottom
        }
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'left',
      labels: {
        colors: legendColor,
        useSeriesColors: false
      }
    },
    dataLabels: {
      enabled: true,
      show: true,
      formatter: function (val) {
        return val + "M";
      },
      style: {
        fontSize: '12px',
        // colors: ["#000"]
      }
    },
    // colors: [   config.colors.primary, config.colors.success,
    // config.colors.warning ],
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
    xaxis: {
      categories: [
        '2018',
        '2019',
        '2020',
        '2021',
        '2022',
        '2023',
        '2024'
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
          return val + " M"
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fu9"), fu9);
  chart.render();


	var fu10 = {
    series: [
      {
        name: 'Bpjs',
        data: [
          50,
          42,
          43,
          55,
          57,
          44,
          45

        ]
      },{
        name: 'Umum',
        data: [
          50,
          42,
          43,
          55,
          57,
          44,
          45

        ]
      },{
        name: 'Umum',
        data: [
          50,
          42,
          43,
          55,
          57,
          44,
          45

        ]
      }
    ],
    chart: {
      type: 'bar',
      stacked: true,
      height: 350,
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
          position: 'center', // top, center, bottom
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
        return val + "M";
      }, 
      style: {
        fontSize: '12px', 
      }
    },
    colors: [
      config.colors.primary,config.colors.success,config.colors.warning
    ],
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
    xaxis: {
      categories: [
        'unit 1',
        'unit 2',
        'unit 3',
        'unit 4',
        'unit 5',
        'unit 6',
        'unit 7'
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
          return val + " M"
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fu10"), fu10);
  chart.render();

})();
