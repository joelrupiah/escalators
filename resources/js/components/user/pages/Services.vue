<template>
<div id="user_services">
    <!--Page Title-->
    <section class="page-title" style="background-image:url(/frontend/images/background/9.jpg)">
    	<div class="auto-container">
        	<h2>Our Services</h2>
            <ul class="page-breadcrumb">
            	<li><a href="/api">home</a></li>
                <li>Services</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Services Section -->
	<section class="services-section-two">
		<div class="auto-container">
			<div class="row clearfix">
				
				<div class="services-block-three col-lg-4 col-md-12 col-sm-12" v-for="service in services" :key="service.id">
					<div class="inner-box">
						<div class="upper-box">
							<div class="icon fa fa-flask"></div>
							<h6><a :href="$router.resolve({name:'ServiceDetail', params: {serviceSlug: service.slug}}).href">
								{{ service.title }}
							</a></h6>
						</div>
						<div class="text" v-html="subStrWithHtml(service.smallDescription, 250, '...')"></div>
						<a class="read-more" :href="$router.resolve({name:'ServiceDetail', params: {serviceSlug: service.slug}}).href">
							read more 
						<span class="arrow fa fa-angle-double-right"></span></a>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Services Section -->

	<!--Sponsors Section-->
    <section class="sponsors-section">
    	<div class="auto-container">
        	
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/3.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/4.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/5.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="/frontend/images/clients/3.png" alt=""></a></figure></li>
                </ul>
            </div>
            
        </div>
    </section>
    <!--End Sponsors Section-->
</div>
</template>

<script>
export default {
    name: 'Services',
	data(){
		return {}
	},
	methods: {
		getAllFrontServices(){
			this.$store.dispatch('service/serviceDescriptionFrontServices')
		},
		subStrWithHtml(text, length, suffix){
			// console.log(text)
			return text.substring(0, length) + suffix
		}
	},
	computed: {
		services(){
			return this.$store.getters['service/serviceListAll']
		}
	},
	mounted(){
		this.getAllFrontServices()
	}
}
</script>