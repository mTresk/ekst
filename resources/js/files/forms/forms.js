export function formFieldsInit() {
	document.body.addEventListener('focusin', function (e) {
		const targetElement = e.target
		if (targetElement.tagName === 'INPUT' || targetElement.tagName === 'TEXTAREA') {
			if (!targetElement.hasAttribute('data-no-focus-classes')) {
				targetElement.classList.add('_form-focus')
				targetElement.parentElement.classList.add('_form-focus')
			}
		}
	})
	document.body.addEventListener('focusout', function (e) {
		const targetElement = e.target
		if (targetElement.tagName === 'INPUT' || targetElement.tagName === 'TEXTAREA') {
			if (!targetElement.hasAttribute('data-no-focus-classes')) {
				targetElement.classList.remove('_form-focus')
				targetElement.parentElement.classList.remove('_form-focus')
			}
		}
	})
}
