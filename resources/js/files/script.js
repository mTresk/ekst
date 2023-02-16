import PureCounter from '@srexi/purecounterjs'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger.js'

// Прелоадер
window.addEventListener('DOMContentLoaded', function (e) {
	document.body.classList.add('loaded_hiding')
	window.setTimeout(function () {
		document.body.classList.add('loaded')
		document.body.classList.remove('loaded_hiding')
	}, 500)
})

// PureCounter
const pure = new PureCounter()

// Изображение вместо youtube плеера
const videos = document.querySelectorAll('.video__item')

if (videos) {
	videos.forEach((video) => {
		const data = video.querySelector('button')
		const url = 'https://img.youtube.com/vi/' + data.dataset.popupYoutube + '/hqdefault.jpg'

		video.querySelector('img').src = url
		if (video.querySelector('source')) {
			video.querySelector('source').srcset = url
		}
	})
}

// Отключаем прилипающий блок на 767
const linksBlock = document.querySelector('[data-sticky]')

if (linksBlock && window.innerWidth < 767) {
	linksBlock.removeAttribute('data-sticky')
}

// Анимации
gsap.registerPlugin(ScrollTrigger)

gsap.config({
	nullTargetWarn: false,
})

const animatedBlocks = document.querySelectorAll('[animate]')

if (animatedBlocks) {
	animatedBlocks.forEach((block) => {
		gsap.from(block, {
			scrollTrigger: {
				trigger: block,
			},
			opacity: 0,
			y: 100,
			stagger: 0.2,
		})
	})
}

const heroTimeline = gsap.timeline()

heroTimeline
	.fromTo('.hero__title', { y: 50, opacity: 0 }, { y: 0, opacity: 1, duration: 0.7 })
	.fromTo('.hero__text', { y: 50, opacity: 0 }, { y: 0, opacity: 1, duration: 0.7 }, '-=0.3')
	.fromTo('.hero__button', { y: 50, opacity: 0 }, { y: 0, opacity: 1, duration: 0.7 }, '-=0.3')
