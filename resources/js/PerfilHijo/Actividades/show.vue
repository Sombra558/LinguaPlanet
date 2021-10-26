<template>
    <div class="body-component">
    	<a v-if="actividad.tipo ==='Libros' || actividad.tipo ==='Actividad'" class="back" :href="prevUrl">
            <img class="w-75" src="/images/back-yellow.svg">
        </a>
        <div v-if="actividad.tipo==='Palabras del día'|| actividad.tipo ==='Video de apertura'" style="height: 85%;">
				<video @ended="onEnd()" controls width="100%" height="100%">

					<source :src="'/storage/'+actividad.recurso"
							type="video/webm">

					<source :src="'/storage/'+actividad.recurso"
							type="video/mp4">

					Sorry, your browser doesn't support embedded videos.
				</video>
				  <!--<iframe width="100%"
	                height="100%" :src="actividad.recurso + '?autoplay=0'"
	                webkitallowfullscreen mozallowfullscreen allowfullscreen
	                autoplay="0"
	        ></iframe>-->
        </div>
		
		<div v-else class="d-flex justify-content-center" :style="{'height': ( openbook || actividad.tipo === 'Actividad' ) ? '85%' : '100%'}">
			<section v-if="actividad.tipo==='Libros'" class="content-pdf d-flex">
				<center v-if="openbook===false" class="mx-auto my-auto">
					<svg @click.prevent="openbook=true;" width="100%" height="100%" viewBox="0 0 432 388" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M421.914 323.595V323.153H49.1514C38.2195 323.433 27.8833 326.486 20.3314 331.666C12.7794 336.846 8.60452 343.745 8.69076 350.904C8.65006 354.473 9.70065 358.012 11.7808 361.312C13.8609 364.612 16.9285 367.606 20.8031 370.118C24.6778 372.631 29.2812 374.611 34.3426 375.942C39.404 377.273 44.8211 377.929 50.2753 377.87C53.1225 377.87 56.1945 377.87 59.0418 377.87H421.165C402.433 375.369 394.94 364.142 394.94 350.708C394.94 337.274 402.433 325.801 421.914 323.595Z" fill="white"/>
						<path d="M425.434 329.818H6.96582V332.466H425.434V329.818Z" fill="#CCD4D2"/>
						<path d="M425.434 343.301H6.96582V345.948H425.434V343.301Z" fill="#CCD4D2"/>
						<path d="M425.434 356.784H6.96582V359.432H425.434V356.784Z" fill="#CCD4D2"/>
						<path d="M425.434 363.501H6.96582V366.149H425.434V363.501Z" fill="#CCD4D2"/>
						<path d="M425.434 370.22H6.96582V372.867H425.434V370.22Z" fill="#CCD4D2"/>
						<path d="M425.434 350.018H6.96582V352.665H425.434V350.018Z" fill="#CCD4D2"/>
						<path d="M425.434 336.584H6.96582V339.232H425.434V336.584Z" fill="#CCD4D2"/>
						<path d="M401.982 0H48.3262V328.496H401.982C409.931 328.496 417.554 326.43 423.175 322.752C428.795 319.074 431.953 314.086 431.953 308.884V19.6117C431.953 14.4104 428.795 9.42204 423.175 5.74414C417.554 2.06623 409.931 0 401.982 0V0Z" fill="#FFC23A"/>
						<path d="M52.1493 377.869C51.7746 377.869 50.2012 377.869 50.5758 377.869C52.1493 377.869 49.8265 366.641 49.8265 352.864C49.8265 339.086 53.423 328.692 50.9504 328.349H53.423L52.0743 54.8638H53.2732V0H50.9504C27.798 0 5.31983 9.11944 1.87318 22.2103C1.15198 26.2287 0.876521 30.276 1.04898 34.3205C1.04898 34.3205 0 352.324 0 353.648C0.0380249 354.96 0.188109 356.27 0.449559 357.57V358.404C2.96403 365.822 9.3699 372.429 18.5544 377.077C27.739 381.726 39.1218 384.122 50.7257 383.85H51.8496L52.1493 377.869Z" fill="#F9A431"/>
						<path d="M424.912 327.415C424.912 327.415 392.169 355.999 426.935 378.258H24.2772L22.3291 323.885L424.912 327.415Z" fill="#E7E5E5"/>
						<path d="M22.3291 357.621C27.6489 354.973 90.1381 324.035 416.596 336.489C417.684 332.887 420.618 329.635 424.912 327.271L27.7988 321.339L22.3291 357.621Z" fill="#CECECD"/>
						<path d="M27.6041 345.914V338.856C27.6041 326.26 42.5713 327.289 42.5713 327.289H431.718V312.88H38.2308C31.6576 312.669 25.2089 314.106 20.1954 316.899L19.2225 317.585L18.6986 317.977C11.215 323.172 -17.522 346.698 15.6304 379.978C17.8392 382.562 21.12 384.684 25.093 386.097C29.0661 387.511 33.5691 388.159 38.0812 387.967H431.718V373.606H42.5713C42.5713 373.606 27.6041 374.636 27.6041 362.088V345.914Z" fill="#FFC23A"/>
						<path d="M42.7804 373.601C42.7804 373.601 27.795 374.631 27.795 362.08V338.84C27.795 326.239 42.7804 327.269 42.7804 327.269H110.215V312.854H38.4346C31.8534 312.644 25.3968 314.082 20.3772 316.875L19.4031 317.561L18.8786 317.953C11.3859 323.15 -17.3861 346.684 15.8066 379.975C18.0182 382.56 21.3029 384.682 25.2808 386.097C29.2587 387.511 33.7672 388.159 38.2848 387.967H110.215V373.601H42.7804Z" fill="#F9A431"/>
						<path d="M110.442 0H49.8262V312.856H110.442V0Z" fill="#F9A431"/>
					</svg>
				</center>
				<article v-else class="visor-pdf">
					<pdf style="heigth:100%; width:100%;" 
						:src="'/storage/'+actividad.recurso"
						:page="currentPage"
						@num-pages="pageCount = $event"
						@page-loaded="currentPage = $event"
					/>
				</article>
			</section>
			<section v-else class="content-pdf d-flex">
				<article class="visor-pdf">
					<pdf style="width:100%;" 
						:src="'/storage/'+actividad.recurso"
						:page="currentPage"
						@num-pages="pageCount = $event"
						@page-loaded="currentPage = $event"
					/>
				</article>
			</section>
		</div>
        <div v-if="actividad.tipo !=='Libros' || (actividad.tipo ==='Libros' && openbook)" class="d-flex bg-white align-items-center px-2 px-md-4" style="height:15%;">
        	<div class="col-6 col-md-4">
	        	<div class="avatar">
	                <div class="header-animal-icon" style="background-color : #FAB500;">
	                    <cara-avatar class="w-100 h-100" :perfil="perfil"/>
	                </div>
	                <span class="nickname-header">{{ perfil.apodo }}</span>
	            </div>
            </div>            
            <div class="col-6 col-md-4 d-flex" v-if="actividad.tipo !=='Palabras del día' && actividad.tipo !=='Video de apertura'">
            	<button class="arrow-btn mx-auto" :disabled="noPrevPage" @click.prevent="anterior()">
            		<svg viewBox="7 5 70 70" class="w-100 h-100">
            			<path xmlns="http://www.w3.org/2000/svg" d="M20.9341 43.6213C19.7626 42.4497 19.7626 40.5503 20.9341 39.3787L40.026 20.2868C41.1976 19.1152 43.0971 19.1152 44.2687 20.2868C45.4402 21.4584 45.4402 23.3579 44.2687 24.5294L27.2981 41.5L44.2687 58.4706C45.4402 59.6421 45.4402 61.5416 44.2687 62.7132C43.0971 63.8848 41.1976 63.8848 40.026 62.7132L20.9341 43.6213ZM59.9443 44.5L23.0555 44.5V38.5L59.9443 38.5V44.5Z" fill="#010112"/>
            		</svg>
            	</button>
            	<button class="arrow-btn mx-auto" :disabled="noNextPage" @click.prevent="siguiente()" style="transform: scaleX(-1);">
            		<svg viewBox="7 5 70 70" class="w-100 h-100">
            			<path xmlns="http://www.w3.org/2000/svg" d="M20.9341 43.6213C19.7626 42.4497 19.7626 40.5503 20.9341 39.3787L40.026 20.2868C41.1976 19.1152 43.0971 19.1152 44.2687 20.2868C45.4402 21.4584 45.4402 23.3579 44.2687 24.5294L27.2981 41.5L44.2687 58.4706C45.4402 59.6421 45.4402 61.5416 44.2687 62.7132C43.0971 63.8848 41.1976 63.8848 40.026 62.7132L20.9341 43.6213ZM59.9443 44.5L23.0555 44.5V38.5L59.9443 38.5V44.5Z" fill="#010112"/>
            		</svg>   		
            	</button>
            </div>
            <div v-if="actividad.tipo==='Palabras del día'|| actividad.tipo ==='Video de apertura'" class="ml-auto col-3 text-center">
            	<a :href="prevUrl">
		            <img class="w-25 w-md-40 w-sm-75" src="/images/back-yellow.svg">
		        </a>
            </div>
            <div v-else class="col-4">
            	
            </div>
        </div>                  
    </div>
