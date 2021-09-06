<template>
	<g>
    	<image x="-90" y="30" width="410" height="400" preserveAspectRatio="none" :xlink:href="avatar.cuerpo" alt="mi avatar"/>
    	<image v-for="accesory in accesoriesUsed" :key="accesory.id" :x="accesory.corde_x" :y="accesory.corde_y" :xlink:href="accesory.accesorio" preserveAspectRatio="none"/>
	</g>
</template>

<script>
    export default {
        name:"user-character",
        props:["avatar"],
        data() {
        	return {
        		accesoriesUsed : []
        	}
        }
    }
</script>

<style lang="scss" scoped>

</style>