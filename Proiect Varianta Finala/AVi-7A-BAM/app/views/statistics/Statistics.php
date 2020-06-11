<!DOCTYPE html>
<html>
<!-- Page merged by Minut Mihai Dimitrie -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="height=device-height, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="icon" href="http://localhost/AVi-7A-BAM/public/Styles/logo-icon.png" type="image/gif">
    <link rel="stylesheet" type="text/css" href="http://localhost/AVi-7A-BAM/public/Styles/StatisticsPage.css">
    <script type="text/javascript" src="http://localhost/AVi-7A-BAM/public/Styles/FiltrationMenu.js"></script>
    <script type="text/javascript" src="http://localhost/AVi-7A-BAM/public/Styles/html2canvas.js"></script>
    <script type="text/javascript" src="http://localhost/AVi-7A-BAM/public/Styles/canvas2svg.js"></script>
    <!-- Group Pair Programming -->
    <?php
        if ($data['type'] == 'map') {
            echo '<script src="https://www.amcharts.com/lib/4/core.js"></script>';
            echo '<script src="https://www.amcharts.com/lib/4/maps.js"></script>';
            echo ' <script src="https://www.amcharts.com/lib/4/geodata/usaLow.js"></script>';
            echo  '<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>';
        } else {
            echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
        }
    ?>
    

    <meta lang="en-US">
    <title>Statistics</title>
    <!-- Drawing the  Statistics -->
    <script type="text/javascript">
        function drawPie() {
            google.charts.load('current', {
                'packages': ['corechart']
            });
            var table_data = <?php
                                if (isset($data['statistics_data']) && !empty($data['statistics_data']) && $data['type'] == 'pie') {
                                    $table_data = $data['statistics_data'];
                                    $frecventa = [];

                                    echo "[";
                                    echo "['Name', 'Accident'],";

                                    foreach ($table_data['body'] as $row) {
                                        $key = array_keys($row[0])[0];
                                        $value = (string) ($row[0][$key]);
                                        if (isset($frecventa[$value]) && !empty($frecventa[$value])) {
                                            $frecventa[$value]++;
                                        } else {
                                            $frecventa[$value] = 1;
                                        }
                                    }
                                    foreach ($frecventa as $key => $value) {
                                        echo "['" . $key . "'," . $value . "],";
                                    }
                                    echo "]";
                                } else {
                                    echo '[]';
                                }
                                ?>;
            localStorage.setItem('table_data', JSON.stringify({
                'data': table_data,
                'type': 'pie'
            }));
            var data = google.visualization.arrayToDataTable(table_data);

            var options = {
                title: <?php
                        if (isset($data['statistics_data']) && !empty($data['statistics_data']) && $data['type'] == 'pie') {
                            echo  "'Pie of ' + (show_unmap['" . array_keys($table_data['body'][0][0])[0] . "']).replace('Show','')";
                        } else echo '"None"';
                        ?>,
                height: 500,
                width: 600
            };

            var chart = new google.visualization.PieChart(document.getElementById('modal'));

            chart.draw(data, options);
        }

        function drawBar() {
            var table_data =
                <?php
                if (isset($data['statistics_data']) && !empty($data['statistics_data']) && $data['type'] == 'bar') {
                    $table_data = $data['statistics_data'];
                    $bar_avg_array = [];
                    $freq = [];
                    echo '[';
                    echo '[(show_unmap["' . array_keys($table_data['body'][0][0])[0] . '"]).replace("Show",""),(show_unmap["' . array_keys($table_data['body'][0][1])[0] . '"]).replace("Show",""), { role: "style" }],';
                    foreach ($table_data['body'] as $row) {
                        $x_key = array_keys($row[0])[0];
                        $x_value = (string) ($row[0][$x_key]);
                        $y_key = array_keys($row[1])[0];
                        $y_value = (float) ($row[1][$y_key]);
                        if (isset($bar_avg_array[$x_value]) && !empty($bar_avg_array[$x_value])) {
                            $bar_avg_array[$x_value] += $y_value;
                            $freq[$x_value]++;
                        } else {
                            $freq[$x_value] = 1;
                            $bar_avg_array[$x_value] = $y_value;
                        }
                    }
                    foreach ($bar_avg_array as $key => $value) {
                        echo "['" . $key . "'," . $value / $freq[$key] . ",'color:#af734a'], ";
                    }
                    echo ']';
                } else {
                    echo '[]';
                }
                ?>;
            localStorage.setItem('table_data', JSON.stringify({
                'data': table_data,
                'type': 'bar'
            }));
            var data = google.visualization.arrayToDataTable(table_data);

            var options = {
                title: <?php
                        if (isset($data['statistics_data']) && !empty($data['statistics_data']) && $data['type'] == 'bar') {
                            echo '"Average of "+ (show_unmap[\'' . array_keys($table_data['body'][0][1])[0] . '\']).replace("Show","") + " per " + (show_unmap[\'' . array_keys($table_data['body'][0][0])[0] . '\']).replace("Show","")';
                        } else echo '"None"';
                        ?>,
                height: 600,
                width: 800,
                is3D: true,
                bar: {
                    groupWidth: "60%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('modal'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        function drawGraph() {
            var data = new google.visualization.DataTable();
            data.addColumn('number',
                <?php
                if (isset($data['statistics_data']) && !empty($data['statistics_data']) && $data['type'] == 'graph') {
                    echo "(show_unmap['" . array_keys($data['statistics_data']['body'][0][0])[0] . "']).replace('Show','')";
                } else echo '"None"';
                ?>
            );
            data.addColumn('number',
                <?php
                if (isset($data['statistics_data']) && !empty($data['statistics_data']) && $data['type'] == 'graph') {
                    echo "(show_unmap['" . array_keys($data['statistics_data']['body'][0][1])[0] . "']).replace('Show','')";
                } else echo '"None"';
                ?>

            );
            var table_data =
                <?php
                if (isset($data['statistics_data']) && !empty($data['statistics_data']) && $data['type'] == 'graph') {
                    $table_data = $data['statistics_data'];
                    $graph_avg_array = [];
                    $freq = [];
                    echo '[';
                    foreach ($table_data['body'] as $row) {
                        $x_key = array_keys($row[0])[0];
                        $x_value = (string) ($row[0][$x_key]);
                        $y_key = array_keys($row[1])[0];
                        $y_value = (float) ($row[1][$y_key]);
                        if (isset($graph_avg_array[$x_value]) && !empty($graph_avg_array[$x_value])) {
                            $graph_avg_array[$x_value] += $y_value;
                            $freq[$x_value]++;
                        } else {
                            $freq[$x_value] = 1;
                            $graph_avg_array[$x_value] = $y_value;
                        }
                    }
                    ksort($graph_avg_array);
                    foreach ($graph_avg_array as $key => $value) {
                        echo "[" . $key . "," . $value / $freq[$key] . "], ";
                    }
                    echo ']';
                } else {
                    echo '[]';
                }
                ?>;
            localStorage.setItem('table_data', JSON.stringify({
                'data': table_data,
                'type': 'graph'
            }));
            data.addRows(table_data);

            var options = {
                chart: {
                    title: <?php
                            if (isset($data['statistics_data']) && !empty($data['statistics_data']) && $data['type'] == 'graph') {
                                echo '"Accidents "+ (show_unmap[\'' . array_keys($table_data['body'][0][1])[0] . '\']).replace("Show","") + " based on " + (show_unmap[\'' . array_keys($table_data['body'][0][0])[0] . '\']).replace("Show","")';
                            } else echo '"None"';
                            ?>
                },
                width: 900,
                height: 500,
                axes: {
                    x: {
                        0: {
                            side: 'top'
                        }
                    }
                }
            };

            var chart = new google.charts.Line(document.getElementById('modal'));

            chart.draw(data, google.charts.Line.convertOptions(options));
        }

        function drawMap() {
            am4core.useTheme(am4themes_animated);

            // Create map instance
            var chart = am4core.create("modal", am4maps.MapChart);

            // Set map definition
            chart.geodata = am4geodata_usaLow;

            // Set projection
            chart.projection = new am4maps.projections.AlbersUsa();
            // Create map polygon series
            var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

            //Set min/max fill color for each area
            polygonSeries.heatRules.push({
                property: "fill",
                target: polygonSeries.mapPolygons.template,
                min: chart.colors.getIndex(1).brighten(1),
                max: chart.colors.getIndex(1).brighten(-0.3),
                logarithmic: true
            });

            // Make map load polygon data (state shapes and names) from GeoJSON
            polygonSeries.useGeodata = true;

            // Set heatmap values for each state
            var data = [
                <?php
                if (isset($data['statistics_data']) && !empty($data['statistics_data']) && $data['type'] == 'map') {
                    $table_data = $data['statistics_data'];
                    $graph_avg_array = [];
                    $freq = [];
                    foreach ($table_data['body'] as $row) {
                        $x_key = array_keys($row[0])[0];
                        $x_value =  ($row[0][$x_key]);
                        $y_key = array_keys($row[1])[0];
                        $y_value = (string) ($row[1][$y_key]);
                        if (isset($graph_avg_array[$y_value]) && !empty($graph_avg_array[$y_value])) {
                            $graph_avg_array[$y_value] += $x_value;
                            $freq[$y_value]++;
                        } else {
                            $freq[$y_value] = 1;
                            $graph_avg_array[$y_value] = $x_value;
                        }
                    }
                    foreach ($graph_avg_array as $key => $value) {
                        echo "{id:'US-" . $key . "',value:" . ($value / $freq[$key]) . "}, ";
                    }
                } else {
                    echo '{}';
                }
                ?>
            ];
            localStorage.setItem('table_data', JSON.stringify({
                'data': data,
                'type': 'map'
            }));
            polygonSeries.data = data;

            // Set up heat legend
            let heatLegend = chart.createChild(am4maps.HeatLegend);
            heatLegend.series = polygonSeries;
            heatLegend.align = "right";
            heatLegend.valign = "bottom";
            heatLegend.height = am4core.percent(80);
            heatLegend.orientation = "vertical";
            heatLegend.valign = "middle";
            heatLegend.marginRight = am4core.percent(4);
            heatLegend.valueAxis.renderer.opposite = true;
            heatLegend.valueAxis.renderer.dx = -25;
            heatLegend.valueAxis.strictMinMax = false;
            heatLegend.valueAxis.fontSize = 9;
            heatLegend.valueAxis.logarithmic = true;

            // Configure series tooltip
            var polygonTemplate = polygonSeries.mapPolygons.template;
            polygonTemplate.tooltipText = "{name}: {value}";
            polygonTemplate.nonScalingStroke = true;
            polygonTemplate.strokeWidth = 0.5;
            var hs = polygonTemplate.states.create("hover");
            hs.properties.fill = am4core.color("#3c5bdc");


            // heat legend behavior
            polygonSeries.mapPolygons.template.events.on("over", function(event) {
                handleHover(event.target);
            })

            polygonSeries.mapPolygons.template.events.on("hit", function(event) {
                handleHover(event.target);
            })

            function handleHover(column) {
                if (!isNaN(column.dataItem.value)) {
                    heatLegend.valueAxis.showTooltipAt(column.dataItem.value)
                } else {
                    heatLegend.valueAxis.hideTooltip();
                }
            }

            polygonSeries.mapPolygons.template.events.on("out", function(event) {
                heatLegend.valueAxis.hideTooltip();
            })
        }
    </script>
    
    <!-- End of Drawing the Statistics -->
    <!-- End of Group Pair Programming -->

    <!-- Script by Ionita Andra & Minut Mihai Dimitrie -->
    <script type="text/javascript">
        function showModal() {

            var modal = document.getElementById('dataModal');
            modal.style.display = "block";
            modal.style.visibility = "visible";


            <?php
            if ($data)
                switch ($data['type']) {
                    case 'map': {
                            echo '';
                            break;
                        }
                    case 'none': {
                            echo '';
                            break;
                        }
                    case 'graph': {
                            echo "google.charts.load('current', {'packages': ['line']});";
                            break;
                        }
                    case 'pie': {
                            echo "google.charts.load('current', {'packages': ['corechart']});";
                            break;
                        }
                    case 'bar': {
                            echo "google.charts.load('current', {'packages': ['bar'] });";
                            break;
                        }
                }
            ?>

            <?php
            switch ($data['type']) {
                case 'map': {
                        echo 'drawMap();';
                        break;
                    }
                case 'graph': {
                        echo 'google.charts.setOnLoadCallback(drawGraph);';
                        break;
                    }
                case 'pie': {
                        echo 'google.charts.setOnLoadCallback(drawPie);';
                        break;
                    }
                case 'bar': {
                        echo 'google.charts.setOnLoadCallback(drawBar);';
                        break;
                    }
            }
            ?>


        }
        function closeModal() {
            var modal = document.getElementById('dataModal');
            modal.style.display = "none";
            modal.style.visibility = "hidden";
        }
    </script>
    <!-- Script finished by Ionita Andra & Minut Mihai Dimitrie -->

    <!-- Script done by Minut Mihai Dimitrie -->
    <!-- Pagination & Table Ajax Script -->
    <script>
        var show_map = {
            ShowAirportCode: "airport_code",
            ShowAmenity: "amenity",
            ShowAstronomicalTwilight: "astronomical_twilight",
            ShowBump: "bump",
            ShowCity: "city",
            ShowCivilTwilight: "civil_twilight",
            ShowCountry: "country",
            ShowCounty: "county",
            ShowCrossing: "crossing",
            ShowDescription: "description",
            ShowDistance: "distance",
            ShowEndLatitude: "end_lat",
            ShowEndLongitude: "end_lng",
            ShowEndTime: "end_time",
            ShowGiveWay: "give_way",
            ShowHumidity: "humidity",
            ShowID: "id",
            ShowJunction: "junction",
            ShowNoExit: "no_exit",
            ShowPrecipitation: "precipitation",
            ShowPressure: "pressure",
            ShowRailway: "railway",
            ShowRoundabout: "roundabout",
            ShowSeverity: "severity",
            ShowSource: "source",
            ShowStartLatitude: "start_lat",
            ShowStartLongitude: "start_lng",
            ShowStartTime: "start_time",
            ShowState: "state",
            ShowStop: "stop",
            ShowStreetName: "street",
            ShowStreetNumber: "numbers",
            ShowStreetSide: "side",
            ShowStation: "station",
            ShowSunriseSunset: "sunrise_sunset",
            ShowTMC: "tmc",
            ShowTemperature: "temperature",
            ShowTimeZone: "timezone",
            ShowTrafficCalming: "traffic_calming",
            ShowTrafficSignal: "traffic_signal",
            ShowTurningLoop: "turning_loop",
            ShowVisibility: "visibility",
            ShowWeatherCondition: "weather_condition",
            ShowWeatherTimestamp: "weather_timestamp",
            ShowWindChill: "wind_chill",
            ShowWindDirection: "wind_direction",
            ShowWindSpeed: "wind_speed",
            ShowZipcode: "zipcode"
        };
        var show_unmap = {
            airport_code: "ShowAirportCode",
            amenity: "ShowAmenity",
            astronomical_twilight: "ShowAstronomicalTwilight",
            bump: "ShowBump",
            city: "ShowCity",
            civil_twilight: "ShowCivilTwilight",
            country: "ShowCountry",
            county: "ShowCounty",
            crossing: "ShowCrossing",
            description: "ShowDescription",
            distance: "ShowDistance",
            end_lat: "ShowEndLatitude",
            end_lng: "ShowEndLongitude",
            end_time: "ShowEndTime",
            give_way: "ShowGiveWay",
            humidity: "ShowHumidity",
            id: "ShowID",
            junction: "ShowJunction",
            no_exit: "ShowNoExit",
            precipitation: "ShowPrecipitation",
            pressure: "ShowPressure",
            railway: "ShowRailway",
            roundabout: "ShowRoundabout",
            severity: "ShowSeverity",
            source: "ShowSource",
            start_lat: "ShowStartLatitude",
            start_lng: "ShowStartLongitude",
            start_time: "ShowStartTime",
            state: "ShowState",
            stop: "ShowStop",
            street: "ShowStreetName",
            numbers: "ShowStreetNumber",
            side: "ShowStreetSide",
            station: "ShowStation",
            sunrise_sunset: "ShowSunriseSunset",
            tmc: "ShowTMC",
            temperature: "ShowTemperature",
            timezone: "ShowTimeZone",
            traffic_calming: "ShowTrafficCalming",
            traffic_signal: "ShowTrafficSignal",
            turning_loop: "ShowTurningLoop",
            visibility: "ShowVisibility",
            weather_condition: "ShowWeatherCondition",
            weather_timestamp: "ShowWeatherTimestamp",
            wind_chill: "ShowWindChill",
            wind_direction: "ShowWindDirection",
            wind_speed: "ShowWindSpeed",
            zipcode: "ShowZipcode"
        };
        var filter_between_min_map = {
            SearchMinDistance: "distance",
            SearchMinHumidity: "humidity",
            SearchMinID: "id",
            SearchMinStreetNumber: "numbers",
            SearchMinPrecipitation: "precipitation",
            SearchMinPressure: "pressure",
            SearchMinSeverity: "severity",
            SearchStartMinLatitude: "start_lat",
            SearchStartMinLongitude: "start_lng",
            SearchMinTemperature: "temperature",
            SearchMinTMC: "tmc",
            SearchMinVisibility: "visibility",
            SearchMinWindChill: "wind_chill",
            SearchMinWindSpeed: "wind_speed"
        };
        var filter_between_min_unmap = {
            distance: "SearchMinDistance",
            humidity: "SearchMinHumidity",
            id: "SearchMinID",
            numbers: "SearchMinStreetNumber",
            precipitation: "SearchMinPrecipitation",
            pressure: "SearchMinPressure",
            severity: "SearchMinSeverity",
            start_lat: "SearchStartMinLatitude",
            start_lng: "SearchStartMinLongitude",
            temperature: "SearchMinTemperature",
            tmc: "SearchMinTMC",
            visibility: "SearchMinVisibility",
            wind_chill: "SearchMinWindChill",
            wind_speed: "SearchMinWindSpeed"
        };
        var filter_between_max_map = {
            SearchMaxDistance: "distance",
            SearchMaxHumidity: "humidity",
            SearchMaxID: "id",
            SearchMaxStreetNumber: "numbers",
            SearchMaxPrecipitation: "precipitation",
            SearchMaxPressure: "pressure",
            SearchMaxSeverity: "severity",
            SearchStartMaxLatitude: "start_lat",
            SearchStartMaxLongitude: "start_lng",
            SearchMaxTemperature: "temperature",
            SearchMaxTMC: "tmc",
            SearchMaxVisibility: "visibility",
            SearchMaxWindChill: "wind_chill",
            SearchMaxWindSpeed: "wind_speed"
        };
        var filter_between_max_unmap = {
            distance: "SearchMaxDistance",
            humidity: "SearchMaxHumidity",
            id: "SearchMaxID",
            numbers: "SearchMaxStreetNumber",
            precipitation: "SearchMaxPrecipitation",
            pressure: "SearchMaxPressure",
            severity: "SearchMaxSeverity",
            start_lat: "SearchStartMaxLatitude",
            start_lng: "SearchStartMaxLongitude",
            temperature: "SearchMaxTemperature",
            tmc: "SearchMaxTMC",
            visibility: "SearchMaxVisibility",
            wind_chill: "SearchMaxWindChill",
            wind_speed: "SearchMaxWindSpeed"
        };
        var filter_boolean_map = {
            SearchAirportCode: "airport_code",
            SearchAmenity: "amenity",
            SearchAstronomicalTwilight: "astronomical_twilight",
            SearchBump: "bump",
            SearchCity: "city",
            SearchCivilTwilight: "civil_twilight",
            SearchCountry: "country",
            SearchCounty: "county",
            SearchCrossing: "crossing",
            SearchInDescription: "description",
            SearchGiveWay: "give_way",
            SearchJunction: "junction",
            SearchNoExit: "no_exit",
            SearchRailway: "railway",
            SearchRoundabout: "roundabout",
            SearchStreetSide: "side",
            SearchSource: "source",
            SearchState: "state",
            SearchStation: "station",
            SearchStop: "stop",
            SearchStreetName: "street",
            SearchSunriseSunset: "sunrise_sunset",
            SearchTimezone: "timezone",
            SearchTrafficCalming: "traffic_calming",
            SearchTrafficSignal: "traffic_signal",
            SearchTurningLoop: "turning_loop",
            SearchWeatherCondition: "weather_condition",
            SearchWindDirection: "wind_direction"
        };
        var filter_boolean_unmap = {
            airport_code: "SearchAirportCode",
            amenity: "SearchAmenity",
            astronomical_twilight: "SearchAstronomicalTwilight",
            bump: "SearchBump",
            city: "SearchCity",
            civil_twilight: "SearchCivilTwilight",
            country: "SearchCountry",
            county: "SearchCounty",
            crossing: "SearchCrossing",
            description: "SearchInDescription",
            give_way: "SearchGiveWay",
            junction: "SearchJunction",
            no_exit: "SearchNoExit",
            railway: "SearchRailway",
            roundabout: "SearchRoundabout",
            side: "SearchStreetSide",
            source: "SearchSource",
            state: "SearchState",
            station: "SearchStation",
            stop: "SearchStop",
            street: "SearchStreetName",
            sunrise_sunset: "SearchSunriseSunset",
            timezone: "SearchTimezone",
            traffic_calming: "SearchTrafficCalming",
            traffic_signal: "SearchTrafficSignal",
            turning_loop: "SearchTurningLoop",
            weather_condition: "SearchWeatherCondition",
            wind_direction: "SearchWindDirection"
        };
        window.onload = function() {
            closeModal();
            var request_array = localStorage.getItem("filter_items");
            if (request_array != null) {
                request_array = JSON.parse(request_array);
                remember_choices(request_array);
                xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "http://localhost/AVIACC/api/", true);
                xmlhttp.setRequestHeader("Content-type", "text/plain");
                xmlhttp.onreadystatechange = function() {
                    //when the response is ready
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        var json = JSON.parse(xmlhttp.responseText);
                        nr_of_entries = parseInt(json.count);
                        if (json.count == 0) {
                            document.getElementById("paginator").style.display = "none";
                            document.getElementById("result").style.display = "none";
                            alert("Search provided 0 entries");
                        } else {
                            nr_of_pages = Math.floor(nr_of_entries / 20);
                            if (nr_of_entries % 20 != 0) {
                                nr_of_pages++;
                            }
                            draw_table(json);
                            draw_paginator(nr_of_pages);
                        }

                    }
                }
                xmlhttp.send(JSON.stringify(request_array));
            }
            fill_options("second-option-statistics", true);
        }

        function draw_paginator(max_pages) {
            var paginator = document.getElementById("paginator");
            var curr_page = parseInt(localStorage.getItem("current_page"));
            paginator.innerHTML = "";
            if (max_pages > 4) {
                switch (curr_page) {
                    case 0: {
                        paginator.innerHTML += '<button class="current-page-button">' + curr_page + '</button>\n';
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (curr_page + 1) + ')">' + (curr_page + 1) + '</button>\n';
                        paginator.innerHTML += '<button class="current-page-button">...</button>\n';
                        paginator.innerHTML += '<button class="another-page-button" onclick="jump_at_page(' + (max_pages) + ')">' + max_pages + '</button>\n';
                        paginator.innerHTML += '<button class="another-page-button" onclick="jump_at_page(' + (curr_page + 1) + ')">></button>\n';
                        break;
                    }
                    case 1: {
                        paginator.innerHTML += '<button class="another-page-button" onclick="jump_at_page(' + (curr_page - 1) + ')">' + (curr_page - 1) + '</button>\n';
                        paginator.innerHTML += '<button class="current-page-button">' + curr_page + '</button>\n';
                        paginator.innerHTML += '<button class="another-page-button" onclick="jump_at_page(' + (curr_page + 1) + ')">' + (curr_page + 1) + '</button>\n';
                        paginator.innerHTML += '<button class="current-page-button">...</button>\n';
                        paginator.innerHTML += '<button class="another-page-button" onclick="jump_at_page(' + (max_pages) + ')">' + max_pages + '</button>\n';
                        paginator.innerHTML += '<button class="another-page-button" onclick="jump_at_page(' + (curr_page + 1) + ')">></button>\n';
                        break;
                    }
                    case (max_pages - 1): {
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (curr_page - 1) + ')"><</button>\n';
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (0) + ')">' + 0 + '</button>\n';
                        paginator.innerHTML += '<button class="current-page-button">...</button>\n';
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (curr_page - 1) + ')">' + (curr_page - 1) + '</button>\n';
                        paginator.innerHTML += '<button class="current-page-button">' + curr_page + '</button>\n';
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (curr_page + 1) + ')">' + (curr_page + 1) + '</button>\n';
                        break;
                    }
                    case max_pages: {
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (curr_page - 1) + ')"><</button>\n';
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (0) + ')">' + 0 + '</button>\n';
                        paginator.innerHTML += '<button class="current-page-button">...</button>\n';
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (curr_page - 1) + ')">' + (curr_page - 1) + '</button>\n';
                        paginator.innerHTML += '<button class="current-page-button">' + curr_page + '</button>\n';
                        break;
                    }
                    default: {
                        paginator.innerHTML += '<button class="another-page-button" onclick="jump_at_page(' + (curr_page - 1) + ')"><</button>\n';
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (0) + ')">' + 0 + '</button>\n';
                        paginator.innerHTML += '<button class="current-page-button">...</button>\n';
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (curr_page - 1) + ')">' + (curr_page - 1) + '</button>\n';
                        paginator.innerHTML += '<button class="current-page-button">' + curr_page + '</button>\n';
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (curr_page + 1) + ')">' + (curr_page + 1) + '</button>\n';
                        paginator.innerHTML += '<button class="current-page-button">...</button>\n';
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (max_pages) + ')">' + max_pages + '</button>\n';
                        paginator.innerHTML += '<button class="another-page-button" onclick="jump_at_page(' + (curr_page + 1) + ')">></button>\n';
                        break;
                    }
                }
            } else {
                for (var index = 0; index < max_pages; index++) {
                    if (index != curr_page) {
                        paginator.innerHTML += '<button class="another-page-button"  onclick="jump_at_page(' + (index) + ')">' + index + '</button>\n';
                    } else {
                        paginator.innerHTML += '<button class="current-page-button">' + index + '</button>\n';
                    }
                }
            }
        }

        function draw_table(json) {
            var t_head = document.getElementById("result-table-head");
            t_head.innerHTML = "";
            for (var index = 0; index < json.body[0].length; index++) {
                t_head.innerHTML += '<th class="result-table-head-element">' + toTitleCase((Object.keys(json.body[0][index])[0] + '').replace("_", " ")) + '</th>\n';
            }
            var t_body = document.getElementById("result-table-body");
            t_body.innerHTML = "";
            var row_length = json.body[0].length;
            var row_body = "";
            var el = "";
            for (var index = 0; index < json.body.length; index++) {
                for (var index2 = 0; index2 < row_length; index2++) {
                    el = (Object.values(json.body[index][index2])[0] + '');
                    if (el === "null" || el === "false") {
                        el = "unavailable";
                    }
                    row_body += '<td class="result-table-row-cell">' + el + '</td>\n';
                }
                t_body.innerHTML += row_body;
                row_body = "";
            }
        }

        //W3Schools function for making capital letters
        function toTitleCase(str) {
            return str.replace(/\w\S*/g, function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }

        function remember_choices(request_array) {
            var show_fil = request_array['show'];
            for (let value of Object.values(show_fil)) {
                document.getElementById(show_unmap[value]).checked = true;
            }
        }

        function jump_at_page(page_number) {
            var request_array = localStorage.getItem("filter_items");
            if (request_array != null) {
                localStorage.setItem("current_page", page_number);
                request_array = JSON.parse(request_array);
                request_array['page'] = page_number;
                request_array = JSON.stringify(request_array);
                localStorage.setItem("filter_items", request_array);
                xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "http://localhost/AVIACC/api/", true);
                xmlhttp.setRequestHeader("Content-type", "text/plain");
                xmlhttp.onreadystatechange = function() {
                    //when the response is ready
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        var json = JSON.parse(xmlhttp.responseText);
                        nr_of_entries = parseInt(json.count);
                        if (json.count == 0) {
                            document.getElementById("paginator").style.display = "none";
                            document.getElementById("result").style.display = "none";
                            alert("Search provided 0 entries");
                        } else {
                            nr_of_pages = Math.floor(nr_of_entries / 20);
                            if (nr_of_entries % 20 != 0) {
                                nr_of_pages++;
                            }
                            draw_table(json);
                            draw_paginator(nr_of_pages);
                        }

                    }
                }
                xmlhttp.send(request_array);
            }
        }

        function search_by_filters() {
            var request_array = build_search_request_array(0);
            localStorage.setItem("current_page", 0);
            if (Object.keys(request_array['show']).length === 0 && request_array['show'].constructor === Object) {
                localStorage.removeItem("filter_items", null);
                alert("You must select at least 1 show item");
            } else {
                var json_req_array = JSON.stringify(request_array);
                localStorage.setItem("filter_items", json_req_array);
                document.getElementById("json_filter").value = json_req_array;
                document.getElementById("filtration-form").submit();
            }
        }

        function build_search_request_array(page) {
            var request_array = {};
            request_array['id'] = 0;
            request_array['page'] = page;
            request_array['amount'] = 20;
            request_array['show'] = {};
            request_array['between'] = {};
            request_array['boolean'] = {};
            var show_filters = document.getElementsByClassName("showCheck");
            for (var index = 0; index < show_filters.length; index++) {
                if (show_filters[index].checked == true) {
                    request_array['show'][show_map[show_filters[index].id]] = show_map[show_filters[index].id];
                }
            }
            var restrict_filters = document.getElementsByClassName("restrictInput");
            for (var index = 0; index < restrict_filters.length; index++) {
                if (restrict_filters[index].value != null && restrict_filters[index].value != "") {

                    if (filter_between_max_map.hasOwnProperty(restrict_filters[index].id)) {
                        request_array['between']['i' + index] = {};
                        request_array['between']['i' + index]['name'] = filter_between_max_map[restrict_filters[index].id];
                        request_array['between']['i' + index]['value'] = restrict_filters[index].value;
                        request_array['between']['i' + index]['operator'] = "<=";
                    } else if (filter_between_min_map.hasOwnProperty(restrict_filters[index].id)) {
                        request_array['between']['i' + index] = {};
                        request_array['between']['i' + index]['name'] = filter_between_min_map[restrict_filters[index].id];
                        request_array['between']['i' + index]['value'] = restrict_filters[index].value;
                        request_array['between']['i' + index]['operator'] = ">=";
                    } else if (restrict_filters[index].id == 'SearchDate') {
                        request_array['boolean']['i' + index] = {};
                        request_array['boolean']['i' + index]['name'] = "start_time";
                        request_array['boolean']['i' + index]['value'] = restrict_filters[index].value;
                    } else if (restrict_filters[index].id == 'SearchHour') {
                        if (request_array['boolean']['i' + (index - 1)] == null) {
                            request_array['boolean']['i' + index] = {};
                            request_array['boolean']['i' + index]['name'] = "start_time";
                            request_array['boolean']['i' + index]['value'] = restrict_filters[index].value + ":00";
                        } else {
                            request_array['boolean']['i' + (index - 1)]['value'] =
                                request_array['boolean']['i' + (index - 1)]['value'] + " " + restrict_filters[index].value + ":00";
                        }
                    } else if (restrict_filters[index].value != 'Any') {
                        request_array['boolean']['i' + index] = {};
                        request_array['boolean']['i' + index]['name'] = filter_boolean_map[restrict_filters[index].id];
                        if (restrict_filters[index].value == 'Yes') {
                            request_array['boolean']['i' + index]['value'] = "True";
                        } else if (restrict_filters[index].value == 'No') {
                            request_array['boolean']['i' + index]['value'] = "False";
                        } else {
                            request_array['boolean']['i' + index]['value'] = restrict_filters[index].value;
                        }

                    }
                }
            }
            return request_array;
        }
    </script>
    <!-- End of Pagination Script -->
    <!-- Script done by Minut Mihai Dimitrie -->
    <!-- Statistics Input Script -->
    <script>
        var numeric_inputs = ["ShowWindSpeed", "ShowWindChill", "ShowID", "ShowTMC", "ShowSeverity", "ShowStartLatitude", "ShowStartLongitude", "ShowDistance", "ShowStreetNumber", "ShowTemperature", "ShowHumidity", "ShowPressure", "ShowVisibility", "ShowPrecipitation"];

        function change_format() {
            var format = document.getElementById('results-format').value;
            var statisticInputContainer = document.getElementById('pick-statistics-elements');
            switch (format) {
                case 'Map': {
                    statisticInputContainer.innerHTML = '<p class="show-title">Area Field</p> \
                    <select id="second-option-statistics" class="show-option" name="input-x">\
                    </select>';
                    fill_options("second-option-statistics", true);
                    break;
                }
                case 'Graph': {
                    statisticInputContainer.innerHTML = '<p class="show-title">X axis</p> \
                    <select id="first-option-statistics" class="show-option" name="input-x" > \
                    </select> \
                    <p class="show-title">Y axis</p> \
                    <select id="second-option-statistics" class="show-option" name="input-y">\
                    </select>';
                    fill_options("second-option-statistics", true);
                    fill_options("first-option-statistics", true);
                    break;
                }
                case 'BarChart': {
                    statisticInputContainer.innerHTML = '<p class="show-title">X axis</p> \
                    <select id="second-option-statistics" class="show-option" name="input-x">\
                    </select>\
                    <p class="show-title">Y axis</p> \
                    <select id="first-option-statistics" class="show-option" name="input-y">\
                    </select>';
                    fill_options("second-option-statistics", false);
                    fill_options("first-option-statistics", true);
                    break;
                }
                case 'PieChart': {
                    statisticInputContainer.innerHTML = '<p class="show-title">Field</p> \
                    <select id="second-option-statistics" class="show-option" name="input-x">\
                    </select>';
                    fill_options("second-option-statistics", false);
                    break;
                }
            }
        }

        function update_fill_options() {
            var format = document.getElementById('results-format').value;
            switch (format) {
                case 'Map': {
                    fill_options("second-option-statistics", true);
                    break;
                }
                case 'Graph': {
                    fill_options("second-option-statistics", true);
                    fill_options("first-option-statistics", true);
                    break;
                }
                case 'BarChart': {
                    fill_options("second-option-statistics", false);
                    fill_options("first-option-statistics", true);
                    break;
                }
                case 'PieChart': {
                    fill_options("second-option-statistics", false);
                    break;
                }
            }
        }

        function fill_options(id_container, numeric) {
            document.getElementById(id_container).innerHTML = "";
            var opt = document.createElement('OPTION');
            opt.text = "None";
            opt.value = "None";
            document.getElementById(id_container).options.add(opt);
            if (numeric === true) {
                for (var index = 0; index < numeric_inputs.length; index++) {
                    if (document.getElementById(numeric_inputs[index]).checked === true) {
                        var opt = document.createElement('OPTION');
                        opt.text = (numeric_inputs[index]).replace('Show', '');
                        opt.value = show_map[numeric_inputs[index]];
                        document.getElementById(id_container).options.add(opt);
                    }
                }
            } else {

                var show_filters = document.getElementsByClassName("showCheck");
                for (var index = 0; index < show_filters.length; index++) {
                    if (show_filters[index].checked === true) {
                        var opt = document.createElement('OPTION');
                        opt.text = (show_filters[index].id).replace('Show', '');
                        opt.value = show_map[show_filters[index].id];
                        document.getElementById(id_container).options.add(opt);
                    }
                }
            }
        }
    </script>
    <!-- End of Statistics Input Script -->
    <!-- Script done by Pair Programming -->
    <!-- Download Script -->
    <script>
        function download_statistics() {
            var type = document.getElementById("download").value;
            switch (type) {
                case 'PDF': {
                    print_to_pdf();
                    break;
                }
                case 'PNG': {
                    download_png();
                    break;
                }
                case 'SVG': {
                    download_svg();
                    break;
                }
                case 'CSV': {
                    download_csv();
                    break;
                }
            }
        }

        function download_png() {
            var printContents = document.getElementById("modal").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = "<div style='height:1000px;'>" + printContents + "</div>";
            html2canvas(document.body).then(function(canvas) {
                simulateDownloadImageClick(canvas.toDataURL(), 'data.png');
                document.body.innerHTML = originalContents;
            });
        }

        function simulateDownloadImageClick(uri, filename) {
            var link = document.createElement('a');
            if (typeof link.download !== 'string') {
                window.open(uri);
            } else {
                link.href = uri;
                link.download = filename;
                accountForFirefox(clickLink, link);
            }
        }

        function clickLink(link) {
            link.click();
        }

        function accountForFirefox(click) { // wrapper function
            let link = arguments[1];
            document.body.appendChild(link);
            click(link);
            document.body.removeChild(link);
        }

        function print_to_pdf() {
            var printContents = document.getElementById("modal").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = "<div style='height:1000px;'>" + printContents + "</div>";
            window.print();
            document.body.innerHTML = originalContents;
        }


        function download_csv() {
            var data = localStorage.getItem('table_data');
            if (data) {
                data = JSON.parse(data);
                type = data.type;
                data = data.data;
                csv = "";
                if (type === 'map') {
                    data.forEach(row => {
                        var values = Object.values(row);
                        csv = csv + values[0] + ',' + values[1];
                        csv = csv + '\n';
                    });
                } else {

                    data.forEach(row => {
                        row.forEach(el => {
                            csv = csv + el + ',';
                        })
                        csv = csv + '\n';
                    })
                }
                document.getElementById('csv-data').onclick = function(code) {
                    this.href = 'data:text/plain;charset=utf-11,' + encodeURIComponent(csv);
                };
                document.getElementById('csv-data').click();
            }

        }

        function download_svg() {
            var printContents = document.getElementById("modal").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = "<div style='height:1000px;'>" + printContents + "</div><a href='' id='svg-data' download='data.svg' style='visibility: hidden; display:none'></a>";
            html2canvas(document.body).then(function(canvas) {
                var cs = new C2S(canvas);
                var svg_text = cs.getSerializedSvg(true);
                // var xmlparse = new XMLSerializer();
                // var source = cs.getSerializedSvg(true);
                var source = svg_text;
                console.log(source);
                if (!source.match(/^<svg[^>]+xmlns="http\:\/\/www\.w3\.org\/2000\/svg"/)) {
                    source = source.replace(/^<svg/, '<svg xmlns="http://www.w3.org/2000/svg"');
                }
                if (!source.match(/^<svg[^>]+"http\:\/\/www\.w3\.org\/1999\/xlink"/)) {
                    source = source.replace(/^<svg/, '<svg xmlns:xlink="http://www.w3.org/1999/xlink"');
                }
                source = '<?xml version="1.0" standalone="no"?>\r\n' + source;
                // console.log("data:image/svg+xml;charset=utf-8," + encodeURIComponent(source));

                document.getElementById('svg-data').onclick = function(code){
                    this.href = "data:image/svg+xml;charset=utf-8," + encodeURIComponent(source);
                };
                
                document.getElementById('svg-data').click();
                document.body.innerHTML = originalContents;
            });
        }
    </script>
    <!-- End of Download Script -->
    <!-- End of Script done by Pair Programming -->
