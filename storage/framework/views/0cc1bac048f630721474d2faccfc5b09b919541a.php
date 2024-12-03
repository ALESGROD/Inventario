<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo e(url('images/user.png')); ?>" width="60" height="60" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></div>
            <div class="email"><?php echo e(Auth::user()->email); ?></div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="<?php echo e(url('password-change')); ?>"><i class="material-icons">person</i>Perfil</a></li>
                    <li><a href="<?php echo e(url('logout')); ?>"><i class="material-icons">input</i>Desconectar</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">NAVEGACIÓN PRINCIPAL</li>
            <li <?php if(Route::currentRouteName()=='' ): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url('/')); ?>">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>

            <?php
            $side_menu = Session::get('side_menu', []);
            ?>

            <?php if(isset($side_menu[0]) && is_array($side_menu[0])): ?>
                <?php $__currentLoopData = $side_menu[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($value['sub_menu'])): ?>
                    <li class="parent">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons"><?php echo e($value['icon']); ?></i>
                            <span><?php echo e($value['name']); ?></span>
                        </a>
                        <ul class="ml-menu">
                            <?php $__currentLoopData = $value['sub_menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li <?php if(Route::currentRouteName() == $sub->menu_url): ?> class="active" <?php endif; ?>>
                                <a href="<?php echo e($sub->menu_url ? route($sub->menu_url) : ''); ?>">
                                    <span><?php echo e($sub->name); ?></span>
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li <?php if(Route::currentRouteName() == $value['url']): ?> class="active" <?php endif; ?>>
                        <a href="<?php echo e($value['url'] ? route($value['url']) : ''); ?>">
                            <i class="material-icons"><?php echo e($value['icon']); ?></i>
                            <span><?php echo e($value['name']); ?></span>
                        </a>
                    </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>
</aside>
<!-- #END# Left Sidebar -->
