import Categories from "../../../apis/Categories";

export const getCategories = ({ commit }) => {
    Categories.all()
        .then((response) => {
            if (response.data.success == true) {
                commit('SET_CATEGORIES', response.data.data);
            }
        }).catch((error) => {
            console.log(error.response);
        });
}