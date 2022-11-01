export default function Event(maps) {
	const map = maps;
	const e = {
		mouseenter: (layer) => {
			map.on("mouseenter", layer, () => {
				map.getCanvas().style.cursor = "pointer";
			});
		},
		mouseleave: (layer) => {
			map.on("mouseleave", layer, () => {
				map.getCanvas().style.cursor = "";
			});
		},
		mapMode: (layerId, StyleLoad) => {
			map.setStyle("mapbox://styles/mapbox/" + layerId);
			map.on("style.load", async function () {
				await StyleLoad(map);
			});
		},
	};
	return e;
}
