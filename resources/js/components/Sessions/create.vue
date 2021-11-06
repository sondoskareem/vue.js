<template>
  <div class="page-wrapper">
    <div class="page-content-wrapper">

      <div class="page-content">
        <Alert v-if="alert" v-bind:message="alert" />
        <div class="row">
          <div class="col-12 col-lg-9 mx-auto">
            <router-link to="/get/users">
              <button
                type="button"
                class="btn btn-primary m-1 mb-4 radius-30 px-5"
              >
                <i class="bx bx-user mr-1"></i>Back
              </button>
            </router-link>
            <div class="card radius-15">
              <div class="card-body">
                <div class="card-title">
                  <h4 class="mb-0">New Session</h4>
                </div>
                <hr />

                <form method="POST" @submit.prevent="onSubmit">
                  <div class="form-body">

                    <div class="form-row mb-2">
                      <div class="col-sm-10">
                        <label class="col-sm-6 col-form-label" for="user_id"
                          >User</label
                        >
                       <select class="form-control" v-model="form.user_id">
                            <option value="" selected disabled>Choose</option>
                            <option v-for="user in users" :key="user.id" >{{ user.name }}</option>
                        </select>
                        <div
                          v-if="form.errors.has('user_id')" class="text-danger mt-2"> {{ form.errors.get("user_id") }}
                        </div>
                      </div>
                    </div>

                    <div class="form-row mb-2">
                      <div class="col-sm-10">
                        <label class="col-sm-6 col-form-label" for="status"
                          >Status</label
                        >
                       <select class="form-control" v-model="form.status" >
                            <option value="" selected disabled>Choose</option>
                            <option  value="pending" >Pending</option>
                            <option  value="finished" >Finished</option>
                        </select>
                        <div
                          v-if="form.errors.has('status')" class="text-danger mt-2">{{ form.errors.get("status") }}
                        </div>
                      </div>
                    </div>

                    <div class="form-row mb-2">
                      <div class="col-sm-10">
                        <label class="col-sm-6 col-form-label" for="date"
                          >Date</label
                        >
                        <input
                          class="form-control"
                          type="datetime-local"
                          id="date"
                          placeholder="Select date"
                          v-model="form.date"
                          @keydown="form.errors.clear('date')"
                          lazy
                        />
                        <div
                          v-if="form.errors.has('date')"
                          class="text-danger mt-2"
                        >
                          {{ form.errors.get("date") }}
                        </div>
                      </div>
                    </div>

                    <div class="form-row mb-2">
                      <div class="col-sm-10">
                        <label class="col-sm-6 col-form-label" for="total_price"
                          >total_price</label
                        >
                        <input
                          class="form-control"
                          type="text"
                          id="total_price"
                          placeholder="Enter the total_price"
                          v-model="form.total_price"
                          @keydown="form.errors.clear('total_price')"
                          lazy
                        />
                        <div
                          v-if="form.errors.has('total_price')"
                          class="text-danger mt-2"
                        >
                          {{ form.errors.get("total_price") }}
                        </div>
                      </div>
                    </div>

                    <div class="form-row mb-2">
                      <div class="col-sm-10">
                        <label class="col-sm-6 col-form-label" for="paid_price"
                          >paid_price</label
                        >
                        <input
                          class="form-control"
                          type="text"
                          id="paid_price"
                          placeholder="Enter the paid_price"
                          v-model="form.paid_price"
                          @keydown="form.errors.clear('paid_price')"
                          lazy
                        />
                        <div
                          v-if="form.errors.has('paid_price')"
                          class="text-danger mt-2"
                        >
                          {{ form.errors.get("paid_price") }}
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mt-4">
                      <div class="col-sm-10">
                        <button
                          type="submit"
                          value="Submit"
                          class="btn btn-primary m-1 mb-4 radius-30 px-5"
                          :disabled="form.errors.any()"
                        >
                          Save
                        </button>
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
import Alert from "../Alert";

export default {
  data() {
    return {
      form: new Form({
        date: "",
        paid_price: "",
        total_price: "",
        status: "",
        user_id: "",
      }),
      alert: "",
      id:'',
      users:[]
    };
  },
  methods: {
    onSubmit() {
      if (this.id) {
          console.log(this.id)
        this.form
          .put(`/sessions/${this.id}`)
          .then((res) =>
            this.$router.push({
              path: "/get/sessions",
              query: { alert: "Session Updated" },
            })
          );
      } else {
        this.form
          .post("/sessions")
          .then((res) =>
            this.$router.push({
              path: "/get/sessions",
              query: { alert: "Session Added" },
            })
          );
      }
    },
  },

  async created() {
    this.$route.query.alert ? (this.alert = this.$route.query.alert) : null;
    if (this.$route.params.id ) {
    this.id = this.$route.params.id
    this.form.get(`/sessions/${this.id}`).then( (res) =>{  });

    }
    this.form.get(`/users/`).then( (res) =>{this.users = res });

  },
  components: {
    Alert,
  },
};
</script>
