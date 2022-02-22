<template>
    <div class="d-flex justify-content-center">
        <div class="spinner-border text-info" role="status">
            <span class="visually-hidden"></span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Spinner"
}
</script>

<style scoped>
    .spinner-border {
        position: absolute;
        z-index: 1;
    }
</style>
