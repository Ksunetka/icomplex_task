<template>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid justify-content-center" id="navbarNav">
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item me-4" v-for="link in links">
<!--                        class="nav-link active"-->
                    <router-link :to="link.href" class="nav-link active">{{ link.title }}</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            links: [
                {
                    title: "Главная",
                    href: "/"
                },
                {
                    title: "Гостевая книга",
                    href: "/book"
                }
            ]
        }
    }

}
</script>

<style scoped>

</style>
