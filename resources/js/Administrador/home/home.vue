<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="color-black">Resumen</h3>
                <div class="col-12 resumen-stats p-4">
                    <div class="row">
                        <div class="col-12 col-md-4 mb-3 mb-md-0 py-3 py-md-0 estadistica text-center">
                            <h1>{{usuarios}}</h1>
                            <span class="color-plomo">Usuarios Registrados</span>
                        </div>
                        <div class="col-12 col-md-4 mb-3 mb-md-0 py-3 py-md-0 estadistica text-center">
                            <h1>{{cursos.length}}</h1>
                            <span class="color-plomo">Cursos Activos</span>
                        </div>
                        <div class="col-12 col-md-4 mb-3 mb-md-0 py-3 py-md-0 estadistica text-center">
                            <h1>{{perfiles}}</h1>
                            <span class="color-plomo">Niños Registrados</span>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row mt-md-4">
            <div class="col-12">
                <h3 class="color-black m-0">Actividades de la semana</h3>
                <div class="table-container">
                    <table class="table table-borderless table-striped table-com mt-3">
                        <thead>
                            <tr class="color-black">
                                <th>Curso</th>
                                <th>Semana en Curso</th>
                                <th>Detalle</th>                     
                            </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(curso,index) in cursos" :key="index">
                            <td class="color-black">{{curso.Curso.titulo}}</td>
                            <td class="color-black">{{curso.Semana.indice}}</td>
                            <td><a :href="'/admin/curso/'+curso.Curso.id">Ver contenidos</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"admin-home-component",
        props:['usuarios','cursos','perfiles'],
    }
</script>

<style lang="scss" scoped>
    .resumen-stats {
        background-color: transparent;
        // background-color: green;
    }

    .resumen-stats .estadistica {
        background-color: #F8F8F8;
    }

    .resumen-stats h1 {
        font-weight: 500;
    }

    table thead th {
        font-size: 1rem;
        font-weight: 500;
    }

    table tbody tr {
        font-size: 1rem;
        font-weight: 400;
    }

    .table-container {
        width : 100%;
        overflow-x : auto;
    }

    .table {
        width : 73.4em;
    }

    @media(min-width: 768px) {
        .resumen-stats {
            background-color: #F8F8F8;
            // background-color: green;
        }

        .resumen-stats .estadistica {
            background-color: transparent;
        }
    }
</style>