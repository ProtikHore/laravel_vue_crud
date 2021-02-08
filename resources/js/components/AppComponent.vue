<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <router-link to="/add">Add</router-link>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
