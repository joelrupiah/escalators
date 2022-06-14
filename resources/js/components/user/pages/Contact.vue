<template>
<div id="user_contact">
    <!--Page Title-->
    <section class="page-title" style="background-image:url(/frontend/images/background/9.jpg)">
    	<div class="auto-container">
        	<h2>Contact Us</h2>
            <ul class="page-breadcrumb">
            	<li><a href="index-2.html">home</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Contact Page Section -->
	<section class="contact-page-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Form Column -->
				<div class="form-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="title-inner">
								<div class="title">Get in Touch</div>
								<h2>Contact Us</h2>
							</div>
						</div>
						
						<!-- Contact Form -->
						<div class="contact-form">
							<form @submit.prevent="submitInbox()">
								<div class="row clearfix">
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="username" 
										v-model="form.name" placeholder="Name " required>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="email" name="email" v-model="form.email"
										placeholder="Email " required>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="subject" v-model="form.subject"
										placeholder="Subject " required>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="phone" v-model="form.phone"
										placeholder="Phone " required>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<textarea name="message" v-model="form.message"
										placeholder="Message "></textarea>
									</div>
								
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<button class="theme-btn btn-style-four" type="submit" name="submit-form">Send Now</button>
									</div>
									
								</div>
							</form>
								
						</div>
						
					</div>
				</div>
				
				<!-- Info Column -->
				<div class="info-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">
						
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="title-inner">
								<div class="title">Contact Us</div>
								<h2>Contact information</h2>
							</div>
						</div>
						
						<div class="content-boxed">
							<div class="text">For any kind of query, contact us with the details below.</div>
							<ul v-for="(contact, index) in contacts" :key="index">
								<li><span class="icon fa fa-phone"></span>{{ contact.phone }}</li>
								<li><span class="icon fa fa-envelope"></span>{{ contact.email }}</li>
								<li><span class="icon fa fa-map-marker"></span>{{ contact.address }}</li>
								<!-- <li><span class="icon fa fa-clock-o"></span>Opening Hours : Monday - Satureday   9:00 am  to  5pm</li> -->
							</ul>
						</div>
						
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End Faq Section -->
	
	<!--Sponsors Section-->
    <section class="sponsors-section-two" style="background-image:url(/frontend/images/background/8.jpg)">
    	<div class="auto-container">
        	
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/6.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/7.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/8.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/9.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/10.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/6.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/7.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/8.png" alt=""></a></figure></li>
                </ul>
            </div>
            
        </div>
    </section>
    <!--End Sponsors Section-->
</div>
</template>

<script>
export default {
    name: 'Contact',
	data(){
		return {
			form: {
				name: '',
				email: '',
				phone: '',
				subject: '',
				message: ''
			}
		}
	},
	methods: {
		submitInbox(){
			console.log(this.form)
		},
		getAllContact(){
			this.$store.dispatch('contact/getAllContact')
		}
	},
	computed: {
		contacts(){
			return this.$store.getters['contact/contactListAll']
		}
	},
	mounted(){
		this.getAllContact()
	}
}
</script>