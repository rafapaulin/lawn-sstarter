<template>
    <main class="person-details">
        <header>
            <h2 v-if="selected">{{ selected.name || selected.title }}</h2>
        </header>
        <div class="row">
            <div class="col-12 col-md-6" v-if="selected">
                <header>
                    <h4>Details</h4>
                </header>
                <section>
                    <dl v-if="selected.birth_year">
                        <dt>Birth Year:</dt>
                        <dd>{{ selected.birth_year }}</dd>
                    </dl>
                    <dl v-if="selected.gender">
                        <dt>Gender:</dt>
                        <dd>{{ selected.gender }}</dd>
                    </dl>
                    <dl v-if="selected.eye_color">
                        <dt>Eye Color:</dt>
                        <dd>{{ selected.eye_color }}</dd>
                    </dl>
                    <dl v-if="selected.hair_color">
                        <dt>Hair Color:</dt>
                        <dd>{{ selected.hair_color }}</dd>
                    </dl>
                    <dl v-if="selected.height">
                        <dt>Height:</dt>
                        <dd>{{ selected.height }}</dd>
                    </dl>
                    <dl v-if="selected.mass">
                        <dt>Mass:</dt>
                        <dd>{{ selected.mass }}</dd>
                    </dl>
                </section>
            </div>
            <div class="col-12 col-md-5 offset-md-1" v-if="selected">
                <header>
                    <h4>Movies</h4>
                </header>
                <section class="movies">
                    <span v-for="(film, i) in selected.filmList" :key="i">
                        <span class="link" @click.prevent="onDetails(film.url)">{{ film.title }}</span>

                        <span v-if="i < selected.filmList.length - 1">, </span>
                    </span>
                </section>
            </div>
        </div>
    </main>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
export default {
    name: 'PersonDetails',
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
.person-details
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

</style>
