/**
 * Charts Apex
 */

'use strict';

(function () {
  let cardColor,
    headingColor,
    labelColor,
    borderColor,
    legendColor,
    heightChart,
    heightMinChart;

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

  heightChart = 300;
  heightMinChart = 200;

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

  var fp2 = {
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
      height: heightChart,
      toolbar: {
        show: false
      }
    },

    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
				fontSize: '10px',
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
            height: heightMinChart
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
      show:false
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

  var chart = new ApexCharts(document.querySelector("#fp2"), fp2);
  chart.render();

  var fp6 = {
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
      height: heightChart,
      toolbar: {
        show: false
      }
    },

    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
    },dataLabels: {
			enabled: true,
			formatter: function (val) {
				return val;
			},
			offsetY: -20,
			style: {
				fontSize: '10px',
				colors: [legendColor]
			}
		},
    colors: [
      "#ff8612", "#ffab5b", "#ffd0a4"
    ],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: heightMinChart
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
      show:false
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

  var chart = new ApexCharts(document.querySelector("#fp6"), fp6);
  chart.render();
  var fp7 = {
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
      height: heightChart,
      toolbar: {
        show: false
      }
    },

    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
				fontSize: '10px',
				colors: [legendColor]
			}
		},
    colors: [
      "#3ad780", "#76e4a7", "#b3f0ce"
    ],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: heightMinChart
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
      show:false
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

  var chart = new ApexCharts(document.querySelector("#fp7"), fp7);
  chart.render();

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
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
      height: heightChart,
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
          },
					
          dataLabels: {
						
						style: {
							fontSize: '8px', 
						}
								}
        }
      }
    ],
    colors: [
      config.colors.primary, config.colors.success, config.colors.warning
    ],
    plotOptions: {
      bar: {

        columnWidth: '55%',
        endingShape: 'rounded',
        startingShape: 'rounded',
        borderRadius: 4,
        horizontal: false,
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

  var chart = new ApexCharts(document.querySelector("#fp8"), options);
  chart.render();

  // Donut Chart
  // --------------------------------------------------------------------
  const donutChartEl = document.querySelector('#fp1'),
    donutChartConfig = {
      chart: {
        height: heightChart,
        type: 'donut'
      },
      labels: [
        'UMUM', 'BPJS', 'ASURANSI'
      ],
      series: [
        42, 7, 25
      ],
      colors: [
        config.colors.primary, config.colors.success, config.colors.warning
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
                  return '220 JT';
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
              height: heightMinChart
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
              height: heightMinChart
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
  const fp3 = document.querySelector('#fp3'),
    fp3Config = {
      chart: {
        height: heightChart,
        type: 'pie'
      },
      labels: [
        'Rawat Inap', 'Rawat Jalan'
      ],
      series: [
        42, 26
      ],
      colors: [
        "#ff8612", config.colors.success
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
              height: heightMinChart
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
              height: heightMinChart
            },
            legend: {
              show: false
            }
          }
        }
      ]
    };
  if (typeof fp3 !== undefined && fp3 !== null) {
    const donutChart = new ApexCharts(fp3, fp3Config);
    donutChart.render();
  }
  const fp4 = document.querySelector('#fp4'),
    fp4Config = {
      chart: {
        height: 270,
        type: 'donut'
      },
      labels: [
        'UMUM', 'BPJS', 'ASURANSI'
      ],
      series: [
        42, 7, 25
      ],
      colors: [
        "#ff8612", "#ffab5b", "#ffd0a4"
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
                  return '220 JT';
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
              height: heightMinChart
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
              height: heightMinChart
            },
            legend: {
              show: false
            }
          }
        }
      ]
    };
  if (typeof fp4 !== undefined && fp4 !== null) {
    const donutChart = new ApexCharts(fp4, fp4Config);
    donutChart.render();
  }
  const fp5 = document.querySelector('#fp5'),
    fp5Config = {
      chart: {
        height: 270,
        type: 'donut'
      },
      labels: [
        'UMUM', 'BPJS', 'ASURANSI'
      ],
      series: [
        42, 7, 25
      ],
      colors: [
        "#3ad780", "#76e4a7", "#b3f0ce"
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
                  return '220 JT';
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
              height: heightMinChart
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
              height: heightMinChart
            },
            legend: {
              show: false
            }
          }
        }
      ]
    };
  if (typeof fp5 !== undefined && fp5 !== null) {
    const donutChart = new ApexCharts(fp5, fp5Config);
    donutChart.render();
  }
  const fp10 = document.querySelector('#fp10'),
    fp10Config = {
      chart: {
        height: heightChart,
        type: 'pie'
      },
      labels: [
        'Rawat Inap', 'Rawat Jalan'
      ],
      series: [
        42, 26
      ],
      colors: [
        config.colors.primary, config.colors.success
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
              height: heightMinChart
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
              height: heightMinChart
            },
            legend: {
              show: false
            }
          }
        }
      ]
    };
  if (typeof fp10 !== undefined && fp10 !== null) {
    const donutChart = new ApexCharts(fp10, fp10Config);
    donutChart.render();
  }
  const fp11 = document.querySelector('#fp11'),
    fp11Config = {
      chart: {
        height: 270,
        type: 'donut'
      },
      labels: [
        'UMUM', 'BPJS', 'ASURANSI'
      ],
      series: [
        42, 7, 25
      ],
      colors: [
        config.colors.primary, "#6b5eef", "#ada6f6"
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
                  return '220 JT';
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
              height: heightMinChart
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
              height: heightMinChart
            },
            legend: {
              show: false
            }
          }
        }
      ]
    };
  if (typeof fp11 !== undefined && fp11 !== null) {
    const donutChart = new ApexCharts(fp11, fp11Config);
    donutChart.render();
  }
  const fp12 = document.querySelector('#fp12'),
    fp12Config = {
      chart: {
        height: 270,
        type: 'donut'
      },
      labels: [
        'UMUM', 'BPJS', 'ASURANSI'
      ],
      series: [
        42, 7, 25
      ],
      colors: [
        "#3ad780", "#76e4a7", "#b3f0ce"
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
                  return '220 JT';
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
              height: heightMinChart
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
              height: heightMinChart
            },
            legend: {
              show: false
            }
          }
        }
      ]
    };
  if (typeof fp12 !== undefined && fp12 !== null) {
    const donutChart = new ApexCharts(fp12, fp12Config);
    donutChart.render();
  }
  const donutChartEl2 = document.querySelector('#fp9'),
    donutChartConfig2 = {
      chart: {
        height: heightChart,
        type: 'donut'
      },
      labels: [
        'UMUM', 'BPJS', 'ASURANSI'
      ],
      series: [
        42, 7, 25
      ],
      colors: [
        config.colors.primary, config.colors.success, config.colors.warning
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
              height: heightMinChart
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
              height: heightMinChart
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
      height: heightChart,
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
        show: false,
        // formatter: function (val) { return (val / 1000000).toFixed(0); return (val /
        // 1000000) + ' JT'; },

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
    colors: [
     config.colors.warning
    ],
    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
          return val;
        }
      }
    }
  };

  var chart3 = new ApexCharts(document.querySelector("#fp16"), options2);
  chart3.render();
  var dates = newData;

  var options3 = {
    series: [
      {
        name: 'UMUM',
        data: dates
      }, {
        name: 'BPJS',
        data: dates2
      }, {
        name: 'ASURANSI',
        data: dates3
      }
    ],
    chart: {
      type: 'area',
      stacked: false,
      height: heightChart,
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
        show: false,
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
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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

  var chart3 = new ApexCharts(document.querySelector("#fp17"), options3);
  chart3.render();

  var options = {
    series: [{
        name: 'Rawat Jalan',
        data: [
          53,
        ]
      },
      {
        name: 'Rawat Inap',
        data: [
          44
        ]
      }
    ], 
    colors: [ config.colors.success,
      config.colors.primary
    ],
    chart: {
      type: 'bar',
      height: 150,
      stacked: true,
      stackType: '100%',
			toolbar: {
				show: false
			}
    },
    plotOptions: {
      bar: {
        horizontal: true,
				borderRadius: 4,
				endingShape: 'rounded',
				startingShape: 'rounded',
      }
    }, 
    xaxis: {
      categories: [
        "Jumlah ", 
      ],
			axisBorder: {
        show: false,
        color: borderColor
      },
      axisTicks: {
        show: false
      },
      labels: {
				show:false
      }
    },
    yaxis: {
			show:false
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + "K"
        }
      } 
    },
    fill: {
      opacity: 1

    },
		
    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
    legend: {
      position: 'top',
      horizontalAlign: 'center', 
      labels: {
        colors: legendColor,
        useSeriesColors: false
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fp13"), options);
  chart.render();

	
  var fp20 = {
    series: [
			{
        name: 'RAWAT JALAN',
        data: [
          76,
          85,
          101,
          98,
          87,
          105,
          91
        ]
      },
      {
        name: 'RAWAT INAP',
        data: [
          44,
          55,
          57,
          56,
          61,
          58,
          63
        ]
      }
    ],
    chart: {
      type: 'bar',
      height: heightChart,
      toolbar: {
        show: false
      }
    },

    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
          position: 'top',
        }
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
				return val + "M";
			},
			offsetY: -20,
			style: {
				fontSize: '10px',
				colors: [legendColor]
			}
		},
    colors: [
			config.colors.success, config.colors.primary
    ],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: heightMinChart
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
						
			style: {
				fontSize: '8px', 
			}
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
      show:false
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

  var chart = new ApexCharts(document.querySelector("#fp20"), fp20);
  chart.render();
	
  var fp14 = {
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
      height: heightChart,
      toolbar: {
        show: false
      }
    },

    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
				fontSize: '10px',
				colors: [legendColor]
			}
		},
		colors: [
			config.colors.primary, "#6b5eef", "#ada6f6"
		],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: heightMinChart
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
      show:false
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

  var chart = new ApexCharts(document.querySelector("#fp14"), fp14);
  chart.render();
  var fp15 = {
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
      height: heightChart,
      toolbar: {
        show: false
      }
    },

    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
				fontSize: '10px',
				colors: [legendColor]
			}
		},
    colors: [
      "#3ad780", "#76e4a7", "#b3f0ce"
    ],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: heightMinChart
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
      show:false
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

  var chart = new ApexCharts(document.querySelector("#fp15"), fp15);
  chart.render();

  var fp21 = {
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
      }
    ],
    chart: {
      type: 'bar',
      height: heightChart,
      toolbar: {
        show: false
      }
    },

    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
      show: false, 
    },
    dataLabels: {
			enabled: true,
			formatter: function (val) {
				return val;
			},
			offsetY: -20,
			style: {
				fontSize: '10px',
				colors: [legendColor]
			}
		},
    colors: [
		config.colors.danger
    ],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: heightMinChart
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
      show:false
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

  var chart = new ApexCharts(document.querySelector("#fp21"), fp21);
  chart.render();
	var fp22 = {
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
      height: heightChart,
      toolbar: {
        show: false
      }
    },

    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
				fontSize: '10px',
				colors: [legendColor]
			}
		},
    colors: [
      "#3ad780", "#76e4a7", "#b3f0ce"
    ],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: heightMinChart
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
      show:false
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

  var chart = new ApexCharts(document.querySelector("#fp22"), fp22);
  chart.render();
	
  var fp24 = {
    series: [{
        name: 'Rawat Jalan',
        data: [
          53,
        ]
      },
      {
        name: 'Rawat Inap',
        data: [
          44
        ]
      }
    ],
    colors: [ config.colors.success,
      config.colors.primary
    ],
    chart: {
      type: 'bar',
      height: 150,
      stacked: true,
      stackType: '100%',
			toolbar: {
				show: false
			}
    },
    plotOptions: {
      bar: {
        horizontal: true,
				borderRadius: 4,
				startingShape: 'rounded',
				endingShape: 'rounded'
      }
    }, 
    xaxis: {
      categories: [
        "Jumlah ", 
      ],
			axisBorder: {
        show: false,
        color: borderColor
      },
      axisTicks: {
        show: false
      },
      labels: {
				show:false
      }
    },
    yaxis: {
			show:false
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + "K"
        }
      } 
    },
    fill: {
      opacity: 1

    },
		
    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
    legend: {
      position: 'top',
      horizontalAlign: 'center', 
      labels: {
        colors: legendColor,
        useSeriesColors: false
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#fp24"), fp24);
  chart.render();

  const fp25 = document.querySelector('#fp25'),
    fp25Config = {
      chart: {
        height: heightChart,
        type: 'bar',
        stacked: true,
        stackType: '100%',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '55%',
					endingShape: 'rounded',
					startingShape: 'rounded',
					borderRadius: 4,
        }
      },
      dataLabels: {
        enabled: true,
        style: {
          fontSize: '10px',
          colors: ['white']
        },
				dropShadow:{
					enabled:true,
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
      colors: ["#3ad780", "#76e4a7", "#b3f0ce"],
      stroke: {
        show: true,
        colors: ['transparent']
      },
      grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
        },
      },
      series: [
        {
          name: 'UMUM',
          data: [44, 55, 57, 56, 61, 58, 63]
        },
        {
          name: 'BPJS',
          data: [76, 85, 101, 98, 87, 105, 91]
        },
        {
          name: 'ASURANSI',
          data: [35, 41, 36, 26, 45, 48, 52]
        }
      
      ],
      xaxis: {
        categories: ['2018', '2019', '2020', '2021', '2022', '2023', '2024'],
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
        show: false
      },
      fill: {
        opacity: 1
      }
    };
  if (typeof fp25 !== undefined && fp25 !== null) {
    const barChart = new ApexCharts(fp25, fp25Config);
    barChart.render();
  }

  const fp26 = document.querySelector('#fp26'),
    fp26Config = {
      chart: {
        height: heightChart,
        type: 'bar',
        stacked: true,
        stackType: '100%',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '55%',
					
					endingShape: 'rounded',
					startingShape: 'rounded',
					borderRadius: 4,
        }
      },
      dataLabels: {
        enabled: true,
        style: {
          fontSize: '10px',
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
      colors: [config.colors.primary, "#6b5eef", "#ada6f6"],
      stroke: {
        show: true,
        colors: ['transparent']
      },
      grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
        },
      },
      series: [
        {
          name: 'UMUM',
          data: [44, 55, 57, 56, 61, 58, 63]
        },
        {
          name: 'BPJS',
          data: [76, 85, 101, 98, 87, 105, 91]
        },
        {
          name: 'ASURANSI',
          data: [35, 41, 36, 26, 45, 48, 52]
        }
      
      ],
      xaxis: {
        categories: ['2018', '2019', '2020', '2021', '2022', '2023', '2024'],
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
        show: false
      },
      fill: {
        opacity: 1
      }
    };
  if (typeof fp26 !== undefined && fp26 !== null) {
    const barChart = new ApexCharts(fp26, fp26Config);
    barChart.render();
  }


  var fp18 = {
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
      height: heightChart,
      toolbar: {
        show: false
      }
    },

    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
				fontSize: '10px',
				colors: [legendColor]
			}
		},
		colors: [
			config.colors.primary, "#6b5eef", "#ada6f6"
		],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: heightMinChart
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
      show:false
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

  var chart = new ApexCharts(document.querySelector("#fp18"), fp18);
  chart.render();
  var fp19 = {
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
      height: heightChart,
      toolbar: {
        show: false
      }
    },

    grid: {
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0
      },
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
				fontSize: '10px',
				colors: [legendColor]
			}
		},
    colors: [
      "#3ad780", "#76e4a7", "#b3f0ce"
    ],
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            height: heightMinChart
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
      show:false
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

  var chart = new ApexCharts(document.querySelector("#fp19"), fp19);
  chart.render();

})();
