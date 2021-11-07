<template>
    <div class="page-wrapper">
        <div class="page-content-wrapper">

              <delete-model v-on:delete="remove"></delete-model>

            <div class="page-content">
                <Alert v-if="alert" v-bind:message="alert" />

                <div>
                    <router-link to="/post/sessions">
                        <button
                            type="button"
                            class="btn btn-primary m-1 mb-4 radius-30 px-5"
                        >
                            <i class="bx bx-user mr-1"></i>New Session
                        </button>
                    </router-link>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title ">
                            <h4 class="mb-0">Session</h4>
                        </div>
                        <hr />
                        <div class="table-responsive" v-if="sessions.length">
                            <table
                                id="example2"
                                class="table table-striped table-bordered"
                                style="width:100%"
                            >
                                <thead>
                                    <tr>
                                        <th class="text-center">id</th>
                                        <th class="text-center">users name</th>
                                        <th class="text-center">users email</th>
                                        <th class="text-center">session date</th>
                                        <th class="text-center">session status</th>
                                        <th class="text-center">total price</th>
                                        <th class="text-center">paid price</th>
                                        <th class="text-center">created at</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(session, i) in sessions" :key="i">

                                        <td class="text-center">{{ session.id }}</td>
                                        <td class="text-center">{{ session.user.name }}</td>
                                        <td class="text-center">{{ session.user.email }}</td>
                                        <td class="text-center">{{ session.date }}</td>
                                        <td class="text-center">{{ session.status }}</td>
                                        <td class="text-center">{{ session.total_price }}</td>
                                        <td class="text-center">{{ session.paid_price }}</td>
                                        <td class="text-center">{{ session.created_at }}</td>


                                        <td>
                                            <router-link :to="`/post/sessions/${session.id}`" >
                                                <a href=""><button style="border: none">
                                                    <i class="bx bx-edit" style="font-size: 12px;cursor:pointer;margin-right:5px" >
                                                </i></button></a>
                                            </router-link>


                                            <button
                                                style="border: none"
                                                type="button"
                                                class="delete"
                                                @click="toggleDelete(session.id)">
                                                <i class="bx bx-trash" style="font-size: 12px; cursor:pointer;"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Alert from "../Alert";
import DeleteModel from '../DeleteModel.vue'
export default {
    data() {
        return {
            form: new Form(),
            data: {},
            alert: "",
            sessions: [],
            delete_item_id:''
        };
    },

    methods: {
        toggleDelete(id){
            this.delete_item_id = id
            $('#delete').modal('show');
        },
        remove(){
            console.log('hsss')
            console.log(this.delete_item_id)
        this.form
          .delete(`/sessions/${this.delete_item_id}`)
          .then( (res) =>{
             const projectIndex = this.sessions.findIndex(item => item.id === this.delete_item_id)
            this.sessions.splice(projectIndex, 1)
            $("#delete").modal('hide');
          });
        }
    },
    components: {
        Alert,
        DeleteModel
    },
    async created() {
        if (this.$route.query.alert) {
            this.alert = this.$route.query.alert;
        }

        this.form
          .get(`/sessions`)
          .then( (res) =>{
            this.sessions = res;
            console.log(res)
          });
    }
};
</script>
