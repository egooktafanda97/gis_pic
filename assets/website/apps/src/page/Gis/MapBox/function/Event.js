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
	};
	return e;
}
