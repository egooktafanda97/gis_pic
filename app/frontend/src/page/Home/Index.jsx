import React, { useEffect, useState } from "react";
import { Parallax, Background } from "react-parallax";
import { useHistory } from "react-router-dom";

import Layout from "../../layout/layout";

import Display_chart from "./function/_display_chart";

import { FaMap } from "react-icons/fa";

import useScreenType from "react-screentype-hook";

export default function Index() {
	const [imgData, setImgData] = useState(null);
	useEffect(() => {
		!(function (t, i, e, s) {
			function o(i, e) {
				var h = this;
				"object" == typeof e &&
					(delete e.refresh, delete e.render, t.extend(this, e)),
					(this.$element = t(i)),
					!this.imageSrc &&
						this.$element.is("img") &&
						(this.imageSrc = this.$element.attr("src"));
				var r = (this.position + "").toLowerCase().match(/\S+/g) || [];

				if (
					(r.length < 1 && r.push("center"),
					1 == r.length && r.push(r[0]),
					("top" != r[0] &&
						"bottom" != r[0] &&
						"left" != r[1] &&
						"right" != r[1]) ||
						(r = [r[1], r[0]]),
					this.positionX !== s && (r[0] = this.positionX.toLowerCase()),
					this.positionY !== s && (r[1] = this.positionY.toLowerCase()),
					(h.positionX = r[0]),
					(h.positionY = r[1]),
					"left" != this.positionX &&
						"right" != this.positionX &&
						(isNaN(parseInt(this.positionX))
							? (this.positionX = "center")
							: (this.positionX = parseInt(this.positionX))),
					"top" != this.positionY &&
						"bottom" != this.positionY &&
						(isNaN(parseInt(this.positionY))
							? (this.positionY = "center")
							: (this.positionY = parseInt(this.positionY))),
					(this.position =
						this.positionX +
						(isNaN(this.positionX) ? "" : "px") +
						" " +
						this.positionY +
						(isNaN(this.positionY) ? "" : "px")),
					navigator.userAgent.match(/(iPod|iPhone|iPad)/))
				)
					return (
						this.imageSrc &&
							this.iosFix &&
							!this.$element.is("img") &&
							this.$element.css({
								backgroundImage: "url(" + this.imageSrc + ")",
								backgroundSize: "cover",
								backgroundPosition: this.position,
							}),
						this
					);
				if (navigator.userAgent.match(/(Android)/))
					return (
						this.imageSrc &&
							this.androidFix &&
							!this.$element.is("img") &&
							this.$element.css({
								backgroundImage: "url(" + this.imageSrc + ")",
								backgroundSize: "cover",
								backgroundPosition: this.position,
							}),
						this
					);
				console.log(this.imageSrc);
				this.$mirror = t("<div />").prependTo(this.mirrorContainer);
				var a = this.$element.find(">.parallax-slider"),
					n = !1;
				0 == a.length
					? (this.$slider = t("<img />").prependTo(this.$mirror))
					: ((this.$slider = a.prependTo(this.$mirror)), (n = !0)),
					this.$mirror.addClass("parallax-mirror").css({
						visibility: "hidden",
						zIndex: this.zIndex,
						position: "fixed",
						top: 0,
						left: 0,
						overflow: "hidden",
					}),
					this.$slider.addClass("parallax-slider").one("load", function () {
						(h.naturalHeight && h.naturalWidth) ||
							((h.naturalHeight = this.naturalHeight || this.height || 1),
							(h.naturalWidth = this.naturalWidth || this.width || 1)),
							(h.aspectRatio = h.naturalWidth / h.naturalHeight),
							o.isSetup || o.setup(),
							o.sliders.push(h),
							(o.isFresh = !1),
							o.requestRender();
					}),
					n || (this.$slider[0].src = this.imageSrc),
					((this.naturalHeight && this.naturalWidth) ||
						this.$slider[0].complete ||
						a.length > 0) &&
						this.$slider.trigger("load");
			}
			!(function () {
				for (
					var t = 0, e = ["ms", "moz", "webkit", "o"], s = 0;
					s < e.length && !i.requestAnimationFrame;
					++s
				)
					(i.requestAnimationFrame = i[e[s] + "RequestAnimationFrame"]),
						(i.cancelAnimationFrame =
							i[e[s] + "CancelAnimationFrame"] ||
							i[e[s] + "CancelRequestAnimationFrame"]);
				i.requestAnimationFrame ||
					(i.requestAnimationFrame = function (e) {
						var s = new Date().getTime(),
							o = Math.max(0, 16 - (s - t)),
							h = i.setTimeout(function () {
								e(s + o);
							}, o);
						return (t = s + o), h;
					}),
					i.cancelAnimationFrame ||
						(i.cancelAnimationFrame = function (t) {
							clearTimeout(t);
						});
			})(),
				t.extend(o.prototype, {
					speed: 0.2,
					bleed: 0,
					zIndex: -100,
					iosFix: !0,
					androidFix: !0,
					position: "center",
					overScrollFix: !1,
					mirrorContainer: "body",
					refresh: function () {
						(this.boxWidth = this.$element.outerWidth()),
							(this.boxHeight = this.$element.outerHeight() + 2 * this.bleed),
							(this.boxOffsetTop = this.$element.offset().top - this.bleed),
							(this.boxOffsetLeft = this.$element.offset().left),
							(this.boxOffsetBottom = this.boxOffsetTop + this.boxHeight);
						var t,
							i = o.winHeight,
							e = o.docHeight,
							s = Math.min(this.boxOffsetTop, e - i),
							h = Math.max(this.boxOffsetTop + this.boxHeight - i, 0),
							r = (this.boxHeight + (s - h) * (1 - this.speed)) | 0,
							a = ((this.boxOffsetTop - s) * (1 - this.speed)) | 0;
						r * this.aspectRatio >= this.boxWidth
							? ((this.imageWidth = (r * this.aspectRatio) | 0),
							  (this.imageHeight = r),
							  (this.offsetBaseTop = a),
							  (t = this.imageWidth - this.boxWidth),
							  "left" == this.positionX
									? (this.offsetLeft = 0)
									: "right" == this.positionX
									? (this.offsetLeft = -t)
									: isNaN(this.positionX)
									? (this.offsetLeft = (-t / 2) | 0)
									: (this.offsetLeft = Math.max(this.positionX, -t)))
							: ((this.imageWidth = this.boxWidth),
							  (this.imageHeight = (this.boxWidth / this.aspectRatio) | 0),
							  (this.offsetLeft = 0),
							  (t = this.imageHeight - r),
							  "top" == this.positionY
									? (this.offsetBaseTop = a)
									: "bottom" == this.positionY
									? (this.offsetBaseTop = a - t)
									: isNaN(this.positionY)
									? (this.offsetBaseTop = (a - t / 2) | 0)
									: (this.offsetBaseTop = a + Math.max(this.positionY, -t)));
					},
					render: function () {
						var t = o.scrollTop,
							i = o.scrollLeft,
							e = this.overScrollFix ? o.overScroll : 0,
							s = t + o.winHeight;
						this.boxOffsetBottom > t && this.boxOffsetTop <= s
							? ((this.visibility = "visible"),
							  (this.mirrorTop = this.boxOffsetTop - t),
							  (this.mirrorLeft = this.boxOffsetLeft - i),
							  (this.offsetTop =
									this.offsetBaseTop - this.mirrorTop * (1 - this.speed)))
							: (this.visibility = "hidden"),
							this.$mirror.css({
								transform:
									"translate3d(" +
									this.mirrorLeft +
									"px, " +
									(this.mirrorTop - e) +
									"px, 0px)",
								visibility: this.visibility,
								height: this.boxHeight,
								width: this.boxWidth,
							}),
							this.$slider.css({
								transform:
									"translate3d(" +
									this.offsetLeft +
									"px, " +
									this.offsetTop +
									"px, 0px)",
								position: "absolute",
								height: this.imageHeight,
								width: this.imageWidth,
								maxWidth: "none",
							});
					},
				}),
				t.extend(o, {
					scrollTop: 0,
					scrollLeft: 0,
					winHeight: 0,
					winWidth: 0,
					docHeight: 1 << 30,
					docWidth: 1 << 30,
					sliders: [],
					isReady: !1,
					isFresh: !1,
					isBusy: !1,
					setup: function () {
						function s() {
							if (p == i.pageYOffset) return i.requestAnimationFrame(s), !1;
							(p = i.pageYOffset), h.render(), i.requestAnimationFrame(s);
						}
						if (!this.isReady) {
							var h = this,
								r = t(e),
								a = t(i),
								n = function () {
									(o.winHeight = a.height()),
										(o.winWidth = a.width()),
										(o.docHeight = r.height()),
										(o.docWidth = r.width());
								},
								l = function () {
									var t = a.scrollTop(),
										i = o.docHeight - o.winHeight,
										e = o.docWidth - o.winWidth;
									(o.scrollTop = Math.max(0, Math.min(i, t))),
										(o.scrollLeft = Math.max(0, Math.min(e, a.scrollLeft()))),
										(o.overScroll = Math.max(t - i, Math.min(t, 0)));
								};
							a
								.on("resize.px.parallax load.px.parallax", function () {
									n(), h.refresh(), (o.isFresh = !1), o.requestRender();
								})
								.on("scroll.px.parallax load.px.parallax", function () {
									l(), o.requestRender();
								}),
								n(),
								l(),
								(this.isReady = !0);
							var p = -1;
							s();
						}
					},
					configure: function (i) {
						"object" == typeof i &&
							(delete i.refresh, delete i.render, t.extend(this.prototype, i));
					},
					refresh: function () {
						t.each(this.sliders, function () {
							this.refresh();
						}),
							(this.isFresh = !0);
					},
					render: function () {
						this.isFresh || this.refresh(),
							t.each(this.sliders, function () {
								this.render();
							});
					},
					requestRender: function () {
						var t = this;
						t.render(), (t.isBusy = !1);
					},
					destroy: function (e) {
						var s,
							h = t(e).data("px.parallax");
						for (h.$mirror.remove(), s = 0; s < this.sliders.length; s += 1)
							this.sliders[s] == h && this.sliders.splice(s, 1);
						t(e).data("px.parallax", !1),
							0 === this.sliders.length &&
								(t(i).off(
									"scroll.px.parallax resize.px.parallax load.px.parallax"
								),
								(this.isReady = !1),
								(o.isSetup = !1));
					},
				});
			var h = t.fn.parallax;
			(t.fn.parallax = function (s) {
				return this.each(function () {
					var h = t(this),
						r = "object" == typeof s && s;
					this == i || this == e || h.is("body")
						? o.configure(r)
						: h.data("px.parallax")
						? "object" == typeof s && t.extend(h.data("px.parallax"), r)
						: ((r = t.extend({}, h.data(), r)),
						  h.data("px.parallax", new o(this, r))),
						"string" == typeof s && ("destroy" == s ? o.destroy(this) : o[s]());
				});
			}),
				(t.fn.parallax.Constructor = o),
				(t.fn.parallax.noConflict = function () {
					return (t.fn.parallax = h), this;
				}),
				t(function () {
					t('[data-parallax="scroll"]').parallax();
				});
		})(jQuery, window, document);
	}, []);

	return (
		<Layout>
			{/* start banner Area */}
			<section
				className="home-banner-area relative"
				id="home"
				data-parallax="scroll"
				data-image-src="http://localhost/sig_pku/app/public/template/img/header-bg3.jpg"
			>
				<div className="overlay-bg overlay" />
				<h1 className="template-name">INVERSTASI</h1>
				<div className="container">
					<div className="row fullscreen">
						<div style={{ display: "flex" }}>
							<div className="banner-content col-lg-12">
								<p>INVERSTASI DI PEKANBARU</p>
								<h2 style={{ color: "#fff" }}>
									PIC <br />
									PEKANBARU INVESTMENT CENTER
								</h2>
								<a href="#" className="primary-btn">
									PETA
								</a>
							</div>
						</div>
					</div>
				</div>
				<div className="head-bottom-meta">
					<div className="d-flex meta-left no-padding">
						<a href="#">
							<span className="fa fa-facebook-f" />
						</a>
						<a href="#">
							<span className="fa fa-twitter" />
						</a>
						<a href="#">
							<span className="fa fa-instagram" />
						</a>
					</div>
				</div>
			</section>
			{/* End banner Area */}

			{/* Start features Area */}
			<section className="features-area section-gap-top" id="news">
				<div className="container">
					<div className="row feature_inner">
						<div className="col-lg-3 col-md-6">
							<div className="feature-item">
								<i className="fi flaticon-compass" />
								<h4>INDUSTRI</h4>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
							</div>
						</div>
						<div className="col-lg-3 col-md-6">
							<div className="feature-item">
								<i className="fi flaticon-desk" />
								<h4>Experienced Style</h4>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
							</div>
						</div>
						<div className="col-lg-3 col-md-6">
							<div className="feature-item">
								<i className="fi flaticon-bathroom" />
								<h4>Product Research</h4>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
							</div>
						</div>
						<div className="col-lg-3 col-md-6">
							<div className="feature-item">
								<i className="fi flaticon-beach" />
								<h4>Affordable Price</h4>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			{/* End features Area */}

			{/* Start About Area */}
			<section className="about-area section-gap">
				<div className="container">
					<div className="row align-items-center justify-content-center">
						<div className="col-lg-7 col-md-12 about-left">
							<img className="img-fluid" src="img/about.png" alt />
						</div>
						<div className="col-lg-5 col-md-12 about-right">
							<div className="section-title text-left">
								<h4>About Us</h4>
								<h2>
									We are world <br />
									number one Company
								</h2>
							</div>
							<div>
								<p>
									Face male he light it moveth darkness winged eveni seas after
									life every gathering is forth two kind lesser i from seas him
									open him From creepeth after, life is above image from
									replenish behold great
								</p>
							</div>
							<a href="#" className="primary-btn">
								Read More
							</a>
						</div>
					</div>
				</div>
			</section>
			{/* End About Area */}

			{/* Start callto Area */}
			<section className="callto-area section-gap relative">
				<div className="overlay overlay-bg" />
				<div className="container">
					<div className="row">
						<div className="call-wrap mx-auto">
							<h1>KOTA PEKANBARU</h1>
							<a
								id="play-home-video"
								className="video-play-button"
								href="https://www.youtube.com/watch?v=_C5vCGB8Xx0"
							>
								<span />
							</a>
							<p>05:35</p>
						</div>
					</div>
				</div>
			</section>
			{/* End callto Area */}
		</Layout>
	);
}
