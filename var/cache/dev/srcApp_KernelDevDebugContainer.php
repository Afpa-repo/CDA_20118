<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerAakAKbe\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerAakAKbe/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerAakAKbe.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerAakAKbe\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerAakAKbe\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'AakAKbe',
    'container.build_id' => 'b82a1cea',
    'container.build_time' => 1615818402,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerAakAKbe');