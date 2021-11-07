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
                  <h4 class="mb-0">New User</h4>
                </div>
                <hr />

                <form method="POST" @submit.prevent="onSubmit">
                  <div class="form-body">
                    <div class="form-row mb-2">
                      <div class="col-sm-10">
                        <label class="col-sm-6 col-form-label" for="name"
                          >Name</label
                        >
                        <input
                          name="name"
                          class="form-control"
                          type="text"
                          id="name"
                          placeholder="Enter the name"
                          v-model="form.name"
                          @keydown="form.errors.clear('name')"
                          lazy
                        />
                        <div
                          v-if="form.errors.has('name')"
                          class="text-danger mt-2"
                        >
                          {{ form.errors.get("name") }}
                        </div>
                      </div>
                    </div>

                    <div class="form-row mb-2">
                      <div class="col-sm-10">
                        <label class="col-sm-6 col-form-label" for="email"
                          >Email</label
                        >
                        <input
                          name="email"
                          class="form-control"
                          type="text"
                          id="email"
                          placeholder="Enter the Email"
                          v-model="form.email"
                          @keydown="form.errors.clear('email')"
                          lazy
                        />
                        <div
                          v-if="form.errors.has('email')"
                          class="text-danger mt-2"
                        >
                          {{ form.errors.get("email") }}
                        </div>
                      </div>
                    </div>

                    <div class="form-row mb-2">
                      <div class="col-sm-10">
                        <label class="col-sm-6 col-form-label" for="password"
                          >password</label
                        >
                        <input
                          name="password"
                          class="form-control"
                          type="text"
                          id="password"
                          placeholder="Enter the password"
                          v-model="form.password"
                          @keydown="form.errors.clear('password')"
                          lazy
                        />
                        <div
                          v-if="form.errors.has('password')"
                          class="text-danger mt-2"
                        >
                          {{ form.errors.get("password") }}
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
        email: "",
        name: "",
        password: "",
      }),
      alert: "",
      id:''
    };
  },
  methods: {
    onSubmit() {
      if (this.id) {
          console.log(this.id)
        this.form
          .put(`/users/${this.id}`)
          .then((res) =>
            this.$router.push({
              path: "/get/users",
              query: { alert: "Employee Updated" },
            })
          );
      } else {
        this.form
          .post("/users")
          .then((res) =>
            this.$router.push({
              path: "/get/users",
              query: { alert: "Employee Added" },
            })
          );
      }
    },
  },

  async created() {
       console.log('ss')

    this.$route.query.alert ? (this.alert = this.$route.query.alert) : null;
    if (this.$route.params.id ) {
       this.id = this.$route.params.id
       console.log('ss')
    this.form
          .get(`/users/${this.id}`)
          .then( (res) =>{
            this.form= new Form(res)
            console.log(this.form)
          });
    }
  },
  components: {
    Alert,
  },
};
</script>
