/**
 * Charts Apex
 */

"use strict";

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
			series1: "#826af9",
			series2: "#d2b0ff",
			bg: "#f8d3ff",
		},
		donut: {
			series1: "#fee802",
			series2: "#3fd0bd",
			series3: "#826bf8",
			series4: "#2b9bf4",
		},
		area: {
			series1: "#29dac7",
			series2: "#60f2ca",
			series3: "#a5f8cd",
		},
	};

	var fo1 = {
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
			categories: ["Obat A", "Obat B", "Obat C", "Obat D", "Obat E", "Obat F", "Obat G"],
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
					return val + " Pembelian";
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fo1"), fo1);
	chart.render();

	var fo2 = {
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
		colors: [config.colors.primary],
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
					return val + " Obat";
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fo2"), fo2);
	chart.render();
})();
