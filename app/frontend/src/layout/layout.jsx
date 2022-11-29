import React, { useEffect, useState } from "react";
import { useHistory } from "react-router-dom";

const Layout = (props) => {
	let history = useHistory();
	useEffect(() => {
		$(document).ready(function () {
			var window_width = $(window).width(),
				window_height = window.innerHeight,
				header_height = $(".default-header").height(),
				header_height_static = $(".site-header.static").outerHeight(),
				fitscreen = window_height - header_height;

			// $(".fullscreen").css("height", window_height)
			// $(".fitscreen").css("height", fitscreen);

			//-------- Active Sticky Js ----------//
			$(".default-header").sticky({
				topSpacing: 0,
			});

			if (document.getElementById("default-select")) {
				$("select").niceSelect();
			}

			/*----------------------------------------------------*/
			/*  Magnific Pop up js (Home Video)
			/*----------------------------------------------------*/
			$("#play-home-video").magnificPopup({
				type: "iframe",
				mainClass: "mfp-fade",
				removalDelay: 160,
				preloader: false,
				fixedContentPos: false,
			});

			$(".img-pop-up").magnificPopup({
				type: "image",
				gallery: {
					enabled: true,
				},
			});

			// $('.navbar-nav>li>a').on('click', function(){
			//     $('.navbar-collapse').collapse('hide');
			// });
			$(".active-testimonial").owlCarousel({
				items: 3,
				margin: 30,
				// autoplay: true,
				loop: true,
				dots: true,
				responsive: {
					0: {
						items: 1,
					},
					480: {
						items: 1,
					},
					991: {
						items: 2,
					},
					1200: {
						items: 3,
					},
				},
			});

			$(".active-brand-carusel").owlCarousel({
				items: 5,
				loop: true,
				margin: 30,
				autoplayHoverPause: true,
				smartSpeed: 650,
				autoplay: true,
				responsive: {
					0: {
						items: 1,
					},
					480: {
						items: 2,
					},
					768: {
						items: 4,
					},
					768: {
						items: 5,
					},
				},
			});

			//------- Filter  js --------//
			$(window).on("load", function () {
				$(".filters ul li").on("click", function () {
					$(".filters ul li").removeClass("active");
					$(this).addClass("active");

					var data = $(this).attr("data-filter");
					$grid.isotope({
						filter: data,
					});
				});

				if (document.getElementById("project")) {
					var $grid = $(".grid").isotope({
						itemSelector: ".grid-item",
						percentPosition: true,
						masonry: {
							columnWidth: ".grid-sizer",
						},
					});
				}
			});

			// Select all links with hashes
			$('.navbar-nav a[href*="#"]')
				// Remove links that don't actually link to anything
				.not('[href="#"]')
				.not('[href="#0"]')
				.on("click", function (event) {
					// On-page links
					if (
						location.pathname.replace(/^\//, "") ==
							this.pathname.replace(/^\//, "") &&
						location.hostname == this.hostname
					) {
						// Figure out element to scroll to
						var target = $(this.hash);
						target = target.length
							? target
							: $("[name=" + this.hash.slice(1) + "]");
						// Does a scroll target exist?
						if (target.length) {
							// Only prevent default if animation is actually gonna happen
							event.preventDefault();
							$("html, body").animate(
								{
									scrollTop: target.offset().top - 50,
								},
								1000,
								function () {
									// Callback after animation
									// Must change focus!
									var $target = $(target);
									$target.focus();
									if ($target.is(":focus")) {
										// Checking if the target was focused
										return false;
									} else {
										$target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
										$target.focus(); // Set focus again
									}
								}
							);
						}
					}
				});

			// -------   Mail Send ajax

			$("select").niceSelect();

			$(document).ready(function () {
				$("#mc_embed_signup").find("form").ajaxChimp();
			});
		});
	});
	return (
		<>
			{/* Start Header Area */}
			<header className="default-header">
				<nav className="navbar navbar-expand-lg navbar-light">
					<div className="container">
						<a className="navbar-brand" href="index.html">
							<img src="img/logo.png" alt style={{ height: 20 }} />
						</a>
						<button
							className="navbar-toggler"
							type="button"
							data-toggle="collapse"
							data-target="#navbarSupportedContent"
							aria-controls="navbarSupportedContent"
							aria-expanded="false"
							aria-label="Toggle navigation"
						>
							<span className="fa fa-bars" />
						</button>
						<div
							className="collapse navbar-collapse justify-content-end align-items-center"
							id="navbarSupportedContent"
						>
							<ul className="navbar-nav">
								<li>
									<a className="active" href="index.html">
										Home
									</a>
								</li>
								<li>
									<a href={`${BASE_URL}website/gis`}>Peta</a>
								</li>
								<li>
									<a href={`${BASE_URL}website/master_data`}>Master Data</a>
								</li>
								<li>
									<a href="services.html">Tentang</a>
								</li>
								{/* <li class="dropdown">
                                    <a
                                        class="dropdown-toggle"
                                        href="#"
                                        id="navbardrop"
                                        data-toggle="dropdown">
                                        Pages
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="projects.html">Projects</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                    </div>
                                    </li> */}
								<li>
									<a href="contact.html">Kontak</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
			{/* End Header Area */}
			{props.children}
			{/* start footer Area */}
			<footer className="footer-area section-gap">
				<div className="container">
					<div className="row footer-bottom d-flex justify-content-between">
						<p className="col-lg-8 col-sm-12 footer-text m-0 text-white">
							{/* Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. */}
							Copyright ©
							{/* All rights reserved | This template is made with */}
							<i className="fa fa-heart-o" aria-hidden="true" />
							{/* by */}
							<a href="https://colorlib.com" target="_blank">
								{/* Colorlib */}
							</a>
							{/* Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. */}
						</p>
						<div className="col-lg-4 col-sm-12 footer-social">
							<a href="#">
								<i className="fa fa-facebook-f" />
							</a>
							<a href="#">
								<i className="fa fa-twitter" />
							</a>
							<a href="#">
								<i className="fa fa-dribbble" />
							</a>
							<a href="#">
								<i className="fa fa-linkedin" />
							</a>
						</div>
					</div>
				</div>
			</footer>
			{/* End footer Area */}
		</>
	);
};

export default Layout;
