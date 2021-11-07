<template>
  <div class="modal fade" id="delete"  role="dialog" >
			<div class="modal-dialog">
				<div class="modal-content card bg-primary radius-15">
					<div class="card-body">
						<h5 class="card-title text-white">Delete</h5>
							<p class="text-white">Are you sure ?</p>
							<button type="button" class="btn grey btn-secondary square box-shadow-3 text-white" data-dismiss="modal">close</button>
							<button type="button" v-on:click="$emit('delete')" class="btn btn-danger square box-shadow-3 text-white ">Delete</button>
					</div>
				</div>
			</div>
		</div>
</template>

<script>
export default {
  name: 'DeleteModel',
  data () {
    return {

    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
