import './bootstrap';

import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Typed from 'typed.js';
import { Chart, registerables } from 'chart.js'; // <-- 1. IMPORT CHART.JS

window.Alpine = Alpine;
window.Typed = Typed;
Chart.register(...registerables); // <-- 2. REGISTRASIKAN CHART.JS
window.Chart = Chart; // <-- 3. BUAT GLOBAL AGAR ALPINE BISA MENGAKSES

Alpine.start();

AOS.init({
    duration: 800,
    once: true,
    offset: 50,
});
