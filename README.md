# Magento2
Magento tree
app\code\VendorName\ModuleName
Create registration.php in ModuleName
<?php
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Local_Blog',
    __DIR__
);
