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

  // Heat chart data generator
  function generateDataHeat(count, yrange) {
    let i = 0;
    let series = [];
    while (i < count) {
      let x = 'w' + (i + 1).toString();
      let y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

      series.push({x: x, y: y});
      i++;
    }
    return series;
  }

  // Line Area Chart
  // --------------------------------------------------------------------
  const areaChartEl = document.querySelector('#s'),
    areaChartConfig = {
      chart: {
        height: 400,
        type: 'area', 
        toolbar: {
          show: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        // show: false,
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
      colors: [
        config.colors.primary, config.colors.success, config.colors.warning
      ],
      series: [
				{
						name: 'UMUM',
						data: [
								104,
								121,
								88,
								171,
								129,
								162,
								142,
								245,
								222,
								179,
								274,
								287,
								371,
								386,
								415,
								382,
								434,
								424,
								395,
								363,
								389,
								407,
								393,
								380,
								397,
								408,
								428,
								432,
								420,
								417,
								430,
								448,
								466,
								469,
								480
						]
				}, {
						name: 'BPJS',
						data: [
								65,
								78,
								73,
								115,
								82,
								103,
								93,
								180,
								159,
								143,
								201,
								221,
								273,
								287,
								302,
								285,
								321,
								315,
								296,
								273,
								283,
								290,
								302,
								317,
								310,
								303,
								320,
								332,
								324,
								307,
								336,
								346,
								352,
								357,
								364
						]
				}, {
						name: 'ASURANSI',
						data: [
								85,
								41,
								82,
								44,
								32,
								70,
								48,
								64,
								58,
								147,
								121,
								105,
								138,
								182,
								220,
								241,
								227,
								253,
								263,
								265,
								269,
								278,
								279,
								294,
								313,
								302,
								309,
								328,
								335,
								322,
								319,
								339,
								348,
								353,
								359
						]
				}
		],
		
			xaxis: {
				categories: [
					'1/18',
					'2/18',
					'3/18',
					'4/18',
					'5/18',
					'6/18',
					'7/18',
					'8/18',
					'9/18',
					'10/18',
					'11/18',
					'12/18',
					'1/19',
					'2/19',
					'3/19',
					'4/19',
					'5/19',
					'6/19',
					'7/19',
					'8/19',
					'9/19',
					'10/19',
					'11/19',
					'12/19',
					'1/20',
					'2/20',
					'3/20',
					'4/20',
					'5/20',
					'6/20',
					'7/20',
					'8/20',
					'9/20',
					'10/20',
					'11/20',
					'12/20',
					'1/21',
					'2/21',
					'3/21',
					'4/21',
					'5/21',
					'6/21',
					'7/21',
					'8/21',
					'9/21',
					'10/21',
					'11/21',
					'12/21',
					'1/22',
					'2/22',
					'3/22',
					'4/22',
					'5/22',
					'6/22',
					'7/22',
					'8/22',
					'9/22',
					'10/22',
					'11/22',
					'12/22',
					'1/23',
					'2/23',
					'3/23',
					'4/23',
					'5/23',
					'6/23',
					'7/23',
					'8/23',
					'9/23',
					'10/23',
					'11/23',
					'12/23',
					'1/24',
					'2/24',
					'3/24'
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
			
      grid: {
        borderColor: borderColor,
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
      yaxis: {
        labels: {
					show: false,
          style: {
            colors: labelColor,
            fontSize: '13px'
          }
        }
      },
      fill: {
        // opacity: 1,
        // type: 'solid'	
      },
      tooltip: {
        shared: false
      }
    };
  if (typeof areaChartEl !== undefined && areaChartEl !== null) {
    const areaChart = new ApexCharts(areaChartEl, areaChartConfig);
    areaChart.render();
  }

  // Bar Chart
  // --------------------------------------------------------------------
  const barChartEl = document.querySelector('#barChart'),
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
          columnWidth: '15%',
          colors: {
            backgroundBarColors: [
              chartColors.column.bg, chartColors.column.bg, chartColors.column.bg, chartColors.column.bg, chartColors.column.bg
            ],
            backgroundBarRadius: 10
          }
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
        chartColors.column.series1, chartColors.column.series2
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
          name: 'Apple',
          data: [
            90,
            120,
            55,
            100,
            80,
            125,
            175,
            70,
            88,
            180
          ]
        }, {
          name: 'Samsung',
          data: [
            85,
            100,
            30,
            40,
            95,
            90,
            30,
            110,
            62,
            20
          ]
        }
      ],
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
          '16/12'
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
      },
      fill: {
        opacity: 1
      }
    };
  if (typeof barChartEl !== undefined && barChartEl !== null) {
    const barChart = new ApexCharts(barChartEl, barChartConfig);
    barChart.render();
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
      colors: [
        config.colors.warning, config.colors.primary, config.colors.success
      ],
      series: [
        {
          name: 'Angular',
          data: [
            [
              5.4, 170
            ],
            [
              5.4, 100
            ],
            [
              5.7, 110
            ],
            [
              5.9, 150
            ],
            [
              6.0, 200
            ],
            [
              6.3, 170
            ],
            [
              5.7, 140
            ],
            [
              5.9, 130
            ],
            [
              7.0, 150
            ],
            [
              8.0, 120
            ],
            [
              9.0, 170
            ],
            [
              10.0, 190
            ],
            [
              11.0, 220
            ],
            [
              12.0, 170
            ],
            [13.0, 230]
          ]
        }, {
          name: 'Vue',
          data: [
            [
              14.0, 220
            ],
            [
              15.0, 280
            ],
            [
              16.0, 230
            ],
            [
              18.0, 320
            ],
            [
              17.5, 280
            ],
            [
              19.0, 250
            ],
            [
              20.0, 350
            ],
            [
              20.5, 320
            ],
            [
              20.0, 320
            ],
            [
              19.0, 280
            ],
            [
              17.0, 280
            ],
            [
              22.0, 300
            ],
            [18.0, 120]
          ]
        }, {
          name: 'React',
          data: [
            [
              14.0, 290
            ],
            [
              13.0, 190
            ],
            [
              20.0, 220
            ],
            [
              21.0, 350
            ],
            [
              21.5, 290
            ],
            [
              22.0, 220
            ],
            [
              23.0, 140
            ],
            [
              19.0, 400
            ],
            [
              20.0, 200
            ],
            [
              22.0, 90
            ],
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
          data: [
            280,
            200,
            220,
            180,
            270,
            250,
            70,
            90,
            200,
            150,
            160,
            100,
            150,
            100,
            50
          ]
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
        custom: function ({series, seriesIndex, dataPointIndex, w}) {
          return '<div class="px-3 py-2"><span>' + series[seriesIndex][dataPointIndex] + '%</span></div>';
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
          data: [
            700,
            350,
            480,
            600,
            210,
            550,
            150
          ]
        }
      ],
      xaxis: {
        categories: [
          'MON, 11',
          'THU, 14',
          'FRI, 15',
          'MON, 18',
          'WED, 20',
          'FRI, 21',
          'MON, 23'
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
            }, {
              x: new Date(1538780400000),
              y: [200, 400, 170, 330]
            }, {
              x: new Date(1538782200000),
              y: [330, 340, 250, 280]
            }, {
              x: new Date(1538784000000),
              y: [300, 330, 200, 320]
            }, {
              x: new Date(1538785800000),
              y: [320, 450, 280, 350]
            }, {
              x: new Date(1538787600000),
              y: [300, 350, 80, 250]
            }, {
              x: new Date(1538789400000),
              y: [200, 330, 170, 300]
            }, {
              x: new Date(1538791200000),
              y: [200, 220, 70, 130]
            }, {
              x: new Date(1538793000000),
              y: [220, 270, 180, 250]
            }, {
              x: new Date(1538794800000),
              y: [200, 250, 80, 100]
            }, {
              x: new Date(1538796600000),
              y: [150, 170, 50, 120]
            }, {
              x: new Date(1538798400000),
              y: [110, 450, 10, 420]
            }, {
              x: new Date(1538800200000),
              y: [400, 480, 300, 320]
            }, {
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
                from: 0,
                to: 10,
                name: '0-10',
                color: '#90B3F3'
              }, {
                from: 11,
                to: 20,
                name: '10-20',
                color: '#7EA6F1'
              }, {
                from: 21,
                to: 30,
                name: '20-30',
                color: '#6B9AEF'
              }, {
                from: 31,
                to: 40,
                name: '30-40',
                color: '#598DEE'
              }, {
                from: 41,
                to: 50,
                name: '40-50',
                color: '#4680EC'
              }, {
                from: 51,
                to: 60,
                name: '50-60',
                color: '#3474EA'
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
          name: 'SUN',
          data: generateDataHeat(24, {
            min: 0,
            max: 60
          })
        }, {
          name: 'MON',
          data: generateDataHeat(24, {
            min: 0,
            max: 60
          })
        }, {
          name: 'TUE',
          data: generateDataHeat(24, {
            min: 0,
            max: 60
          })
        }, {
          name: 'WED',
          data: generateDataHeat(24, {
            min: 0,
            max: 60
          })
        }, {
          name: 'THU',
          data: generateDataHeat(24, {
            min: 0,
            max: 60
          })
        }, {
          name: 'FRI',
          data: generateDataHeat(24, {
            min: 0,
            max: 60
          })
        }, {
          name: 'SAT',
          data: generateDataHeat(24, {
            min: 0,
            max: 60
          })
        }
      ],
      xaxis: {
        labels: {
          show: false,
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
      colors: [
        chartColors.donut.series1, chartColors.donut.series2, chartColors.donut.series4
      ],
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
              fontFamily: 'Public Sans'
            },
            value: {
              fontSize: '1.2rem',
              color: legendColor,
              fontFamily: 'Public Sans'
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
      series: [
        80, 50, 35
      ],
      labels: ['Comments', 'Replies', 'Shares']
    };
  if (typeof radialBarChartEl !== undefined && radialBarChartEl !== null) {
    const radialChart = new ApexCharts(radialBarChartEl, radialBarChartConfig);
    radialChart.render();
  }

  // Radar Chart
  // --------------------------------------------------------------------
  const radarChartEl = document.querySelector('#radarChart'),
    radarChartConfig = {
      chart: {
        height: 350,
        type: 'radar',
        toolbar: {
          show: false
        },
        dropShadow: {
          enabled: false,
          blur: 8,
          left: 1,
          top: 1,
          opacity: 0.2
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
      plotOptions: {
        radar: {
          polygons: {
            strokeColors: borderColor,
            connectorColors: borderColor
          }
        }
      },
      yaxis: {
        show: false
      },
      series: [
        {
          name: 'iPhone 12',
          data: [
            41,
            64,
            81,
            60,
            42,
            42,
            33,
            23
          ]
        }, {
          name: 'Samsung s20',
          data: [
            65,
            46,
            42,
            25,
            58,
            63,
            76,
            43
          ]
        }
      ],
      colors: [
        chartColors.donut.series1, chartColors.donut.series3
      ],
      xaxis: {
        categories: [
          'Battery',
          'Brand',
          'Camera',
          'Memory',
          'Storage',
          'Display',
          'OS',
          'Price'
        ],
        labels: {
          show: true,
          style: {
            colors: [
              labelColor,
              labelColor,
              labelColor,
              labelColor,
              labelColor,
              labelColor,
              labelColor,
              labelColor
            ],
            fontSize: '13px',
            fontFamily: 'Public Sans'
          }
        }
      },
      fill: {
        opacity: [1, 0.8]
      },
      stroke: {
        show: false,
        width: 0
      },
      markers: {
        size: 0
      },
      grid: {
        show: false,
        padding: {
          top: -20,
          bottom: -20
        }
      }
    };
  if (typeof radarChartEl !== undefined && radarChartEl !== null) {
    const radarChart = new ApexCharts(radarChartEl, radarChartConfig);
    radarChart.render();
  }

  var options = {
    series: [
      {
        name: 'UMUM',
        data: [
          44.3, // 44 milyar
          55.3, // 55 milyar
          41.3, // 41 milyar
          67.3, // 67 milyar
          22.3, // 22 milyar
          43.3, // 43 milyar
          33.3 // 33 milyar
        ]
      }, {
        name: 'BPJS',
        data: [
          13.3, // 13 milyar
          23.3, // 23 milyar
          20.3, // 20 milyar
          8.3, // 8 milyar
          13.3, // 13 milyar
          27.3, // 27 milyar
          52.3 // 52 milyar
        ]
      }, {
        name: 'ASURANSI',
        data: [
          13.3, // 13 milyar
          23.3, // 23 milyar
          20.3, // 20 milyar
          8.3, // 8 milyar
          13.3, // 13 milyar
          27.3, // 27 milyar
          52.3 // 52 milyar
        ]
      }

    ],
    dataLabels: {
      formatter: (val) => {
        return val + ' M'
      }
    },
    grid: {
      borderColor: borderColor,
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
    chart: {
      type: 'bar',
      height: 350,
      stacked: true,
      toolbar: {
        show: false
      },
      zoom: {
        enabled: true
      }
    },
    responsive: [
      {
        breakpoint: 480,
        options: {
          legend: {
            position: 'bottom',
            offsetX: -10,
            offsetY: 0
          }
        }
      }
    ],
    plotOptions: {
      bar: {
        horizontal: false,
        borderRadius: 10,
        dataLabels: {
          total: {
            enabled: true,
            style: {
              fontSize: '13px',
              fontWeight: 900
            }
          }
        }
      }
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
      labels: {
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
    yaxis: {
      labels: {
        show: false,
        style: {
          colors: labelColor,
          fontSize: '13px'
        }
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'start',
      labels: {
        colors: legendColor
      }
    },
    fill: {
      opacity: 1
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart_jumlahpendapatanbypelayanan"), options);
  chart.render();

  // Donut Chart
  // --------------------------------------------------------------------
  const donutChartEl = document.querySelector('#donutChart_persentase_pasien'),
    donutChartConfig = {
      chart: {
        height: 300,
        type: 'donut'
      },
      labels: [
        'UMUM', 'BPJS', 'ASURANSI'
      ],
      series: [
        42, 7, 25
      ],
      colors: [
        chartColors.donut.series4, chartColors.donut.series2, chartColors.donut.series1
      ],
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
        markers: {
          offsetX: -3
        },
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
                fontFamily: 'Public Sans'
              },
              value: {
                fontSize: '1.2rem',
                color: legendColor,
                fontFamily: 'Public Sans',
                formatter: function (val) {
                  return parseInt(val, 10) + ' pasien';
                }
              },
              total: {
                show: true,
                fontSize: '1.5rem',
                color: headingColor,
                label: 'Total',
                formatter: function (w) {
                  return '220JT Pasien';
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
        }, {
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
        }, {
          breakpoint: 420,
          options: {
            chart: {
              height: 280
            },
            legend: {
              show: false
            }
          }
        }, {
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
  const donutChartEl2 = document.querySelector('#donutChart_persentase_pendapatan'),
    donutChartConfig2 = {
      chart: {
        height: 300,
        type: 'donut'
      },
      labels: [
        'UMUM', 'BPJS', 'ASURANSI'
      ],
      series: [
        42, 7, 25
      ],
      colors: [
        chartColors.donut.series4, chartColors.donut.series2, chartColors.donut.series1
      ],
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
        markers: {
          offsetX: -3
        },
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
                fontFamily: 'Public Sans'
              },
              value: {
                fontSize: '1.2rem',
                color: legendColor,
                fontFamily: 'Public Sans',
                formatter: function (val) {
                  return parseInt(val, 10) + ' pasien';
                }
              },
              total: {
                show: true,
                fontSize: '1.5rem',
                color: headingColor,
                label: 'Total',
                formatter: function (w) {
                  return '220M';
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
        }, {
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
        }, {
          breakpoint: 420,
          options: {
            chart: {
              height: 280
            },
            legend: {
              show: false
            }
          }
        }, {
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
  if (typeof donutChartEl2 !== undefined && donutChartEl2 !== null) {
    const donutChart2 = new ApexCharts(donutChartEl2, donutChartConfig2);
    donutChart2.render();
  }

  // var dates = [ 	[new Date('2018-01-01').getTime(), 8000000], 	[new
  // Date('2018-02-01').getTime(), 8500000], 	[new Date('2018-03-01').getTime(),
  // 9000000], 	[new Date('2018-04-01').getTime(), 9500000], 	[new
  // Date('2018-05-01').getTime(), 10000000], 	[new Date('2018-06-01').getTime(),
  // 10500000], 	[new Date('2018-07-01').getTime(), 11000000], 	[new
  // Date('2018-08-01').getTime(), 11500000], 	[new Date('2018-09-01').getTime(),
  // 12000000], 	[new Date('2018-10-01').getTime(), 12500000], 	[new
  // Date('2018-11-01').getTime(), 13000000], 	[new Date('2018-12-01').getTime(),
  // 13500000], 	[new Date('2019-01-01').getTime(), 14000000], 	[new
  // Date('2019-02-01').getTime(), 14500000], 	[new Date('2019-03-01').getTime(),
  // 15000000], 	[new Date('2019-04-01').getTime(), 15500000], 	[new
  // Date('2019-05-01').getTime(), 16000000], 	[new Date('2019-06-01').getTime(),
  // 16500000], 	[new Date('2019-07-01').getTime(), 17000000], 	[new
  // Date('2019-08-01').getTime(), 17500000], 	[new Date('2019-09-01').getTime(),
  // 18000000], 	[new Date('2019-10-01').getTime(), 18500000], 	[new
  // Date('2019-11-01').getTime(), 19000000], 	[new Date('2019-12-01').getTime(),
  // 19500000], 	[new Date('2020-01-01').getTime(), 20000000], 	[new
  // Date('2020-02-01').getTime(), 20500000], 	[new Date('2020-03-01').getTime(),
  // 21000000], 	[new Date('2020-04-01').getTime(), 21500000], 	[new
  // Date('2020-05-01').getTime(), 22000000], 	[new Date('2020-06-01').getTime(),
  // 22500000], 	[new Date('2020-07-01').getTime(), 23000000], 	[new
  // Date('2020-08-01').getTime(), 23500000], 	[new Date('2020-09-01').getTime(),
  // 24000000], 	[new Date('2020-10-01').getTime(), 24500000], 	[new
  // Date('2020-11-01').getTime(), 25000000], 	[new Date('2020-12-01').getTime(),
  // 25500000], 	[new Date('2021-01-01').getTime(), 26000000], 	[new
  // Date('2021-02-01').getTime(), 26500000], 	[new Date('2021-03-01').getTime(),
  // 27000000], 	[new Date('2021-04-01').getTime(), 27500000], 	[new
  // Date('2021-05-01').getTime(), 28000000], 	[new Date('2021-06-01').getTime(),
  // 28500000], 	[new Date('2021-07-01').getTime(), 29000000], 	[new
  // Date('2021-08-01').getTime(), 29500000], 	[new Date('2021-09-01').getTime(),
  // 30000000], 	[new Date('2021-10-01').getTime(), 30500000], 	[new
  // Date('2021-11-01').getTime(), 31000000], 	[new Date('2021-12-01').getTime(),
  // 31500000], 	[new Date('2022-01-01').getTime(), 32000000], 	[new
  // Date('2022-02-01').getTime(), 32500000], 	[new Date('2022-03-01').getTime(),
  // 33000000], 	[new Date('2022-04-01').getTime(), 33500000], 	[new
  // Date('2022-05-01').getTime(), 34000000], 	[new Date('2022-06-01').getTime(),
  // 34500000], 	[new Date('2022-07-01').getTime(), 35000000], 	[new
  // Date('2022-08-01').getTime(), 35500000], 	[new Date('2022-09-01').getTime(),
  // 36000000], 	[new Date('2022-10-01').getTime(), 36500000], 	[new
  // Date('2022-11-01').getTime(), 37000000], 	[new Date('2022-12-01').getTime(),
  // 37500000], 	[new Date('2023-01-01').getTime(), 32000000], 	[new
  // Date('2023-02-01').getTime(), 32500000], 	[new Date('2023-03-01').getTime(),
  // 33000000], 	[new Date('2023-04-01').getTime(), 33500000], 	[new
  // Date('2023-05-01').getTime(), 34000000], 	[new Date('2023-06-01').getTime(),
  // 34500000], 	[new Date('2023-07-01').getTime(), 35000000], 	[new
  // Date('2023-08-01').getTime(), 35500000], 	[new Date('2023-09-01').getTime(),
  // 36000000], 	[new Date('2023-10-01').getTime(), 36500000], 	[new
  // Date('2023-11-01').getTime(), 37000000], 	[new Date('2023-12-01').getTime(),
  // 37500000], 	[new Date('2024-01-01').getTime(), 38000000], 	[new
  // Date('2024-02-01').getTime(), 38500000], 	[new Date('2024-03-01').getTime(),
  // 39000000], 	[new Date('2024-04-01').getTime(), 39500000], ]; Fungsi untuk
  // menghasilkan data acak dalam rentang tertentu
  function generateRandomData(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  // Menghasilkan data baru dengan nilai acak
  var newData = [];
  var newData2 = [];
  var newData3 = [];
  var startDate = new Date('2018-01-01').getTime();
  var endDate = new Date('2024-04-01').getTime();

  for (var currentDate = startDate; currentDate <= endDate; currentDate += 30 * 24 * 60 * 60 * 1000) {
    newData.push([
      currentDate,
      generateRandomData(8000000, 40000000)
    ]);
    newData2.push([
      currentDate,
      generateRandomData(8000000, 40000000)
    ]);
    newData3.push([
      currentDate,
      generateRandomData(8000000, 40000000)
    ]);
  }

  // Menetapkan data baru
  var dates = newData;
  var dates2 = newData2;
  var dates3 = newData3;

  var options2 = {
    series: [
      {
        name: 'Total Kunjungan',
        data: dates
      }
    ],
    chart: {
      type: 'area',
      stacked: false,
      height: 350,
      zoom: {
        type: 'x',
        enabled: true,
        autoScaleYaxis: true
      },
      toolbar: {
        autoSelected: 'zoom',
				show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    markers: {
      size: 0
    }, 
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 1,
        inverseColors: false,
        opacityFrom: 0.5,
        opacityTo: 0,
        stops: [0, 90, 100]
      }
    },
    yaxis: {
      labels: {
				show : false,
        // formatter: function (val) {
          // return (val / 1000000).toFixed(0);
          // return (val / 1000000) + ' JT';
        // },
				
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
    xaxis: {
      type: 'datetime',
			labels: {
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
		grid: {
			borderColor: borderColor,
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
    tooltip: {
      shared: false,
      y: {
        formatter: function (val) {
          // return (val / 1000000).toFixed(0)
          return val;
        }
      }
    }
  };

  var chart3 = new ApexCharts(document.querySelector("#linechart_patient_tracker"), options2);
  chart3.render();
  var dates = newData;

  var options3 = {
    series: [
      {
        name: 'UMUM',
        data: dates
      },
      {
        name: 'BPJS',
        data: dates2
      },
      {
        name: 'ASURANSI',
        data: dates3
      }
    ],
    chart: {
      type: 'area',
      stacked: false,
      height: 350,
      zoom: {
        type: 'x',
        enabled: true,
        autoScaleYaxis: true
      },
      toolbar: {
        autoSelected: 'zoom',
				show: false
      }
    },
		
		colors: [
			config.colors.primary, config.colors.success, config.colors.warning
		],
    dataLabels: {
      enabled: false
    },
    markers: {
      size: 0
    }, 
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 1,
        inverseColors: false,
        opacityFrom: 0.5,
        opacityTo: 0,
        stops: [0, 90, 100]
      }
    },
    yaxis: {
      labels: {
				show : false,
        // formatter: function (val) {
          // return (val / 1000000).toFixed(0);
          // return (val / 1000000) + ' JT';
        // },
				
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
    xaxis: {
      type: 'datetime',
			labels: {
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
					show: false
				}
			},
			yaxis: {
				lines: {
					show: false
				}
			}
		},
    tooltip: {
      shared: false,
      y: {
        formatter: function (val) {
          // return (val / 1000000).toFixed(0)
          return val;
        }
      }
    }
  };

  var chart3 = new ApexCharts(document.querySelector("#lineAreaChart_kunjungan_jenis_pasien"), options3); 
  chart3.render();
})();
