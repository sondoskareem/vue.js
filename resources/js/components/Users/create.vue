<template>
    
<div class="page-wrapper" >
	<div class="page-content-wrapper">
		<div class="page-content">
		<Alert v-if="alert" v-bind:message="alert" />

		<div class="row">
			<div class="col-12 col-lg-9 mx-auto">
				<a href="#"><button
					type="button"
					class="btn btn-primary m-1 mb-4 radius-30 px-5">
					<i class='bx bx-arrow-back mr-1'></i>Back
				</button></a>
				<div class="card radius-15">
					<div class="card-body">
						<div class="card-title">
							<h4 class="mb-0">New User</h4>
						</div>
						<hr/>
						<form method="POST" >

							<div class="form-body ">

								<div class="form-row mb-2">
									<div class="col-sm-10">
										<label class="col-sm-6 col-form-label"for="name">Name</label>

										<input 
										name="name"
										type="text"
										class="form-control"
										id="name"
										placeholder="Enter the name"
										v-model="data.name"
										>

									</div>
								</div>

								<div class="form-row mb-2">
									<div class="col-sm-10">
										<label class="col-sm-6 col-form-label"for="email">Email</label>

										<input 
										name="email"
										type="text"
										class="form-control"
										id="email"
										placeholder="Enter the Email"
										v-model="data.email"
										>

									</div>
								</div>
								
								<div class="form-row mb-2">
									<div class="col-sm-10">
										<label class="col-sm-6 col-form-label"for="password">password</label>

										<input 
										name="password"
										type="text"
										class="form-control"
										id="password"
										placeholder="Enter the password"
										v-model="data.password"
										>

									</div>
								</div>

						

								<div class="form-group row mt-4">
									<div class="col-sm-10">

										<!-- <button
											type="submit" value="Submit" v-on:click="submit"
											class="btn btn-primary m-1 mb-4 radius-30 px-5">
											Save
										</button>
										<button type="submit" class="btn btn-primary">Submit</button> -->

										<input type="submit"  @click.stop.prevent="addUser()"/>
									</div>
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		</div>
	</div>
</div>
</template>

<script>
import Alert from '../Alert'
export default ({
  
    	data(){
		return {
			data : {
				email: '',
				name: '',
				password:'',
				
			}, 
			tags : [], 
			alert:'',
			index : -1, 
			showDeleteModal: false, 
			isDeleing : false,
			deleteItem: {}, 
			deletingIndex: -1, 
			websiteSettings: []

		}
	},

	 methods: {
		addUser() {
			// console.log('fuck')
		const { name, email , password } = this.data;
		const opts = {
			name, email , password 
		};
		// const {alert} = this
		console.log(this.alert)
		axios
		.post('post/users' ,opts )
		.then(response => {
		this.users= response.data
			console.log(response)
			this.alert ='Success'
               this.$router.push({path: '/users', query: {alert: 'Employee Added'}});

		})
		.catch(err=>{
			console.log(err)
			this.alert =err
		})

		}
  },
  	async created(){

	if(this.$route.query.alert){
        this.alert = this.$route.query.alert;
      }

	},
    components: {
        Alert,
    }

})
</script>