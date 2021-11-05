import Sizes from "../../../apis/Sizes";

export const getSizes = ({ commit }) => {
    Sizes.all()
        .then((response) => {
            if (response.data.success == true) {
                commit('SET_SIZES', response.data.data);
            }
        }).catch((error) => {
            console.log(error.response);
        });
}