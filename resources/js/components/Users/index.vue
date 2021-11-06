<template>
    <div class="page-wrapper">
        <div class="page-content-wrapper">
        <div class="modal fade" id="delete"  role="dialog" >
			<div class="modal-dialog">
				<div class="modal-content card bg-primary radius-15">
					<div class="card-body">
						<h5 class="card-title text-white">Delete</h5>
							<p class="text-white">Are you sure ?</p>
							<button type="button" class="btn grey btn-secondary square box-shadow-3 text-white" data-dismiss="modal">close</button>
							<button type="button" v-on:click="remove" class="btn btn-danger square box-shadow-3 text-white ">Delete</button>
					</div>
				</div>
			</div>
		</div>
            <div class="page-content">
                <Alert v-if="alert" v-bind:message="alert" />

                <div>
                    <router-link to="/usercreate">
                        <button
                            type="button"
                            class="btn btn-primary m-1 mb-4 radius-30 px-5"
                        >
                            <i class="bx bx-user mr-1"></i>New User
                        </button>
                    </router-link>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title ">
                            <h4 class="mb-0">User</h4>
                        </div>
                        <hr />
                        <div class="table-responsive" v-if="users.length">
                            <table
                                id="example2"
                                class="table table-striped table-bordered"
                                style="width:100%"
                            >
                                <thead>
                                    <tr>
                                        <th class="text-center">users name</th>
                                        <th class="text-center">users email</th>
                                        <th class="text-center">created ay</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(user, i) in users"
                                        :key="i">

                                        <td class="text-center">
                                            {{ user.name }}
                                        </td>
                                        <td class="text-center">
                                            {{ user.email }}
                                        </td>
                                        <td class="text-center">
                                            {{ user.created_at }}
                                        </td>
                                        <td>
                                            <router-link :to="`/usercreate/${user.id}`" >
                                                <a href=""><button style="border: none">
                                                    <i class="bx bx-edit" style="font-size: 12px;cursor:pointer;margin-right:5px" >
                                                </i></button></a>
                                            </router-link>

                                             <router-link :to="`/user/sessions/${user.id}`" >
                                                <a href=""><button style="border: none">
                                                    <i class="bx bx-edit" style="font-size: 12px;cursor:pointer;margin-right:5px" >
                                                </i></button></a>
                                            </router-link>

                                            <button
                                                style="border: none"
                                                type="button"
                                                class="delete"
                                                @click="toggleDelete(user.id)">
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
export default {
    data() {
        return {
            form: new Form(),
            data: {},
            alert: "",
            users: [],
            delete_item:''
        };
    },

    methods: {
        toggleDelete(id){
            this.delete_item = id
            $('#delete').modal('show');
        },
        remove(){
            console.log('hsss')
            console.log(this.delete_item)
        this.form
          .delete(`/users/${this.delete_item}`)
          .then( (res) =>{
             const projectIndex = this.users.findIndex(item => item.id === this.delete_item)
            this.users.splice(projectIndex, 1)
            $("#delete").modal('hide');
          });
        }
    },
    components: {
        Alert
    },
    async created() {
        if (this.$route.query.alert) {
            this.alert = this.$route.query.alert;
        }

        this.form
          .get(`/users`)
          .then( (res) =>{
            this.users = res;
          });
    }
};
</script>
