<template>
    <div id="admin_sidebar">
              <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/api/admin">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/api/admin/admin-profile">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">Profile</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/api/admin/send-email">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">Send Email</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/api/admin/email/inbox">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">Email Inbox</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="typcn typcn-compass menu-icon"></i>
              <span class="menu-title">System Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                  <a class="nav-link" href="/api/admin/admin-services">
                    Services
                  </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="/api/admin/admin-services-descriptions">
                    Service Description
                  </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="/api/admin/admin-about">
                    About
                  </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="/api/admin/admin-contact">
                    Contact
                  </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="/api/admin/admin-faqs">
                    Faqs
                  </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link" href="/api/admin/admin-carousel">
                    Carousel
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{name: 'AdminLogin'}">
              <i class="typcn typcn-user-add-outline menu-icon"></i>
              <span class="menu-title">Login</span>
              <i class="menu-arrow"></i>
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
</template>

<script>
export default {
    name: 'AdminSidebar'
}
</script>