import React from "react";

const CardInfoWindow = () => {
	return (
		<div className="w-100">
			<div
				className="d-flex p-2"
				style={{
					justifyContent: "space-between",
					alignItems: "center",
				}}
			>
				<label htmlFor="">
					<strong>Name</strong>
				</label>
				<label htmlFor="">value</label>
			</div>
		</div>
	);
};

export default CardInfoWindow;
