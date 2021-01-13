<template>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form @submit.prevent="saveData">
                    <div class="input-group mb-3">
                        <input v-model="form.title" :class="{'is-invalid' : form.errors.has('title')}" type="text" class="form-control form-control-lg"  @keydown="form.errors.clear('title')" placeholder="Add List">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="add_button">Add</button>
                        </div>
                    </div>
                    <span class="text-danger pb-3" style="font-size: 20px;" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
                </form>
                <div class="w-100 todo">
                    <div v-for="crud in cruds" :key="crud.id" class="w-100">{{ crud.title }}</div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cruds:'',
            form: new Form({
                title: '',
            })
            //title: $('#title').val(),
        }
    },

    methods: {
        getCruds(){
            axios.get('/api/crud').then((res) =>{
                this.cruds = res.data
                console.log(res);
            }).catch((error) =>{
                console.log(error)
            })
        },
        saveData() {
            let data = new FormData();
            data.append('title', this.form.title);
            axios.post('/api/crud', data).then((res) =>{
                console.log(res);
                this.form.reset();
                this.getCruds();
            }).catch((error) =>{
                this.form.errors.record(error.response.data.errors);
                console.log(error)
            });
        }
    },

    mounted() {
        this.getCruds();
        console.log('Component mounted.');
    }
}
</script>
