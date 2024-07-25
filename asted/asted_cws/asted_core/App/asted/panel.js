document.addEventListener('DOMContentLoaded', function () {
	// let dropDownButton = document.querySelectorAll(".asted-add-page-wrapper");
	let dropDownMenus = document.querySelectorAll(".asted-dropdown-menu");

	const openAstedMenuItems = (event) => {
		const divs = document.querySelectorAll(".asted-dropdown-menu");
		const target = event.target.offsetParent.lastElementChild;
		target.classList.toggle("open-asted-menu");

		divs.forEach((item) => {
			if (item !== target) {
				item.classList.remove("open-asted-menu");
			}
		});
	};

	document.querySelectorAll(".asted-add-page-wrapper").forEach((item) => {
		item.addEventListener("click", openAstedMenuItems);
	});

	const openAstedMenuItemsSmall = (event) => {
		const divs = document.querySelectorAll(".asted-sub-menu");
		const target = event.target.offsetParent.lastElementChild;
		target.classList.toggle("open-asted-sub-menu");

		divs.forEach((item) => {
			if (item !== target) {
				item.classList.remove("open-asted-sub-menu");
			}
		});
	};

	document.querySelectorAll(".asted-small-button-open-menu").forEach((item) => {
		item.addEventListener("click", openAstedMenuItemsSmall);
	});

	// const openAsdetArrowPanel = (event) => {
	// 	const divs = document.querySelectorAll(".asted-small-sub-item");
	// 	const target = event.target.lastElementChild;
	// 	target.classList.toggle("open-asted-small-sub-item");

	// 	divs.forEach((item) => {
	// 		if (item !== target) {
	// 			item.classList.remove("open-asted-small-sub-item");
	// 		}
	// 	});
	// };

	// document.querySelectorAll(".asted-sub-item-menu").forEach((item) => {
	// 	item.addEventListener("click", openAsdetArrowPanel);
	// });

	// Смена тема в панели управления

	let theme = document.getElementById("asted-theme-panel");

	let standart = document.querySelectorAll(".asted-theme-standart");
	let black = document.querySelectorAll(".asted-theme-black");
	let white = document.querySelectorAll(".asted-theme-white");

	let astedHeader = document.querySelector(".asted-admin-panel-header");
	let astedPanel = document.querySelector(".asted-admin-panel");

	standart.forEach((item) => {
		item.addEventListener("click", () => {
			localStorage.setItem("asted-theme", "standart");
			document.documentElement.style.setProperty(
				"--asted-second-bg-color",
				"#23533d"
			);
			document.documentElement.style.setProperty(
				"--asted-main-bg-color",
				"#209760"
			);
			document.documentElement.style.setProperty(
				"--asted-text-color-white",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-main-border-color",
				"#209760"
			);
			document.documentElement.style.setProperty(
				"--asted-second-border-color",
				"#23533d"
			);
			document.documentElement.style.setProperty(
				"--asted-third-border-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-circle-color",
				"#ffffff"
			);
		});
	});

	black.forEach((item) => {
		item.addEventListener("click", () => {
			localStorage.setItem("asted-theme", "black");
			document.documentElement.style.setProperty(
				"--asted-second-bg-color",
				"#27332d"
			);
			document.documentElement.style.setProperty(
				"--asted-main-bg-color",
				"#414945"
			);
			document.documentElement.style.setProperty(
				"--asted-text-color-white",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-main-border-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-second-border-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-third-border-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-circle-color",
				"#ffffff"
			);
		});
	});

	white.forEach((item) => {
		item.addEventListener("click", () => {
			localStorage.setItem("asted-theme", "white");
			document.documentElement.style.setProperty(
				"--asted-second-bg-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-main-bg-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-text-color-white",
				"#29a15c"
			);
			document.documentElement.style.setProperty(
				"--asted-main-border-color",
				"#000000"
			);
			document.documentElement.style.setProperty(
				"--asted-second-border-color",
				"#000000"
			);
			document.documentElement.style.setProperty(
				"--asted-third-border-color",
				"#000000"
			);
			document.documentElement.style.setProperty(
				"--asted-circle-color",
				"#209760"
			);
		});
	});

	document.addEventListener("DOMContentLoaded", () => {
		if (localStorage.getItem("asted-theme") === "black") {
			document.documentElement.style.setProperty(
				"--asted-second-bg-color",
				"#27332d"
			);
			document.documentElement.style.setProperty(
				"--asted-main-bg-color",
				"#414945"
			);
			document.documentElement.style.setProperty(
				"--asted-text-color-white",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-main-border-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-second-border-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-third-border-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-circle-color",
				"#ffffff"
			);
		}

		if (localStorage.getItem("asted-theme") === "white") {
			document.documentElement.style.setProperty(
				"--asted-second-bg-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-main-bg-color",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-text-color-white",
				"#29a15c"
			);
			document.documentElement.style.setProperty(
				"--asted-main-border-color",
				"#000000"
			);
			document.documentElement.style.setProperty(
				"--asted-second-border-color",
				"#000000"
			);
			document.documentElement.style.setProperty(
				"--asted-third-border-color",
				"#000000"
			);
			document.documentElement.style.setProperty(
				"--asted-circle-color",
				"#209760"
			);
		}

		if (localStorage.getItem("asted-theme") === "standart") {
			document.documentElement.style.setProperty(
				"--asted-second-bg-color",
				"#23533d"
			);
			document.documentElement.style.setProperty(
				"--asted-main-bg-color",
				"#209760"
			);
			document.documentElement.style.setProperty(
				"--asted-text-color-white",
				"#ffffff"
			);
			document.documentElement.style.setProperty(
				"--asted-main-border-color",
				"#209760"
			);
			document.documentElement.style.setProperty(
				"--asted-second-border-color",
				"#23533d"
			);
			document.documentElement.style.setProperty(
				"--asted-third-border-color",
				"#f8f8f8"
			);
			document.documentElement.style.setProperty(
				"--asted-circle-color",
				"#ffffff"
			);
		}
	});

	// Выдвигающееся меню

	const astedCollapse = document.querySelector(".asted-arrow-collapse-items");
	const astedSubMenu = document.querySelector(".asted-collapse-menu");

	astedCollapse.addEventListener("click", () => {
		astedSubMenu.classList.toggle("open-asted-menu");
	});

	// Cвернуть панель
	const astedContainer = document.querySelector(".asted-container-fluid");
	const collapseButton = document.querySelector(".asted-collapse-button");
	const adminPanel = document.querySelector(".asted-admin-panel");
	const astedWrapper = document.querySelector(".asted-admin-panel-wrapper");

	const astedWrapperHeight =
		document.querySelector(".wrapper-asted").offsetHeight;
	const astedAdminPAnelHeight =
		document.querySelector(".asted-admin-panel").offsetHeight;

	collapseButton.addEventListener("click", () => {
		collapseButton.lastElementChild.classList.toggle("asted-arrow-clicked");
		adminPanel.classList.toggle("asted-collapse-admin-panel");

		if (
			adminPanel.classList.contains("asted-collapse-admin-panel") &&
			!astedContainer.classList.contains("asted-container-fixed")
		) {
			astedWrapper.style.marginBottom = "0";
			localStorage.setItem("asted-panel-collapse", "collapsed");
		} else if (
			!adminPanel.classList.contains("asted-collapse-admin-panel") &&
			!astedContainer.classList.contains("asted-container-fixed")
		) {
			astedWrapper.style.marginBottom = "147px";
			localStorage.setItem("asted-panel-collapse", "no-collapsed");
		} else if (
			adminPanel.classList.contains("asted-collapse-admin-panel") &&
			astedContainer.classList.contains("asted-container-fixed")
		) {
			document.body.style.paddingTop = `${astedWrapperHeight}px`;
		} else if (
			!adminPanel.classList.contains("asted-collapse-admin-panel") &&
			astedContainer.classList.contains("asted-container-fixed")
		) {
			document.body.style.paddingTop = `${astedWrapperHeight + astedAdminPAnelHeight
				}px`;
		}
	});

	document.addEventListener("DOMContentLoaded", () => {
		if (localStorage.getItem("asted-panel-collapse") === "collapsed") {
			adminPanel.classList.add("asted-collapse-admin-panel");
		} else {
			adminPanel.classList.remove("asted-collapse-admin-panel");
		}
	});

	//

	// Закрепление панели

	const astedNailButton = document.querySelector(".asted-nail-button");

	astedNailButton.onclick = function () {
		astedContainer.classList.toggle("asted-container-fixed");
		astedNailButton.lastElementChild.classList.toggle("asted-nail-icon-active");
		console.log(astedWrapperHeight);
		console.log(astedAdminPAnelHeight);

		
		if (
			astedContainer.classList.contains("asted-container-fixed") &&
			!adminPanel.classList.contains("asted-collapse-admin-panel")
		) {
			document.body.style.paddingTop = `${astedWrapperHeight + astedAdminPAnelHeight
				}px`;
				localStorage.setItem("asted-panel-fixed", "fixed");
		} else if (
			astedContainer.classList.contains("asted-container-fixed") &&
			adminPanel.classList.contains("asted-collapse-admin-panel")
			
		) {
			document.body.style.paddingTop = `${astedWrapperHeight}px`;
			localStorage.setItem("asted-panel-fixed", "fixed");
		} else {
			document.body.style.paddingTop = "0px";
			localStorage.setItem("asted-panel-fixed", "no-fixed");
		}
	};

	// ASted Iframe
	const astedClikedItems = document.querySelectorAll(".asted-clicked-admin-item");

	astedClikedItems.forEach((item) => {
		item.addEventListener("click", (event) => {
			let astedClickedItem = item.getAttribute("data-asted");
			let astedIframe = document.querySelector(".asted-iframe ");
			astedIframe.setAttribute("src", astedClickedItem);
			astedIframe.onload = function () {
				var iframeDocument = astedIframe.contentDocument;
				iframeDocument.getElementById('accordionSidebar').classList.add('d-none');
				iframeDocument.getElementById('topBar').classList.add('d-none');
			};
			astedModal.classList.add("asted-modal-open");
			if (astedModal.classList.contains("asted-modal-open")) {
				document.body.style.overflow = "hidden";
				document.body.style.paddingRight = "17px";
			} else {
				window.location.reload();
			}
		});
	});

	// Модальное окно

	const closeModal = document.querySelector(".asted-close-modal-button");

	closeModal.onclick = function () {
		window.location.reload();
	};

	const astedModal = document.querySelector(".asted-modal-wrapper");

	document.addEventListener("click", (event) => {
		if (
			event.target == astedModal &&
			astedModal.classList.contains("asted-modal-open")
		) {
			window.location.reload();
		}
	});

});


const astedContainer = document.querySelector(".asted-container-fluid");

document.addEventListener("DOMContentLoaded", () => {
	if (localStorage.getItem("asted-panel-fixed") === "fixed") {
		astedContainer.classList.add("asted-container-fixed");
	} else {
		astedContainer.classList.remove("asted-container-fixed");
	}
});