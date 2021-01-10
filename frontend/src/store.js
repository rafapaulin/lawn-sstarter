import Vue from 'vue';
import Vuex from 'vuex';
import http from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        list: [],
        selected: null,
        previous: null,
        next: null,

        loading: false,
    },
    actions: {
        movieList({ commit }, search) {
            commit('setLoading', true);

            http.get(`http://localhost/sw-data/films?search=${search}`)
                .then(({ data: { previous, next, results } }) => {
                    commit('setPrevious', previous);
                    commit('setNext', next);
                    commit('setList', results);
                })
                .catch(error => console.log(error))
                .finally(() => commit('setLoading', false));
        },
        detailsFetch({ commit }, uri) {
            commit('setLoading', true);

            http.get(`http://localhost/sw-data/${uri}`)
                .then(async ({ data }) =>  {
                    if (data.films) {
                        const filmList = data.films.map(film => http.get(`http://localhost/sw-data/${film.replace('http://swapi.dev/api/', '')}`));

                        await Promise.all(filmList)
                            .then(result => {
                                data.filmList = result.map(({data: {title, url}}) => ({title, url: url.replace('http://swapi.dev/api/', '')}))
                            });
                    }

                    if (data.characters) {
                        const charList = data.characters.map(film => http.get(`http://localhost/sw-data/${film.replace('http://swapi.dev/api/', '')}`));

                        await Promise.all(charList)
                            .then(result => {
                                data.charList = result.map(({data: {name, url}}) => ({name, url: url.replace('http://swapi.dev/api/', '')}))
                            });
                    }
                    commit('setSelected', data)
                })
                .catch(error => console.log(error))
                .finally(() => commit('setLoading', false));
        },
        personList({ commit }, search) {
            commit('setLoading', true);

            http.get(`http://localhost/sw-data/people?search=${search}`)
                .then(({ data: { previous, next, results } }) => {
                    commit('setPrevious', previous);
                    commit('setNext', next);
                    commit('setList', results);
                })
                .catch(error => console.log(error))
                .finally(() => commit('setLoading', false));
        },
        changePage({ commit }, url) {
            commit('setLoading', true);

            http.get(url)
                .then(({ data: { previous, next, results } }) => {
                    commit('setPrevious', previous);
                    commit('setNext', next);
                    commit('setList', results);
                })
                .catch(error => console.log(error))
                .finally(() => commit('setLoading', false));
        }
    },
    getters: {
        getLoading: state => state.loading,
        getList: state => state.list,
        getPrevious: state => state.previous,
        getNext: state => state.next,
        getSelected: state => state.selected,
    },
    mutations: {
        setLoading: (state, bool) => state.loading = bool,
        setList: (state, list) => state.list = list,
        setPrevious: (state, previous) => state.previous = previous,
        setNext: (state, next) => state.next = next,
        setSelected: (state, selected) => state.selected = selected,
    }
});
