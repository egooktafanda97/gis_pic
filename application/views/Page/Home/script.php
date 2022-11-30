<!-- data tables -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.2.0/axios.min.js"></script>
<script>
    $(document).ready(function() {
        $("#example").DataTable({
            responsive: {
                details: {
                    type: "column",
                    target: "tr",
                },
            },
            columnDefs: [{
                className: "control",
                orderable: false,
                targets: 0,
            }, ],
            paging: false,
            ordering: false,
            info: false,
            "searching": false
        });
    });
</script>
<script>
    (async function() {
        const getData = await axios.get("<?= base_url("app/api/main/getDataMaster") ?>").catch((err) => {
            console.log(err.response);
        });
        if (getData) {
            const label_key = [];
            const values = [];
            let jml = 0;
            Object.keys(getData).forEach(function(key) {
                label_key.push(key.replace(/_/g, " "));
                values.push(getData[key].length);
                jml++;
            });
            $(".pic").html(jml);

            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label_key,
                    datasets: [{
                        label: 'data pic',
                        data: values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    })();

    (async function() {
        const getData_state = await axios.get("<?= base_url("app/api/polygon/pku") ?>").catch((err) => {
            console.log(err.response);
        });
        if (getData_state) {
            mapboxgl.accessToken = 'pk.eyJ1IjoiZWdvb2t0YWZhbmRhOTciLCJhIjoiY2pyN2tobWJuMGZpaDN5cXE3NTdydm8zbiJ9.iLZFxTrH353ju9RuZzX5Jw';
            const map = new mapboxgl.Map({
                container: 'map', // container ID
                // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                style: 'mapbox://styles/mapbox/light-v11', // style URL
                center: [101.4451276040001, 0.532236798000042], // starting position
                zoom: 9 // starting zoom
            });

            map.on('load', () => {
                // Add a data source containing GeoJSON data.
                map.addSource('maine', {
                    'type': 'geojson',
                    'data': getData_state
                });

                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'maine',
                    'type': 'fill',
                    'source': 'maine', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-color': '#0080ff', // blue color fill
                        'fill-opacity': 0.1
                    }
                });
                // Add a black outline around the polygon.
                map.addLayer({
                    'id': 'outline',
                    'type': 'line',
                    'source': 'maine',
                    'layout': {},
                    'paint': {
                        'line-color': 'red',
                        'line-width': 1
                    }
                });
            });
            const getData_circle = await axios.get("<?= base_url("app/api/main/geojson") ?>").catch((err) => {
                console.log(err.response);
            });


            const colors = [
                "#1e81b0",
                "#e28743",
                "#eab676",
                "#76b5c5",
                "#21130d",
                "#873e23",
                "#abdbe3",
                "#063970",
                "#154c79",
            ];
            const GenerateColorCircle = (arrObj, items) => {
                var g = arrObj.map((_, i) => {
                    return {
                        item: _,
                        color: colors[i],
                        data: items[_],
                    };
                });
                return g;
            };
            if (getData_circle) {
                const geometri = getData_circle?.geoJson;
                const jumlhItem = getData_circle?.item;
                const marker = getData_circle?.marker;
                var ItemKey = Object.keys(jumlhItem);
                const configureItem = GenerateColorCircle(ItemKey, jumlhItem);


                const CircleMarker = (geoJson, circleColors) => {
                    const arr = ["match", ["get", "ethnicity"]];
                    circleColors.map((x) => {
                        arr.push(x?.item);
                        arr.push(x?.color);
                    });
                    arr.push("#000");
                    map.addSource("marker_data", {
                        type: "geojson",
                        data: geoJson,
                    });
                    const mode_circle_radius_config = {
                        mode_1: {
                            property: "sqrt",
                            stops: [
                                [{
                                    zoom: 8,
                                    value: 250
                                }, 10],
                                // [{ zoom: 8, value: 250 }, 0],
                                [{
                                    zoom: 11,
                                    value: 250
                                }, 20],
                                // [{ zoom: 11, value: 250 }, 20],
                                [{
                                    zoom: 15,
                                    value: 250
                                }, 0],
                                [{
                                    zoom: 20,
                                    value: 0
                                }, 0],
                            ],
                        },
                        mode_2: {
                            base: 50,
                            stops: [
                                [12, 3],
                                [40, 180],
                            ],
                        },
                    };
                    map.addLayer({
                        id: "circle",
                        type: "circle",
                        source: "marker_data",
                        layout: {
                            // Make the layer visible by default.
                            visibility: "visible",
                        },
                        paint: {
                            "circle-radius-transition": {
                                duration: 300
                            },
                            "circle-color": "#F98200",
                            "circle-stroke-color": "#595655",
                            "circle-stroke-opacity": 0.5,
                            "circle-radius": mode_circle_radius_config.mode_2,
                            "circle-color": arr,
                        },
                    });
                }
                CircleMarker(getData_circle?.geoJson, configureItem);



                function createTable(data, selection) {
                    var heed = ``;
                    var bd = ``;

                    var no = 1;
                    data?.map((res, i) => {

                        if (selection == res?.properties?.ethnicity) {
                            var __data = `<tr>`;
                            __data += `<td scope="col">${no}</td>`
                            res?.properties?.data?.map((izz, X) => {
                                if (no == 1) {
                                    heed += `<th scope="col">${izz?.label?.toUpperCase()}</th>`;
                                }
                                __data += `<td scope="col">${izz?.value}</td>`;
                            })
                            __data += `<td scope="col" class="text-center">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
                                            </td></tr>`;
                            bd += __data;
                            no++;
                        }

                    });


                    var headers = `<thead>
                                        <tr>
                                        <th scope="col">No</th>
                                            ${heed}
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>`;
                    var footers = `<tfoot>
                                        <tr>
                                        <th scope="col">No</th>
                                            ${heed}
                                            <th scope="col">#</th>
                                        </tr>
                                    </tfoot>`;

                    var tBody = `<tbody>
                                    ${bd}
                                </tbody>`;

                    return headers + footers + bd;

                }
                if ($("#filter-pic").val() == 'industri') {
                    var results = createTable(getData_circle?.geoJson?.features, $("#filter-pic").val());
                    $(".tbl").html(results)
                }


                $("#filter-pic").change(function() {
                    var results = createTable(getData_circle?.geoJson?.features, $(this).val());
                    $(".tbl").html(results)
                    // console.log(getData_circle?.geoJson?.features)

                })


            }

        }
    })();
</script>