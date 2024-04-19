"use strict";

(function () {
	let cardColor,
		headingColor,
		labelColor,
		borderColor,
		legendColor,
		heightChart;

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

	heightChart = "90%";

	var fp1 = {
		series: [
			{
				name: "Pendapatan",
				data: [44, 55, 57, 56, 61, 58, 63],
			},
		],
		chart: {
			type: "bar",
			height: 300,
			toolbar: {
				show: false,
			},
		},

		grid: {
			xaxis: {
				lines: {
					show: false,
				},
			},
			yaxis: {
				lines: {
					show: false,
				},
			},
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: "55%",
				endingShape: "rounded",
				startingShape: "rounded",
				borderRadius: 4,
				dataLabels: {
					position: "top", // top, center, bottom
				},
			},
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
				fontSize: "12px",
				colors: [legendColor],
			},
		},
		colors: [config.colors.danger],
		responsive: [
			{
				breakpoint: 480,
				options: {
					chart: {
						height: 250,
					},

					plotOptions: {
						bar: {
							horizontal: false,
							columnWidth: "80%",
							endingShape: "rounded",
							startingShape: "rounded",
							borderRadius: 4,
						},
					},

					dataLabels: {
						enabled: false,
					},
				},
			},
		],
		xaxis: {
			categories: ["2018", "2019", "2020", "2021", "2022", "2023", "2024"],
			axisBorder: {
				show: false,
				color: borderColor,
			},
			axisTicks: {
				show: false,
			},
			labels: {
				style: {
					colors: legendColor,
					fontSize: "13px",
					fontFamily: "Public Sans",
				},
			},
		},
		yaxis: {
			axisBorder: {
				show: false,
			},
			labels: {
				show: false,
				style: {
					colors: labelColor,
					fontSize: "13px",
				},
			},
			title: {
				show: false,
			},
		},
		fill: {
			opacity: 1,
		},

		tooltip: {
			y: {
				formatter: function (val) {
					return val + " Produk";
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fp1"), fp1);
	chart.render();

	const fp2 = document.querySelector("#fp2"),
		fp2Config = {
			chart: {
				height: 350,
				type: "pie",
			},
			labels: ["Rawat Inap", "Rawat Jalan"],
			series: [42, 26],
			colors: ["#ff8612", config.colors.success],
			stroke: {
				show: false,
				curve: "straight",
			},
			dataLabels: {
				enabled: true,
				formatter: function (val, opt) {
					return parseInt(val, 10) + "%";
				},
			},
			legend: {
				show: true,
				position: "bottom",
				markers: {
					offsetX: -3,
				},
				itemMargin: {
					vertical: 3,
					horizontal: 10,
				},
				labels: {
					colors: legendColor,
					useSeriesColors: false,
				},
			},
			plotOptions: {
				pie: {
					donut: {
						labels: {
							show: true,
							name: {
								fontSize: "2rem",
								fontFamily: "Public Sans",
							},
						},
					},
				},
			},
			responsive: [
				{
					breakpoint: 992,
					options: {
						chart: {
							height: 380,
						},
						legend: {
							position: "bottom",
							labels: {
								colors: legendColor,
								useSeriesColors: false,
							},
						},
					},
				},
				{
					breakpoint: 576,
					options: {
						chart: {
							height: 320,
						},
						plotOptions: {
							pie: {
								donut: {
									labels: {
										show: true,
										name: {
											fontSize: "1.5rem",
										},
										value: {
											fontSize: "1rem",
										},
										total: {
											fontSize: "1.5rem",
										},
									},
								},
							},
						},
						legend: {
							position: "bottom",
							labels: {
								colors: legendColor,
								useSeriesColors: false,
							},
						},
					},
				},
				{
					breakpoint: 420,
					options: {
						chart: {
							height: 280,
						},
						legend: {
							show: false,
						},
					},
				},
				{
					breakpoint: 360,
					options: {
						chart: {
							height: 250,
						},
						legend: {
							show: false,
						},
					},
				},
			],
		};
	if (typeof fp2 !== undefined && fp2 !== null) {
		const donutChart = new ApexCharts(fp2, fp2Config);
		donutChart.render();
	}

	var fp3 = {
		chart: {
			type: "bar",
			height: "350",
			toolbar: {
				show: false,
			},
		},

		grid: {
			xaxis: {
				lines: {
					show: false,
				},
			},
			yaxis: {
				lines: {
					show: false,
				},
			},
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: "55%",
				endingShape: "rounded",
				startingShape: "rounded",
				borderRadius: 4,
				dataLabels: {
					position: "top", // top, center, bottom
				},
			},
		},
		legend: {
			show: true,
			position: "top",
			horizontalAlign: "start",
			labels: {
				colors: legendColor,
				useSeriesColors: false,
			},
		},
		dataLabels: {
			enabled: true,
			formatter: function (val) {
				return val;
			},
			offsetY: -20,
			style: {
				fontSize: "12px",
				colors: [legendColor],
			},
		},
		colors: [config.colors.primary],
		responsive: [
			{
				breakpoint: 480,
				options: {
					yaxis: {
						reversed: false,
					},
					chart: {
						height: "200%",
					},

					plotOptions: {
						bar: {
							// horizontal: true,
							columnWidth: "80%",
							endingShape: "rounded",
							startingShape: "rounded",
							borderRadius: 4,
						},
					},

					dataLabels: {
						enabled: false,
					},
				},
			},
		],
		series: [
			{
				name: "Pendapatan",
				data: [70, 65, 60, 55, 55, 55, 50, 50, 45, 45],
			},
		],
		xaxis: {
			categories: [
				"Produk M",
				"Produk J",
				"Produk R",
				"Produk T",
				"Produk O",
				"Produk K",
				"Produk P",
				"Produk C",
				"Produk N",
				"Produk L",
			],
			axisBorder: {
				show: false,
				color: borderColor,
			},
			axisTicks: {
				show: false,
			},
			labels: {
				style: {
					colors: legendColor,
					fontSize: "13px",
					fontFamily: "Public Sans",
				},
			},
		},
		yaxis: {
			axisBorder: {
				show: false,
			},
			labels: {
				show: true,
				style: {
					colors: labelColor,
					fontSize: "10px",
				},
			},
			title: {
				show: false,
			},
		},
		fill: {
			opacity: 1,
		},

		tooltip: {
			y: {
				formatter: function (val) {
					return val;
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fp3"), fp3);
	chart.render();

    var fp6 = {
        chart: {
            type: "bar",
            height: "350",
            toolbar: {
                show: false,
            },
        },
    
        grid: {
            xaxis: {
                lines: {
                    show: false,
                },
            },
            yaxis: {
                lines: {
                    show: false,
                },
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "55%",
                endingShape: "rounded",
                startingShape: "rounded",
                borderRadius: 4,
                dataLabels: {
                    position: "top", // top, center, bottom
                },
            },
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: "start",
            labels: {
                colors: legendColor,
                useSeriesColors: false,
            },
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val;
            },
            offsetY: -20,
            style: {
                fontSize: "12px",
                colors: [legendColor],
            },
        },
        colors: [config.colors.warning],
        responsive: [
            {
                breakpoint: 480,
                options: {
                    yaxis: {
                        reversed: false,
                    },
                    chart: {
                        height: "200%",
                    },
    
                    plotOptions: {
                        bar: {
                            // horizontal: true,
                            columnWidth: "80%",
                            endingShape: "rounded",
                            startingShape: "rounded",
                            borderRadius: 4,
                        },
                    },
    
                    dataLabels: {
                        enabled: false,
                    },
                },
            },
        ],
        series: [
            {
                name: "Pendapatan",
                data: [70, 65, 60, 55, 55, 55, 50, 50, 45, 45],
            },
        ],
        xaxis: {
            categories: [
                "Produk M",
                "Produk J",
                "Produk R",
                "Produk T",
                "Produk O",
                "Produk K",
                "Produk P",
                "Produk C",
                "Produk N",
                "Produk L",
            ],
            axisBorder: {
                show: false,
                color: borderColor,
            },
            axisTicks: {
                show: false,
            },
            labels: {
                style: {
                    colors: legendColor,
                    fontSize: "13px",
                    fontFamily: "Public Sans",
                },
            },
        },
        yaxis: {
            axisBorder: {
                show: false,
            },
            labels: {
                show: true,
                style: {
                    colors: labelColor,
                    fontSize: "10px",
                },
            },
            title: {
                show: false,
            },
        },
        fill: {
            opacity: 1,
        },
    
        tooltip: {
            y: {
                formatter: function (val) {
                    return val;
                },
            },
        },
    };
    
    var chart = new ApexCharts(document.querySelector("#fp6"), fp6);
    chart.render();
})();
