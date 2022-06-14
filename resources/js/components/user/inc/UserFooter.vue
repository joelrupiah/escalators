<template>
<div id="user_footer">
	<!--Newsleter Section-->
    <section class="newsletter-section" style="background-image:url(/frontend/images/background/13.jpg)">
	<notifications group="foo" :classes="notificationClass" />
    	<div class="auto-container">
        	<div class="inner-container">
            	<div class="row clearfix">
                	
                    <!--Title Column-->
                    <div class="title-column col-lg-5 col-md-12 col-sm-12">
                    	<div class="inner-column">
                        	<div class="icon-box">
                            	<span class="icon flaticon-mail"></span>
                            </div>
                            <h4>Newsletter Subscription</h4>
                            <div class="title">Get latest news & updates</div>
                        </div>
                    </div>
                    
                    <!--Form Column-->
                    <div class="form-column col-lg-7 col-md-12 col-sm-12">
                    	<div class="inner-column">
                        	
                            <!--Subscribe Form-->
                            <div class="subscribe-form">
                                <form>
                                    <div class="form-group">
                                        <input type="email" name="email" value="" 
										v-model="form.email" placeholder="Email Address" required>
										<span class="text-danger text-xs" v-if="errors.email">
											{{ errors.email[0] }}
										</span>
                                        <button type="submit" @click.prevent="subscribe()"
										class="theme-btn btn-style-three">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--End Newsleter Section-->
	
	<!-- Footer Style Two -->
    <footer class="footer-style-two">
    
		<div class="auto-container">
        
        	<!--Widgets Section-->
            <div class="widgets-section" style="background-image:url(/frontend/images/background/pattern-3.png)">
            	<div class="row clearfix">
                	
					<!--big column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">

							<!--Footer Column-->
							<div class="footer-column col-lg-6 col-md-6 col-sm-12">
								<div class="footer-widget logo-widget">
									<div class="logo">
										<a href="index-2.html"><img src="/frontend/images/footer-logo.png" alt="" /></a>
									</div>
									<div class="text">
										<p>The East Africa Elevators Limited industry has very good strength in innovative technology and tools with over 35 years of experience.</p>
										<p>We makes long-term investments goal in global companies in different sectors, mainly in Europe and other countries.</p>
									</div>
								</div>
							</div>
							
							<!--Footer Column-->
							<div class="footer-column col-lg-6 col-md-6 col-sm-12">
								<div class="footer-widget usefull-links">
									<h5>Usefull Links</h5>
									<div class="row clearfix">
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<ul>
												<li><a href="#">About Us</a></li>
												<li><a href="#">Meet Our Team</a></li>
												<li><a href="#">Case Studies</a></li>
												<li><a href="#">Get a Quote</a></li>
												<li><a href="#">Testimonials</a></li>
												<li><a href="#">Contact Us</a></li>
											</ul>
										</div>
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<ul>
												<li><a href="#">Market Sectors</a></li>
												<li><a href="#">Industries</a></li>
												<li><a href="#">News</a></li>
												<li><a href="#">Why Choose Us</a></li>
												<li><a href="#">Sustainability</a></li>
												<li><a href="#">Terms & Condition</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<!--big column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
							
							<!--Footer Column-->
							<div class="footer-column col-lg-6 col-md-6 col-sm-12">
								<div class="footer-widget services-widget">
									<h5>Services</h5>
									<ul class="service-list">
										<li><a href="#">Oil & Gas</a></li>
										<li><a href="#">Chemical Research</a></li>
										<li><a href="#">Agricultural Research</a></li>
										<li><a href="#">Mechanical & Civil</a></li>
										<li><a href="#">Auto Motive Engineering</a></li>
										<li><a href="#">Manufacturing</a></li>
									</ul>
								</div>
							</div>	
							
							<!--Footer Column-->
							<div class="footer-column col-lg-6 col-md-6 col-sm-12">
								<div class="footer-widget info-widget">
									<h5>Contact info</h5>
									<ul class="list-style-one alternate">
										<li><span class="icon flaticon-map-1"></span>Global Street 5004, Newyork, United States.</li>
										<li><span class="icon flaticon-mail"></span>Office & Factory: +0 625-07520-6644 & 6655</li>
										<li><span class="icon flaticon-stopwatch"></span>Working Hours: Mon-Fri (9 am - 8 pm)</li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>	
					
				</div>
			</div>
			
		</div>
		
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="row clearfix">
					
					<!-- Copyright Column -->
					<div class="copyright-column col-lg-6 col-md-12 col-sm-12">
						<div class="copyright"><a href="https://www.templateshub.net">Templates Hub</a></div>
					</div>
					
					<!-- Social Column -->
					<div class="social-column col-lg-6 col-md-12 col-sm-12">
						<ul class="footer-nav">
							<li><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-skype"></span></a></li>
							<li><a href="#"><span class="fa fa-linkedin"></span></a></li>
						</ul>
					</div>
					
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer Style Two -->
</div>
</template>

<script>
export default {
    name: 'UserFooter',
	data(){
		return{
			notificationClass: null,
			form: {
				email: ''
			},
			errors: {}
		}
	},
	methods: {
		subscribe(){
			axios.post('/api/subscribe', this.form)
				.then(() => {
					this.$message({
                        message: 'Subscription successful',
                        type: 'success'
                    })
				})
				.catch(error => {
					if (error.response.status === 422) {
						this.errors = error.response.data.errors
					}
				})
		}
	}
}
</script>