</template>

<script>
	import pdf from "vue-pdf";

	

    export default {
        name:"actividad-show",
        props:['perfil','actividad','curso'],
	
        data() {
			return {
				actividadSelected: null,
				page:0,
				currentPage: 1,
        		pageCount: 0,
        		src: null,
        		zoom: 100,
				openbook:false,
				prevUrl : document.referrer,
				videoID: '76979871',
				height: 500,
				options: {
					muted: true,
					autoplay: true,
				},
				playerReady: false,
				visto:false,
				
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
				
				if (this.currentPage === this.pageCount) {
					var url = `/home/app/${this.perfil.id}/curso/${this.curso.id}/clase/${this.actividad.clase_id}/actividad/${this.actividad.id}/realizada`;
					axios.get(url).then((result) => {
						console.log(result.data);
					}).catch((err) => {
						
					});
				}

				return this.currentPage === this.pageCount;
				
			},
			
		
		},
		methods: {
			siguiente(){
				this.currentPage++;
			},
			anterior(){				
				this.currentPage--;
			},
			onEnd: function () {
				var url = `/home/app/${this.perfil.id}/curso/${this.curso.id}/clase/${this.actividad.clase_id}/actividad/${this.actividad.id}/realizada`;
					axios.get(url).then((result) => {
						console.log(result.data);
					}).catch((err) => {
						
					});
			}
			
		
		},
    }
