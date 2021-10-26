<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="height: 19rem;">
                <div class="modal-header modal-header-admin pb-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.5 7.5L7.5 22.5" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.5 7.5L22.5 22.5" stroke="#606060" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <div class="modal-body pt-0 px-5">
                    <div class="row mt-4">
                        <div class="col text-center">
                            <h3 class="modal-title fw-600" id="exampleModalLabel">Cupón de descuento</h3>
                        </div>                        
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <input type="text" class="form-input input-primary" v-model="cupon" maxlength="20">    
                        </div>                        
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button type="button" class="btn btn-block btn-success" @click.prevent="aplicar(cupon)">
                                <span class="h5 fw-500">
                                    Aplicar Cupon
                                </span>
                            </button>    
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"cupon-modal",
        props:['plan'],
        data() {
            return {
                cupon: null,
                estadocupon:false,
            }
        },
        methods: {
            aplicar(cupon) {
                if (this.estadocupon===false) {
                    var url = `/aplicar-cupon/${cupon}/${this.plan.id}/${this.plan.membresia_id}`;
                    axios.get(url).then((result) => {
                        console.log(result.data);
                        if (result.data!='') {
                            this.$store.commit("setCupon",  result.data);
                            this.estadocupon=true;
                            $("#exampleModal").modal("hide");
                        }
                        
                    }).catch((err) => {
                        console.log(err);
                    });
                }else{
                    console.log('ya se aplico cupon')
                }
                
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>