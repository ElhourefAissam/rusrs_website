<template>
<div>
    <front-page v-if="bool" />
    <admin-app v-else />
</div>
</template>

<script>
export default {
    data() {
        return {
            bool: '{{ Auth::check() }}' ? true : false
        }
    }
}
</script>

<style>

</style>
