import React, { useEffect, useState, Suspense } from "react";
import { HashRouter, Router, Route, Link, Switch } from "react-router-dom";
import { useHistory } from "react-router-dom";
import LoadingBar from "react-top-loading-bar";

import { AnimatePresence } from "framer-motion";

/////page ////
import Rute from "./root";
export const DelayedFallback = ({ children, delay = 300 }) => {
	const [show, setShow] = useState(false);

	useEffect(() => {
		let timeout = setTimeout(() => setShow(true), delay);
		return () => {
			clearTimeout(timeout);
		};
	}, []);
	return <>{show && children}</>;
};

export default function Rooter() {
	let history = useHistory();
	useEffect(() => {
		console.log(MODE, CONFIG, API);
		if (history?.location?.pathname == "/") {
			history.push("/home");
		}
	}, [history?.location?.pathname]);
	const [loading, setLoading] = useState(true);
	return (
		<AnimatePresence exitBeforeEnter>
			<Switch>
				{Rute.map(({ path, Component }, I) => {
					return (
						<Route
							key={I}
							path={path}
							render={(props) => (
								<Suspense fallback={DelayedFallback}>
									<Component {...props} />
								</Suspense>
							)}
						></Route>
					);
				})}
			</Switch>
		</AnimatePresence>
	);
}
