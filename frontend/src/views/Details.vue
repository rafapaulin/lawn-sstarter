<template>
    <div class="card details">
        <PersonDetails v-if="!loading && selected && selected.name" />
        <MovieDetails v-if="!loading && selected && selected.title" />
        <main class="loading" v-if="loading">Loading...</main>
        <footer>
            <router-link class="button" to="/">back to search</router-link>
        </footer>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import { PersonDetails, MovieDetails } from '@/components';

export default {
    name: 'Details',
    components: { PersonDetails, MovieDetails },
    computed: {
        ...mapGetters({
            loading: 'getLoading',
            selected: 'getSelected',
        })
    }
}
</script>

<style lang="sass">
.details
    display: flex
    flex-direction: column
    justify-content: stretch
    min-height: 42rem
    main
        flex-grow: 1
        & > header
            margin-bottom: 3rem
        header
            border-bottom: 1px solid $gray
            padding: 0 0 1rem
            margin: 0 0 .5rem
    & > main
        & > header
            margin-bottom: 3rem
    footer
        margin-top: 3rem
    .loading
        align-items: center
        display: flex
        color: $gray
        font-weight: bold
        justify-content: center
        line-height: 1.25
        margin: 0
        text-align: center
</style>
