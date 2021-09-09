<template>
	<svg>
    	<image width="100%" :y="perfil.avatar.animal_id === 4 ? 0 : 50" :xlink:href="perfil.avatar.cara"/>
        <image v-for="accesory in accesoriesUsed" :key="accesory.id" :x="accesory.corde_x" :y="accesory.corde_y" :xlink:href="accesory.accesorio" preserveAspectRatio="none"/>
	</svg>
</template>

<script>
    export default {
        name:"face-character",
        props:["perfil"],
        data() {
        	return {
        		accesoriesUsed : []
        	}
        },
		mounted () {
			if (this.perfil.avatar.gorro) {
				var gorro = JSON.parse(this.perfil.avatar.gorro);
				this.accesoriesUsed.push(gorro);
			}
			if (this.perfil.avatar.gafas) {
				var gafas = JSON.parse(this.perfil.avatar.gafas);
				this.accesoriesUsed.push(gafas);
			}
		},
    }
</script>

<style lang="scss" scoped>

</style>