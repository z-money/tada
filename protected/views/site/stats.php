<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/assets/7c80cae/canvasjs.min.js');

?>

<script type="text/javascript">
window.onload = function () {

	var xmlhttp;
	var data;
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			data = JSON.parse(xmlhttp.responseText);
			buildChart(data);
		}
	}
	xmlhttp.open("POST","/task/list", true);
	xmlhttp.send();
}

function sortByKeys(obj)
{
	var keys = [], newobj = [], k, len, i;
	for (k in obj)
	{
	    if (obj.hasOwnProperty(k))
	    {
	        keys.push(k);
	    }
	}

	keys.sort();

	len = keys.length;

	for (i = 0; i < len; i++)
	{
	    k = keys[i];
	    newobj[k] = obj[k];
	}

	return newobj;
}

function buildChart(data)
{
	var chart_data = new Array();

	for(var i = 0; i < data.length; i++)
	{
		date = new Date(data[i].finished);
		
		if(chart_data[date.getFullYear() + '/' + date.getMonth() + '/' + date.getDate()])
		{
			chart_data[date.getFullYear() + '/' + date.getMonth() + '/' + date.getDate()]['count'] += 1;
		}
		else
		{
			chart_data[date.getFullYear() + '/' + date.getMonth() + '/' + date.getDate()] = new Array();
			chart_data[date.getFullYear() + '/' + date.getMonth() + '/' + date.getDate()]['count'] = 1;
		}
	}

	// chart_data.sort(function(a,b){return new Date(a) > new Date(b)});
	chart_data = sortByKeys(chart_data);

	var dps = new Array();

	for(key in chart_data)
	{
		if(chart_data.hasOwnProperty(key))
		{
			console.log(key);
			var tempArray = new Array();
			tempArray['x'] = new Date(key);
			tempArray['y'] = chart_data[key]['count'];
			dps.push(tempArray);
		}
	}

	console.log(dps);
	
	var chart = new CanvasJS.Chart("chartContainer", {

	  title:{
	    text: "Tasks Completed"              
	  },
	  data: [//array of dataSeries              
	    { //dataSeries object

	     /*** Change type "column" to "bar", "area", "line" or "pie"***/
	     type: "area",
	     dataPoints: dps
	   }
	   ]
	 });

	chart.render();
}
</script>

<body>
  <div id="chartContainer" style="height: 300px; width: 100%;">
  </div>
</body>
</html>