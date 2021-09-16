<template>
    <div class="left-panel container bg-primary">
        <div class="row py-3">
            <div class="col-12 text-right">
                <label class="mb-0" for="check">
                    <button class="toggle-father-details img-btn">
                        <img class="iz-100"  src="/images/exit-icon.svg">
                    </button>                    
                </label>                
            </div>
        </div>                    
        <div class="row panel-content">
            <div class="col-12 text-center">
                <img class="iz-40 mb-4" src="/images/bwhite-lock.svg">
                <h2 class="bold">Solo para adultos</h2>
                <span>Para continuar por favor ingresa</span>
                <div class="my-5">
                    <h2 class="color-yellow mb-4">Siete, Cuatro, Cinco</h2>
                    <input class="input-validation-father" type="text" name="number">
                    <input class="input-validation-father" type="text" name="number">
                    <input class="input-validation-father" type="text" name="number">
                </div>
                <button class="btn btn-primary-red"><span class="h4 px-2">Acceder</span></button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"block-sidepanel",
        props:['user'],
        data() {
            return {
                selectMode : false,
            }
        },
        mounted() {
            $('.toggle-father-details').on('click', (e) => {
                $('.backdrop').toggleClass('show');
                $('.left-panel').toggleClass('show');
            });
        }
    }
</script>

<style lang="scss" scoped>
    .left-panel.show {
        left : 0;
    }

    .panel-content {
        height : 80%;
        display : flex;
        align-items : center;
        justify-content : center;
        color : white;
    }

    .input-validation-father {
        width: 20%;
        margin: 0 0.5rem 0 0.5rem;
        padding: 0.6rem 0.55rem;
        background: #FFFFFF;
        border: 1px solid #31348B;
        box-sizing: border-box;
        border-radius: 12px;
    }
</style>