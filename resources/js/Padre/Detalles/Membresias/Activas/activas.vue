<template>
    <div>
        <table  class="table">
                <thead>
                <tr>
                    <th>Idiomas</th>
                    <th>Membresías</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="plan in membresias" :key="plan.id">
                    <td>{{plan.membresia.idioma.idioma}}</td>
                    <td><PlanCard :plan="plan"/></td>
                </tr>
                </tbody>
            </table>
          
    </div>
</template>

<script>
import PlanCard from './planCard';
    export default {
        name:"activas-component",
        props:["membresias"],
        components: {
            PlanCard,
        },
    }
</script>

<style lang="scss" scoped>

</style>