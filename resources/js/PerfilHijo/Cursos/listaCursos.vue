<template>
	<div class="container">
	    <div class="row">
	    	<div class="col-4 text-center" v-for="curso in cursos" :key="curso.id">
	    		<a class="text-white" :href="'/home/app/'+perfil.id+'/idiomas/'+idioma.diminutivo+'/'+curso.id">
	    			<img class="curso-img" :src="`${idioma.src}`">
	    			<h3>
	    				{{curso.titulo}}
	    			</h3>
	    		</a>
	    	</div>        
	    </div>
    </div>
</template>

<script>
    export default {
        name:"lista-cursos-component",
        props:['cursos','perfil','idioma'],
    }
</script>

<style lang="scss" scoped>
	.curso-img {
		width: 100px;
		height: 100px;
    	border: 15px solid white;
    	border-radius: 50px;
	}
</style>