</script>

<style lang="scss" scoped>

	.arrow-btn {
		background-color: #FAB500;
	    border: solid 3px black;
	    border-radius: 50px;
	    width: 4rem;
	    height: 4rem;
	}

	.back {
		position:absolute;
		top: 5%;
		left: 85.5%;
		width: 8%;
	}

	.body-component {
		position: relative;
		height: 100vh;
	
		background-image: url('/images/estrellas-pdf.svg');
		background-repeat: no-repeat;
		background-position: center center;
	}

	.visor-pdf {
		width: 57.9em;
	}

	.content-pdf {
		height : 100%;
		overflow-y: auto;
	}

	.header-animal-icon {
		padding : 5px;
	    width : 100%;
	    height : 100%;
	    border-radius : 50px;
	    border : 6px solid #31348b;
	    position : absolute;
	    top : 0;
		left : 0;
	    z-index : 2;
	}

	.avatar {
		position : relative;
		width : 100px;
		height : 100px;
	}

	@media(max-height: 680px) {
		.avatar {
			width : 70px;
			height : 70px;
		}

		.nickname-header {
			top : 12%;
		}

		.w-md-40 {
			width: 40% !important;
		}
	}

	@media(max-width: 425px) {
		.visor-pdf {
			width: 100%;
			height: 25em;
			
		}

		.content-pdf {
			width: 100%;
		}

		.w-sm-30 {
			width: 30% !important;
		}

		.w-sm-75 {
			width: 75% !important;
		}
	}
</style>