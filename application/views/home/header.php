<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $check['description']; ?>">
    <meta name="keywords" content="<?= $check['meta']; ?>">
    <meta name="robots" content="<?php if ($check['crawl_landing'] == 1) {
                                        echo "index";
                                    } else {
                                        echo "noindex";
                                    } ?>, <?php if ($check['follow_landing'] == 1) {
                                                echo "follow";
                                            } else {
                                                echo "dofollow";
                                            } ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if ($title == "") {
                echo $check['title'];
            } else {
                echo $title . " | " . $check['title'];
            } ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/company/'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/company/'); ?>css/styles.css">
    <link rel="stylesheet" href="<?= base_url('assets/company/'); ?>css/hovereffect.css">
    <link rel="stylesheet" href="<?= base_url('assets/company/'); ?>css/preloader.css">
    <link rel="stylesheet" href="<?= base_url('assets/company/'); ?>css/organization.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="<?= base_url('assets/company/'); ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url('assets/company/'); ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/company/'); ?>css/component-chosen.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/company/'); ?>/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/timeline') ?>/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

    <link rel="shortcut icon" href="<?= base_url('assets'); ?>/img/logo.ico" />
</head>