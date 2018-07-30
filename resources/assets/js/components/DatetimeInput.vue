<template>
    <div>
        <vue-datetime-picker :model.sync="datetime"></vue-datetime-picker>
    </div>
</template>

<script>
    export default {
        name: 'DatetimeInput',
        components: {
            'vue-datetime-picker': require('vue-datetime-picker')
        },
        props: {
            name: {
                type: String,
                required: true
            },
            value: {
                type: String,
                default: null
            }
        },
        computed: {
            'momentValue': function () {
                return moment(this.value)
            }
        },
        data: function () {
            return {
                datetime: this.momentValue
            }
        },
        methods: {
            
        }
    }
</script>

<style scoped>
    form {
        display: inline;
    }
</style>