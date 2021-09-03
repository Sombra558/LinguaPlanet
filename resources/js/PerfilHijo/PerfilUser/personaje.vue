<template>

    <img :src="avatar.cuerpo" alt="mi avatar">
</template>

<script>
    export default {
        name:"user-character",
        props:["avatar"],
    }
</script>

<style lang="scss" scoped>

</style>