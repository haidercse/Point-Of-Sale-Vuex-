<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-2" v-if="is_error">
          <div
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
          >
            <ul>
                <li v-for="error,index in errors" :key="index">{{ error[0] }} </li>
            </ul>
            <button
              type="button"
              class="close"
              data-dismiss="alert"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
  data() {
    return {};
  },

  computed: {
    ...mapState({
      errors: (state) => state.errors.errors,
      is_error: (state) => state.errors.is_error,
    }),
  },
};
</script>

<style>
</style>