import axios from "axios";

export const model__getData = () => {
	const getdata = axios.get(`${API}main/geojson`).catch((err) => {
		console.log(err.reponse);
	});
	return getdata;
};

export const model__getByEthnicity = (ethnicity) => {
	const getdata = axios.get(`${API}main/geojson/${ethnicity}`).catch((err) => {
		console.log(err.reponse);
	});
	return getdata;
};

export const package_data_active = [
	{
		name: "Industri",
		label: "Industri",
		model: async () => await model__getByEthnicity("industri"),
	},
];
