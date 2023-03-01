<script setup>
import {ref} from "vue";
import axios from "axios";

const payload = ref({
    name: '',
    phone: '',
    email: '',
    message: '',
})

const errors = ref([])

const isSending = ref(false)
const isSuccess = ref(false)

const formSent = () => {
    payload.value = {
        name: '',
        phone: '',
        email: '',
        message: '',
    }
}

const handleSubmit = () => {
    isSending.value = true
    isSuccess.value = false

    axios.post('/feedback', payload.value)
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
    <form :class="{disabled: isSending}" @submit.prevent="handleSubmit" class="contacts__form form">
        <h3 class="form__title">Напишите нам</h3>
        <div v-if="isSending" class="spinner"></div>
        <div class="form__input">
            <input v-model="payload.name" autocomplete="off" type="text" name="name"
                   placeholder="Ваше имя*"/>
            <div v-if="errors.name" class="form__error">{{ errors.name[0] }}</div>
        </div>
        <div class="form__input">
            <input v-model="payload.phone" autocomplete="off" type="text" name="phone"
                   placeholder="Номер телефона*"/>
            <div v-if="errors.phone" class="form__error">{{ errors.phone[0] }}</div>
        </div>
        <div class="form__input">
            <input v-model="payload.email" autocomplete="off" type="text" name="email" placeholder="Email"/>
        </div>
        <div v-if="errors.email" class="form__error">{{ errors.email[0] }}</div>
        <div class="form__input">
            <input v-model="payload.message" autocomplete="off" type="text" name="message"
                   placeholder="Сообщение*"/>
            <div v-if="errors.message" class="form__error">{{ errors.message[0] }}</div>
        </div>
        <div class="form__footer">
            <button type="submit" class="form__button button">Отправить</button>
            <div class="form__policy">
                Нажимая на кнопку вы соглашаетесь на обработку
                <a href="/policy">персональных данных</a>
            </div>
        </div>
        <div v-if="isSuccess" class="form__success">Спасибо, скоро мы свяжемся с Вами!</div>
    </form>
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
