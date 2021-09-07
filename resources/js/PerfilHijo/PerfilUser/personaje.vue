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
        },
		mounted () {
			if (this.avatar.gorro) {
				var gorro = JSON.parse(this.avatar.gorro);
				this.accesoriesUsed.push(gorro);
			}
			if (this.avatar.camisa) {
				var camisa = JSON.parse(this.avatar.camisa);
				this.accesoriesUsed.push(camisa);
			}
			if (this.avatar.botas) {
				var botas = JSON.parse(this.avatar.botas);
				this.accesoriesUsed.push(botas);
			}
			if (this.avatar.bufanda) {
				var bufanda = JSON.parse(this.avatar.bufanda);
				this.accesoriesUsed.push(bufanda);
			}
			if (this.avatar.gafas) {
				var gafas = JSON.parse(this.avatar.gafas);
				this.accesoriesUsed.push(gafas);
			}
			if (this.avatar.guitarra) {
				var guitarra = JSON.parse(this.avatar.guitarra);
				this.accesoriesUsed.push(guitarra);
			}
			if (this.avatar.yoyo) {
				var yoyo = JSON.parse(this.avatar.yoyo);
				this.accesoriesUsed.push(yoyo);
			}
		},
    }
</script>

<style lang="scss" scoped>

</style>