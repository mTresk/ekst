import '../scss/style.scss'
import * as flsFunctions from './files/functions.js'
import './files/sliders.js'
import './libs/dynamic_adapt.js'
import './libs/popup.js'
import * as flsForms from './files/forms/forms.js'
import './files/forms/inputmask.js'
import * as flsScroll from './files/scroll/scroll.js'
import './files/map.js'
import './bootstrap.js'

flsFunctions.isWebp()
flsScroll.headerScroll()
flsFunctions.menuInit()
flsForms.formFieldsInit()
flsFunctions.spollers()
flsScroll.stickyBlock()

import './files/script.js'
