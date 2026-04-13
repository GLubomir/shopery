export const measureVisibleDropdowns = (scope = document) => {
	const dropdowns = scope.querySelectorAll('.dropdown');

	dropdowns.forEach((dropdownElement) => {
		if (!isDropdownVisible(dropdownElement)) {
			return;
		}

		measureDropdownHeight(dropdownElement);
	});
};

export const dropdown = () => {
	const fontsReady = window.document.fonts ? window.document.fonts.ready : Promise.resolve();

	fontsReady.then(() => {
		const dropdowns = document.querySelectorAll('.dropdown');

		if (!dropdowns.length) {
			return;
		}

		dropdowns.forEach((dropdownElement) => {
			dropdownElement.classList.add('uploaded');
			measureDropdownHeight(dropdownElement);
			activationDropdown(dropdownElement);
		});

		measureVisibleDropdowns();
		window.addEventListener('resize', () => {
			measureVisibleDropdowns();
		});
	});
};

function isDropdownVisible(dropdown) {
	return Boolean(dropdown.offsetParent);
}

function measureDropdownHeight(dropdown) {
	const dropdownCurrent = dropdown.querySelector('.dropdown__current');
	const dropdownList = dropdown.querySelector('.dropdown__list');

	if (!dropdownCurrent || !dropdownList || !isDropdownVisible(dropdown)) {
		return;
	}

	const dropdownStyles = window.getComputedStyle(dropdown);
	const paddingTop = parseFloat(dropdownStyles.paddingTop) || 0;
	const paddingBottom = parseFloat(dropdownStyles.paddingBottom) || 0;
	const borderTop = parseFloat(dropdownStyles.borderTopWidth) || 0;
	const borderBottom = parseFloat(dropdownStyles.borderBottomWidth) || 0;
	const verticalBoxModel = paddingTop + paddingBottom + borderTop + borderBottom;
	const previousMaxHeight = dropdown.style.maxHeight;

	dropdown.style.maxHeight = 'none';

	const dropdownCurrentHeight = dropdownCurrent.getBoundingClientRect().height;
	const dropdownHeight = Math.ceil(dropdown.scrollHeight + borderTop + borderBottom);
	const dropdownClosedHeight = Math.max(
		0,
		Math.floor(dropdownCurrentHeight + verticalBoxModel) - 1
	);

	dropdown.style.maxHeight = previousMaxHeight;

	dropdown.style.setProperty('--heightContainer', `${dropdownClosedHeight}px`);
	dropdown.style.setProperty('--heightContainerActivation', `${dropdownHeight}px`);
}

function activationDropdown(dropdown) {
	dropdown.addEventListener('click', function (e) {
		e.preventDefault();
		if (!isDropdownVisible(this)) {
			return;
		}

		measureDropdownHeight(this);
		void this.offsetHeight;
		window.requestAnimationFrame(() => {
			window.requestAnimationFrame(() => {
				this.classList.toggle('active');
			});
		});
	});
}