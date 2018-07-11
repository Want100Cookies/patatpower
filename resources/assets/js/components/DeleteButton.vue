<template>
    <form method="POST" :action="url" v-on:submit.prevent="onFormSubmit" ref="form">
        <input type="hidden" name="_token" :value="token">
        <input type="hidden" name="_method" value="DELETE">
        <button :class="btnClass"><slot>Delete</slot></button>
    </form>
</template>

<script>
    export default {
        name: 'DeleteButton',
        props: {
            url: {
                type: String,
                required: true
            },
            type: {
                type: String,
                default: 'danger'
            }
        },
        computed: {
            btnClass: function () {
                return `btn btn-${this.type}`
            }
        },
        data () {
            const token = document.head.querySelector('meta[name="csrf-token"]') || {};
            return {
                'token': token.content
            }
        },
        methods: {
            onFormSubmit: function () {
                if (confirm('Are you sure?')) {
                    this.$refs.form.submit();
                }
            }
        }
    }
</script>

<style scoped>
    form {
        display: inline;
    }
</style>