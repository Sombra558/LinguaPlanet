<template>
    <div class="container">
           <h1>Resumen</h1>

           <div class="row">
                <div class="col-md-4 col-sm-12">
                    <strong>{{usuarios}}</strong>
                    <span>Usuario Registrados</span>
                </div>
                <div class="col-md-4 col-sm-12">
                    <strong>{{cursos.length}}</strong>
                    <span>Cursos Activos</span>
                </div>
                <div class="col-md-4 col-sm-12">
                    <strong>{{perfiles}}</strong>
                    <span>Niños Registrados</span>
                </div>
                
           </div>
            <h1>Actividades de la semana</h1>
               <table style="margin-top:25px" class="table table-com">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Semana en Curso</th>
                        <th>Detalle</th>
                 
                    </tr>
                </thead>
                <tbody>
                <tr  v-for="(curso,index) in cursos" :key="index">
                    <td>{{curso.Curso.titulo}}</td>
                    <td>{{curso.Semana.id}}</td>
                    <td><a :href="'#'">Ver contenidos</a></td>
                </tr>
                </tbody>
            </table>


    </div>
</template>

<script>
    export default {
        name:"admin-home-component",
        props:['usuarios','cursos','perfiles'],
    }
</script>

<style lang="scss" scoped>

</style>