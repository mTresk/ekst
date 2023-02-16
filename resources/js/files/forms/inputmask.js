import 'inputmask/dist/inputmask.min.js'

const selector = document.querySelectorAll('input[name="phone"]')

if (selector) {
	selector.forEach((item) => {
		let im = new Inputmask('+7 (999) 999 99 99', { showMaskOnHover: false })
		im.mask(item)
	})
}
