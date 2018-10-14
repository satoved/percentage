<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <div class="relative">
                <input :id="field.name" type="number"
                       class="w-full form-control form-input form-input-bordered"
                       :class="errorClasses"
                       :placeholder="field.name"
                       v-model="value"
                       v-bind="extraAttributes"
                />
                <div class="absolute percentage-shift">%</div>
            </div>
        </template>
    </default-field>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        methods: {
            setInitialValue() {
                this.value = this.field.value == null ? null : this.field.value.toFixed(this.field.precision);
            },

            fill(formData) {
                formData.append(this.field.attribute, this.value || '')
            },

            handleChange(value) {
                this.value = value
            },
        },

        computed: {
            extraAttributes() {
                return {
                    min: this.field.min,
                    max: this.field.max,
                    step: Math.pow(10, -this.field.precision),
                    pattern: this.field.pattern,
                    placeholder: this.field.placeholder || this.field.name,
                    class: this.errorClasses,
                }
            },
        },
    }
</script>
