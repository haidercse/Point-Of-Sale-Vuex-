<template>
  <div>
    <show-error></show-error>
    <div class="row">
      <div class="col-md-6 border-right">
        <div class="card">
          <div class="card-body">
            <form @submit.prevent="updateForm()">
              <div class="form-group">
                <label for="exampleInputEmail1"
                  >Category <span class="text-danger">*</span></label
                >
                <Select2
                  v-model="form.category_id"
                  :options="categories"
                  :settings="{ placeholder: 'Seelect Category' }"
                  
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1"
                  >Brand <span class="text-danger">*</span></label
                >
                <Select2
                  v-model="form.brand_id"
                  :options="brands"
                  :settings="{ placeholder: 'Seelect Brand' }"
                />
              </div>
              <div class="form-group">
                <label for="sku">SKU <span class="text-danger">*</span></label>
                <input
                  type="text"
                  class="form-control"
                  id="sku"
                  v-model="form.sku"
                  aria-describedby="emailHelp"
                  placeholder="SKU"
                />
              </div>
              <div class="form-group">
                <label for="name"
                  >Product Name <span class="text-danger">*</span></label
                >
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  v-model="form.name"
                  aria-describedby="emailHelp"
                  placeholder="Product Name"
                />
              </div>
              <div class="form-group">
                <label for="cost_price"
                  >Cost Price <span class="text-danger">*</span></label
                >
                <input
                  type="number"
                  class="form-control"
                  id="cost_price"
                  v-model="form.cost_price"
                  aria-describedby="emailHelp"
                  placeholder="Cost Price"
                />
              </div>
              <div class="form-group">
                <label for="retail_price"
                  >Retail Price <span class="text-danger">*</span></label
                >
                <input
                  type="number"
                  class="form-control"
                  id="retail_price"
                  v-model="form.retail_price"
                  aria-describedby="emailHelp"
                  placeholder="Retail Price"
                />
              </div>
              <div class="form-group">
                <label for="year"
                  >Year <span class="text-danger">*</span></label
                >
                <input
                  type="text"
                  class="form-control"
                  id="year"
                  v-model="form.year"
                  aria-describedby="emailHelp"
                  placeholder="Year (EX:2021)"
                />
              </div>
              <div class="form-group">
                <label for="description"
                  >Description <span class="text-danger">*</span></label
                >
                <input
                  type="text"
                  class="form-control"
                  id="description"
                  v-model="form.description"
                  aria-describedby="emailHelp"
                  placeholder="Description [MAX : 200]"
                />
              </div>
              <div class="form-group">
                <label for="retail_price"
                  >Status <span class="text-danger">*</span></label
                >
                <select
                  class="custom-select"
                  v-model="form.status"
                >
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="form-group">
                <label for="oldimage"
                  >Old Image <span class="text-danger">*</span></label
                >
                <br>
                <img :src="product.product_image" alt="" width="82">
                <br />
                <label for="NewImage">New Image</label> <br>
                <img :src="form.clickImage" alt="" width="82" /><br />
                <input
                  type="file"
                  class="form-control"
                  id="retail_price"
                  aria-describedby="emailHelp"
                  placeholder="Status"
                  @change="selectImage"
                />
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
            <div class="row" v-for="(item, index) in form.items" :key="index">
              <div class="col-md-4">
                <select
                  name=""
                  id=""
                  class="custom-select"
                  v-model="item.size_id"
                >
                  <option value="">Select Size</option>
                  <option
                    v-for="(size, index) in sizes"
                    :key="index"
                    :value="size.id"
                  >
                    {{ size.size }}
                  </option>
                </select>
              </div>
              <div class="col-md-3">
                <input
                  type="text"
                  class="form-control form-control-sm"
                  v-model="item.location"
                  placeholder="Loacation"
                />
              </div>
              <div class="col-md-3">
                <input
                  type="number"
                  class="form-control form-control-sm"
                  v-model="item.quantity"
                  placeholder="Quantity "
                />
              </div>
              <div class="col-md-2">
                <button
                  @click="deleteItem(index)"
                  class="btn btn-sm btn-danger mb-1"
                >
                  <i class="far fa-trash-alt"></i>
                </button>
              </div>
            </div>
            <button
              @click="addItem()"
              type="button"
              class="btn btn-success ml-2 mt-2"
            >
              <i class="fas fa-plus-square"> Add New Item</i>
            </button>
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
export default {
    props: ['product'],
  components: { Select2,ShowError },
  data() {
    return {
      form: {
        category_id: '',
        brand_id: '',
        sku: "",
        name: "",
        image: "",
        clickImage: "",
        cost_price: 0,
        retail_price: 0,
        year: "",
        description: "",
        status: 1,
        items: [
          {
            size_id: "",
            location: "",
            quantity: 0,
          },
        ],
      },
    };
  },
  mounted() {
   
    this.getCategories();
    this.getBrands();
    this.getSizes();
    
   
    this.form.category_id = this.product.category_id;
    this.form.brand_id = this.product.brand_id;
    this.form.name = this.product.name;
    this.form.sku = this.product.sku;
    this.form.cost_price = this.product.cost_price;
    this.form.retail_price = this.product.retail_price;
    this.form.year = this.product.year;
    this.form.description = this.product.description;
    this.form.status = this.product.status;

    this.form.items = this.product.product_stocks;

  },
  methods: {
    ...mapActions(["getCategories", "getBrands", "getSizes", "addProducts","editProducts"]),

    //new item add
    addItem() {
      let newItem = {
        size_id: "",
        location: "",
        quantity: 0,
      };
      this.form.items.push(newItem);
    },
    //deleteItem
    deleteItem(index) {
      this.form.items.splice(index, 1);
    },

    //update form
    updateForm() {
      let data = new FormData();
      data.append('_method', 'PUT');
      data.append('category_id', this.form.category_id);
      data.append('brand_id', this.form.brand_id);
      data.append('sku', this.form.sku);
      data.append('name', this.form.name);
      data.append('image', this.form.image);
      data.append('cost_price', this.form.cost_price);
      data.append('retail_price', this.form.retail_price);
      data.append('year', this.form.year);
      data.append('description', this.form.description);
      data.append('status', this.form.status);
      data.append('items', JSON.stringify(this.form.items));
      
      let payLoad = {
        data : data,
        id: this.product.id
      }
     this.editProducts(payLoad);
    },

   //show image when select
    selectImage(e) {
      this.form.image = e.target.files[0];
      this.read(this.form.image);
    },
    read(image) {
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = (e) => {
        this.form.clickImage = e.target.result;
      };
    },

    //update product
    
  },
  computed: {
    ...mapState({
      categories: (state) => state.categories.categories,
      brands: (state) => state.brands.brands,
      sizes: (state) => state.sizes.sizes,
    }),
  },
};
</script>

<style>
</style>