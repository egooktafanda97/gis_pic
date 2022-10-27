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
						<a>{data?.dataSektor ?? ""}</a>
					</li>
				</ul>
				<div className="tabs__content">
					<div className="mb-2">
						<table className="table table-bordered">
							<thead>
								<tr>
									<th scope="col">Nama Industri</th>
									<th scope="col">{data?.nama_industri ?? ""}</th>
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
