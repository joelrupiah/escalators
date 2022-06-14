<template>
<div id="service_detail">
    <!--Page Title-->
    <section class="page-title" style="background-image:url(/frontend/images/background/9.jpg)">
    	<div class="auto-container">
        	<h2>{{ servicedescriptionsdetail.title }}</h2>
            <ul class="page-breadcrumb">
            	<li><a href="/api">home</a></li>
                <li>{{ servicedescriptionsdetail.title }} Page</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
	<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
               	<!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar">
						<div class="sidebar-inner">
							
							<!--Blog Category Widget-->
							<div class="sidebar-widget sidebar-blog-category">
								<ul class="blog-cat">
									<li v-for="service in services" :key="service.id">
										<a :href="$router.resolve({name:'ServiceDetail', params: {serviceSlug: service.slug}}).href">
											{{ service.title }}
										</a>
									</li>
								</ul>
							</div>
							
						</div>
					</aside>
				</div>
				
				<!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<div class="service-single">
						<div class="inner-box">
							<div class="image">
								<img :src="fileLinkOne(servicedescriptionsdetail.servicedescriptions[0].imageOne)" alt="" />
							</div>
							<div class="lower-content">
								<h2>{{ servicedescriptionsdetail.title }}</h2>
								<div class="text">
									<p v-html="servicedescriptionsdetail.smallDescription">
									</p>

									<h3>Why choose this service</h3>
									<p v-html="servicedescriptionsdetail.servicedescriptions[0].mainDescription">
									</p>
									<!-- Two Column -->
									<div class="two-column">
										<div class="row clearfix">
											<!-- Blocks Column -->
											<div class="blocks-column col-lg-6 col-md-6 col-sm-12">
												<div class="inner-column">
													<div class="row clearfix">
														<div class="column col-md-6 col-sm-6 col-xs-12">
															<ul class="list-style-two">
																<li><span class="icon flaticon-microscope-1"></span>{{ servicedescriptionsdetail.servicedescriptions[0].pointOne }}</li>
																<li><span class="icon flaticon-labor-man"></span>{{ servicedescriptionsdetail.servicedescriptions[0].pointTwo }}</li>
															</ul>
														</div>
														<div class="column col-md-6 col-sm-6 col-xs-12">
															<ul class="list-style-two">
																<li><span class="icon flaticon-clock-2"></span>{{ servicedescriptionsdetail.servicedescriptions[0].pointThree }}</li>
																<li><span class="icon flaticon-megaphone"></span>{{ servicedescriptionsdetail.servicedescriptions[0].pointFour }}</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!-- Image Column -->
											<div class="image-column col-lg-6 col-md-6 col-sm-12">
												<div class="inner-column">
													<div class="image">
														<img 
														:src="fileLinkTwo(servicedescriptionsdetail.servicedescriptions[0].imageTwo)" 
														alt="" />
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End Two Column -->
									<h3>Our work benefits</h3>
									<p v-html="servicedescriptionsdetail.servicedescriptions[0].mainDescriptionOne">
									</p>
									<h3>Frontiers of Research</h3>
									<p v-html="servicedescriptionsdetail.servicedescriptions[0].mainDescriptionTwo">
									</p>
								</div>
								
							</div>
						</div>
					</div>	
				</div>
				
			</div>
		</div>
	</div>
</div>
</template>

<script>
export default {
    name: 'ServiceDetail',
    data(){
        return {
			form: {
				imageOne: '',
				imageTwo: '',
			}
		}
    },
    methods: {
		fileLinkOne(name){
        	return '/uploads/service/main/' + name
      	},
        fileLinkTwo(name){
        	return '/uploads/service/other/' + name
      	},
        getallServiceDescriptionDetail(){
            this.$store.dispatch('service/getallServiceDescriptionDetail', this.$route.params.serviceSlug)
        },
		getAllServiceList(){
			this.$store.dispatch('service/getAllServiceList')
		}
    },
    computed: {
        servicedescriptionsdetail(){
            return this.$store.getters['service/getallServiceDescriptionDetailList']
        },
		services(){
			return this.$store.getters['service/getAllServiceList']
		}
    },
    mounted(){
        this.getallServiceDescriptionDetail()
		this.getAllServiceList()
    }
}
</script>