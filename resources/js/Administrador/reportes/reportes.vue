<template>
    <div>
        <h1>Reportes</h1>

        <div class="row">
            <div class="col-6">
                <h2>De Usuarios</h2>
                <a href="/admin/reportes-padres">Reporte de padres</a>
                <a href="/admin/reportes-alumnos">Reporte de alumnos</a>
                <a href="/admin/reportes-calificaciones">Reporte de calificaciones</a>
            </div>
            <div class="col-6">
                <h2>De Rendimiento</h2>
                <a href="/admin/rendimiento-curso">Rendimiento por curso</a>
                <a href="/admin/rendimiento-modulo">Rendimiento por modulo</a>
                <a href="/admin/rendiimiento-por examenes">Rendimiento por examenes</a>
            </div>
            <div class="col-6">
                <h2>De Finanzas</h2>
                <a href="/admin/reportes-ventas">Reporte de ventas</a>
                <a href="/admin/reportes-cupones">Reporte de cupones</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"admin-reportes"
    }
</script>

<style lang="scss" scoped>

</style>