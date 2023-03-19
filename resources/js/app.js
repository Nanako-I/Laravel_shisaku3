import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


// require('./bootstrap');

// import { createApp } from 'vue';

// createApp({
//     // Vue.jsアプリケーションのコンポーネントやロジックを記述する
// }).mount('#app');
