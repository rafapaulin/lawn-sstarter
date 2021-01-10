<template>
    <section class="row">
        <div class="col-12 col-md-5">
            <SearchBox />
        </div>
        <div class="col-12 col-md-7">
            <ResultsBox />
        </div>
    </section>
</template>

<script>
import { SearchBox, ResultsBox } from '@/components';

export default {
    name: 'Home',
    components: { SearchBox, ResultsBox }
};
</script>
