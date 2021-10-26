<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="text" v-model="cupon" maxlength="20">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" @click.prevent="aplicar(cupon)">Aplicar Cupon</button>
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