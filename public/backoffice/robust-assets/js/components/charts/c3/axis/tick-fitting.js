$(window).on("load",function(){var a=c3.generate({bindto:"#tick-fitting",size:{height:400},color:{pattern:["#673AB7","#E91E63"]},data:{x:"x",columns:[["x","2013-10-31","2013-12-31","2014-01-31","2014-02-28"],["sample",30,100,400,150]]},axis:{x:{type:"timeseries",tick:{fit:!0,format:"%e %b %y"}}},grid:{y:{show:!0}}});$(".menu-toggle").on("click",function(){a.resize()})});