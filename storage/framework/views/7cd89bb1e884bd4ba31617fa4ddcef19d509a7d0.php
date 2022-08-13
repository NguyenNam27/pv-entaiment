<header class="">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="<?php echo e(route('trangchu')); ?>">
                <img src="FE/image/logoo.png" alt="">
            </a>
        </div>
        <i class="fa-solid fa-bars icon-menu"></i>
        <i class="fa-solid fa-xmark icon-close"></i>
        <nav class="menu">
            <ul class="d-flex">
                <li class="menu1">
                    <a href="<?php echo e(route('KOL')); ?>">ARTIST</a>
                    <ul class="menu2">
                        <li><a href="<?php echo e(route('booking')); ?>">booking</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo e(route('tintuc')); ?>">news</a></li>
                <li class="menu1">
                    <a href="<?php echo e(route('picture')); ?>">gallery</a>
                    <ul class="menu2">
                        <li><a href="<?php echo e(route('picture')); ?>">picture</a></li>
                        <li><a href="<?php echo e(route('video')); ?>">video</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo e(route('product')); ?>">store</a></li>
                <li ><a href="">CONTACT </a></li>

            </ul>
        </nav>
        <div class="login">
                <ul class="d-flex">
                    <?php if(auth()->guard()->guest()): ?>

                    <li><a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                        <li><a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                                <span class="caret"></span>

                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
        </div>
    </div>
    <div class="mb-menu">
        <ul>
            <li style="animation-delay: 0s">
                <a href="<?php echo e(route('KOL')); ?>">ARTIST</a>
                <ul>
                    <li ><a href="<?php echo e(route('booking')); ?>">BOOKING</a></li>
                </ul>
            </li>
            <li ><a href="<?php echo e(route('tintuc')); ?>">NEWS</a></li>
            <li >
                <a href="<?php echo e(route('picture')); ?>">GALLERY</a>
                <ul>
                    <li><a href="<?php echo e(route('picture')); ?>">PICTURE</a></li>
                    <li><a href="<?php echo e(route('video')); ?>">VIDEO</a></li>
                </ul>
            </li>
            <li style="animation-delay: 0.4s"><a href="<?php echo e(route('product')); ?>">STORE</a></li>
            <li ><a href="">CONTACT </a></li>


        <?php if(auth()->guard()->guest()): ?>

                <li><a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                <li><a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
            <?php else: ?>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo e(Auth::user()->name); ?>

                        <span class="caret"></span>

                    </a>


                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</header>
