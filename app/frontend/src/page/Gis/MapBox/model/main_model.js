import axios from "axios";

export const model__getData = () => {
	const getdata = axios.get(`${API}main/geojson`).catch((err) => {
		console.log(err.reponse);
	});
	return getdata;
};

export const model__getDatapekanbaru = async (response) => {
	const getdata = await axios.get(`${API}polygon/pku`).catch((err) => {
		console.log(err.reponse);
	});
	response(getdata);
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
	{
		name: "Pendidikan",
		label: "Pendidikan",
		model: async () => await model__getByEthnicity("industri"),
	},
	{
		name: "Tempat Ibadah",
		label: "Tempat Ibadah",
		model: async () => await model__getByEthnicity("industri"),
	},
	{
		name: "Penginapan",
		label: "Penginapan",
		model: async () => await model__getByEthnicity("industri"),
	},
	{
		name: "Fasilitas Kesehatan",
		label: "Fasilitas Kesehatan",
		model: async () => await model__getByEthnicity("industri"),
	},
	{
		name: "Pariwisata",
		label: "Pariwisata",
		model: async () => await model__getByEthnicity("industri"),
	},
	{
		name: "Bank",
		label: "Bank",
		model: async () => await model__getByEthnicity("industri"),
	},
	{
		name: "Spbu",
		label: "Spbu",
		model: async () => await model__getByEthnicity("industri"),
	},
];

export const getInfoGrafis = (kode) => {
	const getdata = axios
		.get(`${API}polygon/getByKode?kode=${kode}`)
		.catch((err) => {
			console.log(err.reponse);
		});
	return getdata;
};
