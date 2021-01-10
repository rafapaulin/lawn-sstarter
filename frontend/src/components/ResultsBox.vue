<template>
    <aside class="results card">
        <header>
            <h2>Results</h2>
        </header>
        <main>
            <article v-show="!loading" class="result"  v-for="(item, i) in list" :key="i">
                <h4>{{ item.name || item.title }}</h4>
                <button @click.prevent="onDetails(item.url)">see details</button>
            </article>
            <aside class="loading" v-if="loading">
                <p>Searching...</p>
            </aside>
            <aside class="empty" v-if="!loading && list.length === 0">
                <p>There are zero matches.</p>
                <p>Use the formto search for People or movies</p>
            </aside>
        </main>
        <footer v-if="!!previous || !!next">
            <span class="prev" v-if="!!previous">
                <a :href="previous" @click.prevent="changePage(previous)">&#x3c; Prev page</a>
            </span>
            <span class="next" v-if="!!next">
                <a :href="next" @click.prevent="changePage(next)">Next page &#x3e;</a>
            </span>
        </footer>
    </aside>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
    name: 'ResultBox',
    computed: {
        ...mapGetters({
            list: 'getList',
            loading: 'getLoading',
            previous: 'getPrevious',
            next: 'getNext',
        }),
    },
    methods: {
        ...mapActions({
            changePage: 'changePage',
            fetch: 'detailsFetch'
        }),
        async onDetails(url) {
            await this.fetch(url.replace('http://swapi.dev/api/', ''));

            this.$router.push({ name: 'Details' });
        }
    }
}
</script>

<style lang="sass" scoped>
.results
    display: flex
    flex-direction: column
    justify-content: stretch
    height: 60rem
    width: 100%
    header
        border-bottom: 1px solid $gray
        padding: 0 0 1rem
    main
        display: flex
        flex-direction: column
        flex-grow: 1
        min-height: 0
        overflow: auto
    footer
        display: flex
        padding: 2rem 0 0
        span
            font-weight: 600
        .prev
            margin: 0 auto 0 0
        .next
            margin: 0 0 0 auto
    .result
        align-items: center
        border-bottom: 1px solid $gray
        justify-content: space-between
        display: flex
        padding: 1rem 0
    .loading,
    .empty
        margin: auto 0
        p
            color: $gray
            font-weight: bold
            line-height: 1.25
            margin: 0
            text-align: center
</style>
