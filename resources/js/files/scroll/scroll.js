let addWindowScrollEvent = false

export function headerScroll() {
	addWindowScrollEvent = true
	const header = document.querySelector('header.header')
	const headerShow = header.hasAttribute('data-scroll-show')
	const headerShowTimer = header.dataset.scrollShow ? header.dataset.scrollShow : 500
	const startPoint = header.dataset.scroll ? header.dataset.scroll : 1
	let scrollDirection = 0
	let timer
	document.addEventListener('windowScroll', function (e) {
		const scrollTop = window.scrollY
		clearTimeout(timer)
		if (scrollTop >= startPoint) {
			!header.classList.contains('_header-scroll') ? header.classList.add('_header-scroll') : null
			if (headerShow) {
				if (scrollTop > scrollDirection) {
					// downscroll code
					header.classList.contains('_header-show') ? header.classList.remove('_header-show') : null
				} else {
					// upscroll code
					!header.classList.contains('_header-show') ? header.classList.add('_header-show') : null
				}
				timer = setTimeout(() => {
					!header.classList.contains('_header-show') ? header.classList.add('_header-show') : null
				}, headerShowTimer)
			}
		} else {
			header.classList.contains('_header-scroll') ? header.classList.remove('_header-scroll') : null
			if (headerShow) {
				header.classList.contains('_header-show') ? header.classList.remove('_header-show') : null
			}
		}
		scrollDirection = scrollTop <= 0 ? 0 : scrollTop
	})
}

setTimeout(() => {
	if (addWindowScrollEvent) {
		let windowScroll = new Event('windowScroll')
		window.addEventListener('scroll', function (e) {
			document.dispatchEvent(windowScroll)
		})
	}
}, 0)

export function stickyBlock() {
	addWindowScrollEvent = true
	function stickyBlockInit() {
		const stickyParents = document.querySelectorAll('[data-sticky]')
		if (stickyParents.length) {
			stickyParents.forEach((stickyParent) => {
				let stickyConfig = {
					media: stickyParent.dataset.sticky ? parseInt(stickyParent.dataset.sticky) : null,
					top: stickyParent.dataset.stickyTop ? parseInt(stickyParent.dataset.stickyTop) : 0,
					bottom: stickyParent.dataset.stickyBottom ? parseInt(stickyParent.dataset.stickyBottom) : 0,
					header: stickyParent.hasAttribute('data-sticky-header')
						? document.querySelector('header.header').offsetHeight
						: 0,
				}
				stickyBlockItem(stickyParent, stickyConfig)
			})
		}
	}
	function stickyBlockItem(stickyParent, stickyConfig) {
		const stickyBlockItem = stickyParent.querySelector('[data-sticky-item]')
		const headerHeight = stickyConfig.header
		const offsetTop = headerHeight + stickyConfig.top
		const startPoint = stickyBlockItem.getBoundingClientRect().top + scrollY - offsetTop

		document.addEventListener('windowScroll', stickyBlockActions)
		window.addEventListener('resize', stickyBlockActions)

		function stickyBlockActions(e) {
			const endPoint =
				stickyParent.offsetHeight +
				stickyParent.getBoundingClientRect().top +
				scrollY -
				(offsetTop + stickyBlockItem.offsetHeight + stickyConfig.bottom)
			let stickyItemValues = {
				position: 'relative',
				bottom: 'auto',
				top: '0px',
				left: '0px',
				width: 'auto',
			}
			if (!stickyConfig.media || stickyConfig.media < window.innerWidth) {
				if (offsetTop + stickyConfig.bottom + stickyBlockItem.offsetHeight < window.innerHeight) {
					if (scrollY >= startPoint && scrollY <= endPoint) {
						stickyItemValues.position = `fixed`
						stickyItemValues.bottom = `auto`
						stickyItemValues.top = `${offsetTop}px`
						stickyItemValues.left = `${stickyBlockItem.getBoundingClientRect().left}px` // Учесть разницу в ширине экрана?
						stickyItemValues.width = `${stickyBlockItem.offsetWidth}px`
					} else if (scrollY >= endPoint) {
						stickyItemValues.position = `absolute`
						stickyItemValues.bottom = `${stickyConfig.bottom}px`
						stickyItemValues.top = `auto`
						stickyItemValues.left = `0px`
						stickyItemValues.width = `${stickyBlockItem.offsetWidth}px`
					}
				}
			}
			stickyBlockType(stickyBlockItem, stickyItemValues)
		}
	}
	function stickyBlockType(stickyBlockItem, stickyItemValues) {
		stickyBlockItem.style.cssText = `position:${stickyItemValues.position};bottom:${stickyItemValues.bottom};top:${stickyItemValues.top};left:${stickyItemValues.left};width:${stickyItemValues.width};`
	}
	stickyBlockInit()
}
