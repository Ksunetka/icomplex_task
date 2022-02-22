<template>
    <div class="d-flex justify-content-center mt-4">
        <h1>{{ book_title }}</h1>
    </div>

    <div class="d-flex flex-column justify-content-start w-75 m-auto mt-4">
        <message></message>
    </div>
</template>

<script>
    import Message from "../components/Book/Message";
    export default {
        setup: () => ({
            book_title: 'Гостевая книга Vue & Laravel'
        }),
        components: {
            Message
        }
    }
</script>

<style scoped>

</style>
