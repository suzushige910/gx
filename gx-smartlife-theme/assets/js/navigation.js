/**
 * Navigation JavaScript for GX Smart Life Theme
 */

(function() {
    'use strict';

    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.main-navigation');

    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true' || false;

            this.setAttribute('aria-expanded', !expanded);
            navigation.classList.toggle('toggled');

            // Change icon
            const icon = this.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            }
        });
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!menuToggle || !navigation) return;

        const isClickInsideMenu = navigation.contains(event.target);
        const isClickOnToggle = menuToggle.contains(event.target);

        if (!isClickInsideMenu && !isClickOnToggle && navigation.classList.contains('toggled')) {
            navigation.classList.remove('toggled');
            menuToggle.setAttribute('aria-expanded', 'false');

            const icon = menuToggle.querySelector('i');
            if (icon) {
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
            }
        }
    });

    // Close menu on escape key
    document.addEventListener('keydown', function(event) {
        if (!navigation) return;

        if (event.key === 'Escape' && navigation.classList.contains('toggled')) {
            navigation.classList.remove('toggled');
            if (menuToggle) {
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.focus();

                const icon = menuToggle.querySelector('i');
                if (icon) {
                    icon.classList.add('fa-bars');
                    icon.classList.remove('fa-times');
                }
            }
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');

            // Skip empty anchors and # only
            if (href === '#' || href === '') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();

                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Update URL without jumping
                if (history.pushState) {
                    history.pushState(null, null, href);
                }

                // Focus the target for accessibility
                target.setAttribute('tabindex', '-1');
                target.focus();
            }
        });
    });

    // Add active class to current menu item
    const currentLocation = window.location.href;
    const menuItems = document.querySelectorAll('.main-navigation a');

    menuItems.forEach(item => {
        if (item.href === currentLocation) {
            item.classList.add('current');

            // Add current class to parent li
            const parentLi = item.closest('li');
            if (parentLi) {
                parentLi.classList.add('current-menu-item');
            }
        }
    });

    // Sticky header on scroll
    let lastScrollTop = 0;
    const header = document.querySelector('.site-header');

    if (header) {
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }, false);
    }

    // Add animation class when elements come into view
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements with animation class
    document.querySelectorAll('.card, .feature-item, .post-card').forEach(element => {
        observer.observe(element);
    });

    // Fallback menu function
    if (typeof gx_smartlife_fallback_menu === 'undefined') {
        window.gx_smartlife_fallback_menu = function() {
            const menuHtml = `
                <ul id="primary-menu">
                    <li><a href="${window.location.origin}">トップページ</a></li>
                    <li><a href="${window.location.origin}/fit-solution">卒FIT</a></li>
                    <li><a href="${window.location.origin}/bcp-solution">BCP対策</a></li>
                    <li><a href="${window.location.origin}/blog">お知らせ</a></li>
                    <li><a href="${window.location.origin}/installation-examples">施工例</a></li>
                    <li><a href="${window.location.origin}/about">会社概要</a></li>
                    <li><a href="${window.location.origin}/contact">問合せ</a></li>
                </ul>
            `;
            return menuHtml;
        };
    }

})();
