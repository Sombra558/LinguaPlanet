<template>
	<div class="container">
	    <div class="row justify-content-center">
	    	<div class="col-12 col-md-6 my-4">
	    		<div class="card personaje">
	    			<div class="card-body d-flex flex-column justify-content-center align-items-center">
	    				<svg class="w-100 h-75" viewBox="0 0 230 430" fill="none" xmlns="http://www.w3.org/2000/svg">
	    					<personajeComponent :avatar="perfil.avatar" :premios="perfil.premios"/>
	    				</svg>
	    				<button class="btn btn-success mt-5 w-75">
	    					<h2 class="mb-0">
	    						Guardar
	    					</h2>	    					
	    				</button>
	    			</div>
    			</div>
	    	</div>
	    	<div class="col-12 col-md-6 my-4">
		        <div class="card premios">
		        	<div style="position: absolute;top: -22px;width:100%;text-align: center;">
						<span class="card-head color-yellow" style="padding: 0.5% 3%;border-radius: 50px;font-size: 1.4rem;box-shadow: rgb(255, 255, 255) 0px 0px 6px 2px;">
							Premios
						</span>        		
		        	</div>
		        	<div class="card-body" style="padding-top: 8%;">
		    			<div class="premios-container row row-cols-2">
							<div class="col-6 mb-3" v-for="i in perfil.premios" :key="i.id">
						    	<div class="card premio" @click="putAccesory()">
						    		<div class="card-body text-center">
										<img width="125" height="125" :src="i.accesorio" alt="accesorio">
						      		</div>
						    	</div>
						    	<p class="card-text text-white text-center">{{ i.nombre }}</p>
						  	</div>
						</div>
		        	</div>
		        </div>
	        </div>
	    </div>
    </div>
</template>

<script>
	import personajeComponent from './personaje';
    export default {
        name:"perfiluser-show-component",
        props:['perfil'],
        components : {
        	personajeComponent
        },
        data() {
            return {
                idiomas: [],
            }
        },
        methods : {
        	putAccesory : function(accesory) {
        		
        	}
        }
    }
</script>

<style lang="scss" scoped>

	.premios-container {
		overflow-y: scroll;
		height: 100%;

		&::-webkit-scrollbar{
			width: 20px;
		}

		&::-webkit-scrollbar-track {
			background: #FAB500;
			border-left: 9px solid #ffffff00;
			border-right: 9px solid #ffffff00;
			background-clip: content-box;
			border-radius: 25px;
		}

		&::-webkit-scrollbar-thumb{
			background: #FAB500;
			border-left: 7px solid #ffffff00;
			border-right: 7px solid #ffffff00;
			background-clip: content-box;
			border-radius: 8px;
		}

	}

	.card-head {
		background: #31348A;
		border: 2px solid #F9B233;
	}

	.card.personaje {
		border: 1px solid #64D2F1;
		background: transparent;
		-moz-box-shadow: 0px 0px 6px 0 #ffffff, inset 0px 0px 6px 0 #ffffff;
		-webkit-box-shadow: 0px 0px 6px 0 #ffffff, inset 0px 0px 6px 0 #ffffff;
		box-shadow: 0px 0px 6px 0 #ffffff, inset 0px 0px 6px 0 #ffffff;
		height: 75vh;
	}

	.card.premios {
		border: 1px solid #F9B233;
		background: linear-gradient(0deg, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.1) 100%);
		-moz-box-shadow: 0px 0px 11px 0 #ffffff, inset 0px 0px 9px 0 #ffffff;
		-webkit-box-shadow: 0px 0px 11px 0 #ffffff, inset 0px 0px 9px 0 #ffffff;
		box-shadow: 0px 0px 11px 0 #ffffff, inset 0px 0px 9px 0 #ffffff;
		height: 75vh;
	}

	.card.premio {
		background : transparent;
		border: 1px solid #FAB500;
		-moz-box-shadow: 0px 0px 5px 0 #ffffff, inset 0px 0px 3px 0 #ffffff;
		-webkit-box-shadow: 0px 0px 5px 0 #ffffff, inset 0px 0px 3px 0 #ffffff;
		box-shadow: 0px 0px 5px 0 #ffffff, inset 0px 0px 3px 0 #ffffff;
	}
</style>