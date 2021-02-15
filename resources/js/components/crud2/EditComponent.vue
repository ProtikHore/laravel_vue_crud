<template>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h5>Edit Component</h5>
                <form @submit.prevent="updateData">
                    <div class="input-group mb-3">
                        <input type="text" v-model="form.title" name="title" class="form-control form-control-lg" :class="{ 'is-invalid': form.errors.has('title') }">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="add_button">Update</button>
                        </div>
                        <has-error :form="form" field="title" style="font-size: 15px;"></has-error>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</template>

<script>

import { Form } from 'vform';
import routes from '../router/index';
export default {
    data() {
        return {
            form: new Form({
                title: '',
            }),
        }
    },

    methods: {
        getCrud(){
            let id = this.$route.params.id;
            axios.get('/api/crud/'+id+'/edit').then((res) =>{
                console.log(res);
                this.form.title = res.data.title;
            }).catch((error) =>{
                console.log(error);
            });
            console.log(id);
        },
        updateData() {
            let id = this.$route.params.id;
            this.form.put(`/api/crud/${id}`).then(({ data }) => {
                console.log(data);
                let status = this.$route;
                console.log(status);
                routes.push({ name: 'all' });
                //let value = 2;
                //routes.push({ name: 'edit', params: { id: value } });
                //routes.go(-1);
                //routes.back();
            });
        },
    },

    mounted() {
        this.getCrud();
        console.log('Component mounted.');
    }
}
</script>
