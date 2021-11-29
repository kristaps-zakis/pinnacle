
new Vue({
    el: '#app',

    data () {
        return {
            email: '',
            termsApproved: false,
            emailErrorMessage: '',
            validate: false,
            successSubmitted: false
        }
    },

    computed: {
        allowSubmit () {
           return (!this.termsError && this.validateEmail && this.validate) || !this.validate;
        },

        termsError () {
            if (!this.validate) {
                return ;
            }

            return !this.termsApproved;
        },

        emailErrors () {
            if (!this.validate) {
                return ;
            }

            return !this.validateEmail;
        },

        validateEmail () {
            if (this.email === '') {
                this.emailErrorMessage = 'Email address is required';

                return false;
            }

            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
                this.emailErrorMessage = 'Please enter a valid email address';

                return false;
            }

            if (/.co$/.test(this.email)) {
                this.emailErrorMessage = 'We are not accepting subscriptions from Colombia emails';

                return false;
            }

            return true;
        },

        successfulSubscribe () {
            return this.successSubmitted;
        }
    },

    methods: {
        submitForm () {
            this.validate = true;

            if (this.allowSubmit) {
                this.successSubmitted = true;
                console.log('Form Submitted', this.email);
            }
        }
    }
})