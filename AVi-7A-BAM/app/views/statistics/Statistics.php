<!DOCTYPE html>
<html lang="en-US">
<!-- Page merged by Minut Mihai Dimitrie -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="height=device-height, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="icon" href="http://localhost/AVi-7A-BAM/public/Styles/logo-icon.png" type="image/gif">
    <link rel="stylesheet" type="text/css" href="http://localhost/AVi-7A-BAM/public/Styles/StatisticsPage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Script by Ionita Andra -->
    <script type="text/javascript" src="http://localhost/AVi-7A-BAM/public/Styles/FiltrationMenu.js"></script>
    <meta lang="en-US">
    <title>Statistics</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(
                <?php
                echo "[";
                echo "['Name', 'Accident'],";
                foreach ($data as $row) {
                    echo "['" . $row['name'] . "'," . $row['accidente'] . "],";
                }
                echo "]";

                ?>);


            var options = {
                title: 'Numbers of accidents in different country in this week:',
                is3D: true,
                height: 500,
                width: 600,
                pieHole: 0.4,
                colors: ['#efe0bb', '#af734a','#3b271d', '#f3b49f', '#f6c7b6']

            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);

        }
    </script>


    <!-- Script finished by Ionita Andra -->
</head>

<body>


    <!-- Done by Minut Mihai Dimitrie -->
    <main class="main-class">
        <form class="filtration-menu-container">
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
                        <label onclick="pickUnpickAllShowItems()" class="pick-columns-item" for="ShowAll" name="showEntryItems">
                            <input type="checkbox" id="ShowAll">
                            <span>All</span>
                        </label>
                        <label for="ShowID" class="pick-columns-item" name="showEntryItems">
                            <input type="checkbox" id="ShowID" class="showCheck">
                            <span>ID</span>
                        </label>
                    </div>
                    <!--Event-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showEventItems')" class="pick-columns-list-title">
                            <p>Event</p>
                        </div>
                        <label for="ShowSource" class="pick-columns-item" name="showEventItems">
                            <input type="checkbox" id="ShowSource" class="showCheck">
                            <span>Source</span>
                        </label>
                        <label for="ShowTMC" class="pick-columns-item" name="showEventItems">
                            <input type="checkbox" id="ShowTMC" class="showCheck">
                            <span>TMC</span>
                        </label>
                        <label for="ShowSeverity" class="pick-columns-item" name="showEventItems">
                            <input type="checkbox" id="ShowSeverity" class="showCheck">
                            <span>Severity</span>
                        </label>
                        <label for="ShowDescription" class="pick-columns-item" name="showEventItems">
                            <input type="checkbox" id="ShowDescription" class="showCheck">
                            <span>Description</span>
                        </label>
                    </div>
                    <!--Time-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showTimeItems')" class="pick-columns-list-title">
                            <p>Time</p>
                        </div>
                        <label for="ShowStartTime" class="pick-columns-item" name="showTimeItems">
                            <input type="checkbox" id="ShowStartTime" class="showCheck">
                            <span>Start Time</span>
                        </label>
                        <label for="ShowEndTime" class="pick-columns-item" name="showTimeItems">
                            <input type="checkbox" id="ShowEndTime" class="showCheck">
                            <span>End Time</span>
                        </label>
                        <label for="ShowSunriseSunset" class="pick-columns-item" name="showTimeItems">
                            <input type="checkbox" id="ShowSunriseSunset" class="showCheck">
                            <span>Sunrise-Sunset</span>
                        </label>
                        <label for="ShowTimeZone" class="pick-columns-item" name="showTimeItems">
                            <input type="checkbox" id="ShowTimeZone" class="showCheck">
                            <span>Time Zone</span>
                        </label>
                    </div>
                    <!--Details Primary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showDetailsPrimaryItems')" class="pick-columns-list-title">
                            <p>Details Primary</p>
                        </div>
                        <label for="ShowTrafficCalming" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowTrafficCalming" class="showCheck">
                            <span>Traffic Calming</span>
                        </label>
                        <label for="ShowRailway" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowRailway" class="showCheck">
                            <span>Railway</span>
                        </label>
                        <label for="ShowStation" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowStation" class="showCheck">
                            <span>Station</span>
                        </label>
                        <label for="ShowAmenity" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowAmenity" class="showCheck">
                            <span>Amenity</span>
                        </label>
                        <label for="ShowCrossing" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowCrossing" class="showCheck">
                            <span>Crossing</span>
                        </label>
                        <label for="ShowStop" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowStop" class="showCheck">
                            <span>Stop</span>
                        </label>
                        <label for="ShowNoExit" class="pick-columns-item" name="showDetailsPrimaryItems">
                            <input type="checkbox" id="ShowNoExit" class="showCheck">
                            <span>No Exit</span>
                        </label>
                    </div>
                    <!--Details Secondary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showDetailsSecondaryItems')" class="pick-columns-list-title">
                            <p>Details Secondary</p>
                        </div>
                        <label for="ShowBump" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowBump" class="showCheck">
                            <span>Bump</span>
                        </label>
                        <label for="ShowTurningLoop" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowTurningLoop" class="showCheck">
                            <span>Turning Loop</span>
                        </label>
                        <label for="ShowJunction" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowJunction" class="showCheck">
                            <span>Junction</span>
                        </label>
                        <label for="ShowGiveWay" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowGiveWay" class="showCheck">
                            <span>Give Way</span>
                        </label>
                        <label for="ShowRoundabout" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowRoundabout" class="showCheck">
                            <span>Roundabout</span>
                        </label>
                        <label for="ShowTrafficSignal" class="pick-columns-item" name="showDetailsSecondaryItems">
                            <input type="checkbox" id="ShowTrafficSignal" class="showCheck">
                            <span>Traffic Signal</span>
                        </label>
                    </div>
                    <!--Location Primary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showLocationPrimaryItems')" class="pick-columns-list-title">
                            <p>Location Primary</p>
                        </div>
                        <label for="ShowState" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowState" class="showCheck">
                            <span>State</span>
                        </label>
                        <label for="ShowCounty" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowCounty" class="showCheck">
                            <span>County</span>
                        </label>
                        <label for="ShowCity" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowCity" class="showCheck">
                            <span>City</span>
                        </label>
                        <label for="ShowZipcode" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowZipcode" class="showCheck">
                            <span>Zipcode</span>
                        </label>
                        <label for="ShowStreetNumber" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowStreetNumber" class="showCheck">
                            <span>Street Number</span>
                        </label>
                        <label for="ShowStreetName" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowStreetName" class="showCheck">
                            <span>Street Name</span>
                        </label>
                        <label for="ShowStreetSide" class="pick-columns-item" name="showLocationPrimaryItems">
                            <input type="checkbox" id="ShowStreetSide" class="showCheck">
                            <span>Street Side</span>
                        </label>
                        <label for="ShowAirportCode" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowAirportCode" class="showCheck">
                            <span>Airport Code</span>
                        </label>

                    </div>
                    <!--Location secondary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showLocationSecondaryItems')" class="pick-columns-list-title">
                            <p>Location Secondary</p>
                        </div>
                        <label for="ShowStartLatitude" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowStartLatitude" class="showCheck">
                            <span>Start Latitude</span>
                        </label>
                        <label for="ShowEndLatitude" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowEndLatitude" class="showCheck">
                            <span>End Latitude</span>
                        </label>
                        <label for="ShowStartLongitude" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowStartLongitude" class="showCheck">
                            <span>Start Longitude</span>
                        </label>
                        <label for="ShowEndLongitude" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowEndLongitude" class="showCheck">
                            <span>End Longitude</span>
                        </label>
                        <label for="ShowDistance" class="pick-columns-item" name="showLocationSecondaryItems">
                            <input type="checkbox" id="ShowDistance" class="showCheck">
                            <span>Distance (miles)</span>
                        </label>
                    </div>
                    <!--Weather Primary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showWeatherPrimaryItems')" class="pick-columns-list-title">
                            <p>Weather Primary</p>
                        </div>
                        <label for="ShowTemperature" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowTemperature" class="showCheck">
                            <span>Temperature (F)</span>
                        </label>
                        <label for="ShowHumidity" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowHumidity" class="showCheck">
                            <span>Humidity (%)</span>
                        </label>
                        <label for="ShowPressure" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowPressure" class="showCheck">
                            <span>Pressure (inches)</span>
                        </label>
                        <label for="ShowPrecipitation" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowPrecipitation" class="showCheck">
                            <span>Precipitation</span>
                        </label>
                        <label for="ShowVisibility" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowVisibility" class="showCheck">
                            <span>Visibility (miles)</span>
                        </label>
                        <label for="ShowWeatherCondition" class="pick-columns-item" name="showWeatherPrimaryItems">
                            <input type="checkbox" id="ShowWeatherCondition" class="showCheck">
                            <span>Weather Condition</span>
                        </label>
                    </div>
                    <!--Weather Secondary-->
                    <div class="pick-columns-list">
                        <div onclick="showHideItems(this,'showWeatherSecondaryItems')" class="pick-columns-list-title">
                            <p>Weather Secondary</p>
                        </div>
                        <label for="ShowWeatherTimestamp" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowWeatherTimestamp" class="showCheck">
                            <span>Weather Timestamp</span>
                        </label>
                        <label for="ShowWindChill" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowWindChill" class="showCheck">
                            <span>Wind Chill</span>
                        </label>
                        <label for="ShowWindDirection" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowWindDirection" class="showCheck">
                            <span>Wind Direction</span>
                        </label>
                        <label for="ShowWindSpeed" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowWindSpeed" class="showCheck">
                            <span>Wind Speed (mph)</span>
                        </label>
                        <label for="ShowNauticalTwilight" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowNauticalTwilight" class="showCheck">
                            <span>Nautical Twilight</span>
                        </label>
                        <label for="ShowCivilTwilight" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowCivilTwilight" class="showCheck">
                            <span>Civil Twilight</span>
                        </label>
                        <label for="ShowAstronomicalTwilight" class="pick-columns-item" name="showWeatherSecondaryItems">
                            <input type="checkbox" id="ShowAstronomicalTwilight" class="showCheck">
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
                        <label for="SearchMaxNumberOfEntries" name="restrictEntryItem" class="pick-restrict-item">Number
                            of Entries (max):
                            <input type="number" id="SearchMaxNumberOfEntries" class="restrictInput">
                        </label>
                        <label for="SearchMinID" name="restrictEntryItem" class="pick-restrict-item">ID (min):
                            <input type="text" id="SearchMinID" class="restrictInput">
                        </label>
                        <label for="SearchMaxID" name="restrictEntryItem" class="pick-restrict-item">ID (max):
                            <input type="text" id="SearchMaxID" class="restrictInput">
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
                                <option value="MapQuest">MapQuest</option>
                                <option value="Bing">Bing</option>
                                <option value="Other">Other</option>
                                <option value="Any">Any</option>
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
                        <label for="SearchDateStartTime" name="restrictTimeItem" class="pick-restrict-item">Started
                            later than the Date:
                            <input type="date" id="SearchDateStartTime" class="restrictInput">
                        </label>
                        <label for="SearchDateEndTime" name="restrictTimeItem" class="pick-restrict-item">Ended earlier
                            than the Date:
                            <input type="date" id="SearchDateEndTime" class="restrictInput">
                        </label>
                        <label for="SearchHourStartTime" name="restrictTimeItem" class="pick-restrict-item">Started
                            later than the Hour:
                            <input type="time" id="SearchHourStartTime" class="restrictInput">
                        </label>
                        <label for="SearchHourEndTime" name="restrictTimeItem" class="pick-restrict-item">Started
                            earlier than the Hour:
                            <input type="time" id="SearchHourEndTime" class="restrictInput">
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
                        <label for="ShowStartMinLatitude" name="restrictLocationSItem" class="pick-restrict-item">Started at minimum Latitude:
                            <input type="number" id="ShowStartMinLatitude" class="restrictInput">
                        </label>
                        <label for="ShowStartMaxLatitude" name="restrictLocationSItem" class="pick-restrict-item">Started at maximum Latitude:
                            <input type="number" id="ShowStartMaxLatitude" class="restrictInput">
                        </label>
                        <label for="ShowStartMinLongitude" name="restrictLocationSItem" class="pick-restrict-item">Started at minimum Longitude:
                            <input type="number" id="ShowStartMinLongitude" class="restrictInput">
                        </label>
                        <label for="ShowStartMaxLongitude" name="restrictLocationSItem" class="pick-restrict-item">Started at maximum Longitude:
                            <input type="number" id="ShowStartMaxLongitude" class="restrictInput">
                        </label>
                        <label for="ShowEndMinLatitude" name="restrictLocationSItem" class="pick-restrict-item">Ended at
                            minimum Latitude:
                            <input type="number" id="ShowEndMinLatitude" class="restrictInput">
                        </label>
                        <label for="ShowEndMaxLatitude" name="restrictLocationSItem" class="pick-restrict-item">Ended at
                            maximum Latitude:
                            <input type="number" id="ShowEndMaxLatitude" class="restrictInput">
                        </label>
                        <label for="ShowEndMinLongitude" name="restrictLocationSItem" class="pick-restrict-item">Ended
                            at minimum Longitude:
                            <input type="number" id="ShowEndMinLongitude" class="restrictInput">
                        </label>
                        <label for="ShowEndMaxLongitude" name="restrictLocationSItem" class="pick-restrict-item">Ended
                            at maximum Longitude:
                            <input type="number" id="ShowEndMaxLongitude" class="restrictInput">
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
                        <label for="SearchNauticalTwilight" name="restrictWeatherSItem" class="pick-restrict-item">Nautical Twilight:
                            <select id="SearchNauticalTwilight" class="restrictInput">
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
            <!--Sorting Division-->
            <div class="pick-sort">
                <label for="SortBy" class="sortby-title">Sort By</label>
                <select id="SortBy" class="sort-select">
                    <option value="ID">ID</option>
                    <option value="Source">Source</option>
                    <option value="TMC">TMC</option>
                    <option value="Severity">Severity</option>
                    <option value="Start Date">Start Date</option>
                    <option value="End Date">End Date</option>
                    <option value="Start Latitude">Start Latitude</option>
                    <option value="Start Longitude">Start Longitude</option>
                    <option value="End Latitude">End Latitude</option>
                    <option value="End Longitude">End Longitude</option>
                    <option value="Distance">Distance</option>
                    <option value="Street Number">Street Number</option>
                    <option value="Street Name">Street Name</option>
                    <option value="Street Side">Street Side</option>
                    <option value="City">City</option>
                    <option value="County">County</option>
                    <option value="State">State</option>
                    <option value="Zipcode">Zipcode</option>
                    <option value="Timezone">Timezone</option>
                    <option value="Airport Code">Airport Code</option>
                    <option value="Temperature">Temperature (F)</option>
                    <option value="Wind Chill">Wind Chill (F)</option>
                    <option value="Humidity">Humidity (%)</option>
                    <option value="Pressure">Pressure (inches)</option>
                    <option value="Visibility">Visibility (miles)</option>
                    <option value="Wind Direction">Wind Direction</option>
                    <option value="Wind Speed">Wind Speed (mph)</option>
                    <option value="Precipitation">Precipitation (inches)</option>
                    <option value="Weather Condition">Weather Condition</option>
                </select>
            </div>
            <!-- Done by Ionita Andra -->
            <div class=selectam>
                <div class="show">
                    <p class="show-title">Format Results</p>
                    <select id="Show" class="show-option">
                        <option value="Map">Map</option>
                        <option value="Table">Table</option>
                        <option value="Text">Text</option>
                        <option value="Chart">Chart</option>

                    </select>
                </div>
                <div class="download">
                    <p class="download-title">Download As</p>
                    <div class="descarcare">
                        <select id="download" class="download-option">
                            <option value="Png">PNG</option>
                            <option value="json">JSON</option>
                            <option value="xml">XML</option>
                            <option value="etc">ETC..</option>

                        </select>
                        <div class="download-button">
                            <input type="submit" value="Download" class="download-commit-button">
                        </div>

                    </div>
                </div>
            </div>
            <!--Submit Button-->

            <div class="pick-button">
                <button type="submit" value="Search" class="filtration-submit-button">Search</button>
            </div>


            <div class="pick-button">
            <button type="button" class="filtration-submit-button" data-toggle="modal" data-target="#myModal">View Data</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div id="piechart"></div>
                    </div>

                </div>
            </div>

            <!-- Finished Section Done By Ionita Andra Paula -->
        </form>
        <!--Section Done By Minut Mihai Dimitrie -->
        <div class="result">
            <table class="result-table">
                <thead class="result-table-head">
                    <tr>
                        <th class="result-table-head-element">ID</th>
                        <th class="result-table-head-element">Camp1</th>
                        <th class="result-table-head-element">Camp2</th>
                        <th class="result-table-head-element">Camp3</th>
                        <th class="result-table-head-element">Camp4</th>
                        <th class="result-table-head-element">Camp5</th>
                        <th class="result-table-head-element">Camp6</th>
                        <th class="result-table-head-element">Camp7</th>
                        <th class="result-table-head-element">Camp8</th>
                        <th class="result-table-head-element">Camp9</th>
                        <th class="result-table-head-element">Camp10</th>
                        <th class="result-table-head-element">Camp11</th>
                        <th class="result-table-head-element">Camp12</th>
                        <th class="result-table-head-element">Camp13</th>
                        <th class="result-table-head-element">Camp14</th>
                        <th class="result-table-head-element">Camp15</th>
                    </tr>
                </thead>
                <tbody class="result-table-body">
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                    <tr>
                        <td class="result-table-row-cell">info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more infoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td class="result-table-row-cell">A lot more info</td>
                        <td class="result-table-row-cell">A lot more info</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- by Ionita Andra -->
        <!--  <div id="myModal" class="modal">

            <!-- Modal content 
            <div class="modal-content">
                <span class="close">&times;</span>
                <div id="piechart"></div>
            </div>

        </div>
                        -->


        <!-- finished by Ionita Andra -->



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


</body>
<!-- Done by Cretu Bogdan Antonio -->
<nav class="navbar">
    <!--https://fontawesome.com/icons?d=gallery&m=free    Folosit pentru SVG-uri -->
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

            <div class="nav-link" onclick="document.location.href='http://localhost/AVi-7A-BAM/public/SignIn'">
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