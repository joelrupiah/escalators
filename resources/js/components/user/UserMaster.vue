<template>
<div id="admin_master">
    <div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
<user-header></user-header>

<router-view></router-view>
	
<user-footer></user-footer>
	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<!-- Color Palate / Color Switcher -->

<div class="color-palate">
    <div class="color-trigger">
        <i class="fa fa-paint-brush"></i>
    </div>
    <div class="color-palate-head">
        <h6>Choose Your Color</h6>
    </div>
    <div class="various-color clearfix">
        <div class="colors-list">
            <span class="palate default-color active" data-theme-file="css/color-themes/default-theme.css"></span>
            <span class="palate green-color" data-theme-file="css/color-themes/green-theme.css"></span>
            <span class="palate blue-color" data-theme-file="css/color-themes/blue-theme.css"></span>
            <span class="palate orange-color" data-theme-file="css/color-themes/orange-theme.css"></span>
            <span class="palate purple-color" data-theme-file="css/color-themes/purple-theme.css"></span>
            <span class="palate teal-color" data-theme-file="css/color-themes/teal-theme.css"></span>
            <span class="palate brown-color" data-theme-file="css/color-themes/brown-theme.css"></span>
            <span class="palate redd-color" data-theme-file="css/color-themes/redd-color.css"></span>
			<span class="palate olive-color" data-theme-file="css/color-themes/olive-theme.css"></span>
            <span class="palate lightblue-color" data-theme-file="css/color-themes/lightblue-color.css"></span>
            <span class="palate pink-color" data-theme-file="css/color-themes/pink-theme.css"></span>
            <span class="palate hotpink-color" data-theme-file="css/color-themes/hotpink-color.css"></span>
        </div>
    </div>
	
	<ul class="box-version option-box"> <li class="box">Boxed</li> <li>Full width</li></ul>
	<ul class="rtl-version option-box"> <li class="rtl">RTL Version</li> <li>LTR Version</li> </ul>
	
    <a href="#" class="purchase-btn">Purchase now $17</a>
    
    <div class="palate-foo">
        <span>You will find much more options for colors and styling in admin panel. This color picker is used only for demonstation purposes.</span>
    </div>

</div>
</div>
</template>

<script>
import UserHeader from './inc/UserHeader.vue'
import UserFooter from './inc/UserFooter.vue'
export default {
    name: 'UserMaster',
	components: {
		UserHeader,
		UserFooter
	}
}
</script>