</head>

<body>


    <!-- Done by Minut Mihai Dimitrie -->
    <main class="main-class">

        <!--  Pair Programming -->
        <div id="dataModal" class="theModal">
            <button class="pick-up-button" onclick="closeModal()">X</button>
            <div class="modalContent" id="modal">
            </div>
        </div>
        <!-- End of Pair Programming -->
        <form class="filtration-menu-container" id="filtration-form" method="POST">
            <!--Pick Shown Files Division-->
            <div class="pick-show">
                <div class="pick-title-show">
                    <p class="filtration-menu-text">Choose what to show in the results</p>
                </div>
                <div class="pick-columns-container">
                    <!--Entry-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showEntryItems')" class="pick-columns-list-title">
                            <p>Entries</p>
                        </div>
                        <label onclick="pickUnpickAllShowItems();update_fill_options();" class="pick-columns-item" for="ShowAll" name="showEntryItems">
                            <input type="checkbox" id="ShowAll">
                            <span>All</span>
                        </label>
                        <label for="ShowID" class="pick-columns-item" name="showEntryItems">
                            <input type="checkbox" id="ShowID" class="showCheck" onclick="update_fill_options()">
                            <span>ID</span>
                        </label>
                    </div>
                    <!--Event-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showEventItems')" class="pick-columns-list-title">
                            <p>Event</p>
                        </div>
                        <label for="ShowSource" class="pick-columns-item" name="showEventItems">
                            <input type="checkbox" id="ShowSource" class="showCheck" onclick="update_fill_options()">
                            <span>Source</span>
                        </label>
                        <label for="ShowTMC" class="pick-columns-item" name="showEventItems">
                            <input type="checkbox" id="ShowTMC" class="showCheck" onclick="update_fill_options()">
                            <span>TMC</span>
                        </label>
                        <label for="ShowSeverity" class="pick-columns-item" name="showEventItems">
                            <input type="checkbox" id="ShowSeverity" class="showCheck" onclick="update_fill_options()">
                            <span>Severity</span>
                        </label>
                        <label for="ShowDescription" class="pick-columns-item" name="showEventItems">
                            <input type="checkbox" id="ShowDescription" class="showCheck" onclick="update_fill_options()">
                            <span>Description</span>
                        </label>
                    </div>
                    <!--Time-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showTimeItems')" class="pick-columns-list-title">
                            <p>Time</p>
                        </div>
                        <label for="ShowStartTime" class="pick-columns-item" name="showTimeItems">
                            <input type="checkbox" id="ShowStartTime" class="showCheck" onclick="update_fill_options()">
                            <span>Start Time</span>
                        </label>
                        <label for="ShowEndTime" class="pick-columns-item" name="showTimeItems">
                            <input type="checkbox" id="ShowEndTime" class="showCheck" onclick="update_fill_options()">
                            <span>End Time</span>
                        </label>
                        <label for="ShowSunriseSunset" class="pick-columns-item" name="showTimeItems">
                            <input type="checkbox" id="ShowSunriseSunset" class="showCheck" onclick="update_fill_options()">
                            <span>Sunrise-Sunset</span>
                        </label>
                        <label for="ShowTimeZone" class="pick-columns-item" name="showTimeItems">
                            <input type="checkbox" id="ShowTimeZone" class="showCheck" onclick="update_fill_options()">
                            <span>Time Zone</span>
                        </label>
                    </div>
                    <!--Details Primary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showDetailsPrimaryItems')" class="pick-columns-list-title">
                            <p>Details Primary</p>
                        </div>
                        <label for="ShowTrafficCalming" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowTrafficCalming" class="showCheck" onclick="update_fill_options()">
                            <span>Traffic Calming</span>
                        </label>
                        <label for="ShowRailway" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowRailway" class="showCheck" onclick="update_fill_options()">
                            <span>Railway</span>
                        </label>
                        <label for="ShowStation" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowStation" class="showCheck" onclick="update_fill_options()">
                            <span>Station</span>
                        </label>
                        <label for="ShowAmenity" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowAmenity" class="showCheck" onclick="update_fill_options()">
                            <span>Amenity</span>
                        </label>
                        <label for="ShowCrossing" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowCrossing" class="showCheck" onclick="update_fill_options()">
                            <span>Crossing</span>
                        </label>
                        <label for="ShowStop" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowStop" class="showCheck" onclick="update_fill_options()">
                            <span>Stop</span>
                        </label>
                        <label for="ShowNoExit" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowNoExit" class="showCheck" onclick="update_fill_options()">
                            <span>No Exit</span>
                        </label>
                    </div>
                    <!--Details Secondary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showDetailsSecondaryItems')" class="pick-columns-list-title">
                            <p>Details Secondary</p>
                        </div>
                        <label for="ShowBump" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowBump" class="showCheck" onclick="update_fill_options()">
                            <span>Bump</span>
                        </label>
                        <label for="ShowTurningLoop" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowTurningLoop" class="showCheck" onclick="update_fill_options()">
                            <span>Turning Loop</span>
                        </label>
                        <label for="ShowJunction" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowJunction" class="showCheck" onclick="update_fill_options()">
                            <span>Junction</span>
                        </label>
                        <label for="ShowGiveWay" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowGiveWay" class="showCheck" onclick="update_fill_options()">
                            <span>Give Way</span>
                        </label>
                        <label for="ShowRoundabout" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowRoundabout" class="showCheck" onclick="update_fill_options()">
                            <span>Roundabout</span>
                        </label>
                        <label for="ShowTrafficSignal" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowTrafficSignal" class="showCheck" onclick="update_fill_options()">
                            <span>Traffic Signal</span>
                        </label>
                    </div>
                    <!--Location Primary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showLocationPrimaryItems')" class="pick-columns-list-title">
                            <p>Location Primary</p>
                        </div>
                        <label for="ShowCountry" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowCountry" class="showCountry" onclick="update_fill_options()">
                            <span>Country</span>
                        </label>
                        <label for="ShowState" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowState" class="showCheck" onclick="update_fill_options()">
                            <span>State</span>
                        </label>
                        <label for="ShowCounty" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowCounty" class="showCheck" onclick="update_fill_options()">
                            <span>County</span>
                        </label>
                        <label for="ShowCity" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowCity" class="showCheck" onclick="update_fill_options()">
                            <span>City</span>
                        </label>
                        <label for="ShowZipcode" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowZipcode" class="showCheck" onclick="update_fill_options()">
                            <span>Zipcode</span>
                        </label>
                        <label for="ShowStreetNumber" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowStreetNumber" class="showCheck" onclick="update_fill_options()">
                            <span>Street Number</span>
                        </label>
                        <label for="ShowStreetName" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowStreetName" class="showCheck" onclick="update_fill_options()">
                            <span>Street Name</span>
                        </label>
                        <label for="ShowStreetSide" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowStreetSide" class="showCheck" onclick="update_fill_options()">
                            <span>Street Side</span>
                        </label>

                    </div>
                    <!--Location secondary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showLocationSecondaryItems')" class="pick-columns-list-title">
                            <p>Location Secondary</p>
                        </div>
                        <label for="ShowStartLatitude" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowStartLatitude" class="showCheck" onclick="update_fill_options()">
                            <span>Start Latitude</span>
                        </label>
                        <label for="ShowEndLatitude" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowEndLatitude" class="showCheck" onclick="update_fill_options()">
                            <span>End Latitude</span>
                        </label>
                        <label for="ShowStartLongitude" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowStartLongitude" class="showCheck" onclick="update_fill_options()">
                            <span>Start Longitude</span>
                        </label>
                        <label for="ShowEndLongitude" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowEndLongitude" class="showCheck" onclick="update_fill_options()">
                            <span>End Longitude</span>
                        </label>
                        <label for="ShowDistance" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowDistance" class="showCheck" onclick="update_fill_options()">
                            <span>Distance (miles)</span>
                        </label>
                        <label for="ShowAirportCode" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowAirportCode" class="showCheck" onclick="update_fill_options()">
                            <span>Airport Code</span>
                        </label>
                    </div>
                    <!--Weather Primary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showWeatherPrimaryItems')" class="pick-columns-list-title">
                            <p>Weather Primary</p>
                        </div>
                        <label for="ShowTemperature" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowTemperature" class="showCheck" onclick="update_fill_options()">
                            <span>Temperature (F)</span>
                        </label>
                        <label for="ShowHumidity" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowHumidity" class="showCheck" onclick="update_fill_options()">
                            <span>Humidity (%)</span>
                        </label>
                        <label for="ShowPressure" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowPressure" class="showCheck" onclick="update_fill_options()">
                            <span>Pressure (inches)</span>
                        </label>
                        <label for="ShowPrecipitation" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowPrecipitation" class="showCheck" onclick="update_fill_options()">
                            <span>Precipitation</span>
                        </label>
                        <label for="ShowVisibility" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowVisibility" class="showCheck" onclick="update_fill_options()">
                            <span>Visibility (miles)</span>
                        </label>
                        <label for="ShowWeatherCondition" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowWeatherCondition" class="showCheck" onclick="update_fill_options()">
                            <span>Weather Condition</span>
                        </label>
                    </div>
                    <!--Weather Secondary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showWeatherSecondaryItems')" class="pick-columns-list-title">
                            <p>Weather Secondary</p>
                        </div>
                        <label for="ShowWeatherTimestamp" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowWeatherTimestamp" class="showCheck" onclick="update_fill_options()">
                            <span>Weather Timestamp</span>
                        </label>
                        <label for="ShowWindChill" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowWindChill" class="showCheck" onclick="update_fill_options()">
                            <span>Wind Chill</span>
                        </label>
                        <label for="ShowWindDirection" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowWindDirection" class="showCheck" onclick="update_fill_options()">
                            <span>Wind Direction</span>
                        </label>
                        <label for="ShowWindSpeed" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowWindSpeed" class="showCheck" onclick="update_fill_options()">
                            <span>Wind Speed (mph)</span>
                        </label>
                        <label for="ShowCivilTwilight" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowCivilTwilight" class="showCheck" onclick="update_fill_options()">
                            <span>Civil Twilight</span>
                        </label>
                        <label for="ShowAstronomicalTwilight" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowAstronomicalTwilight" class="showCheck" onclick="update_fill_options()">
                            <span>Astronomical Twilight</span>
                        </label>
                    </div>
                </div>
            </div>
            <!--Pick Restrictions Division-->
            <div class="pick-restrict">
                <div class="pick-title-restrict">
                    <p class="filtration-menu-text">Restrict Values</p>
                </div>
                <div class="pick-columns-container">
                    <!--Entries-->
                    <div class="pick-restrict-list">
                        <div class="pick-restrict-list-title" onclick="restrictHideItems(this,'restrictEntryItem')">
                            <p>Entries</p>
                        </div>
                        <label for="SearchMinID" name="restrictEntryItem" class="pick-restrict-item">ID (min):
                            <input type="number" min="0" step="1" id="SearchMinID" class="restrictInput">
                        </label>
                        <label for="SearchMaxID" name="restrictEntryItem" class="pick-restrict-item">ID (max):
                            <input type="number" min="0" step="1" id="SearchMaxID" class="restrictInput">
                        </label>
                    </div>
                    <!--Event-->
                    <div class="pick-restrict-list">
                        <div class="pick-restrict-list-title" onclick="restrictHideItems(this,'restrictEventItem')">
                            <p>Event</p>
                        </div>
                        <label for="SearchMinTMC" name="restrictEventItem" class="pick-restrict-item">TMC (min):
                            <input type="number" id="SearchMinTMC" class="restrictInput">
                        </label>
                        <label for="SearchMaxTMC" name="restrictEventItem" class="pick-restrict-item">TMC (max):
                            <input type="number" id="SearchMaxTMC" class="restrictInput">
                        </label>
                        <label for="SearchMinSeverity" name="restrictEventItem" class="pick-restrict-item">Severity
                            (min):
                            <input type="number" id="SearchMinSeverity" class="restrictInput">
                        </label>
                        <label for="SearchMaxSeverity" name="restrictEventItem" class="pick-restrict-item">Severity
                            (max):
                            <input type="number" id="SearchMaxSeverity" class="restrictInput">
                        </label>
                        <label for="SearchSource" name="restrictEventItem" class="pick-restrict-item">Source:
                            <select id="SearchSource" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="MapQuest">MapQuest</option>
                                <option value="Bing">Bing</option>
                                <option value="Other">Other</option>
                            </select>
                        </label>
                        <label for="SearchInDescription" name="restrictEventItem" class="pick-restrict-item">Keyword in
                            Description:
                            <input type="text" id="SearchInDescription" class="restrictInput">
                        </label>
                    </div>
                    <!--Time-->
                    <div class="pick-restrict-list">
                        <div class="pick-restrict-list-title" onclick="restrictHideItems(this,'restrictTimeItem')">
                            <p>Time</p>
                        </div>
                        <label for="SearchDate" name="restrictTimeItem" class="pick-restrict-item">Date:
                            <input type="date" id="SearchDate" class="restrictInput">
                        </label>
                        <label for="SearchHour" name="restrictTimeItem" class="pick-restrict-item">Hour:
                            <input type="time" id="SearchHour" class="restrictInput">
                        </label>
                        <label for="SearchTimezone" name="restrictTimeItem" class="pick-restrict-item">Timezone:
                            <input type="text" id="SearchTimezone" class="restrictInput">
                        </label>
                        <label for="SearchSunriseSunset" name="restrictTimeItem" class="pick-restrict-item">Sunrise-Sunset:
                            <select id="SearchSunriseSunset" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Day">Day</option>
                                <option value="Night">Night</option>
                            </select>
                        </label>
                    </div>
                    <!--Details Primary-->
                    <div class="pick-restrict-list">
                        <div class="pick-restrict-list-title" onclick="restrictHideItems(this,'restrictDetailsPItem')">
                            <p>Details Primary</p>
                        </div>
                        <label for="SearchTrafficCalming" name="restrictDetailsPItem" class="pick-restrict-item">Traffic
                            Calming:
                            <select id="SearchTrafficCalming" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchRailway" name="restrictDetailsPItem" class="pick-restrict-item">Railway:
                            <select id="SearchRailway" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchStation" name="restrictDetailsPItem" class="pick-restrict-item">Station:
                            <select id="SearchStation" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchAmenity" name="restrictDetailsPItem" class="pick-restrict-item">Amenity:
                            <select id="SearchAmenity" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchCrossing" name="restrictDetailsPItem" class="pick-restrict-item">Crossing:
                            <select id="SearchCrossing" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchStop" name="restrictDetailsPItem" class="pick-restrict-item">Stop:
                            <select id="SearchStop" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchNoExit" name="restrictDetailsPItem" class="pick-restrict-item">No Exit:
                            <select id="SearchNoExit" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                    </div>
                    <!--Details Secondary-->
                    <div class="pick-restrict-list">
                        <div class="pick-restrict-list-title" onclick="restrictHideItems(this,'restrictDetailsSItem')">
                            <p>Details Secondary</p>
                        </div>
                        <label for="SearchBump" name="restrictDetailsSItem" class="pick-restrict-item">Bump:
                            <select id="SearchBump" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchTurningLoop" name="restrictDetailsSItem" class="pick-restrict-item">Turning
                            Loop:
                            <select id="SearchTurningLoop" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchJunction" name="restrictDetailsSItem" class="pick-restrict-item">Junction:
                            <select id="SearchJunction" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchGiveWay" name="restrictDetailsSItem" class="pick-restrict-item">Give Way:
                            <select id="SearchGiveWay" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchRoundabout" name="restrictDetailsSItem" class="pick-restrict-item">Roundabout:
                            <select id="SearchRoundabout" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label for="SearchTrafficSignal" name="restrictDetailsSItem" class="pick-restrict-item">Traffic
                            Signal:
                            <select id="SearchTrafficSignal" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                    </div>
                    <!--Location Primary-->
                    <div class="pick-restrict-list">
                        <div class="pick-restrict-list-title" onclick="restrictHideItems(this,'restrictLocationPItem')">
                            <p>Location Primary</p>
                        </div>
                        <label for="SearchCountry" name="restrictLocationPItem" class="pick-restrict-item">Country:
                            <input type="text" id="SearchCountry" class="restrictInput">
                        </label>
                        <label for="SearchState" name="restrictLocationPItem" class="pick-restrict-item">State:
                            <input type="text" id="SearchState" class="restrictInput">
                        </label>
                        <label for="SearchCounty" name="restrictLocationPItem" class="pick-restrict-item">County:
                            <input type="text" id="SearchCounty" class="restrictInput">
                        </label>
                        <label for="SearchCity" name="restrictLocationPItem" class="pick-restrict-item">City:
                            <input type="text" id="SearchCity" class="restrictInput">
                        </label>
                        <label for="SearchMinStreetNumber" name="restrictLocationPItem" class="pick-restrict-item">Street Number (min):
                            <input type="number" id="SearchMinStreetNumber" class="restrictInput">
                        </label>
                        <label for="SearchMaxStreetNumber" name="restrictLocationPItem" class="pick-restrict-item">Street Number (max):
                            <input type="number" id="SearchMaxStreetNumber" class="restrictInput">
                        </label>
                        <label for="SearchStreetName" name="restrictLocationPItem" class="pick-restrict-item">Street
                            Name:
                            <input type="text" id="SearchStreetName" class="restrictInput">
                        </label>
                        <label for="SearchStreetSide" name="restrictLocationPItem" class="pick-restrict-item">Street
                            Side:
                            <select id="SearchStreetSide" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Left">Left</option>
                                <option value="Right">Right</option>
                            </select>
                        </label>
                        <label for="SearchAirportCode" name="restrictLocationPItem" class="pick-restrict-item">Airport
                            Code:
                            <input type="text" id="SearchAirportCode" class="restrictInput">
                        </label>
                    </div>
                    <!--Location Secondary-->
                    <div class="pick-restrict-list">
                        <div class="pick-restrict-list-title" onclick="restrictHideItems(this,'restrictLocationSItem')">
                            <p>Location Secondary</p>
                        </div>
                        <label for="SearchStartMinLatitude" name="restrictLocationSItem" class="pick-restrict-item">Started at minimum Latitude:
                            <input type="number" id="SearchStartMinLatitude" class="restrictInput">
                        </label>
                        <label for="SearchStartMaxLatitude" name="restrictLocationSItem" class="pick-restrict-item">Started at maximum Latitude:
                            <input type="number" id="SearchStartMaxLatitude" class="restrictInput">
                        </label>
                        <label for="SearchStartMinLongitude" name="restrictLocationSItem" class="pick-restrict-item">Started at minimum Longitude:
                            <input type="number" id="SearchStartMinLongitude" class="restrictInput">
                        </label>
                        <label for="SearchStartMaxLongitude" name="restrictLocationSItem" class="pick-restrict-item">Started at maximum Longitude:
                            <input type="number" id="SearchStartMaxLongitude" class="restrictInput">
                        </label>
                        <label for="SearchMinDistance" name="restrictLocationSItem" class="pick-restrict-item">Minimum
                            Distance(miles):
                            <input type="number" id="SearchMinDistance" class="restrictInput">
                        </label>
                        <label for="SearchMaxDistance" name="restrictLocationSItem" class="pick-restrict-item">Maximum
                            Distance(miles):
                            <input type="number" id="SearchMaxDistance" class="restrictInput">
                        </label>
                    </div>
                    <!--Weather Primary-->
                    <div class="pick-restrict-list">
                        <div class="pick-restrict-list-title" onclick="restrictHideItems(this,'restrictWeatherPItem')">
                            <p>Weather Primary</p>
                        </div>
                        <label for="SearchMinTemperature" name="restrictWeatherPItem" class="pick-restrict-item">Temperature F (min):
                            <input type="number" id="SearchMinTemperature" class="restrictInput">
                        </label>
                        <label for="SearchMaxTemperature" name="restrictWeatherPItem" class="pick-restrict-item">Temperature F (max):
                            <input type="number" id="SearchMaxTemperature" class="restrictInput">
                        </label>
                        <label for="SearchMinHumidity" name="restrictWeatherPItem" class="pick-restrict-item">Humidity %
                            (min):
                            <input type="number" id="SearchMinHumidity" class="restrictInput">
                        </label>
                        <label for="SearchMaxHumidity" name="restrictWeatherPItem" class="pick-restrict-item">Humidity %
                            (max):
                            <input type="number" id="SearchMaxHumidity" class="restrictInput">
                        </label>
                        <label for="SearchMinPressure" name="restrictWeatherPItem" class="pick-restrict-item">Pressure
                            inches (min):
                            <input type="number" id="SearchMinPressure" class="restrictInput">
                        </label>
                        <label for="SearchMaxPressure" name="restrictWeatherPItem" class="pick-restrict-item">Pressure
                            inches (max):
                            <input type="number" id="SearchMaxPressure" class="restrictInput">
                        </label>
                        <label for="SearchMinPrecipitation" name="restrictWeatherPItem" class="pick-restrict-item">Precipitation inches (min):
                            <input type="number" id="SearchMinPrecipitation" class="restrictInput">
                        </label>
                        <label for="SearchMaxPrecipitation" name="restrictWeatherPItem" class="pick-restrict-item">Precipitation inches (max):
                            <input type="number" id="SearchMaxPrecipitation" class="restrictInput">
                        </label>
                        <label for="SearchMinVisibility" name="restrictWeatherPItem" class="pick-restrict-item">Visibility miles (min):
                            <input type="number" id="SearchMinVisibility" class="restrictInput">
                        </label>
                        <label for="SearchMaxVisibility" name="restrictWeatherPItem" class="pick-restrict-item">Visibility miles (max):
                            <input type="number" id="SearchMaxVisibility" class="restrictInput">
                        </label>
                        <label for="SearchWeatherCondition" name="restrictWeatherPItem" class="pick-restrict-item">Weather Condition:
                            <input type="text" id="SearchWeatherCondition" class="restrictInput">
                        </label>

                    </div>
                    <!--Weather Secondary-->
                    <div class="pick-restrict-list">
                        <div class="pick-restrict-list-title" onclick="restrictHideItems(this,'restrictWeatherSItem')">
                            <p>Weather Secondary</p>
                        </div>
                        <label for="SearchMinWindChill" name="restrictWeatherSItem" class="pick-restrict-item">Wind
                            Chill F (min):
                            <input type="number" id="SearchMinWindChill" class="restrictInput">
                        </label>
                        <label for="SearchMaxWindChill" name="restrictWeatherSItem" class="pick-restrict-item">Wind
                            Chill F (max):
                            <input type="number" id="SearchMaxWindChill" class="restrictInput">
                        </label>
                        <label for="SearchWindDirection" name="restrictWeatherSItem" class="pick-restrict-item">Wind
                            Direction:
                            <input type="text" id="SearchWindDirection" class="restrictInput">
                        </label>
                        <label for="SearchMinWindSpeed" name="restrictWeatherSItem" class="pick-restrict-item">Wind
                            Speed mph (min):
                            <input type="number" id="SearchMinWindSpeed" class="restrictInput">
                        </label>
                        <label for="SearchMaxWindSpeed" name="restrictWeatherSItem" class="pick-restrict-item">Wind
                            Speed mph (max):
                            <input type="number" id="SearchMaxWindSpeed" class="restrictInput">
                        </label>
                        <label for="SearchCivilTwilight" name="restrictWeatherSItem" class="pick-restrict-item">Civil
                            Twilight:
                            <select id="SearchCivilTwilight" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Day">Day</option>
                                <option value="Night">Night</option>
                            </select>
                        </label>
                        <label for="SearchAstronomicalTwilight" name="restrictWeatherSItem" class="pick-restrict-item">Astronomical Twilight:
                            <select id="SearchAstronomicalTwilight" class="restrictInput">
                                <option value="Any">Any</option>
                                <option value="Day">Day</option>
                                <option value="Night">Night</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <!-- Done by Ionita Andra -->
            <div class="selectam">
                <div class="show">
                    <p class="show-title">Format Results</p>
                    <select id="results-format" class="show-option" name="format" onchange="change_format()">
                        <option id="Map" value="Map">Map</option>
                        <option id="Graph" value="Graph">Graph</option>
                        <option id="BarChart" value="BarChart">BarChart</option>
                        <option id="PieChart" value="PieChart">PieChart</option>
                    </select>
                </div>
                <div class="download">
                    <p class="download-title">Download As</p>
                    <div class="descarcare">
                        <select id="download" class="show-option">
                            <option value="PNG">PNG</option>
                            <option value="SVG">SVG</option>
                            <option value="CSV">CSV</option>
                            <option value="PDF">PDF</option>
                        </select>
                        <div class="download-button">
                            <button type="button" onclick="download_statistics()" id="download_button" class="download-commit-button">Download</button>
                        </div>

                    </div>
                </div>
            </div>
            <input type="text" style="display:none" name="json_filter" id="json_filter">
            <!-- Finished Section Done By Ionita Andra Paula -->
            <!--Submit Button-->
            <!-- Done by Minut Mihai Dimitrie -->
            <div class="selectam">
                <div class="show" id="pick-statistics-elements">
                    <p class="show-title">Area Field</p>
                    <select id="second-option-statistics" class="show-option" name="input-x">
                    </select>
                </div>

            </div>
            <!-- Finished by Minut Mihai Dimitrie -->
        </form>
        <!-- Done By Minut Mihai Dimitrie -->
        <div class="pick-button">
            <button onclick="search_by_filters()" value="Search" class="filtration-submit-button">Search</button>
        </div>
        <!-- Finished Section Done By Minut Mihai Dimitrie -->
        <div class="pick-button">
            <button type="button" class="filtration-submit-button" onclick="showModal()">View Data</button>
        </div>
        <!-- Finished Section Done By Ionita Andra Paula -->
         <!-- Done By Minut Mihai Dimitrie -->
        <div class="result" id="result">
            <table class="result-table">
                <thead class="result-table-head">
                    <tr id="result-table-head">
                    </tr>
                </thead>
                <tbody class="result-table-body" id="result-table-body">
                </tbody>
            </table>
        </div>
        <div class="table-paginator" id="paginator">
        </div>

        <!-- Finished Section Done By Minut Mihai Dimitrie -->
    </main>

    <!-- Done by Andra Ionita -->
    <header>
        <div class="header-item1">
            <h1>
                <div onclick="document.location.href='http://localhost/AVi-7A-BAM/public/Home/index'">
                    <img class="logo-icon" src="http://localhost/AVi-7A-BAM/public/Styles/logo-iconalb.png">
                </div>
            </h1>
            <!--Insert Logo, everytime when you press logo you will access the home page-->
        </div>

        <div class="header-item2">
            <div class="site-name">
                <h1>Crash<span>Watch</span></h1>
                <!--Insert Name of the Site, everytime when you press the name of the site you will access the home page-->
            </div>
        </div>
    </header>
    <!-- Finished Section Done By Andra Ionita  -->
    <!-- Done By Minut Mihai Dimitrie -->
    <footer>

        <div class="footer-item1">
            <!--Contact-->
            <p>
                Contact Us! <br><br>
                +40 0742 123 123 <br>
                our@contact.com
            </p>
        </div>
        <div class="footer-item2">
            <!--Copyright-->
            <p>
                Web Techologies Faculty Project<br><br>
                &copy; BAM A7 2020 - UAIC FII
            </p>
        </div>
        <div class="footer-item3">
            <p>Powered By:</p>
            <div class="footer-icon-flex">
                <a href="https://github.com/" target="_blank">
                    <img class="footer-icon1" src="http://localhost/AVi-7A-BAM/public/Styles/githubLogo.png">
                </a>
                <a href="https://trello.com/" target="_blank">
                    <img class="footer-icon2" src="http://localhost/AVi-7A-BAM/public/Styles/trelloLogo.png">
                </a>
                <a href="https://www.info.uaic.ro/" target="_blank">
                    <img class="footer-icon1" src="http://localhost/AVi-7A-BAM/public/Styles/fiiLogo.png">
                </a>
            </div>
        </div>

    </footer>
    <!-- Finished Section Done By Minut Mihai Dimitrie -->
    <a href="" id="csv-data" download="data.csv" style="visibility: hidden; display:none"></a>
    
