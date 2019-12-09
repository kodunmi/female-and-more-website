<template>
    <div class="our-causes">
                                <div class="our-causes__image-wrap pr">
                                    <div class="day_no">
                                        <span>Story Two</span>
                                    </div>
                                    <img data-src="images/stories/amina.jpg" class="our-causes__image lazy" alt="">

                                    <div class="loader"></div>
                                    <div class="our-causes__percentage base-bg">
                                        <div class="our-causes__rised">
                                            WEEK  &nbsp; <span class="base-color"> ONE </span>
                                        </div>
                                        <div class="our-causes__goal">
                                            <span class="nv-color">DAY &nbsp; </span> <span> TWO </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="our-causes__text-content text-center">
                                    <div class="progress-item">
                                        <div  class="progress-bg">
                                            <div id='progress-two' class="progress-rate base-bg" data-value='80'>
                                            </div>
                                        </div>
                                        <span class="progress-percent">80%</span>
                                    </div><!--/.progress-item-->
                                    <h4 class="text-uppercase our-causes__title"><a href="#">amina slaoui</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consect adipisc elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                    <a href="#" class="btn">Read Story</a>
                                </div>
                            </div><!--/.our-causes-->
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
