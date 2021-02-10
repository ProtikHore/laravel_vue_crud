<template>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form @submit.prevent="saveData">
                    <div class="input-group mb-3">
                        <input type="text" v-model="form.title" name="title" class="form-control form-control-lg" :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Add List">
                        <has-error :form="form" field="title"></has-error>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="add_button">Add</button>
                        </div>
                    </div>
<!--                    <span class="text-danger pb-3" style="font-size: 20px;" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>-->
                </form>
                <div class="w-100 todo">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>List</th>
                            <th>Action</th>
                        </tr>
                        </thead>
<!--                        <tbody>-->
<!--                            <tr v-for="crud in cruds" :key="crud.id">-->
<!--                                <td v-if="crud.status === 1"><input type="checkbox" v-on:click="selectList(crud.id, crud.status)" :value="crud.id" checked class="select_list"> {{  crud.id }}</td>-->
<!--                                <td v-if="crud.status === 0"><input type="checkbox" v-on:click="selectList(crud.id, crud.status)" :value="crud.id" class="select_list"> {{  crud.id }}</td>-->
<!--                                <td><span class="text-success" v-if="crud.status === 1" v-text="crud.title"></span><span class="text-danger" v-if="crud.status === 0" v-text="crud.title"></span></td>-->
<!--                                <td><i class="text-info" style="cursor: pointer; font-size: 1rem;" id="edit" title="Edit" v-on:click="dataChange(crud.id)"><router-link :to="{ name: 'change', params: {id: crud.id } }">Edit</router-link></i></td>-->
<!--&lt;!&ndash;                                <td><router-link :to="{ name: 'change', params: {id: crud.id } }">Edit</router-link></td>&ndash;&gt;-->
<!--                            </tr>-->
<!--                        </tbody>-->
                    </table>
                </div>
                <router-view></router-view>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</template>

<script>
import { Form } from 'vform';
export default {
    data() {
        return {
            form: new Form({
                title: '',
            }),
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
            // let data = new FormData();
            // data.append('title', this.title);
            // axios.post('/api/crud', data).then((res) =>{
            //     console.log(res);
            // }).catch((error) =>{
            //     this.form.errors.record(error.response.data.errors);
            //     console.log(error)
            // });
            this.form.post('/api/crud').then(({ data }) => {
                console.log(data)
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
            axios.get('/api/change/'+id).then((res) =>{
                console.log(res);
            }).catch((error) =>{
                console.log(error)
            })
            console.log(id + 'as');
        },
    },

    mounted() {
        //this.getCruds();
        console.log('Component mounted.');
    }
}
</script>
