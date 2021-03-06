import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// import { } from '@fortawesome/free-regular-svg-icons'

import {
  faTrashAlt,
  faSitemap,
  faBezierCurve,
  faClipboardCheck,
  faKey,
  faProjectDiagram,
  faTasks,
  faLayerGroup,
  faLocationArrow,
  faMapSigns,
  faThermometerHalf,
  faExclamation,
  faImage,
  faQuoteRight,
  faSubscript,
  faClipboardList,
  faSms,
  faBullhorn,
  faFilter,
  faRulerCombined,
  faTags,
  faPollH,
  faVoteYea,
  faFileInvoice,
  faFileImport,
  faFileExport,
  faPlus,
  faCheck,
  faSort,
  faSortAmountDownAlt, 
  faChevronLeft,
  faChevronDown,
  faBorderAll,
  faHome, 
  faUser,
  faUsers,
  faUserFriends,
  faUserCheck,
  faCubes,
  faInbox,
  faUniversity,
  faCog,
  faStar,
  faPhoneAlt,
  faSearch,
  faSignOutAlt,
} from '@fortawesome/free-solid-svg-icons'

import {
  faCopy,
  faEnvelope,
  faCreditCard,
  faObjectGroup,
  faFileAlt,
  faClipboard,
  faChartBar,
  faEdit,
  faBuilding,
  faEye,
  faCalendarAlt,
  faBell,
  faComments,
  faCommentAlt,
  faCompass,
} from '@fortawesome/free-regular-svg-icons'

import {
  faGithub,
  faFacebook,
} from '@fortawesome/free-brands-svg-icons'

library.add(
  faTrashAlt,
  faCopy,
  faSitemap,
  faBezierCurve,
  faClipboardCheck,
  faKey,
  faProjectDiagram,
  faTasks,
  faLayerGroup,
  faLocationArrow,
  faMapSigns,
  faThermometerHalf,
  faExclamation,
  faImage,
  faQuoteRight,
  faSubscript,
  faClipboardList,
  faSms,
  faEnvelope,
  faBullhorn,
  faCreditCard,
  faFilter,
  faRulerCombined,
  faObjectGroup,
  faTags,
  faPollH,
  faVoteYea,
  faFileInvoice,
  faFileImport,
  faFileExport,
  faFileAlt,
  faClipboard,
  faPlus,
  faEdit,
  faCheck,
  faSort,
  faSortAmountDownAlt, 
  faChevronLeft,
  faChevronDown,
  faBorderAll,
  faBuilding,
  faHome,
  faUser,
  faUsers,
  faUserFriends,
  faUserCheck,
  faSearch, 
  faCubes,
  faInbox,
  faChartBar,
  faUniversity,
  faCog,
  faStar,
  faPhoneAlt,
  faEye,
  faCalendarAlt,
  faBell,
  faCommentAlt,
  faComments,
  faCompass,
  faFacebook,
  faSignOutAlt,
)

Vue.component('Fa', FontAwesomeIcon)
