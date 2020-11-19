<template>
    <div>
        <heading class="mb-6">Reset My Password</heading>

        <div class="card">
            <div v-if="errors.length" class="flex border-40">
                <div class="px-8 py-6">
                    <p>
                        <b>Please correct the following error(s):</b>
                    <ul>
                        <li v-for="error in errors" style="padding-top: 10px; color: #ff1515">{{ error }}</li>
                    </ul>
                    </p>
                </div>
            </div>

            <div class="flex border-40">
                <div class="w-1/5 px-8 py-6">
                    <label for="old_password" class="inline-block text-80 pt-2 leading-tight">
                        Current password
                        <span class="text-danger text-sm">*</span>
                    </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                    <input
                        v-model="current_password"
                        id="old_password" type="password"
                        class="w-full form-control form-input form-input-bordered"
                        name="current_password">
                </div>
            </div>

            <div class="flex border-40">
                <div class="w-1/5 px-8 py-6">
                    <label for="new_password" class="inline-block text-80 pt-2 leading-tight">
                        New password
                        <span class="text-danger text-sm">*</span>
                    </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                    <input
                        v-model="new_password"
                        id="new_password" type="password"
                        class="w-full form-control form-input form-input-bordered"
                        name="new_password">
                </div>
            </div>

            <div class="flex border-40">
                <div class="w-1/5 px-8 py-6">
                    <label for="confirm_password" class="inline-block text-80 pt-2 leading-tight">
                        Confirm password
                        <span class="text-danger text-sm">*</span>
                    </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                    <input
                        v-model="confirm_new_password"
                        id="confirm_password" type="password"
                        class="w-full form-control form-input form-input-bordered"
                        name="confirm_new_password">
                </div>
            </div>

            <div class="flex border-b border-40">
                <div class="px-8 py-6">
                    <button @click="submitForm()" type="submit"
                            class="btn btn-default btn-primary inline-flex items-center relative">
                        <span>Save Password</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                errors: [],
                current_password: null,
                new_password: null,
                confirm_new_password: null
            }
        },
        mounted() {
            //
        },
        methods: {
            checkForm: function () {
                this.errors = [];

                if (!this.current_password) {
                    this.errors.push('Current password required.');
                }

                if (!this.new_password) {
                    this.errors.push('New password required.');
                }

                if (this.new_password && this.new_password.length < 5) {
                    this.errors.push('New password must be greater than or equal 5 characters.');
                }

                if (!this.confirm_new_password) {
                    this.errors.push('New password confirmation required.');
                }

                if (this.confirm_new_password && this.confirm_new_password.length < 5) {
                    this.errors.push('New password confirmation must be greater than or equal 5 characters.');
                }
            },
            submitForm: function () {
                this.checkForm();

                if (this.errors.length > 0)
                    return;

                Nova.request().post('/nova-vendor/nova-password-reset/reset-password', _.tap(new FormData(), formData => {
                    formData.append('current_password', this.current_password)
                    formData.append('new_password', this.new_password)
                    formData.append('confirm_new_password', this.confirm_new_password)
                })).then(_ => {
                    this.$toasted.show('Password updated successfully.', {type: 'success'})
                }).catch(reason => {
                    if (reason.response.data && reason.response.data.errors) {
                        let errors = reason.response.data.errors;
                        for (const key in errors) {
                            for (const err in errors[key]) {
                                this.$toasted.show(errors[key][err], {type: 'error'})
                            }
                        }
                    }
                })
            }
        }
    }
</script>

<style>
    /* Scoped Styles */
</style>
