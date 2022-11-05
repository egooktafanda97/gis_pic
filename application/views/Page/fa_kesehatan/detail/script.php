<!-- mapbox -------------------------------->
<script>
    <?php if (!empty($val['latitude']) && !empty($setting)) : ?>
        mapboxgl.accessToken = "pk.eyJ1IjoiZWdvb2t0YWZhbmRhOTciLCJhIjoiY2pyN2tobWJuMGZpaDN5cXE3NTdydm8zbiJ9.iLZFxTrH353ju9RuZzX5Jw";
        const koordinat = [parseFloat("<?= $val['longitude'] ?? 0 ?>"), parseFloat("<?= $val['latitude'] ?? 0 ?>")];
        const map = new mapboxgl.Map({
            container: 'maps', // container ID
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/satellite-v9', // style URL
            center: koordinat, // starting position [lng, lat]
            zoom: 11 // starting zoom
        });

        const layerList = document.getElementById('menu');
        const inputs = layerList.getElementsByTagName('input');

        for (const input of inputs) {
            input.onclick = (layer) => {
                map.setZoom(11);
                const layerId = layer.target.id;
                map.setStyle('mapbox://styles/mapbox/' + layerId);
                map.on("style.load", async function() {
                    await LayerIcon();
                });
            };
        }

        function LayerIcon() {

            // Add an image to use as a custom marker
            map.loadImage("<?= base_url($setting['config_value']) ?>",
                (error, image) => {
                    if (error) throw error;
                    map.addImage('custom-marker', image);
                    // Add a GeoJSON source with 2 points
                    map.addSource('points', {
                        'type': 'geojson',
                        'data': {
                            'type': 'FeatureCollection',
                            'features': [{
                                // feature for Mapbox DC
                                'type': 'Feature',
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': koordinat
                                },
                                'properties': {
                                    'title': ''
                                }
                            }, ]
                        }
                    });

                    // Add a symbol layer
                    map.addLayer({
                        'id': 'points',
                        'type': 'symbol',
                        'source': 'points',
                        'layout': {
                            'icon-image': 'custom-marker',
                            // get the title name from the source's "title" property
                            'text-field': ['get', 'title'],
                            "icon-size": {
                                base: 1.75,
                                stops: [
                                    [14, 0.5]
                                ],
                            },
                            // get the title name from the source's "title" property
                            "text-field": ["get", "title"],
                            "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
                            "text-offset": [0, 1.25],
                            "text-anchor": "top",
                        }
                    });
                }

            );
            const zoom_var = map.getZoom();
            let Z = 15;
            map.flyTo({
                center: koordinat,
                zoom: Z,
            });
        }
        // layer ==========
        map.on('load', async () => {
            LayerIcon()
        });
    <?php endif ?>
</script>
<!-- ------------------------------------ -->