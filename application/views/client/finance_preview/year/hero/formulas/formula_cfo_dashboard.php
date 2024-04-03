<script>
    $(function() {
    $('.knob3').knob({
        draw: function() {
            if (this.$.data('skin') == 'tron') {
                var a = this.angle(this.cv) // Angle
                    ,
                    sa = this.startAngle // Previous start angle
                    ,
                    sat = this.startAngle // Start angle
                    ,
                    ea // Previous end angle
                    ,
                    eat = sat + a // End angle
                    ,
                    r = true
                this.g.lineWidth = this.lineWidth
                this.g.beginPath()
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                this.g.stroke()
                this.g.lineWidth = 2
                this.g.beginPath()
                this.g.strokeStyle = this.o.fgColor
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
                this.g.stroke()
                return false
            }
        }
    })
    document.getElementById('knob5').value = document.getElementById('knob5').value + '%';
    document.getElementById('knob6').value = document.getElementById('knob6').value + '%';
    document.getElementById('knob7').value = document.getElementById('knob7').value + '%';
    document.getElementById('knob8').value = document.getElementById('knob8').value + '%';
    document.getElementById('knob9').value = document.getElementById('knob9').value + '%';
})

var root6 = am5.Root.new("costs3");
root6.setThemes([
  am5themes_Animated.new(root6)
]);
var chart6 = root6.container.children.push(am5percent.PieChart.new(root6, {
  layout: root6.verticalLayout,
  innerRadius: am5.percent(50)
}));
var series7 = chart6.series.push(am5percent.PieSeries.new(root6, {
  valueField: "value",
  categoryField: "category",
  alignLabels: true
}));
series7.labels.template.set("text", "{category}: [bold] \n {valuePercentTotal.formatNumber('0.00')}%[/] \n ({value})");
series7.labels.template.setAll({
    fontSize: 10,
    textType: "circular",
    centerX: 0,
    centerY: 0
});
series7.data.setAll([
  { value: <?= $cfo_dashboard['operating_e']['value']?>, category: "Other Expenses" },
  { value: <?= $cfo_dashboard['breakdowns']['ms'] ?>, category: "Marketing & Sales" },
  { value: <?= $cfo_dashboard['breakdowns']['ga'] ?>, category: "General Admin"}
]);
var legend7 = chart6.children.push(am5.Legend.new(root6, {
  centerX: am5.percent(50),
  x: am5.percent(50),
  marginTop: 15,
  marginBottom: 15,
}));

legend7.data.setAll(series7.dataItems);
series7.appear(1000, 100);
</script>