</body>
<!-- Done by Cretu Bogdan Antonio -->
<nav class="navbar">
    <ul class="navbar-ul">
        <li class="navbar-item" id="userButton">

            <div class="nav-link" onclick="document.location.href='http://localhost/AVi-7A-BAM/public/AccountMenu'">
                <img id="userImage" src="https://upload.wikimedia.org/wikipedia/commons/d/de/Windows_live_square.JPG"></img>
                <span class="link-text">ACCOUNT MENU</span>
            </div>
        </li>
        <li class="navbar-item">

            <div class="nav-link" onclick="document.location.href='http://localhost/AVi-7A-BAM/public/Home'">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" class="svg-inline--fa fa-home fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
                </svg>
                <span class="link-text">Home</span>
            </div>
        </li>
        <li class="navbar-item">

            <div class="nav-link" onclick="document.location.href='http://localhost/AVi-7A-BAM/public/Contact'">
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="address-card" class="svg-inline--fa fa-address-card fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path fill="currentColor" d="M528 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm0 400H48V80h480v352zM208 256c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm-89.6 128h179.2c12.4 0 22.4-8.6 22.4-19.2v-19.2c0-31.8-30.1-57.6-67.2-57.6-10.8 0-18.7 8-44.8 8-26.9 0-33.4-8-44.8-8-37.1 0-67.2 25.8-67.2 57.6v19.2c0 10.6 10 19.2 22.4 19.2zM360 320h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8z"></path>
                </svg>
                <span class="link-text">Contact</span>
            </div>


        </li>
        <li class="navbar-item">

            <div class="nav-link" onclick="document.location.href='http://localhost/AVi-7A-BAM/public/Documentation'">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book" class="svg-inline--fa fa-book fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                </svg>
                <span class="link-text">Documentation</span>
            </div>

        </li>
        <li class="navbar-item">

            <a class="nav-link" href='<?php echo Constants::MANUAL; ?>'>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-reader" class="svg-inline--fa fa-book-reader fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z"></path></svg>
                <span class="link-text">Manual</span>
            </a>

        </li>
        <li class="navbar-item">

            <div class="nav-link" onclick="document.location.href='http://localhost/AVi-7A-BAM/public/SignIn/logout'">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                </svg>
                <span class="link-text">Log Out</span>
            </div>

        </li>
        
    </ul>
</nav>
<!-- Finished Section Done By Cretu Bogdan Antonio -->

</html>