<template>
    <div >
        <iframe v-if="actividad.tipo==='Palabras del día'|| actividad.tipo ==='Video de apertura'" width="100%"
                                height="300" :src="actividad.recurso + '?autoplay=1'"
                            webkitallowfullscreen mozallowfullscreen allowfullscreen
                            autoplay="1"></iframe>
					<div  v-else>
                         <pdf style="width:500px;" 
						:src="actividad.recurso"
						:page="currentPage"
						@num-pages="pageCount = $event"
						@page-loaded="currentPage = $event"
						
					/>
                    <button :disabled="noPrevPage" type="button" @click.prevent="anterior()" class="btn btn-primary">Anterior</button>
					<button :disabled="noNextPage" type="button" @click.prevent="siguiente()" class="btn btn-primary">Siguiente</button>
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