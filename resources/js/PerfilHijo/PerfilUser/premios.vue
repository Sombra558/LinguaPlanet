<template>
	<div class="container">
	    <div class="row justify-content-center">
	    	<div class="col-12">
		        <div class="card premios">
		        	<div style="position: absolute;top: -22px;width:100%;text-align: center;">
						<span class="card-head color-yellow" style="padding: 0.5% 3%;border-radius: 50px;font-size: 1.4rem;box-shadow: rgb(255, 255, 255) 0px 0px 6px 2px;">
							premios guardados
						</span>        		
		        	</div>
		        	<div class="card-body" style="padding-top: 8%;">
		    			<div class="premios-container row row-cols-2 row-cols-md-5">
							<div class="col mb-3" v-for="i in perfil.premios" :key="i.id">
						    	<div class="card premio">
						    		<div class="card-body">
										<img width="125" height="125" :src="`${i.accesorio.split('.')[0]}${i.pivot.color !== null ? i.pivot.color.split('#')[1] : ''}.svg`" alt="accesorio">
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
    export default {
        name:"perfiluser-show-component",
        props:['perfil'],
        data() {
            return {
                idiomas: [],
            }
        },
        mounted () {
            this.perfil.planes?.forEach(plan => {
                if (this.idiomas.some(evt => evt.id===plan.plan.membresia.idioma.id)!=true) {
                    this.idiomas.push(plan.plan.membresia.idioma);
                }               
            });
        },
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