import Stocks from "../../../apis/Stocks";

export const submitStocks = ({ commit }, data) => {
    Stocks.store(data)
        .then(response => {
            if (response.data.success == true) {
                commit('SET_SUCCESS', 'Stock has been added successfully!');
                // window.location.href = "/dashboard/stocks";
            }
        })
        .catch(error => {
            commit("SET_ERRORS", error.response.data.errors);
        });
};