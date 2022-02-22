<template>

    <form v-on:submit.prevent="createMessage">
        <div class="mb-3">
            <label for="name" class="form-label">Имя:</label>
            <input class="form-control" v-model="message.name" placeholder="Введите имя" name="name" type="text"
                   id="name">
            <span class="text-danger" id="name-error" v-if="errors.name">{{ errors.name[0] }}</span>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Сообщение:</label>
            <textarea class="form-control" v-model="message.message" rows="5" placeholder="Введите текст сообщения"
                      name="message" id="message"></textarea>
            <span class="text-danger" id="message-error" v-if="errors.message">{{ errors.message[0] }}</span>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Добавить</button>
        </div>
    </form>

    <div>
        <div v-if="not_found" class="alert alert-danger" role="alert">
            Сообщения не загрузились, попробуйте позже :(
        </div>
        <div v-if="messages.length == 0" class="alert alert-info" role="alert">
            Сообщений пока нет
        </div>
        <div v-else-if="!loading && !not_found" class="message-pagination">
            <spinner v-if="loading"/>
            <div class="card mb-3 mt-4" v-for="message in messages" :key="message.id">
                <div class="card-header">
                    Сообщение:
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ message.name }}</h5>
                    <p class="card-text">{{ message.message }}</p>
                    <p class="card-text"><small
                        class="text-muted">{{ moment(message.created_at).format("HH:mm:ss / DD.MM.YYYY") }}</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="delete-message btn btn-danger" @click="deleteMessage(message.id)">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li :class="{ disabled: !pagination.prev_page_url }" class="page-item">
                        <a @click.prevent="getMessage(pagination.prev_page_url)" class="page-link" href="#">&lt;</a>
                    </li>
                    <li class="page-item" v-for="number in pagination.last_page" v-bind:key="number" v-bind:class="{ active:pagination.current_page == number }">
                        <a @click.prevent="getMessage(pagination.path_page + number)" class="page-link" href="#">{{ number }}</a>
                    </li>
                    <li :class="{ disabled: !pagination.next_page_url }" class="page-item">
                        <a @click.prevent="getMessage(pagination.next_page_url)" class="page-link" href="#">&gt;</a>
                    </li>
                </ul>
            </nav>
        </div>


    </div>

</template>

<script>
import moment from "moment";
import Spinner from "../Spinner";
export default {
    components: {
        Spinner
    },
    mounted() {
        this.getMessage()
    },
    data() {
        return {
            message: {
                name: '',
                message: ''
            },
            errors: [],
            messages: {},
            pagination: {},
            loading: true,
            not_found: false,
            moment: moment,
            url: '/api/messages'
        }
    },
    methods: {
        getMessage(page_url) {
            page_url = page_url || '/api/messages'
            axios
                .get(page_url)
                .then(response => {
                    if (response.data.data) {
                        this.messages = response.data.data;
                        this.makePagination(response.data);
                        setTimeout(() => {
                            this.loading = false;
                        }, 100);
                    } else {
                        this.not_found = true
                    }
                })
                .catch(error => {
                    this.not_found = true;
                });
        },
        makePagination(response) {
            let pagination = {
                current_page: response.current_page,
                last_page: response.last_page,
                path_page: response.path+"?page=",
                prev_page_url: response.prev_page_url,
                next_page_url: response.next_page_url
            }
            this.pagination = pagination;
            console.log(this.pagination);
        },
        createMessage() {
            axios.post(this.url, this.message)
                .then(response => {
                    this.getMessage();
                    this.message.name = '';
                    this.message.message = '';
                    this.errors = [];
                    this.$toast.success('Сообщение добавлено');
                })
                .catch(error => {
                    this.errors = [];
                    this.errors = error.response.data.errors;
                });
        },
        deleteMessage(id) {
            axios.delete('/api/messages/' + id)
                .then(response => {
                    this.getMessage();
                    this.$toast.warning('Сообщение удалено');
                })
                .catch((e) => {
                    console.log(e);
                });
        }
    }
}
</script>

<style scoped>

</style>
