import Brands from "../../../apis/Brands";

export const getBrands = ({ commit }) => {
    Brands.all()
        .then((response) => {
            if (response.data.success == true) {
                commit('SET_BRANDS', response.data.data);
            }
        }).catch((error) => {
            console.log(error.response);
        });
}