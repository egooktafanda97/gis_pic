import React from "react";
import { HashRouter, Router, Route, Link, Switch } from "react-router-dom";

export default function layout(props) {
	return (
		<main className="main" id="top">
			<nav
				className="navbar navbar-expand-lg navbar-light fixed-top py-4 d-block"
				data-navbar-on-scroll="data-navbar-on-scroll"
			>
				<div className="container">
					<a className="navbar-brand" href="index.html">
						<img
							src={`${window.web_public}img/logo/logo.png`}
							height={24}
							alt="..."
						/>
					</a>
					<button
						className="navbar-toggler"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent"
						aria-expanded="false"
						aria-label="Toggle navigation"
					>
						<span className="navbar-toggler-icon"> </span>
					</button>
					<div
						className="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0"
						id="navbarSupportedContent"
					>
						<ul className="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
							<li className="nav-item px-2" data-anchor="data-anchor">
								<a
									className="nav-link fw-medium active"
									aria-current="page"
									href="#home"
								>
									Home
								</a>
							</li>
							<li className="nav-item px-2" data-anchor="data-anchor">
								<Link to={`/gis`} className="nav-link" activeClassName="active">
									Gis
								</Link>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			{props.children}
		</main>
	);
}
