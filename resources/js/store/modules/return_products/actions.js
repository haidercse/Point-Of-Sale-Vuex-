import ReturnProducts from "../../../apis/ReturnProducts";

export const returnProductSubmit = ({ commit }, data) => {
    ReturnProducts.store(data)
        .then(response => {
            if (response.data.success == true) {
                commit('SET_SUCCESS', 'Return Products has been added successfully!');

            }
        })
        .catch(error => {
            commit("SET_ERRORS", error.response.data.errors);
        });
};