<template>
    <aside class="search-box card">
        <form @submit.prevent="onSubmit">
            <h3>What are you searching for?</h3>
            <div class="radio-group">
                <label class="radio-opt">
                    <input type="radio" value="people" v-model="searchType">
                    <span>People</span>
                </label>
                <label class="radio-opt">
                    <input type="radio" value="movies" v-model="searchType">
                    <span>Movies</span>
                </label>
            </div>
            <input type="text" v-model="search" :placeholder="placeholder">
            <button role="submit" :disabled="!search || loading">{{ !loading ? 'Search' : '...'}}</button>
        </form>
    </aside>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
    name: 'SearchBox',
    data() {
        return {
            searchType: 'people',
            search: '',
        };
    },
    computed: {
        ...mapGetters({loading: 'getLoading'}),
        placeholder() {
            switch (this.searchType) {
                case 'people':
                    return 'e.g. Chewbacca, Yoda, Boba Fett';
                case 'movies':
                    return 'e.g. Empire Strikes Back, The Phantom Menace';
                default:
                    return '';
            }
        }
    },
    methods: {
        ...mapActions({
            getMovies: 'movieList',
            getPeople: 'personList',
        }),
        onSubmit() {
            switch (this.searchType) {
                case 'people':
                    return this.getPeople(this.search);
                case 'movies':
                    return this.getMovies(this.search);
                default:
                    return;
            }
        }
    }
};
</script>

<style lang="sass">
.search-box
    h3
        margin-bottom: 2rem
    form
        button
            margin-top: 2rem
            width: 100%
</style>
