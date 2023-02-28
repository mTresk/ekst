const map = document.querySelector('#map')

if (map) {
    let items = []
    const coordsData = document.querySelectorAll('.map__unit')
    if (coordsData) {
        coordsData.forEach((dataItem) => {
            const coords = dataItem.getAttribute('data-coordinates').split(',')
            const content = dataItem.innerHTML
            const item = {center: coords, content: content}
            items.push(item)
        })
    }

    function mapInit() {
        ymaps.ready(init)

        function init() {
            const center = map.getAttribute('data-coordinates').split(',')
            let contactMap = new ymaps.Map('map', {
                center: center,
                zoom: 4,
                controls: [],
            })

            const collection = new ymaps.GeoObjectCollection(null, {})
            // Добавляем коллекцию на карту.
            contactMap.geoObjects.add(collection)

            items.forEach((item) => {
                createPlacemark(item, collection)
            })

            function createPlacemark(item, collection) {
                // Создаем метку.
                const placemark = new ymaps.Placemark(
                    item.center,
                    {
                        balloonContent: item.content,
                    },
                    {
                        iconLayout: 'default#imageWithContent',
                        iconImageHref: 'img/pin.svg',
                        iconImageSize: [25, 25],
                        iconImageOffset: [-15, -40],
                    }
                )
                // Добавляем метку в коллекцию.
                collection.add(placemark)

                // Увеличиваем при клике на метку
                placemark.events.add('click', function (e) {
                    contactMap.setZoom(17)
                    contactMap.setCenter(item.center)
                })

                // Возвращаем полный размер при закрытии балуна
                contactMap.geoObjects.events.add('balloonclose', function (e) {
                    contactMap.setBounds(contactMap.geoObjects.getBounds())
                })
            }

            // Выставляем масштаб карты чтобы были видны все группы.
            contactMap.setBounds(contactMap.geoObjects.getBounds())

            contactMap.controls.remove('geolocationControl') // удаляем геолокацию
            contactMap.controls.remove('searchControl') // удаляем поиск
            contactMap.controls.remove('trafficControl') // удаляем контроль трафика
            contactMap.controls.remove('typeSelector') // удаляем тип
            contactMap.controls.remove('fullscreenControl') // удаляем кнопку перехода в полноэкранный режим
            contactMap.controls.remove('rulerControl') // удаляем контрол правил
            contactMap.behaviors.disable(['scrollZoom']) // отключаем скролл карты (опционально)
            contactMap.controls.add('zoomControl', {
                size: 'auto',
            })
        }
    }

    mapInit()
}
