<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)  // Proje kök dizinindeki tüm PHP dosyalarını kapsar
    ->name('*.php') // Yalnızca PHP dosyalarını düzenle
    ->notName('*.blade.php') // Blade dosyalarını hariç tut
    ->ignoreDotFiles(true) // Gizli dosyaları yoksay
    ->ignoreVCS(true); // Git gibi versiyon kontrol dosyalarını yoksay

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,              // PSR-12 standartlarına göre düzenleme yapar
        'array_syntax' => ['syntax' => 'short'], // Dizi sözdizimini kısa hale getirir []
        'no_unused_imports' => true,   // Kullanılmayan importları temizler
        'no_whitespace_in_blank_line' => true, // Boş satırlardaki gereksiz boşlukları siler
        'binary_operator_spaces' => ['default' => 'single_space'], // Operatörlerin etrafına tek boşluk koyar
        'blank_line_after_namespace' => true, // Namespace sonrası boş satır ekler
        'blank_line_after_opening_tag' => true, // PHP açılış tagından sonra boş satır ekler
    ])
    ->setFinder($finder);
