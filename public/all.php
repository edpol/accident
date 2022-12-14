<!DOCTYPE html>
<html lang="en">
<head>
    <?php $country = "canada" ?>
    <title><?= ucfirst($country)."!" ?></title>
    <meta charset="utf-8">
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="http://d3js.org/topojson.v1.min.js"></script>
    <script src="https://rawgit.com/Anujarya300/bubble_maps/master/data/geography-data/datamaps.none.js"></script>
</head>
<body>
<div id="<?= $country ?>" style="height: 600px; width: 900px;"></div>
<script>
    let country = "<?= $country ?>";
    let bubble_map = new Datamap({
        element: document.getElementById(country),
        responsive: true,
        scope: country,
        geographyConfig: {
            popupOnHover: true,
            highlightOnHover: true,
            borderColor: '#444',
            borderWidth: 0.5,
            dataUrl: 'http://accident.test/datamaps/' + country + '.topo.json'
            //dataUrl: 'https://rawgit.com/Anujarya300/bubble_maps/master/data/geography-data/' + country + '.topo.json'
            //dataJson: topoJsonData
        },
        fills: {
            'MAJOR': '#306596',
            'MEDIUM': '#0fa0fa',
            'MINOR': '#bada55',
            defaultFill: '#dddddd'
        },
        data: {
            'JH': { fillKey: 'MINOR' },
            'MH': { fillKey: 'MINOR' }
        },
        setProjection: function (element) {
            var projection = d3.geo.mercator()
                .center([-106.3468, 68.1304]) // always in [East Latitude, North Longitude]
                .scale(250)
                .translate([element.offsetWidth / 2, element.offsetHeight / 2]);

            var path = d3.geo.path().projection(projection);
            return { path: path, projection: projection };
        }
    });

    // Alternatively with d3
    d3.select(window).on('resize', function() {
        map.resize();
    });

    let bubbles = [
        {
            centered: "MB",
            fillKey: "MAJOR",
            radius: 20,
            state: "Manitoba"
        },
        {
            centered: "AB",
            fillKey: "MAJOR",
            radius: 22,
            state: "Alberta"
        },
        {
            centered: "NT",
            fillKey: "MAJOR",
            radius: 40,
            state: "Northwest Territories"
        },
        {
            centered: "NU",
            fillKey: "MEDIUM",
            radius: 60,
            state: "Nunavut"
        },
        {
            centered: "BC   ",
            fillKey: "MEDIUM",
            radius: 15,
            state: "British Columbia"
        },
        {
            centered: "QC",
            fillKey: "MINOR",
            radius: 8,
            state: "Qu??bec"
        },
        {
            centered: "NB",
            fillKey: "MINOR",
            radius: 50,
            state: "New Brunswick"
        }

    ]
    // // ISO ID code for city or <state></state>
    setTimeout(() => { // only start drawing bubbles on the map when map has rendered completely.
        bubble_map.bubbles(bubbles, {
            popupTemplate: function (geo, data) {
                return `<div class="hoverinfo">city: ${data.state}, Slums: ${data.radius}%</div>`;
            }
        });
    }, 1000);
</script>
</body>

</html>
