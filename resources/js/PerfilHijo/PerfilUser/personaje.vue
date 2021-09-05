<template>
	<g>
    	<image x="-90" y="30" width="410" height="400" preserveAspectRatio="none" :xlink:href="avatar.cuerpo" alt="mi avatar"/>
    	<image v-for="i in accesoriesUsed" :key="i.id" x="39" y="30" :xlink:href="i.accesorio" alt="mi avatar" preserveAspectRatio="none"/>
	</g>
</template>

<script>
    export default {
        name:"user-character",
        props:["avatar", "premios"],
        data() {
        	return {
        		accesoriesUsed : []
        	}
        }
    }
</script>

<style lang="scss" scoped>

</style>