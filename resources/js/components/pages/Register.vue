<template>

  <div class="container">
    <div class="card">
    	<div class="card-header">
    		Register
    	</div>
        
         <div class="card-body">
         	<div class="col-md-6 offset-md-3">

         		<form v-on:submit.prevent="onSubmit">

                    <div class="alert alert-danger" v-if="errors.length">
                    	<ul class="mb-0">
                    		<li v-for="(error, index) in errors" :key="index">
                    			{{ error }}
                    		</li>
                    	</ul>
                    	
                    </div>

         			<div class="form-group">
         				<label>Name</label>
         				<input type="text" name="name" class="form-control" placeholder="Name" v-model="name">
         			</div>

         			<div class="form-group">
         				<label>Email</label>
         				<input type="email" name="email" class="form-control" placeholder="Email" v-model="email">
         			</div>

         			<div class="form-group">
         				<label>Password</label>
         				<input type="password" name="password" class="form-control" placeholder="Password" v-model="password">
         			</div>
                    
                    <div class="form-group">
         				<label>Password  Confirm</label>
         				<input type="password" name="password" class="form-control" placeholder="Password" v-model="passwordConfirm">
         			</div>
                   
                    <button class="btn btn-success">Register</button>
         		</form>
         	
            </div>
         </div>
         
     </div>
  </div>

</template>

<script>

	export default {

		name: 'register',
		props: ['app'],

		data(){
			return{
				
			        name: '',
				    email: '',
				    password: '',
				    passwordConfirm: '',
				    errors: []
			}
		},

		methods: {

			onSubmit()
			{
				this.errors = [];

				if(!this.name)
				{
                  this.errors.push('Name is required.');
				}

				if(!this.email)
				{
                  this.errors.push('Email is required.');
				}

				if(!this.password)
				{
                  this.errors.push('Password is required.');
				}

				if(!this.passwordConfirm)
				{
                  this.errors.push('Password  Confirm is required.');
				}

				if(this.password !==  this.passwordConfirm)
				{
				   this.errors.push('Password  donot match.');
				}

				if(!this.errors.length)
				{
					const data = {
						name :this.name,
						email : this.email,
                        password : this.password,
					}

					this.app.req.post('auth/register', data).then(response => {
                         this.app.user = response.data;
                         this.$router.push("/");
					}).catch(error => {
						this.errors.push(error.response.data.error);

					});

				}


			}
		}

	};

</script>

<style>
</style>