<template>
  <div>
    <show-error></show-error>
    <show-success></show-success>
    <div class="row">
      <div class="col-md-6 border-right">
        <div class="card">
          <div class="card-body">
            <form @submit.prevent="submitForm()">
              <div class="form-group">
                <label for="Products"
                  >Product <span class="text-danger">*</span></label
                >
                <Select2
                  v-model="form.product_id"
                  :options="products"
                  @change="selectedProduct"
                  :settings="{ placeholder: 'Seelect Product' }"
                />
              </div>
             <div class="form-group">
                <label for="date"
                  >Date <span class="text-danger">*</span></label
                >
                <input
                  type="date"
                  class="form-control"
                  v-model="form.date"
                  aria-describedby="emailHelp"
                  placeholder="Date"
                />
              </div>
              <div class="form-group">
                <label for="stockType"
                  >Stock Type <span class="text-danger">*</span></label
                >
                <select
                  class="custom-select"
                  v-model="form.stock_type"
                >
                  <option value="in">IN</option>
                  <option value="out">OUT</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Product Size</div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <tr v-for="item,index in form.items" :key="index">
                <td>{{ item.size }}</td>
                <td>
                  <input type="text" class="form-control" v-model="item.quantity" placeholder="Quantity">
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import Select2 from "v-select2-component";
import { mapActions, mapState } from "vuex";
import ShowError from '../utils/ShowError.vue';
import ShowSuccess from '../utils/ShowSuccess.vue';
export default {
  components: { Select2,ShowError, ShowSuccess },
  data() {
    return {
      success: false,
      form: {
        date: '',
        stock_type: 'in',
        product_id: '',
        items: [
          
        ],
      },
    };
  },
  mounted() {
    this.getProducts();
  },
  methods: {
    ...mapActions(["getProducts","submitStocks"]),
    selectedProduct(id){
      this.form.items = [];
      let product = this.products.filter((product)=>{
        console.log(product);
        return product.id == id;
       
      })
       product[0].product_stocks.map((stock)=>{
           let item = {
             size : stock.size.size,
             size_id : stock.size_id,
             quantity: '',
           }
           this.form.items.push(item);
       })
    },
    submitForm(){
       this.submitStocks(this.form);
    }
  },
  computed: {
    ...mapState({
      products : (state)=> state.products.allProductsWithSize,
    }),
  },
};
</script>

<style>
</style>