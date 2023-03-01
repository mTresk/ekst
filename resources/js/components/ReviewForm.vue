<script setup>
import {ref} from "vue";
import axios from "axios";
import {flsModules} from "../files/modules";

const payload = ref({
    name: '',
    phone: '',
    text: '',
})

const errors = ref([])

const isSending = ref(false)
const isSuccess = ref(false)

const formSent = () => {
    if (flsModules.popup) {
        flsModules.popup.open('#thanks-review')
    }
    payload.value = {
        name: '',
        phone: '',
        text: '',
    }
}

const handleSubmit = () => {
    isSending.value = true
    isSuccess.value = false

    axios.post('/review', payload.value)
        .then(response => {
            if (response.status === 200) {
                isSending.value = false
                isSuccess.value = true
                formSent()
                errors.value = []
            }
        })
        .catch(e => {
            if (e) {
                isSending.value = false
            }
            errors.value = e.response.data.errors
        })
}
</script>

<template>
    <div id="testimonial" aria-hidden="true" class="popup testimonials-form">
        <div class="popup__wrapper">
            <div class="popup__content">
                <div v-if="isSending" class="spinner"></div>
                <button data-close type="button" class="popup__close">X</button>
                <form :class="{disabled: isSending}" @submit.prevent="handleSubmit" class="popup__form form">
                    <h3 class="form__title">Ваш отзыв</h3>
                    <div class="form__input">
                        <input v-model="payload.name" autocomplete="off" type="text" name="name"
                               placeholder="Имя или организация*"/>
                        <div v-if="errors.name" class="form__error">{{ errors.name[0] }}</div>
                    </div>
                    <div class="form__input">
                        <input v-model="payload.phone" autocomplete="off" type="text" name="phone"
                               placeholder="Номер телефона*"/>
                        <div v-if="errors.phone" class="form__error">{{ errors.phone[0] }}</div>
                    </div>
                    <div class="form__input">
                        <textarea v-model="payload.text" name="text" rows="3"
                                  placeholder="Текст отзыва*"></textarea>
                        <div v-if="errors.text" class="form__error">{{ errors.text[0] }}</div>
                    </div>
                    <div class="form__footer">
                        <button type="submit" class="form__button button">Отправить</button>
                        <div class="form__policy">
                            Нажимая на кнопку вы соглашаетесь на обработку
                            <a href="/policy">персональных данных</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="popup" aria-hidden="true" id="thanks-review">
        <div class="popup__wrapper">
            <div class="popup__content">
                <div class="popup__body thanks">
                    <div class="thanks__title title">Спасибо!</div>
                    <div class="thanks__text">Ваш отзыв будет опубликован после проверки на спам.</div>
                    <button data-close type="button" class="popup__close">X</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.disabled {
    pointer-events: none;

    &::before {
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #0d0a0a;
        opacity: 0.2;
        content: '';
        border-radius: 6px;
    }
}


.spinner {
    position: absolute;
    z-index: 10;
    top: 50%;
    left: 50%;
    color: #0077bd;
    font-size: 20px;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    text-indent: -9999em;
    animation: load4 1.3s infinite linear;
    transform: translate(-50%, -50%);
}

@-webkit-keyframes load4 {
    0%,
    100% {
        box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
    }
    12.5% {
        box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    25% {
        box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    37.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    50% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    62.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
    }
    75% {
        box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
    }
    87.5% {
        box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
    }
}

@keyframes load4 {
    0%,
    100% {
        box-shadow: 0 -3em 0 0.2em, 2em -2em 0 0em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 0;
    }
    12.5% {
        box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    25% {
        box-shadow: 0 -3em 0 -0.5em, 2em -2em 0 0, 3em 0 0 0.2em, 2em 2em 0 0, 0 3em 0 -1em, -2em 2em 0 -1em, -3em 0 0 -1em, -2em -2em 0 -1em;
    }
    37.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    50% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
    }
    62.5% {
        box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
    }
    75% {
        box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
    }
    87.5% {
        box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
    }
}
</style>
