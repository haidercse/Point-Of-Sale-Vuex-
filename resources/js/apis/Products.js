import Api from "./Api";
export default {
    all() {
        return Api.get('dashboard/product');
    },
    store(data) {
        return Api.post('dashboard/product', data);
    },
    update(payload) {
        return Api.post(`dashboard/product/${ payload.id }`, payload.data);
    },
    allApiProducts() {
        return Api.get('dashboard/api/products');
    }
}