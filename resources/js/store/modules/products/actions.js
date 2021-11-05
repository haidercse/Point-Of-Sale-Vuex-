import Products from "../../../apis/Products";

export const addProducts = ({ commit }, data) => {
    Products.store(data)
        .then(response => {
            if (response.data.success == true) {
                window.location.href = "/dashboard/product";
            }
        })
        .catch(error => {
            commit("SET_ERRORS", error.response.data.errors);
        });
};

export const editProducts = ({ commit }, payload) => {
    Products.update(payload)
        .then(response => {
            if (response.data.success == true) {
                window.location.href = "/dashboard/product";
                commit('UPDATE_PRODUCTS', response.data.data);
            }
        })
        .catch(error => {
            commit("SET_ERRORS", error.response.data.errors);
        });
};

export const getProducts = ({ commit }) => {
    Products.allApiProducts()
        .then((response) => {
            if (response.data.success == true) {
                commit('SET_PRODUCTS', response.data.data);
            }
        })
        .catch(error => {
            commit("SET_ERRORS", error.response.data.errors);
        });
}