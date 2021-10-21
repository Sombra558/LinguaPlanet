<template>
	<div class="container">
	    <div class="row justify-content-center">
	    	<div class="col-12 col-md-6 my-4">
	    		<div class="card personaje">
	    			<div class="card-body d-flex flex-column justify-content-center align-items-center">
	    				<svg class="w-100 h-75" viewBox="0 0 230 430" fill="none" xmlns="http://www.w3.org/2000/svg">
	    					<personajeComponent ref="personaje" :avatar="perfil.avatar" :premios="perfil.premios"/>
	    				</svg>
	    				<button :disabled="estadoprocreso" @click.prevent="guardar()" class="btn btn-success mt-5 w-75">
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
							<div class="col-6 mb-3" v-for="premio in perfil.premios" :key="premio.id">
						    	<div class="card premio" @click="updateCloth(premio)">
						    		<div class="card-body text-center">
                                        <img width="125" height="125" :src="`${premio.accesorio.split('.')[0]}${premio.pivot.color !== null ? premio.pivot.color.split('#')[1] : ''}.svg`" alt="accesorio">
						      		</div>
						    	</div>
						    	<p class="card-text text-white text-center">{{ premio.nombre }}</p>
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
				estadoprocreso:false,
            }
        },
        methods : {
        	updateCloth : function(accesory) {
        		
        		if (this.$refs.personaje.accesoriesUsed.some(a => a.id === accesory.id)){
        			this.$refs.personaje.accesoriesUsed = this.$refs.personaje.accesoriesUsed.filter(a => {
        				if(a.id !== accesory.id) {
        					return a;
        				}
        			});
        			return
        		}

        		let newAccesory = true;
    			this.$refs.personaje.accesoriesUsed = this.$refs.personaje.accesoriesUsed.map(a => {
    				if(a.tipo === accesory.tipo){
    					newAccesory = false;
    					let { id, tipo, display, corde_x, corde_y, accesorio } = accesory; 
    					return { 'id' : id, 'tipo' : tipo, 'display' : display, 'corde_x' : corde_x, 'corde_y' : corde_y, 'accesorio' : accesorio };
    				} else
    					return a;
    			});
    			let { id, tipo, corde_x, corde_y, accesorio, pivot : { color } } = accesory; 
    			let display = 1;

    			if(tipo === 'bufanda' || tipo === 'gafas')
    				display = 2;
    			else if(tipo === 'guitarra')
    				display = 3;

    			if (newAccesory) this.$refs.personaje.accesoriesUsed.push( { 'id' : id, 'tipo' : tipo, 'display' : display, 'corde_x' : corde_x, 'corde_y' : corde_y, 'accesorio' : accesorio, 'color' :  color } );
        	},
			guardar(){
				this.estadoprocreso=true;
				var url = '/home/actualizar-avatar/'+this.perfil.id;
				axios.post(url,{
					data:JSON.stringify(this.$refs.personaje.accesoriesUsed),
				}).then((result) => {
					window.location="/home/app/"+this.perfil.id+'/'+this.perfil.apodo;
				}).catch((err) => {
					this.estadoprocreso=true;
					console.log(err);
				});
				
			
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