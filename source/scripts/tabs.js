document.addEventListener("DOMContentLoaded", () => {
	const tabs = document.querySelectorAll('[role="tablist"] [role="tab"]');
	const panels = document.querySelectorAll('[role="tabpanel"]');

	tabs.forEach((tab) => {
		tab.addEventListener("click", (event) => {
			activateTab(event.currentTarget);
		});

		tab.addEventListener("keydown", (event) => {
			let newIndex;
			const currentIndex = parseInt(event.target.dataset.tab);
			const lastIndex = tabs.length - 1;
			const nextIndex =
				currentIndex + 1 === tabs.length ? 0 : currentIndex + 1;
			const prevIndex =
				currentIndex - 1 < 0 ? lastIndex : currentIndex - 1;

			// Handle keyboard navigation
			switch (event.key) {
				case "ArrowRight":
					event.preventDefault();
					newIndex = nextIndex;
					break;
				case "ArrowLeft":
					event.preventDefault();
					newIndex = prevIndex;
					break;
				case "Home":
					event.preventDefault();
					newIndex = 0;
					break;
				case "End":
					event.preventDefault();
					newIndex = lastIndex;
					break;
				default:
					return; // Ignore other keys
			}

			activateTab(tabs[newIndex]);
		});
	});

	function activateTab(newTab) {
		tabs.forEach((tab, index) => {
			const isSelected = tab === newTab;

			tab.setAttribute("aria-selected", isSelected ? "true" : "false");
			tab.setAttribute("tabindex", isSelected ? "0" : "-1");
			panels[index].classList.toggle("hidden", !isSelected);
			panels[index].setAttribute("tabindex", isSelected ? "0" : "-1");

			isSelected
				? panels[index].removeAttribute("aria-hidden")
				: panels[index].setAttribute("aria-hidden", "true");

			isSelected ? tab.focus() : null;
		});
	}
});
