<template>
    <div>
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">

            <div class="logo"><a class="simple-text logo-normal">
                DLCG
            </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav nav-side">
                    <li class="nav-item dashboard fSider">
                        <a class="nav-link nav-parent" href="/">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item products fSider">
                        <a class="nav-link nav-parent" href="/#/products">
                            <i class="material-icons">content_paste</i>
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="nav-item products fSider">
                        <a class="nav-link nav-parent" href="/#/addProduct">
                            <i class="material-icons">work</i>
                            <p>Add Product</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content contentMod">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                message: 'Hello World'
            }
        }
    };
</script>
