<template>
	<div class="container">
	    <div class="row justify-content-center">
	    	<div class="col-12 col-md-6 my-4">
	    		<div class="card personaje">
	    			<div class="card-body d-flex flex-column justify-content-center align-items-center">
	    				<personajeComponent width="260" height="400"/>	
	    				<button class="btn btn-success mt-5 w-75">
	    					<h2 class="mb-0">
	    						Guardar
	    					</h2>	    					
	    				</button>
	    			</div>	    			
	    			<!-- <div class="card-footer text-center">
	    				
	    			</div> -->
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
							<div class="col mb-3" v-for="i in perfil.premios" :key="i.id">
						    	<div class="card premio">
						    		<div class="card-body">
										<img  style="width: 100%;height:100%;" width="125" height="125" :src="i.accesorio" alt="accesorio">
								      	<!--<svg style="width: 100%;height:100%;" width="125" height="125" viewBox="0 0 215 238" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M55.3878 141.178C76.3434 141.178 93.3313 124.19 93.3313 103.233C93.3313 82.2767 76.3434 65.2881 55.3878 65.2881C34.4322 65.2881 17.4443 82.2767 17.4443 103.233C17.4443 124.19 34.4322 141.178 55.3878 141.178Z" fill="url(#paint0_linear)"/>
											<path opacity="0.25" d="M78.8235 97.4279C83.6725 92.5786 83.6726 84.7163 78.8235 79.867C73.9744 75.0177 66.1125 75.0177 61.2634 79.867C56.4144 84.7163 56.4144 92.5786 61.2634 97.4279C66.1125 102.277 73.9744 102.277 78.8235 97.4279Z" fill="white"/>
											<path d="M90.6982 103.234C90.6955 110.513 88.4435 117.613 84.2505 123.563C80.0575 129.513 74.1283 134.021 67.2745 136.472C60.4207 138.922 52.9771 139.194 45.9626 137.251C38.948 135.308 32.7052 131.245 28.0886 125.618C23.472 119.99 20.7073 113.074 20.1727 105.814C19.638 98.5549 21.3597 91.3078 25.1021 85.0646C28.8445 78.8215 34.4247 73.8875 41.0789 70.9379C47.7332 67.9882 55.1364 67.1671 62.2752 68.5869C70.2603 70.2411 77.437 74.5824 82.6092 80.8871C87.7813 87.1918 90.6364 95.0789 90.6982 103.234C90.6982 106.629 96.0059 106.643 95.9781 103.234C96.0034 92.7144 91.9567 82.5935 84.6859 74.9918C77.4151 67.39 67.4845 62.8973 56.975 62.455C46.4654 62.0127 36.1925 65.6552 28.3088 72.6192C20.4251 79.5832 15.5424 89.3282 14.6838 99.8124C13.8252 110.297 17.0574 120.706 23.7031 128.86C30.3487 137.014 39.8921 142.28 50.3336 143.553C60.7751 144.827 71.3042 142.01 79.7149 135.692C88.1256 129.375 93.765 120.047 95.4515 109.664C95.7862 107.537 95.9623 105.387 95.9781 103.234C96.0059 99.8382 90.7121 99.8244 90.6982 103.234Z" fill="#31348A"/>
											<path d="M159.823 141.178C180.779 141.178 197.766 124.19 197.766 103.233C197.766 82.2767 180.779 65.2881 159.823 65.2881C138.867 65.2881 121.879 82.2767 121.879 103.233C121.879 124.19 138.867 141.178 159.823 141.178Z" fill="url(#paint1_linear)"/>
											<path opacity="0.25" d="M186.784 90.6842C187.882 83.9148 183.286 77.5364 176.517 76.4376C169.748 75.3388 163.37 79.9357 162.271 86.705C161.172 93.4743 165.769 99.8527 172.538 100.952C179.307 102.05 185.685 97.4535 186.784 90.6842Z" fill="white"/>
											<path d="M195.119 103.233C195.117 110.512 192.865 117.613 188.672 123.562C184.479 129.512 178.55 134.021 171.696 136.471C164.842 138.922 157.398 139.194 150.384 137.251C143.369 135.308 137.127 131.245 132.51 125.617C127.893 119.99 125.129 113.073 124.594 105.814C124.059 98.5546 125.781 91.3075 129.524 85.0643C133.266 78.8212 138.846 73.8872 145.5 70.9375C152.154 67.9879 159.558 67.1668 166.697 68.5866C174.684 70.236 181.864 74.576 187.037 80.8818C192.21 87.1875 195.063 95.0772 195.119 103.233C195.119 106.629 200.427 106.643 200.399 103.233C200.4 92.7434 196.341 82.6602 189.073 75.0963C181.806 67.5324 171.893 63.0748 161.411 62.6572C150.93 62.2397 140.694 65.8947 132.848 72.8564C125.001 79.8182 120.153 89.5465 119.319 100.003C118.486 110.46 121.731 120.834 128.375 128.951C135.019 137.068 144.546 142.299 154.961 143.548C165.376 144.797 175.87 141.967 184.245 135.65C192.62 129.334 198.225 120.021 199.887 109.664C200.21 107.535 200.381 105.386 200.399 103.233C200.441 99.8379 195.119 99.8241 195.119 103.233Z" fill="#31348A"/>
											<path d="M92.5693 103.011C92.5693 99.0557 94.1404 95.2628 96.9368 92.4663C99.7332 89.6697 103.526 88.0986 107.481 88.0986C111.435 88.0986 115.228 89.6697 118.025 92.4663C120.821 95.2628 122.392 99.0557 122.392 103.011" stroke="#31348A" stroke-width="2.92" stroke-miterlimit="10"/>
										</svg>-->
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