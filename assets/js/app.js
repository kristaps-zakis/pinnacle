
new Vue({
    el: '#app',

    data () {
        return {
            form: {
                email: null,
                termsApproved: false
            }
        }
    },

    computed: {
        emailSet () {
            return this.emailIsValid && this.emailIsRequired && this.emailIsPropper
        },

        emailIsValid () {

        },

        emailIsRequired () {

        },

        emailIsPropper () {

        },

        termsApproved () {

        },

        successSubmit () {
            return this.emailIsPropper && this.termsApproved
        }
    },

    methods: {
        submitForm () {
            const formIsValid = true;

            const emailSet = false;

            if (formIsValid) {
                console.log('Form Submitted', this.form);
            } else {
                console.log('Invalid?');
            }

        }
    }
})