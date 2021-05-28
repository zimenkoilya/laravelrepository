import axios from 'axios'
import { endpoint } from '~/config/api'
import i18n from '~/plugins/i18n'
import Swal from 'sweetalert2'

/**
 * Create Axios
 */
export const http = axios.create({
    // baseURL: endpoint
})

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

http.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
http.defaults.withCredentials = true

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
    http.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

/**
 * Handle all error messages.
 */
http.interceptors.response.use(response => response, error => {
    const { status } = error.response
    const { data } = error.response
    if (status >= 500) {
        Swal.fire({
            icon: 'error',
            title: i18n.t('error.error_alert_title'),
            text: i18n.t('error.error_alert_text'),
            reverseButtons: true,
            confirmButtonText: i18n.t('error.ok'),
            cancelButtonText: i18n.t('error.cancel')
        })
    }
    // if (status === 401 && store.getters['auth/check']) {
    else if (status === 401) {
        Swal.fire({
            icon: 'warning',
            title: i18n.t('error.token_expired_alert_title'),
            text: i18n.t('error.token_expired_alert_text'),
            reverseButtons: true,
            confirmButtonText: i18n.t('error.ok'),
            cancelButtonText: i18n.t('error.cancel')
        }).then(() => {
            window.location = '/';
        })
    }
    else if (status == 422) {
        let errors = data.errors                        
        if (errors) {
            let error_text = ''
            for( let i in errors) {
                let err = errors[i]
                if (Array.isArray(err)) {
                    err.forEach((err_item) => {
                        error_text += `<div class="">${err_item}</div>`        
                    })
                }
                else {
                    error_text += `<div class="">${err}</div>`
                }
                
            }                            
            Swal.fire({
                icon: 'error',
                html: error_text
            })
        }
    }
    else if (status == 400) {
        let error_text = ''
        let err = data.messages
        if (Array.isArray(err)) {
            err.forEach((err_item) => {
                error_text += `<div class="">${err_item}</div>`        
            })
        }
        else {
            error_text += `<div class="">${err}</div>`
        }
        Swal.fire({
            icon: 'error',
            html: error_text
        })
    }
    else if(data && data.message) {
        Swal.fire({
            icon: 'error',
            html: data.message
        })
    }
    console.log(data)
    return Promise.reject(error)
})

export default function install (Vue) {
    Object.defineProperty(Vue.prototype, '$http', {
        get () {
            return http
        }
    })
}
