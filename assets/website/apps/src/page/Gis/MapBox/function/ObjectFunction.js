export function buildingDataDetail(data) {
	return [
		{
			label: ("NAMA " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.nama_industri ?? "-"}`,
		},
		{
			label: ("Jenis " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.dataSektor ?? "-"}`,
		},
		{
			label: ("Kategori " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.pic_category_name ?? "-"}`,
		},
		{
			label: ("Tipe " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.pic_industry_type_name ?? "-"}`,
		},
		{
			label: ("Sektor Utama " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.nama_sektor_utama_industri ?? "-"}`,
		},
		{
			label: ("Sub Sektor " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.nama_subsektor_industri ?? "-"}`,
		},
		{
			label: ("Nama Pemilik " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.nama_pemilik_industri ?? "-"}`,
		},
		{
			label: ("Perizinan " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.perizinan_industri ?? "-"}`,
		},
		{
			label: "Besar Model "?.toUpperCase() ?? "",
			value: `${data?.besar_modal_industri ?? "-"}`,
		},
		{
			label: ("Alamat " + data?.dataSektor ?? "")?.toUpperCase() ?? "",
			value: `${data?.alamat_industri ?? "-"}`,
		},
		{
			label: ("Kordinat" ?? "")?.toUpperCase() ?? "",
			value: `${data?.latitude ?? "-"},${data?.longitude ?? "-"}`,
		},
		{
			label: "Telepon "?.toUpperCase() ?? "",
			value: `${data?.telp_pemilik_industri ?? ""}`,
		},
	];
}
