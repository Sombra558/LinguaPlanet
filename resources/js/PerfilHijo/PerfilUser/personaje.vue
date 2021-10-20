<template>
	<g>
    	<image x="-90" y="30" width="410" height="400" preserveAspectRatio="none" :href="avatar.cuerpo" alt="mi avatar"/>
    	<!-- <foreignObject v-for="accesory in displayAccesories" :x="accesory.corde_x" :y="accesory.corde_y" width="200" height="160">
	    	<object type="image/svg+xml" :data="accesory.accesorio">
				<param name="color" :value="accesory.color"/>
			</object>
		</foreignObject> -->
    	<use class="accesorio" v-for="accesory in displayAccesories" :key="accesory.id" :x="accesory.corde_x" :y="accesory.corde_y" :href="accesory.accesorio+'#accesorio'" preserveAspectRatio="none"></use>
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
        computed : {
        	displayAccesories() {
        		return this.accesoriesUsed.sort((currentA, nextA) => currentA.display - nextA.display);
        	}
        },
		mounted () {
			if (this.avatar.gorro) {
				var gorro = JSON.parse(this.avatar.gorro);
				gorro = {...gorro, display : 1};
				this.accesoriesUsed.push(gorro);
			}
			if (this.avatar.camisa) {
				var camisa = JSON.parse(this.avatar.camisa);
				camisa = {...camisa, display : 1};
				this.accesoriesUsed.push(camisa);
			}
			if (this.avatar.botas) {
				var botas = JSON.parse(this.avatar.botas);
				botas = {...botas, display : 1};
				this.accesoriesUsed.push(botas);
			}
			if (this.avatar.bufanda) {
				var bufanda = JSON.parse(this.avatar.bufanda);
				bufanda = {...bufanda, display : 2};
				this.accesoriesUsed.push(bufanda);
			}
			if (this.avatar.gafas) {
				var gafas = JSON.parse(this.avatar.gafas);
				gafas = {...gafas, display : 2};
				this.accesoriesUsed.push(gafas);
			}
			if (this.avatar.guitarra) {
				var guitarra = JSON.parse(this.avatar.guitarra);
				guitarra = {...guitarra, display : 2};
				this.accesoriesUsed.push(guitarra);
			}
			if (this.avatar.yoyo) {
				var yoyo = JSON.parse(this.avatar.yoyo);
				yoyo = {...yoyo, display : 1};
				this.accesoriesUsed.push(yoyo);
			}
		},
    }
</script>

<style lang="scss" scoped>
	use.accesorio {
		fill : red;
	}

	svg path.relleno {
		fill : inherit;
	}
</style>