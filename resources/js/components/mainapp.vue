<template>
<div class="">
 <div class="nav-container"  >
    <div class="mobile-topbar-header"  >
        <div class="">
            <img src="app-/images/logo-icon.png" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Zarcon Clinic</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto toggledbuttom" > <i class="bx bx-menu"  ></i>
        </a>
    </div>

    <nav class="topbar-nav">
        <ul class="metismenu" id="menu">
             <li>
                <router-link to="/">
                    <div class="parent-icon icon-color-2"><i class='bx bx-category'></i></div>
                    <div class="menu-title">Dashbord</div>
                </router-link>
            </li>


            <li>
                <router-link to="/get/users">
                    <div class="parent-icon icon-color-2"><i class='bx bx-category'></i></div>
                    <div class="menu-title">Patients</div>
                </router-link>
            </li>

             <li>
                <router-link to="/sessions">
                    <div class="parent-icon icon-color-2"><i class='bx bx-category'></i></div>
                    <div class="menu-title">Sessions</div>
                </router-link>
            </li>

             <li>
                <router-link to="/table">
                    <div class="parent-icon icon-color-2"><i class='bx bx-category'></i></div>
                    <div class="menu-title">Doctors</div>
                </router-link>
            </li>


        </ul>
    </nav>

 </div>

	<router-view/>


</div>
</template>

<script>
    export default {
        name: "mainapp",
    }
</script>
