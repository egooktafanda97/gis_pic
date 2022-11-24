<script>
    async function BuidPolygon() {
        const getdata = await axios.get(`<?= base_url("Kecamatan/getGeoJsonKecamatan/" . $kode) ?>`).catch();
        if (getdata) {
            mapboxgl.accessToken = 'pk.eyJ1IjoiZWdvb2t0YWZhbmRhOTciLCJhIjoiY2pyN2tobWJuMGZpaDN5cXE3NTdydm8zbiJ9.iLZFxTrH353ju9RuZzX5Jw';
            const map = new mapboxgl.Map({
                container: 'maps', // container ID
                // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                style: 'mapbox://styles/mapbox/satellite-v9', // style URL
                center: [101.40961362620378, 0.5354291269396995], // starting position
                zoom: 10 // starting zoom
            });

            map.on('load', () => {
                map.addSource('maine', {
                    'type': 'geojson',
                    'data': getdata?.data ?? "{}"
                });

                // Add a new layer to visualize the polygon.
                map.addLayer({
                    'id': 'maine',
                    'type': 'fill',
                    'source': 'maine', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-color': '#0080ff', // blue color fill
                        'fill-opacity': 0.2
                    }
                });
                // Add a black outline around the polygon.
                map.addLayer({
                    'id': 'outline',
                    'type': 'line',
                    'source': 'maine',
                    'layout': {},
                    'paint': {
                        'line-color': '#000',
                        'line-width': 1
                    }
                });
            });
            const layerList = document.getElementById('menu');
            const inputs = layerList.getElementsByTagName('input');
            for (const input of inputs) {
                input.onclick = (layer) => {
                    map.setZoom(11);
                    const layerId = layer.target.id;
                    map.setStyle('mapbox://styles/mapbox/' + layerId);
                    map.on("style.load", function() {
                        map.addSource('maine', {
                            'type': 'geojson',
                            'data': getdata?.data ?? "{}"
                        });

                        // Add a new layer to visualize the polygon.
                        map.addLayer({
                            'id': 'maine',
                            'type': 'fill',
                            'source': 'maine', // reference the data source
                            'layout': {},
                            'paint': {
                                'fill-color': '#0080ff', // blue color fill
                                'fill-opacity': 0.5
                            }
                        });
                        // Add a black outline around the polygon.
                        map.addLayer({
                            'id': 'outline',
                            'type': 'line',
                            'source': 'maine',
                            'layout': {},
                            'paint': {
                                'line-color': '#000',
                                'line-width': 1
                            }
                        });
                    });
                };
            }
        }
    }
    BuidPolygon();
</script>