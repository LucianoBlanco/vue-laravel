<template>
    <div class="container">
        <header>
            <div class="collapse bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">Sleccione su servicio</h4>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">Navegacion</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <router-link :to="{name: 'home'}">Inicio</router-link>
                                </li>
                                <li>
                                    <router-link :to="{name: 'product'}">Productos</router-link>
                                </li>
                                <!-- <li>
                                    <router-link :to="{name: 'product'}">Productos<router-link>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container d-flex justify-content-between">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                      <strong>Proyecto Ven-Al</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </header>

        <transition name="slide-fade" mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>
