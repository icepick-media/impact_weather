$(window).on("load",function(){require.config({paths:{echarts:"robust-assets/js/plugins/charts/echarts"}}),require(["echarts","echarts/chart/bar","echarts/chart/line"],function(a){var b=a.init(document.getElementById("basic-line"));chartOptions={grid:{x:40,x2:40,y:45,y2:25},tooltip:{trigger:"axis"},legend:{data:["Highest temperature","Minimum temperature"]},color:["#FF847C","#99B898"],calculable:!0,xAxis:[{type:"category",boundaryGap:!1,data:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"]}],yAxis:[{type:"value",axisLabel:{formatter:"{value} °C"}}],series:[{name:"Highest temperature",type:"line",data:[11,11,15,13,12,13,10],markPoint:{data:[{type:"max",name:"Max"},{type:"min",name:"Min"}]},markLine:{data:[{type:"average",name:"Average"}]}},{name:"Minimum temperature",type:"line",data:[1,-2,2,5,3,2,0],markPoint:{data:[{name:"Week low",value:-2,xAxis:1,yAxis:-1.5}]},markLine:{data:[{type:"average",name:"Average"}]}}]},b.setOption(chartOptions),$(function(){function a(){setTimeout(function(){b.resize()},200)}$(window).on("resize",a),$(".menu-toggle").on("click",a)})})});