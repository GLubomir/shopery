const footerAccordion = () => {
	const accordionItems = Array.from( document.querySelectorAll( '[data-footer-accordion-item]' ) )
		.map( ( item ) => {
			const toggle = item.querySelector( '[data-footer-accordion-toggle]' );
			const panelId = toggle ? toggle.getAttribute( 'aria-controls' ) : '';
			const panel = panelId ? document.getElementById( panelId ) : null;

			if ( ! toggle || ! panel ) {
				return null;
			}

			return {
				item,
				toggle,
				panel,
			};
		} )
		.filter( Boolean );

	if ( ! accordionItems.length ) {
		return;
	}

	const mobileMediaQuery = window.matchMedia( '(max-width: 479px)' );

	const closeItem = ( accordionItem ) => {
		accordionItem.item.classList.remove( 'is-open' );
		accordionItem.toggle.setAttribute( 'aria-expanded', 'false' );
		accordionItem.panel.hidden = true;
	};

	const openItem = ( accordionItem ) => {
		accordionItems.forEach( ( currentItem ) => {
			if ( currentItem !== accordionItem ) {
				closeItem( currentItem );
			}
		} );

		accordionItem.item.classList.add( 'is-open' );
		accordionItem.toggle.setAttribute( 'aria-expanded', 'true' );
		accordionItem.panel.hidden = false;
	};

	const syncAccordionState = () => {
		if ( mobileMediaQuery.matches ) {
			accordionItems.forEach( closeItem );
			return;
		}

		accordionItems.forEach( ( accordionItem ) => {
			accordionItem.item.classList.remove( 'is-open' );
			accordionItem.toggle.setAttribute( 'aria-expanded', 'true' );
			accordionItem.panel.hidden = false;
		} );
	};

	accordionItems.forEach( ( accordionItem ) => {
		accordionItem.toggle.addEventListener( 'click', () => {
			if ( ! mobileMediaQuery.matches ) {
				return;
			}

			const isExpanded = accordionItem.toggle.getAttribute( 'aria-expanded' ) === 'true';

			if ( isExpanded ) {
				closeItem( accordionItem );
				return;
			}

			openItem( accordionItem );
		} );
	} );

	syncAccordionState();
	mobileMediaQuery.addEventListener( 'change', syncAccordionState );
};

export { footerAccordion };
