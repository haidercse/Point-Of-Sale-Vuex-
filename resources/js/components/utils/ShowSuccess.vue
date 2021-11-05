<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-2" v-if="is_success">
          <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
          >
            <div>
                {{ successes }}
            </div>
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
      successes: (state) => state.success.success,
      is_success: (state) => state.success.is_success,
    }),
  },
};
</script>

<style>
</style>