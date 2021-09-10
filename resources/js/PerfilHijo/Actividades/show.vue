<template>
    <div class="bg-white" style="height: 100vh;">
        <iframe v-if="actividad.tipo==='Palabras del día'|| actividad.tipo ==='Video de apertura'" width="100%"
                height="85%" :src="actividad.recurso + '?autoplay=0'"
                webkitallowfullscreen mozallowfullscreen allowfullscreen
                autoplay="0"
        ></iframe>
        <center style="height: 85%;" v-else>
        	<pdf style="width:500px;" 
			 :src="actividad.recurso"
			 :page="currentPage"
			 @num-pages="pageCount = $event"
			 @page-loaded="currentPage = $event"
			/>
        </center>
        <div class="d-flex justify-content-between align-items-center px-4" style="height:14%;">
        	<div style="position : relative; width : 100px; height : 100px;">
                <div class="header-animal-icon" style="background-color : #FAB500;">
                    <cara-avatar class="w-100 h-100" :perfil="perfil"/>
                </div>
                <span class="nickname-header">{{ perfil.apodo }}</span>
            </div>
        	<div v-if="actividad.tipo !=='Palabras del día' && actividad.tipo !=='Video de apertura'">
				<button :disabled="noPrevPage" type="button" @click.prevent="anterior()" class="btn btn-primary">Anterior</button>
				<button :disabled="noNextPage" type="button" @click.prevent="siguiente()" class="btn btn-primary">Siguiente</button>	        		
        	</div>
        </div>                  
    </div>
</template>

<script>
	import pdf from "vue-pdf";
    export default {
        name:"actividad-show",
        props:['perfil','actividad'],
        data() {
			return {
				actividadSelected: null,
				page:0,
				currentPage: 1,
        		pageCount: 0,
        		src: null,
        		zoom: 100
			}
		},
        components : {
    		pdf
        },
        computed: {
			noPrevPage() {
				return this.currentPage <= 1;
			},
			noNextPage() {
				return this.currentPage === this.pageCount;
			}
		},
		methods: {
			siguiente(){
				this.currentPage++;
			},
			anterior(){				
				this.currentPage--;
			}
		},
    }
</script>

<style lang="scss" scoped>

</style>