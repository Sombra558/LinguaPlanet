<template>
	<svg viewBox="0 0 250 250">
    	<image width="100%" height="100%" :xlink:href="perfil.avatar.cara"/>
        <image v-for="accesory in accesoriesUsed" :key="accesory.id" :x="accesory.corde_x" :y="accesory.corde_y" :href="`${accesory.accesorio.split('.')[0]}${accesory.color !== null ? accesory.color.split('#')[1] : ''}.svg`" preserveAspectRatio="none"/>
	</svg>
</template>

<script>
    export default {
        name:"face-character",
        props:["perfil"],
        data() {
        	return {
        		accesoriesUsed : [],
        		accesoriesCoords : [
        			{ animal_id : 1, gorro : { x : 15, y : -15 }, gafas : { x : 51, y : 105 } },
        			{ animal_id : 2, gorro : { x : 29, y : 12 }, gafas : { x : 58, y : 105 } },
        			{ animal_id : 3, gorro : { x : 31, y : 13 }, gafas : { x : 63, y : 74 } },
        			{ animal_id : 4, gorro : { x : 60, y : 102 }, gafas : { x : 60, y : 168 } },
        			{ animal_id : 5, gorro : { x : 37, y : 12 }, gafas : { x : 56, y : 90 } },
        			{ animal_id : 6, gorro : { x : 25, y : 28 }, gafas : { x : 55, y : 122 } }
        		],
        	}
        },
		mounted () {
			if (this.perfil.avatar.gorro) {
				var gorroObj = JSON.parse(this.perfil.avatar.gorro);
				let { gorro } = this.accesoriesCoords.find(a => a.animal_id === this.perfil.avatar.animal_id);
				gorroObj.corde_x = gorro.x;
				gorroObj.corde_y = gorro.y;
				this.accesoriesUsed.push(gorroObj);
			}
			if (this.perfil.avatar.gafas) {
				var gafasObj = JSON.parse(this.perfil.avatar.gafas);
				let { gafas } = this.accesoriesCoords.find(a => a.animal_id === this.perfil.avatar.animal_id);
				gafasObj.corde_x = gafas.x;
				gafasObj.corde_y = gafas.y;
				this.accesoriesUsed.push(gafasObj);
			}
		},
    }
</script>

<style lang="scss" scoped>

</style>