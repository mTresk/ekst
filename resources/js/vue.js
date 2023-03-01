import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler'
import FeedbackForm from "./components/FeedbackForm.vue";
import FooterForm from "./components/FooterForm.vue";
import ContactsForm from "./components/ContactsForm.vue";
import ReviewForm from "./components/ReviewForm.vue";

const feedbackFormComponent = createApp({
    components: {
        'component-feedback-form': FeedbackForm,
    },
})
if (document.querySelector('#feedback-form')) {
    feedbackFormComponent.mount('#feedback-form')
}

const footerFormComponent = createApp({
    components: {
        'component-footer-form': FooterForm,
    },
})
if (document.querySelector('#footer-form')) {
    footerFormComponent.mount('#footer-form')
}

const contactsFormComponent = createApp({
    components: {
        'component-contacts-form': ContactsForm,
    },
})
if (document.querySelector('#contacts-form')) {
    contactsFormComponent.mount('#contacts-form')
}

const reviewFormComponent = createApp({
    components: {
        'component-review-form': ReviewForm,
    },
})
if (document.querySelector('#review-form')) {
    reviewFormComponent.mount('#review-form')
}


