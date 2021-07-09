<template>
    	<div class="page-wrapper">
			<div class="page-content-wrapper">
				<div class="page-content">
				<Alert v-if="alert" v-bind:message="alert" />

					<div>
						 <router-link to="/usercreate">
						<button
							type="button"
							 class="btn btn-primary m-1 mb-4 radius-30 px-5">
							 <i class='bx bx-user mr-1'></i>New User
						</button>
						 </router-link>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="card-title ">
								<h4 class="mb-0">User</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th class="text-center">users name</th>
											<th class="text-center">users email</th>
											<th class="text-center">created ay</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(user , i) in users" :key="i" v-if="users.length">
											<td class="text-center">{{user.name}}</td>
											<td class="text-center">{{user.email}}</td>
											<td class="text-center">{{user.created_at}}</td>
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
import Alert from '../Alert'
export default {
	data(){
		return {
			data : {
 			
			}, 
			alert:'',
			users : [], 

		}
	},
	
    methods: {
	
       
    },
	 components: {
        Alert,
    },
	async created(){

	if(this.$route.query.alert){
        this.alert = this.$route.query.alert;
      }


	axios
    .get('get/users')
      .then(response => {
		  this.users= response.data
          console.log(response)
      })
	}

 }
</script>