import { createApp } from "vue";
import { createPinia } from "pinia";
import App from "@/App.vue";
import router from "@/router/index.js";
import Vueform from '@vueform/vueform'
import vueformConfig from './../vueform.config'
import mitt from 'mitt';
import Popper from "vue3-popper";
import { library } from '@fortawesome/fontawesome-svg-core'
import JsonEditorVue from 'json-editor-vue'
import { MotionPlugin } from '@vueuse/motion'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { createNotivue } from 'notivue'
import 'notivue/notification.css' // Only needed if using built-in <Notification />
import 'notivue/animations.css' // Only needed if using default animations


import {
    faArrowLeft,
    faArrowRight,
    faBars, faCheck, faCube, faEllipsis, faEllipsisVertical, faFile, faGear, faGrip,
    faHome, faLink, faNewspaper, faPencil, faTrash, faTrashCan,
    faUser, faUsers,
    faUserSecret, faXmark, faHouse, faChevronRight, faRightFromBracket, faUserGear,
    faHashtag, faAt, faPhone, faAlignJustify,faPenToSquare, faSquareCaretDown, faCaretDown, faToggleOff,faToggleOn,
} from '@fortawesome/free-solid-svg-icons'

import {faCalendarDays, faCalendar, faEnvelope} from "@fortawesome/free-regular-svg-icons"
library.add(faSquareCaretDown, faCaretDown, faToggleOff,
    faToggleOn,
    faAlignJustify,
    faPenToSquare,
    faPhone,
    faAt,
    faHashtag,
    faUserGear,
    faRightFromBracket,
    faChevronRight,
    faHouse,
    faHome,
    faUser,
    faUserSecret,
    faBars,
    faCalendarDays,
    faCalendar,
    faFile,
    faEnvelope,
    faTrash,
    faTrashCan,
    faUsers,
    faNewspaper,
    faLink,
    faArrowRight,
    faArrowLeft,
    faEllipsis,
    faEllipsisVertical,
    faGrip,
    faCube,
    faGear,
    faXmark,
    faCheck,
    faPencil
)

const emitter = mitt();
const notivue = createNotivue(/* Options */)

createApp(App)
    .component("Popper", Popper)
    .component('font-awesome-icon', FontAwesomeIcon)
    .use(JsonEditorVue, {})
    .use(createPinia())
    .use(router)
    .use(MotionPlugin)
    .provide('EventBus', emitter)
    .use(Vueform, vueformConfig)
    .use(notivue)
    .mount('#app')
