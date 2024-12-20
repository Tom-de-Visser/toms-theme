document.addEventListener("DOMContentLoaded", function () {
	const toggleButton = document.getElementById("off-canvas-toggler");
	const offCanvas = document.getElementById("off-canvas");

	const toggleOffCanvas = () => {
		const toggleClasses = [
			"translate-x-full",
			"translate-x-0",
			"pointer-events-none",
			"pointer-events-auto",
		];
		toggleClasses.map((className) => offCanvas.classList.toggle(className));
	};

	toggleButton.addEventListener("click", toggleOffCanvas);
});
