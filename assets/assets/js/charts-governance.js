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


})();
