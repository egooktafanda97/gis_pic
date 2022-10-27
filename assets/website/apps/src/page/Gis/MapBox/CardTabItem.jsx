import React, { useRef, useEffect, useState } from "react";
import "./CardTabItem.scss";

export default function CardTabItem(props) {
	const [data, setData] = useState({});
	useEffect(() => {
		if (props.data != undefined && props.data != "") {
			setData(props.data);
		}
	}, [props.data]);
	return (
		<div className="cardItem-container">
			<div className="tabs">
				{console.log(data)}
				<ul className="tabs__list">
					<li className="tabs__item tabs__item--active">
						<a>
							<div
								className="w-100"
								style={{
									display: "flex",
									justifyContent: "center",
									alignItems: "center",
								}}
							>
								<strong>{data?.dataSektor ?? ""}</strong>
							</div>
						</a>
					</li>
				</ul>
				<div className="tabs__content">
					<div className="mb-2">
						<table className="table table-bordered">
							<thead>
								<tr>
									<th scope="col">Nama {data?.dataSektor ?? ""}</th>
									<td scope="col">{data?.nama_industri ?? ""}</td>
								</tr>
								<tr>
									<th scope="col">Jenis {data?.dataSektor ?? ""}</th>
									<td scope="col">{data?.dataSektor ?? ""}</td>
								</tr>
								<tr>
									<th scope="col">Kategori {data?.dataSektor ?? ""}</th>
									<td scope="col">{data?.pic_category_name ?? ""}</td>
								</tr>
								<tr>
									<th scope="col">Tipe {data?.dataSektor ?? ""}</th>
									<td scope="col">{data?.pic_industry_type_name ?? ""}</td>
								</tr>
								<tr>
									<th scope="col">Sektor {data?.dataSektor ?? ""}</th>
									<td scope="col">{data?.nama_sektor_utama_industri ?? ""}</td>
								</tr>
								<tr>
									<th scope="col">Sub Sektor {data?.dataSektor ?? ""}</th>
									<td scope="col">{data?.nama_subsektor_industri ?? ""}</td>
								</tr>
								<tr>
									<th scope="col">Nama Pemilik {data?.dataSektor ?? ""}</th>
									<td scope="col">{data?.nama_pemilik_industri ?? ""}</td>
								</tr>
								<tr>
									<th scope="col">Perizinan {data?.dataSektor ?? ""}</th>
									<td scope="col">{data?.perizinan_industri ?? ""}</td>
								</tr>
								<tr>
									<th scope="col">
										besar_modal_industri {data?.dataSektor ?? ""}
									</th>
									<td scope="col">{data?.besar_modal_industri ?? ""}</td>
								</tr>
								<tr>
									<th scope="col">Amalat {data?.dataSektor ?? ""}</th>
									<td scope="col">{data?.alamat_industri ?? ""}</td>
								</tr>
								<tr>
									<th scope="col">No Telepon Pemilik</th>
									<td scope="col">{data?.telp_pemilik_industri ?? ""}</td>
								</tr>
							</thead>
						</table>
					</div>

					{/* <div
						className="tabs__inner-content tabs__inner-content--active"
						id="tab1"
					>
						<h1>Tabs design and animation</h1>
						<p>
							This is an example of how a tab bar can interact and be animated
							by EricaIsNenya.
						</p>
						<p>
							Check out her amazing works and be inspired at{" "}
							<a href="http://ericasalvetti.com">http://ericasalvetti.com</a>
						</p>
					</div> */}
				</div>
			</div>
		</div>
	);
}
