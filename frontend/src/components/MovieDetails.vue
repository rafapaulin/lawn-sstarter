<template>
    <main class="movie-details">
        <header>
            <h2 v-if="selected">{{ selected.name || selected.title }}</h2>
        </header>
        <div class="row">
            <div class="col-12 col-md-6" v-if="selected">
                <header>
                    <h4>Opening Crawl</h4>
                </header>
                <section class="opening-crawl">
                    <p>{{ selected.opening_crawl }}</p>
                </section>
            </div>
            <div class="col-12 col-md-5 offset-md-1" v-if="selected">
                <header>
                    <h4>Characters</h4>
                </header>
                <section class="characters">
                    <span v-for="(char, i) in selected.charList" :key="i">
                        <span class="link" @click.prevent="onDetails(char.url)">{{ char.name }}</span>

                        <span v-if="i < selected.charList.length - 1">, </span>
                    </span>
                </section>
            </div>
        </div>
    </main>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
export default {
    name: 'MovieDetails',
    computed: {
        ...mapGetters({selected: 'getSelected'})
    },
    methods: {
        ...mapActions({fetch: 'detailsFetch'}),
        async onDetails(url) {
            await this.fetch(url);
        }
    }
};
</script>

<style lang="sass">
.movie-details
    dl
        display: flex
        margin: 0
        dt,
        dd
            margin: 0
            padding: 0
            line-height: 1.5
        dd
            margin-left: .5rem
    span
        display: inline-block
        line-height: 1.25
        &.link
            & ~ span
                margin: 0 .5rem 0 0
    section
        p
            line-height: 1.25
            white-space: pre-wrap
</style>
