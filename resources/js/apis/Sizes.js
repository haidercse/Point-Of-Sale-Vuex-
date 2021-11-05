import Api from "./Api";
export default {
    all() {
        return Api.get('dashboard/api/sizes');
    }
}