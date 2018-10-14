<template>
    <panel-item :field="field">
        <template slot="value">
            <div v-if="field.value == null">
                —
            </div>
            <div v-else>
                {{ field.value.toFixed(field.precision) }}%
            </div>
        </template>
    </panel-item>
</template>

<script>
    export default {
        props: ['resource', 'resourceName', 'resourceId', 'field'],
    }
</script>
