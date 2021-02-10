<template>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form @submit.prevent="saveData">
                    <div class="input-group mb-3">
                        <input v-model="form.title" :class="{'is-invalid' : form.errors.has('title')}" type="text" value="crud.id" class="form-control form-control-lg"  @keydown="form.errors.clear('title')">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="add_button">Update</button>
                        </div>
                    </div>
                    <span class="text-danger pb-3" style="font-size: 20px;" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
                </form>
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
            }),
            //title: $('#title').val(),
        }
    },

    methods: {
        // getCruds(){
        //     axios.get('/api/crud').then((res) =>{
        //         this.cruds = res.data
        //         console.log(res);
        //     }).catch((error) =>{
        //         console.log(error)
        //     })
        // },
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
        },
        selectList(id, status) {
            console.log(status);
            let data = new FormData();
            data.append('_method', 'PATCH')
            if(status === 1){
                data.append('status', 0);
            }
            if(status === 0){
                data.append('status', 1)
            }
            axios.post('/api/crud/'+id, data).then((res) =>{
                console.log(res);
                this.getCruds();
            }).catch((error) =>{
                this.form.errors.record(error.response.data.errors);
                console.log(error)
            });
        },
        dataChange(id){
            // axios.get('/api/change/'+id).then((res) =>{
            //     console.log(res);
            // }).catch((error) =>{
            //     console.log(error)
            // })
            console.log(id + 'as');
        },
    },

    mounted() {
        //this.getCruds();
        console.log('Component mounted.');
    }
}
</script>
