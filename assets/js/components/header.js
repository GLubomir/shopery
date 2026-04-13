import { dropdown, measureVisibleDropdowns } from "../modules/dropdown.js"
import { customOutlineEffect } from "../base/form.js";

const mobileHeader = () => {
	const toggle = document.querySelector('.header__menu-toggle');
	const drawer = document.querySelector('.header__drawer');
	const closeButton = document.querySelector('.header__drawer-close');
	const overlay = document.querySelector('.header__overlay');
	const drawerPanel = document.querySelector('.header__drawer-panel');

	if (!toggle || !drawer || !closeButton || !overlay || !drawerPanel) {
		return;
	}

	const desktopMediaQuery = window.matchMedia('(min-width: 1024px)');

	const setMenuState = (isOpen) => {
		document.body.classList.toggle('is-menu-open', isOpen);
		toggle.setAttribute('aria-expanded', String(isOpen));
		drawer.setAttribute('aria-hidden', String(!isOpen));
		overlay.hidden = !isOpen;
	};

	const remeasureDrawerDropdowns = () => {
		window.requestAnimationFrame(() => {
			window.requestAnimationFrame(() => {
				measureVisibleDropdowns(drawerPanel);
			});
		});
	};

	const openMenu = () => {
		if (desktopMediaQuery.matches) {
			return;
		}

		setMenuState(true);
		remeasureDrawerDropdowns();
		closeButton.focus();
	};

	const closeMenu = ({ restoreFocus = true } = {}) => {
		if (!document.body.classList.contains('is-menu-open')) {
			return;
		}

		setMenuState(false);

		if (restoreFocus) {
			toggle.focus();
		}
	};

	toggle.addEventListener('click', () => {
		if (document.body.classList.contains('is-menu-open')) {
			closeMenu();
			return;
		}

		openMenu();
	});

	closeButton.addEventListener('click', () => {
		closeMenu();
	});

	overlay.addEventListener('click', () => {
		closeMenu();
	});

	drawer.addEventListener('click', (event) => {
		const clickTarget = event.target;

		if (!(clickTarget instanceof HTMLElement)) {
			return;
		}

		const isInteractiveLink = clickTarget.closest('.menu-item a, .header__auth a, .header__numbers');

		if (isInteractiveLink) {
			closeMenu({ restoreFocus: false });
		}
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape') {
			closeMenu();
		}
	});

	desktopMediaQuery.addEventListener('change', (event) => {
		if (event.matches) {
			closeMenu({ restoreFocus: false });
			return;
		}

		remeasureDrawerDropdowns();
	});
};

export const headerComponent = () => {
	dropdown();
	customOutlineEffect();
	mobileHeader();
}