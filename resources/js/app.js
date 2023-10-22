import './bootstrap';
import 'flowbite';
import { Fancybox } from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";
import '../../vendor/alperenersoy/filament-export/resources/js/filament-export.js';

import AOS from 'aos';
import 'aos/dist/aos.css';

Fancybox.bind('[data-fancybox="gallery"]', {
    // Your custom options
});

AOS.init();