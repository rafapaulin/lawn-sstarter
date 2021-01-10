<template>
    <div id="app">
        <TopNav />
        <div class="container">
            <router-view/>
        </div>
    </div>
</template>

<script>
import { TopNav } from '@/components'

export default {
    name: 'App',
    components: { TopNav }
}
</script>
