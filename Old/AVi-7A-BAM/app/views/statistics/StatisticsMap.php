<head>
	<!-- Load plotly.js into the DOM -->
    <script src='https://cdn.plot.ly/plotly-latest.min.js'>
</script>
<script>Plotly.d3.csv('https://raw.githubusercontent.com/plotly/datasets/master/2014_us_cities.csv', function(err, rows){

function unpack(rows, key) {
    return rows.map(function(row) { return row[key]; });
}

var cityName = unpack(rows, 'name'),
    cityPop = unpack(rows, 'pop'),
    cityLat = unpack(rows, 'lat'),
    cityLon = unpack(rows, 'lon'),
    color = ["pink","red","pink","lightgrey"],
    citySize = [],
    hoverText = [],
    scale = 50000;

for ( var i = 0 ; i < cityPop.length; i++) {
    var currentSize = cityPop[i] / scale;
    var currentText = cityName[i] + " pop: " + cityPop[i];
    citySize.push(currentSize);
    hoverText.push(currentText);
}

var data = [{
    type: 'scattergeo',
    locationmode: 'USA-states',
    lat: cityLat,
    lon: cityLon,
    hoverinfo: 'text',
    text: hoverText,
    marker: {
        size: citySize,
        line: {
            color: 'black',
            width: 2
        },
        color:'pink'
    }
}];

var layout = {
    title: '2014 US City Populations',
    showlegend: false,
    width:900,
    height:900,
    geo: {
        scope: 'usa',
        projection: {
            type: 'albers usa'
        },
        showland: true,
        landcolor: 'lightgrey',
        subunitwidth: 1,
        countrywidth: 1,
        subunitcolor: 'black',
        countrycolor: 'pink',
        bubblecolor:'pink'
    },
};

Plotly.newPlot("myDiv", data, layout, {showLink: false});

});
</script>
</head>

<body>
 
	<div id='myDiv'><!-- Plotly chart will be drawn inside this DIV --></div>
</body>