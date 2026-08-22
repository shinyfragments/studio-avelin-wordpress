( function () {
	'use strict';

	if ( ! document.documentElement.lang.toLowerCase().startsWith( 'en' ) ) {
		return;
	}

	const translations = {
		'.cmplz-title': 'Manage consent',
		'.cmplz-message': 'To provide the best experiences, we use technologies like cookies to store and/or access device information. Consenting to these technologies allows us to process data such as browsing behavior or unique IDs on this site. Withholding or withdrawing consent may affect certain features and functions.',
		'.cmplz-accept': 'Accept',
		'.cmplz-deny': 'Deny',
		'.cmplz-view-preferences': 'View preferences',
		'.cmplz-manage-consent': 'Manage consent',
	};

	function translateBanner() {
		Object.entries( translations ).forEach( ( [ selector, text ] ) => {
			document.querySelectorAll( selector ).forEach( ( element ) => {
				if ( element.textContent !== text ) {
					element.textContent = text;
				}
			} );
		} );

		document.querySelectorAll( '.cmplz-link.privacy-statement' ).forEach( ( link ) => {
			if ( link.textContent !== 'Privacy Policy' ) {
				link.textContent = 'Privacy Policy';
			}
			link.href = `${ window.location.origin }/en/datenschutzerklaerung/`;
		} );
		document.querySelectorAll( '.cmplz-link.impressum' ).forEach( ( link ) => {
			if ( link.textContent !== 'Legal Notice' ) {
				link.textContent = 'Legal Notice';
			}
			link.href = `${ window.location.origin }/en/impressum/`;
		} );
	}

	translateBanner();
	document.addEventListener( 'cmplz_cookie_warning_loaded', translateBanner );
	new MutationObserver( translateBanner ).observe( document.documentElement, {
		childList: true,
		subtree: true,
	} );
}() );
