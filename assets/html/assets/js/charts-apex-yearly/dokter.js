/**
 * Charts Apex
 */

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

	var fd1 = {
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
				columnWidth: "55%",
				// barHeight: '100%',
				// distribute: true,
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
				name: "Pasien",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45
				],
			},
		],
		xaxis: {
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L", 
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

	var chart = new ApexCharts(document.querySelector("#fd1"), fd1);
	chart.render();

	var fd2 = {
		chart: {
			type: "bar",
			height: "300%",
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
				horizontal: true,
				columnWidth: "55%",
				endingShape: "rounded",
				startingShape: "rounded",
				borderRadius: 4,
				dataLabels: {
					position: "bottom", // top, center, bottom
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
			offsetX: -20,
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
				name: "Pasien",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
		],
		xaxis: {
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
				"Dokter A",
				"Dokter E",
				"Dokter Q",
				"Dokter G",
				"Dokter D",
				"Dokter F",
				"Dokter B",
				"Dokter S",
				"Dokter I",
				"Dokter H",
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
			reversed: true,
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

	var chart = new ApexCharts(document.querySelector("#fd2"), fd2);
	chart.render();

	var fd3 = {
		chart: {
			type: "bar",
			height: "300%",
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
				horizontal: true,
				columnWidth: "55%",
				endingShape: "rounded",
				startingShape: "rounded",
				borderRadius: 4,
				dataLabels: {
					position: "bottom", // top, center, bottom
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
			offsetX: -20,
			style: {
				fontSize: "12px",
				colors: [legendColor],
			},
		},
		colors: [config.colors.success],
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
				name: "Pasien",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
		],
		xaxis: {
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
				"Dokter A",
				"Dokter E",
				"Dokter Q",
				"Dokter G",
				"Dokter D",
				"Dokter F",
				"Dokter B",
				"Dokter S",
				"Dokter I",
				"Dokter H",
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
			reversed: true,
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

	var chart = new ApexCharts(document.querySelector("#fd3"), fd3);
	chart.render();
	var fd4 = {
		chart: {
			type: "bar",
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
				horizontal: true,
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
				return val + "M";
			},
			offsetX: 23,
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
						height: "200%",
					},

					plotOptions: {
						bar: {
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
				name: "Pasien",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
		],
		xaxis: {
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
				"Dokter A",
				"Dokter E",
				"Dokter Q",
				"Dokter G",
				"Dokter D",
				"Dokter F",
				"Dokter B",
				"Dokter S",
				"Dokter I",
				"Dokter H",
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
					return val;
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd4"), fd4);
	chart.render();

	var fd15 = {
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
				return val + "M";
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
		series: [
			{
				name: "Pasien",
				data: [70, 65, 60, 55, 30, 25, 25],
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
					return val;
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd15"), fd15);
	chart.render();

	var fd16 = {
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
				return val + "M";
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
		series: [
			{
				name: "Pasien",
				data: [70, 65, 60, 55, 30, 25, 25],
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
					return val;
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd16"), fd16);
	chart.render();

	var fd17 = {
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
				return val + "M";
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
		series: [
			{
				name: "Pasien",
				data: [70, 65, 60, 55, 30, 25, 25],
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
					return val;
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd17"), fd17);
	chart.render();

	var fd18 = {
		series: [
			{
				name: "UMUM",
				data: [44, 55, 57, 56, 61, 58, 63],
			},
			{
				name: "BPJS",
				data: [76, 85, 101, 98, 87, 105, 91],
			},
			{
				name: "ASURANSI",
				data: [35, 41, 36, 26, 45, 48, 52],
			},
		],
		chart: {
			type: "bar",
			height: 350,
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
		colors: [
			config.colors.primary,
			config.colors.success,
			config.colors.warning,
		],
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
					return val + " pasien";
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd18"), fd18);
	chart.render();

	var fd19 = {
		series: [
			{
				name: "UMUM",
				data: [44, 55, 57, 56, 61, 58, 63],
			},
			{
				name: "BPJS",
				data: [76, 85, 101, 98, 87, 105, 91],
			},
			{
				name: "ASURANSI",
				data: [35, 41, 36, 26, 45, 48, 52],
			},
		],
		chart: {
			type: "bar",
			height: 350,
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
		colors: [
			config.colors.primary,
			config.colors.success,
			config.colors.warning,
		],
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
					return val + " pasien";
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd19"), fd19);
	chart.render();

	var fd20 = {
		series: [
			{
				name: "UMUM",
				data: [44, 55, 57, 56, 61, 58, 63],
			},
			{
				name: "BPJS",
				data: [76, 85, 101, 98, 87, 105, 91],
			},
			{
				name: "ASURANSI",
				data: [35, 41, 36, 26, 45, 48, 52],
			},
		],
		chart: {
			type: "bar",
			height: 350,
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
		colors: [
			config.colors.primary,
			config.colors.success,
			config.colors.warning,
		],
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
					return val + " pasien";
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd20"), fd20);
	chart.render();

	var fd20 = {
		series: [
			{
				name: "UMUM",
				data: [44, 55, 57, 56, 61, 58, 63],
			},
			{
				name: "BPJS",
				data: [76, 85, 101, 98, 87, 105, 91],
			},
			{
				name: "ASURANSI",
				data: [35, 41, 36, 26, 45, 48, 52],
			},
		],
		chart: {
			type: "bar",
			height: 350,
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
		colors: [
			config.colors.primary,
			config.colors.success,
			config.colors.warning,
		],
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
					return val + " pasien";
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd20"), fd20);
	chart.render();

	var fd21 = {
		series: [
			{
				name: "UMUM",
				data: [82, 55, 70, 45, 50, 65, 90, 42, 30, 78, 60, 47, 35, 80, 28, 33, 70, 93, 25, 72]
			},
			{
				name: "BPJS",
				data: [68, 60, 75, 38, 45, 80, 95, 55, 40, 63, 50, 57, 42, 85, 40, 25, 20, 89, 35, 68]
			},
			{
				name: "ASURANSI",
				data: [75, 70, 85, 50, 55, 85, 100, 60, 50, 70, 45, 52, 38, 90, 45, 28, 40, 97, 30, 80]
			},
		],
		chart: {
			type: "bar",
			height: "500%",
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
				horizontal: true,
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
			offsetX: 20,
			style: {
				fontSize: "12px",
				colors: [legendColor],
			},
		},
		colors: [
			config.colors.primary,
			config.colors.success,
			config.colors.warning,
		],
		responsive: [
			{
				breakpoint: 480,
				options: {
					chart: {
						height: "150%",
					},

					plotOptions: {
						bar: {
							horizontal: true,
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
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
				"Dokter A",
				"Dokter E",
				"Dokter Q",
				"Dokter G",
				"Dokter D",
				"Dokter F",
				"Dokter B",
				"Dokter S",
				"Dokter I",
				"Dokter H",
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
					return val + " pasien";
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd21"), fd21);
	chart.render();

	var fd22 = {
		series: [
			{
				name: "UMUM",
				data: [82, 55, 70, 45, 50, 65, 90, 42, 30, 78, 60, 47, 35, 80, 28, 33, 70, 93, 25, 72]
			},
			{
				name: "BPJS",
				data: [68, 60, 75, 38, 45, 80, 95, 55, 40, 63, 50, 57, 42, 85, 40, 25, 20, 89, 35, 68]
			},
			{
				name: "ASURANSI",
				data: [75, 70, 85, 50, 55, 85, 100, 60, 50, 70, 45, 52, 38, 90, 45, 28, 40, 97, 30, 80]
			},
		],
		chart: {
			type: "bar",
			height: "95%",
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
				horizontal: true,
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
			offsetX: 20,
			style: {
				fontSize: "12px",
				colors: [legendColor],
			},
		},
		colors: [
			config.colors.primary,
			config.colors.success,
			config.colors.warning,
		],
		responsive: [
			{
				breakpoint: 480,
				options: {
					chart: {
						height: "150%",
					},
	
					plotOptions: {
						bar: {
							horizontal: true,
							columnWidth: "80%",
							endingShape: "rounded",
							startingShape: "rounded",
							borderRadius: 4,
						},
					},
	
					yaxis: {
						reversed: false,
						labels: {
							style: {
								colors: legendColor,
								fontSize: "13px",
							},
						},
					},
	
					dataLabels: {
						enabled: false,
					},
				},
			},
		],
		xaxis: {
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
				"Dokter A",
				"Dokter E",
				"Dokter Q",
				"Dokter G",
				"Dokter D",
				"Dokter F",
				"Dokter B",
				"Dokter S",
				"Dokter I",
				"Dokter H",
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
			reversed: true,
			axisBorder: {
				show: false,
			},
			labels: {
				show: true,
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
					return val + " pasien";
				},
			},
		},
	};
	
	var chart = new ApexCharts(document.querySelector("#fd22"), fd22);
	chart.render();

	var fd23 = {
		series: [
			{
				name: "UMUM",
				data: [82, 55, 70, 45, 50, 65, 90, 42, 30, 78, 60, 47, 35, 80, 28, 33, 70, 93, 25, 72]
			},
			{
				name: "BPJS",
				data: [68, 60, 75, 38, 45, 80, 95, 55, 40, 63, 50, 57, 42, 85, 40, 25, 20, 89, 35, 68]
			},
			{
				name: "ASURANSI",
				data: [75, 70, 85, 50, 55, 85, 100, 60, 50, 70, 45, 52, 38, 90, 45, 28, 40, 97, 30, 80]
			},
		],
		chart: {
			type: "bar",
			height: "95%",
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
				horizontal: true,
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
			offsetX: 20,
			style: {
				fontSize: "12px",
				colors: [legendColor],
			},
		},
		colors: [
			config.colors.primary,
			config.colors.success,
			config.colors.warning,
		],
		responsive: [
			{
				breakpoint: 480,
				options: {
					chart: {
						height: "150%",
					},
	
					plotOptions: {
						bar: {
							horizontal: true,
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
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
				"Dokter A",
				"Dokter E",
				"Dokter Q",
				"Dokter G",
				"Dokter D",
				"Dokter F",
				"Dokter B",
				"Dokter S",
				"Dokter I",
				"Dokter H",
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
					return val + " pasien";
				},
			},
		},
	};
	
	var chart = new ApexCharts(document.querySelector("#fd23"), fd23);
	chart.render();

	var fd5 = {
		chart: {
			type: "bar",
			height: "300%",
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
				horizontal: true,
				columnWidth: "55%",
				endingShape: "rounded",
				startingShape: "rounded",
				borderRadius: 4,
				dataLabels: {
					position: "bottom", // top, center, bottom
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
				return val + "M";
			},
			offsetX: -23,
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
				name: "Pasien",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
		],
		xaxis: {
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
				"Dokter A",
				"Dokter E",
				"Dokter Q",
				"Dokter G",
				"Dokter D",
				"Dokter F",
				"Dokter B",
				"Dokter S",
				"Dokter I",
				"Dokter H",
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
			reversed: true,
			axisBorder: {
				show: false,
			},
			labels: {
				show: true,
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
					return val;
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd5"), fd5);
	chart.render();

	var fd6 = {
		chart: {
			type: "bar",
			height: heightChart,
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
				horizontal: true,
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
				return val + "M";
			},
			offsetX: 23,
			style: {
				fontSize: "12px",
				colors: [legendColor],
			},
		},
		colors: [config.colors.success],
		responsive: [
			{
				breakpoint: 480,
				options: {
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
				name: "Pasien",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
		],
		xaxis: {
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
				"Dokter A",
				"Dokter E",
				"Dokter Q",
				"Dokter G",
				"Dokter D",
				"Dokter F",
				"Dokter B",
				"Dokter S",
				"Dokter I",
				"Dokter H",
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
					return val;
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd6"), fd6);
	chart.render();

	var fd7 = {
		chart: {
			type: "bar",
			height: "350",
			stacked: true, 
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
				columnWidth: "55%",
				barHeight: "90%",
				distribute: true,
				endingShape: "rounded",
				startingShape: "rounded",
				borderRadius: 4,
			},
		},
		legend: {
			show: true,
			position: "top",
			horizontalAlign: "center",
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
			style: {
				fontSize: "12px",
				colors: ["#fff"],
			},
		},
		colors: [
			config.colors.primary,
			config.colors.warning,
			config.colors.danger,
		],
		responsive: [
			{
				breakpoint: 480,
				options: {
					plotOptions: {
						bar: {
							columnWidth: "85%",
							endingShape: "rounded",
							startingShape: "rounded",
							borderRadius: 4,
						},
					},
					chart: {
						height: "200%",
					},

					dataLabels: {
						enabled: false,
					},
				},
			},
		],
		series: [
			{
				name: "BPJS",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45
				],
			},
			{
				name: "UMUM",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45
				],
			},
			{
				name: "ASURANSI",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45
				],
			},
		],
		xaxis: {
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
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

	var chart = new ApexCharts(document.querySelector("#fd7"), fd7);
	chart.render();
	var fd8 = {
		chart: {
			type: "bar",
			stacked: true,
			height: heightChart,
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
				horizontal: true,
				columnWidth: "55%",
				barHeight: "90%",
				distribute: true,
				endingShape: "rounded",
				startingShape: "rounded",
				borderRadius: 4,
			},
		},
		legend: {
			show: true,
			position: "bottom",
			horizontalAlign: "center",
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
			style: {
				fontSize: "12px",
				colors: ["#fff"],
			},
		},
		colors: [
			config.colors.primary,
			config.colors.warning,
			config.colors.danger,
		],
		responsive: [
			{
				breakpoint: 480,
				options: {
					plotOptions: {
						bar: {
							columnWidth: "80%",
							endingShape: "rounded",
							startingShape: "rounded",
							borderRadius: 4,
						},
					},

					chart: {
						height: "200%",
					},

					dataLabels: {
						enabled: false,
					},
				},
			},
		],
		series: [
			{
				name: "BPJS",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
			{
				name: "UMUM",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
			{
				name: "ASURANSI",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
		],
		xaxis: {
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
				"Dokter A",
				"Dokter E",
				"Dokter Q",
				"Dokter G",
				"Dokter D",
				"Dokter F",
				"Dokter B",
				"Dokter S",
				"Dokter I",
				"Dokter H",
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
			reveresed: true,
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

	var chart = new ApexCharts(document.querySelector("#fd8"), fd8);
	chart.render();
	var fd9 = {
		chart: {
			type: "bar",
			stacked: true,
			height: heightChart,
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
				horizontal: true,
				columnWidth: "55%",
				barHeight: "90%",
				distribute: true,
				endingShape: "rounded",
				startingShape: "rounded",
				borderRadius: 4,
			},
		},
		legend: {
			show: true,
			position: "bottom",
			horizontalAlign: "center",
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
			style: {
				fontSize: "12px",
				colors: ["#fff"],
			},
		},
		colors: [
			config.colors.primary,
			config.colors.warning,
			config.colors.danger,
		],
		responsive: [
			{
				breakpoint: 480,
				options: {
					plotOptions: {
						bar: {
							columnWidth: "80%",
							endingShape: "rounded",
							startingShape: "rounded",
							borderRadius: 4,
						},
					},

					chart: {
						height: "200%",
					},

					dataLabels: {
						enabled: false,
					},
				},
			},
		],
		series: [
			{
				name: "BPJS",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
			{
				name: "UMUM",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
			{
				name: "ASURANSI",
				data: [
					70, 65, 60, 55, 55, 55, 50, 50, 45, 45, 40, 40, 40, 40, 35, 35, 30,
					30, 25, 25,
				],
			},
		],
		xaxis: {
			categories: [
				"Dokter M",
				"Dokter J",
				"Dokter R",
				"Dokter T",
				"Dokter O",
				"Dokter K",
				"Dokter P",
				"Dokter C",
				"Dokter N",
				"Dokter L",
				"Dokter A",
				"Dokter E",
				"Dokter Q",
				"Dokter G",
				"Dokter D",
				"Dokter F",
				"Dokter B",
				"Dokter S",
				"Dokter I",
				"Dokter H",
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
			reveresed: true,
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
	var chart = new ApexCharts(document.querySelector("#fd9"), fd9);
	chart.render();

	var fd10 = {
		chart: {
			type: "bar",
			height: 350,
			stacked: true,
			toolbar: {
				show: true,
				tools: {
					download: false,
					selection: true,
					zoom: false,
					zoomin: false,
					zoomout: false,
					pan: false,
					reset: false,
				},
			},
		},
		plotOptions: {
			bar: {
				horizontal: false,
			},
		},
		dataLabels: {
			enabled: false,
		},
		series: [
			{
				name: "Dokter A",
				data: [200, 0, 0, 0, 0, 0, 0],
			},
			{
				name: "Dokter B",
				data: [0, 300, 0, 0, 0, 0, 0],
			},
			{
				name: "Dokter C",
				data: [0, 0, 400, 0, 0, 0, 0],
			},
			{
				name: "Dokter D",
				data: [0, 0, 0, 500, 0, 0, 0],
			},
			{
				name: "Dokter E",
				data: [0, 0, 0, 0, 600, 0, 0],
			},
			{
				name: "Dokter F",
				data: [0, 0, 0, 0, 0, 700, 0],
			},
			{
				name: "Dokter G",
				data: [0, 0, 0, 0, 0, 0, 800],
			},
			{
				name: "Dokter H",
				data: [250, 0, 0, 0, 0, 0, 0],
			},
			{
				name: "Dokter I",
				data: [0, 320, 0, 0, 0, 0, 0],
			},
			{
				name: "Dokter J",
				data: [0, 0, 490, 0, 0, 0, 0],
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
		legend: {
			show: true,
			position: "top",
			horizontalAlign: "start",
			labels: {
				colors: legendColor,
				useSeriesColors: false,
			},
		},
		yaxis: {
			show: false,
			labels: {
				style: {
					colors: legendColor,
					fontSize: "13px",
					fontFamily: "Public Sans",
				},
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
		tooltip: {
			y: {
				formatter: function (val) {
					return val;
				},
			},
		},
	};

	var chart = new ApexCharts(document.querySelector("#fd10"), fd10);

	chart.render();
})();
