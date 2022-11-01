import React, { useEffect } from "react";
import { useHistory } from "react-router-dom";

import "./css/style.scss";
import Layout from "../../layout/layout";

import Display_chart from "./function/_display_chart";

import { FaMap } from "react-icons/fa";

import useScreenType from "react-screentype-hook";

export default function Index() {
	let history = useHistory();
	const screenType = useScreenType();
	useEffect(() => {
		console.log(screenType);
	});
	return (
		<Layout>
			<section id="home">
				<div className="bg-holder">
					<div></div>
				</div>
				<div className="container">
					<div className="row align-items-center min-vh-50 min-vh-sm-75">
						<div className="col-md-5 col-lg-6 order-0 order-md-1">
							{/* <img
								className="w-100"
								src={`${window.web_public}img/pku.png`}
								alt="..."
							/> */}
							<Display_chart />
						</div>
						<div className="col-md-7 col-lg-6 text-md-start text-center">
							<h1 className="text-light fs-md-5 fs-lg-6 home-title">
								PEKANBARU INVESTMENT CENTER
							</h1>
							<p className="text-light">MENGAPA BERINVERSTASI DI PEKANBARU</p>
							{/* <div class="button second bg-active">
								<div class="border"></div>
								<h1>INVESTMENT</h1>
							</div> */}
						</div>
					</div>

					<div className="bg-overlay"></div>
					<video
						className="fullscreen-video"
						id="myVideo"
						autoPlay="autoplay"
						muted
						loop
					>
						<source
							src={`${window.web_public}assets/video/KotaPekanbaru.mp4`}
						/>
						Your browser does not support the video tag.
					</video>
					<div className="container-menu">
						<div class="button second" onClick={() => history.push("/gis")}>
							<div class="border"></div>
							<h1>
								{screenType.isMobile ? (
									<FaMap />
								) : (
									<>
										<FaMap /> PETA
									</>
								)}
							</h1>
						</div>
						<div class="button second">
							<div class="border"></div>
							<h1>MASTER DATA</h1>
						</div>
						{/* <div class="button second">
							<div class="border"></div>
							<h1>STATISTIK</h1>
						</div> */}
					</div>
				</div>
			</section>
			{/* <section className="pt-8">
				<div className="container">
					<div className="row">
						<div className="col-lg-6 col-xxl-5 text-center mx-auto">
							<h2>What will you get if you'll join us</h2>
							<p className="mb-4">
								Get the best web hosting service at the price you can afford
							</p>
						</div>
					</div>
					<div className="row align-items-center mt-5">
						<div className="col-md-5 col-lg-6 order-md-1 order-0">
							<img className="w-100" src="assets/img/gallery/join-us.png" alt />
						</div>
						<div className="col-md-7 col-lg-6 pe-lg-4 pe-xl-7">
							<div className="d-flex align-items-start">
								<img
									className="me-4"
									src={`${window.web_public}assets/img/icons/give-a-care.png`}
									alt
									width={30}
								/>
								<div className="flex-1">
									<h5>WE GIVE A CARE </h5>
									<p className="text-muted mb-4">
										Beside the support we provide you with various tools to be
										able to host and manage your websites
									</p>
								</div>
							</div>
							<div className="d-flex align-items-start">
								<img
									className="me-4"
									src={`${window.web_public}assets/img/icons/tweak-as-you.png`}
									alt
									width={30}
								/>
								<div className="flex-1">
									<h5>TWEAK AS YOU WISH</h5>
									<p className="text-muted mb-4">
										Be able to customize your plan over time if needed so you
										pay only for what you use
									</p>
								</div>
							</div>
							<div className="d-flex align-items-start">
								<img
									className="me-4"
									src={`${window.web_public}assets/img/icons/security.png`}
									width={30}
									alt="..."
								/>
								<div className="flex-1">
									<h5>SECURITY AT ITS BEST</h5>
									<p>
										We are the most reliable service provider, ready to give you
										a helping hand the fastest way possible 24/7
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> */}
		</Layout>
	);
}
